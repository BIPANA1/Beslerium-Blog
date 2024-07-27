<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $user = User::all();
        $blog = blog::all();
        return view('Admin.dashboard',compact('user','blog'));
    }
}
