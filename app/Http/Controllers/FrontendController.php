<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $blog = blog::all();
        return view('User.blog',compact('blog'));
    }

    public function blogDesp()
    {
        return view('User.blogdescription');
    }

    public function addBlog()
    {
        return view('User.addblog');
    }

}
