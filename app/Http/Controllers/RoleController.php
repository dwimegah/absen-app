<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Request\RoleRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class RoleController extends Controller
{
    function role() {
        $role = DB::table('role')->get();
        $data = array(
            'active'=>'role',
            'datas' => $role
            );
        return view('role')->with($data);
    }
    function addrole() {
        $role = DB::table('role')->get();
        $data = array(
            'active'=>'role',
            'datas' => $role
            );
        return view('addrole')->with($data);
    }

    function saverole(RoleRequest $request) {
        $request->validated();
        
        $role = DB::table('role')->insert([
            'namarole' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('role');
    }

    function editrole($id) {
        $role = DB::table('role')->where('id', $id)->get();
        $data = array(
            'active'=>'role',
            'datas' => $role,
            );
        return view('editrole')->with($data);
    }

    function updaterole(Request $request) {
        $role = DB::table('role')->where('id', $request->id)->update([
            'namarole' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('role');
    }

    public function deleterole(Request $request)
    {
        DB::table('role')->where('id', $request->id)->delete();
        return redirect()->route('role')->with('success','data role berhasil dihapus');   
    }
}
