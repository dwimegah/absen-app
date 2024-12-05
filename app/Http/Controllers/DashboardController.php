<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class DashboardController extends Controller
{
    public function dashboard() {
        $data = array(
            'active'=>'dashboard',
        );
        return view('dashboard')->with($data);
    }
}
