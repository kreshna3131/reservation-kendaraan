<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $staticData = [
            [
                'id' => 1,
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'department' => 'HR',
                'user_name' => 'Admin',
                'html_status_team' => '<span class="badge badge-primary">Active</span>',
            ],
            [
                'id' => 2,
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'department' => 'Marketing',
                'user_name' => 'User',
                'html_status_team' => '<span class="badge badge-success">Active</span>',
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ];

        $data = [];

        foreach ($staticData as $no => $memberData) {
            $param = $this->actionButtonData($memberData);

            $row = [
                ++$no,
                "<p>ini image</p>",
                $memberData['name'],
                $memberData['email'],
                $memberData['department'],
                $memberData['user_name'],
                $memberData['html_status_team'],
                $this->actionButton($param),
            ];

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

    public function store()
    {
        // try {
        //     $member = Member::create($request->except(['photo', 'user_id', 'birth_date']) + [
        //         'user_id' => $request->supervisi,
        //         'birth_date' => Carbon::parse($request->birth_date)->format('Y-m-d'),
        //         'photo_name' => $request->file('photo') ? $request->file('photo')->getClientOriginalName() : null,
        //         'photo_path' => $request->file('photo') ? $this->uploadFile($request->file('photo')) : null,

        //     ]);

        //     // $member->sendCreatePasswordNotification();
        //     $member->schedule()->create([
        //         'user_id' => $request->supervisi,
        //     ]);

        //     $member->attendance()->create([
        //         'member_name' => $member->name,
        //         'member_department' => $member->department,
        //         'member_status_team' => $member->status_team,
        //     ]);
        //     $this->sendCreateEmail($member);

        //     return response()->json(['message' => 'Berhasil Ditambahkan']);
        // } catch (\Throwable $th) {
        //     info($th->getMessage());
        //     return response()->json(['message' => 'Gagal Ditambahkan'], 500);
        // }
    }
}
