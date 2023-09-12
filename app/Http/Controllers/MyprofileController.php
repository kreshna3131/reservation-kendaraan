<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyprofileController extends Controller
{
    /**
     * Show My-Profile Page
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function myProfile()
    {
        // $this->authorize('viewProfile', User::class);

        return view('setting.my-profile');
    }

    /**
     * Update MyProfile Data
     *
     * @param  \App\Http\Requests\MyProfile $request
     * @return \Illuminate\Http\JsonResponse
     */
    // public function updateMyProfile(MyProfile $request)
    public function updateMyProfile()
    {
        // try {
        //     if ($request->filled('password')) {
        //         auth()->user()->update([
        //             'name' => $request->name,
        //             'password' => Hash::make($request->password),
        //             'weak_password' => $request->filled('weak_password') ? $request->weak_password : 0
        //         ]);
        //     } else {
        //         auth()->user()->update([
        //             'name' => $request->name,
        //         ]);
        //     }

        //     return response()->json(['message' => Lang::get('admin.update-success')], 200);
        // } catch (\Throwable $th) {
        //     Log::info($th->getMessage());
        //     return response()->json(['message' => Lang::get('admin.update-failed')], 500);
        // }
    }
}
