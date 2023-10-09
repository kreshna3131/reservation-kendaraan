<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $booking = Booking::all();
        return view('crud.index', compact('booking'));
    }

    public function show(Booking $booking)
    {
        return view('crud.show',compact('booking'));
    }

    public function create(){
        return view('crud.tambah');
    }
    
    public function store(Request $request){
        $validator = Validator::make($request->all(),
            [
                'nama' => 'required',
                'harga' => 'required|numeric',
                'jumlah' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $booking = Booking::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
        ]);
            
        if ($booking) {
            Session::flash('berhasil', 'Berhasil Menambah');
            return redirect()->route('index');
        }
        Session::flash('gagal', 'gagal Menambah');
        return redirect()->back();
    }
    
    public function edit(Booking $booking){
        return view('crud.edit', compact('booking'));
    }
    
    public function update(Request $request, Booking $booking){
        $validator = Validator::make($request->all(),
            [
                'nama' => 'required',
                'harga' => 'required|numeric',
                'jumlah' => 'required|numeric',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }
        
        $booking->update($request->all());
            
        if ($booking) {
            Session::flash('berhasil', 'Berhasil Mengubah');
            return redirect()->route('index');
        }

        Session::flash('gagal', 'gagal Mengubah');
        return redirect()->back();
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
    
        if ($booking) {
            Session::flash('berhasil', 'Berhasil Menghapus Booking');
            return redirect()->route('index');
        }

        Session::flash('gagal', 'gagal Menghapus Booking');
        return redirect()->back();
    }
}
