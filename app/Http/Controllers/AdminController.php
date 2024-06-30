<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function blog()
    {
        return view('admin.blog');

    }
    public function user()
    {
        return view('admin.user');

    }


}
