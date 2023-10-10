<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class KendaraanController extends Controller
{
    public function index()
    {
        return view('kendaraan.index');
    }

    public function list()
    {
        $fotopath = "assets/img/kendaraan/";
        $kendaraans = Kendaraan::orderBy('created_at', 'desc')->get();

        $data = [];

        foreach ($kendaraans as $kendaraan) {
            $data[] = [
                'nama' => $kendaraan->nama,
                'foto' => "<div class='kpaw_circle_foto' style='background-image: url(" . Storage::url($fotopath . $kendaraan->foto) . ")'></div>",
                'jenis_kendaraan' => $kendaraan->jenis_kendaraan,
                'jumlah_unit' => $kendaraan->jumlah_unit,
                'harga_sewa' => $kendaraan->harga_sewa,
                'keterangan' => $kendaraan->keterangan,
            ];
        }

        return response()->json([
            'data' => $data
        ]);
    }

    public function create()
    {
        return view('kendaraan.create');
    }

    public function store(Request $request)
    {
        // Validasi input data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kendaraan' => 'required|string|max:255',
            'jumlah_unit' => 'required|integer',
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
        $kendaraan->nama = $validatedData['name'];
        $kendaraan->jenis_kendaraan = $validatedData['jeniskendaraan'];
        $kendaraan->jumlah_unit = $validatedData['jumlahunit'];
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
