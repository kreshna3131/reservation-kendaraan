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

    public function list(Request $request)
    {
        $kendaraan = MasterKendaraan::orderBy('created_at', 'desc')->get();

        $no = 0;
        $data = [];

        foreach ($kendaraan as $master) {
            $param = $this->actionButtonData($master);

            $no++;
            $row = [];

            $row[] = $no;
            $row[] = $master->jeniskendaraan;
            $row[] = $master->merkkendaraan;

            $data[] = $row;
        }

        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Get the data for action button in datatable.
     *
     * @return \Illuminate\Http\Response
     */
    protected function actionButtonData($model): array
    {
        try {
            return [
                'edit_url' => route('masterkendaraan.edit', $model->id),
                'edit_visibility' => true,
                'delete_url' => route('masterkendaraan.destroy', $model->id),
                'delete_visibility' => true
            ];
        } catch (\Throwable $th) {
            info($th->getMessage());
        }
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
        $kendaraan = MasterKendaraan::find($id);

        if (!$kendaraan) {
            return Redirect::route('masterkendaraan.index')->with('error', 'Kendaraan tidak ditemukan');
        }

        return view('masterkendaraan.show', compact('kendaraan'));
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
