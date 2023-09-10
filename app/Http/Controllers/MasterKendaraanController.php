<?php

namespace App\Http\Controllers;

use App\Models\MasterKendaraan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class MasterKendaraanController extends Controller
{
    // use UploadTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('masterkendaraan.index');
    }

    public function list()
    {
        //
    }


    /**
     * menampilkan halaman create kendaraan.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterkendaraan.create');
    }

    public function store(Request $request)
{
    // Validasi input data
    $validatedData = $request->validate([
        'jeniskendaraan' => 'required|string|max:255',
        'merkkendaraan' => 'required|string|max:255',
    ]);

    $kendaraan = new MasterKendaraan();
        $kendaraan->jeniskendaraan = $validatedData['jeniskendaraan'];
        $kendaraan->merkkendaraan = $validatedData['merkkendaraan'];

        $kendaraan->save();
        return Redirect::route('masterkendaraan.index')->with('success', 'Data kendaraan berhasil disimpan');
}




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        try {
            $kendaraan = MasterKendaraan::find($id);
            $kendaraan->delete();
            return response()->json(['message' => 'Berhasil Dihapus'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => 'Gagal Dihapus'], 500);
        }
    }
}
