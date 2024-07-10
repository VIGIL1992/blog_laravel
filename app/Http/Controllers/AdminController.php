<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function loadHomePage(){
        $logged_user = Auth::user();
        return view('admin.home-page',compact('logged_user'));
    }

}
