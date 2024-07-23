<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('User.blog');
    }

    public function blogDesp()
    {
        return view('User.blogdescription');
    }

}
