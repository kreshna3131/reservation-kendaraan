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

        $no = 0;
        $row = [];

        foreach ($kendaraans as $kendaraan) {
            $row[] = $no;
            $row[] = $kendaraan->name;
            $row[] = $kendaraan->jeniskendaraan;
            $row[] = $kendaraan->jumlahunit;
            $data[] = $row;
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
}
