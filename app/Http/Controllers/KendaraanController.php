<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

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
        ]);

        // Membuat instance model Kendaraan dan mengisi nilai-nilainya
        $kendaraan = new Kendaraan();
        $kendaraan->name = $validatedData['name'];
        $kendaraan->jeniskendaraan = $validatedData['jeniskendaraan'];
        $kendaraan->jumlahunit = $validatedData['jumlahunit'];

        // Menyimpan data ke database
        $kendaraan->save();
        return Redirect::route('kendaraan.index')->with('success', 'Data kendaraan berhasil disimpan');

        return response()->json([
            'message' => 'Data kendaraan berhasil disimpan',
            'data' => $kendaraan
        ], 201); // 201 adalah kode status untuk "Created"
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
