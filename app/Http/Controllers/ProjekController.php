<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Request\RoleRequest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class ProjekController extends Controller
{
    function projek() {
        $projek = DB::table('projek')->get();
        $data = array(
            'active'=>'projek',
            'datas' => $projek
            );
        return view('projek')->with($data);
    }
    function addprojek() {
        $projek = DB::table('projek')->get();
        $data = array(
            'active'=>'projek',
            'datas' => $projek
            );
        return view('addprojek')->with($data);
    }

    function saveprojek(RoleRequest $request) {
        $request->validated();
        
        $projek = DB::table('projek')->insert([
            'namaprojek' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('projek');
    }

    function editprojek($id) {
        $projek = DB::table('projek')->where('id', $id)->get();
        $data = array(
            'active'=>'projek',
            'datas' => $projek,
            );
        return view('editprojek')->with($data);
    }

    function updateprojek(Request $request) {
        $projek = DB::table('projek')->where('id', $request->id)->update([
            'namaprojek' => $request->input('nama'),
            'deskripsi' => $request->input('deskripsi'),
        ]);

        return redirect()->route('projek');
    }

    public function deleteprojek(Request $request)
    {
        DB::table('projek')->where('id', $request->id)->delete();
        return redirect()->route('projek')->with('success','data projek berhasil dihapus');   
    }
}
