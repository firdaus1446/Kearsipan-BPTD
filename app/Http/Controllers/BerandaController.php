<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Arsip;

class BerandaController extends Controller
{
    public function index()
    {
        $jumlah_user = User::count();
        $jumlah_arsip = Arsip::count();
     
        return view('beranda', compact('jumlah_user','jumlah_arsip'));

    // $jumlah_user = User::all()->count();
    // return view('beranda')->with('jumlah_user', $jumlah_user);

    // $dtuser = User::all()->count();
    // return view('beranda',compact('dtuser'));

    // $jumlah_user = User::all()->count();
    // return view('beranda',compact('jumlah_user'));

    }

    
}
