<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    // use UploadTraits;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
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
}
