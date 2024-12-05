<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Request\KaryawanRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class KaryawanController extends Controller
{
    function karyawan() {
        $karyawan = DB::table('users')->get();
        $data = array(
            'active'=>'karyawan',
            'datas' => $karyawan
            );
        return view('karyawan')->with($data);
    }
    function addkaryawan() {
        $karyawan = DB::table('users')->get();
        $data = array(
            'active'=>'karyawan',
            'datas' => $karyawan
            );
        return view('addkaryawan')->with($data);
    }

    function savekaryawan(KaryawanRequest $request) {
        $request->validated();

        // $name = $request->input('name');
        // $imageName = $name.".".request()->foto->getClientOriginalExtension();
        // request()->foto->move(public_path('img/profiles'), $imageName);
        
        // $karyawan = DB::table('users')->insert([
        //     'foto' => $imageName,
        //     'name' => $name,
        //     'email' => $request->input('email'),
        //     'notelp' => $request->input('notelp'),
        //     'password' => Hash::make($request->input('password')),
        //     'jabatan' => $request->input('jabatan'),
        //     'projek' => $request->input('projek'),
        //     'alamat' => $request->input('alamat'),
        // ]);

        return redirect()->route('karyawan');
    }

    function editkaryawan($id) {
        $karyawan = DB::table('users')->where('id', $id)->get();
        $data = array(
            'active'=>'karyawan',
            'datas' => $karyawan,
            );
        return view('editkaryawan')->with($data);
    }

    function updatekaryawan(Request $request) {
        $name = $request->input('name');
        $imageName;
        if (request()->foto != null) {
            $imageName = $name.".".request()->foto->getClientOriginalExtension();
            request()->foto->move(public_path('img/profiles'), $imageName);
        } else {
            $imageName = $request->input('fotoOld');
        }
        
        $karyawan = DB::table('users')->where('id', $request->id)->update([
            'foto' => $imageName,
            'name' => $name,
            'email' => $request->input('email'),
            'notelp' => $request->input('notelp'),
            'password' => Hash::make($request->input('password')),
            'jabatan' => $request->input('jabatan'),
            'projek' => $request->input('projek'),
            'alamat' => $request->input('alamat'),
        ]);

        return redirect()->route('karyawan');
    }

    function updateprofile(Request $request) {
        $name = $request->input('name');
        $imageName;
        if (request()->foto != null) {
            $imageName = $name.".".request()->foto->getClientOriginalExtension();
            request()->foto->move(public_path('img/profiles'), $imageName);
        } else {
            $imageName = $request->input('fotoOld');
        }

        $karyawan = DB::table('users')->where('id', $request->id)->update([
            'foto' => $imageName,
            'name' => $name,
            'email' => $request->input('email'),
            'notelp' => $request->input('notelp'),
            'password' => $request->input('password'),
            'jabatan' => $request->input('jabatan'),
            'projek' => $request->input('projek'),
            'alamat' => $request->input('alamat'),
        ]);

        return redirect()->route('profile');
    }

    public function deletekaryawan(Request $request)
    {
        DB::table('users')->where('id', $request->id)->delete();
        return redirect()->route('karyawan')->with('success','data karyawan berhasil dihapus');   
    }
}
