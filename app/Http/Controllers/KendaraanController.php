<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class KendaraanController extends Controller
{
    // use UploadTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('kendaraan.index');
    }

    public function list()
    {
        $kendaraans = Kendaraan::orderBy('created_at', 'desc')->get();

        $data = [];

        foreach ($kendaraans as $kendaraan) {
            $data[] = [
                'photo' => "<div class='kpaw_circle_foto' style='background-image: url(" . Storage::url($kendaraan->photo_path) . ")'></div>",
                'name' => $kendaraan->name,
                'jeniskendaraan' => $kendaraan->jeniskendaraan,
                'jumlahunit' => $kendaraan->jumlahunit,
            ];
        }

        return response()->json([
            'data' => $data
        ]);
    }


    /**
     * menampilkan halaman create kendaraan.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        // Validasi input data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'jeniskendaraan' => 'required|string|max:255',
            'jumlahunit' => 'required|integer',
            'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi foto (sesuaikan dengan kebutuhan Anda)
        ]);

        // Menyimpan file foto jika ada
        $photo_name = null;
        $photo_path = null;

        if ($request->file('photo')) {
            $photo_name = $request->file('photo')->getClientOriginalName();
            $photo_path = $this->uploadFile($request->file('photo')); // Anda perlu mengganti ini dengan logika upload file yang sesuai dengan aplikasi Anda.
        }

        // Membuat instance model Kendaraan dan mengisi nilai-nilainya
        $kendaraan = new Kendaraan();
        $kendaraan->name = $validatedData['name'];
        $kendaraan->jeniskendaraan = $validatedData['jeniskendaraan'];
        $kendaraan->jumlahunit = $validatedData['jumlahunit'];
        $kendaraan->photo_name = $photo_name;
        $kendaraan->photo_path = $photo_path;

        // Menyimpan data ke database
        $kendaraan->save();

        return Redirect::route('kendaraan.index')->with('success', 'Data kendaraan berhasil disimpan');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $kendaraan = Kendaraan::find($id);

            if (!$kendaraan) {
                return response()->json([
                    'message' => 'Data kendaraan tidak ditemukan',
                ], 404);
            }

            return response()->json([
                'data' => $kendaraan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Terjadi kesalahan: ' . $e->getMessage()
            ], 500); // 500 adalah kode status untuk "Internal Server Error"
        }
    }

    public function destroy($id)
    {
        try {
            $kendaraan = Kendaraan::find($id);
            $kendaraan->delete();
            return response()->json(['message' => 'Berhasil Dihapus'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Gagal Dihapus'], 500);
        }
    }
}
