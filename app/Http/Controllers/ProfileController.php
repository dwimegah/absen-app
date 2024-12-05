<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    function profile() {
        $karyawan = DB::table('users')->where('id', '=', Auth::id())->get();
        $data = array(
            'active'=>'profile',
            'profile' => $karyawan
            );
        return view('profile')->with($data);
    }
}
