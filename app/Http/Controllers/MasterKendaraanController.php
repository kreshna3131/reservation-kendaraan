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
        $draw = $request->input('draw');
        $start = $request->input('start');
        $length = $request->input('length');

        $kendaraan = MasterKendaraan::orderBy('created_at', 'desc')
            ->skip($start)
            ->take($length)
            ->get();

        $data = [];
        $counter = $start + 1; // Initialize the counter

        foreach ($kendaraan as $master) {
            $param = $this->actionButtonData($master);

            $row = [
                'DT_RowIndex' => $counter++, // Increment the counter for each row
                'jeniskendaraan' => $master->jeniskendaraan,
                'merkkendaraan' => $master->merkkendaraan,
                'actions' => '<a href="' . $param['edit_url'] . '" class="btn btn-primary">Edit</a> ' .
                    '<a href="' . $param['delete_url'] . '" class="btn btn-danger">Delete</a>',

                // 'actions' => '<a href="' . $param['edit_url'] . '" class="">
                //     <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                //         <g id="search">
                //             <rect id="Rectangle_13" data-name="Rectangle 13" width="24" height="24" fill="#5800FF" opacity="0"></rect>
                //             <path id="Path_1" data-name="Path 1" d="M20.71,19.29l-3.4-3.39A7.92,7.92,0,0,0,19,11a8,8,0,1,0-8,8,7.92,7.92,0,0,0,4.9-1.69l3.39,3.4a1,1,0,1,0,1.42-1.42ZM5,11a6,6,0,1,1,6,6,6,6,0,0,1-6-6Z" fill="#5800FF"></path>
                //         </g>
                //     </svg>
                // </a>
                // <a href="' . $param['delete_url'] . '" class="">
                //     <svg id="Layer_2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                //         <path id="Path_2" data-name="Path 2" d="M21,6H16V4.33A2.42,2.42,0,0,0,13.5,2h-3A2.42,2.42,0,0,0,8,4.33V6H3A1,1,0,0,0,3,8H4V19a3,3,0,0,0,3,3H17a3,3,0,0,0,3-3V8h1a1,1,0,0,0,0-2ZM10,4.33c0-.16.21-.33.5-.33h3c.29,0,.5.17.5,.33V6H10ZM18,19a1,1,0,0,1-1,1H7a1,1,0,0,1-1-1V8H18Z" fill="#ff3b3b"></path>
                //     </svg>
                // </a>'

            ];

            $data[] = $row;
        }

        return response()->json([
            'draw' => $draw,
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
            'data' => $data,
        ]);
    }

    // /**
    //  * Get the data for action button in datatable.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // protected function actionButtonData($model): array
    // {
    //     try {
    //         return [
    //             'edit_url' => route('masterkendaraan.edit', $model->id),
    //             // 'edit_url' => $model->id ? route('masterkendaraan.edit', $model->id) : '',
    //             'edit_visibility' => true,
    //             'delete_url' => route('masterkendaraan.destroy', $model->id),
    //             'delete_visibility' => true
    //         ];
    //     } catch (\Throwable $th) {
    //         info($th->getMessage());
    //     }
    // }

    protected function actionButtonData($model): array
    {
        try {
            $edit_url = $model->id ? route('masterkendaraan.edit', $model->id) : '';
            $delete_url = $model->id ? route('masterkendaraan.destroy', $model->id) : '';

            return [
                'edit_url' => $edit_url,
                'edit_visibility' => true,
                'delete_url' => $delete_url,
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kendaraan = MasterKendaraan::find($id);

        if (!$kendaraan) {
            return Redirect::route('masterkendaraan.index')->with('error', 'Kendaraan tidak ditemukan');
        }

        return view('masterkendaraan.edit', compact('kendaraan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validasi input data
        $validatedData = $request->validate([
            'jeniskendaraan' => 'required|string|max:255',
            'merkkendaraan' => 'required|string|max:255',
        ]);

        $kendaraan = MasterKendaraan::find($id);

        if (!$kendaraan) {
            return Redirect::route('masterkendaraan.index')->with('error', 'Kendaraan tidak ditemukan');
        }

        $kendaraan->jeniskendaraan = $validatedData['jeniskendaraan'];
        $kendaraan->merkkendaraan = $validatedData['merkkendaraan'];

        $kendaraan->save();

        return Redirect::route('masterkendaraan.index')->with('success', 'Data kendaraan berhasil diperbarui');
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
