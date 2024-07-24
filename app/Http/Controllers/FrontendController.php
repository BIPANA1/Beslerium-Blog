<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\User;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $blog = blog::all();
        return view('User.blog',compact('blog'));
    }

    public function blogDesp($id)
    {
        $blog = blog::findOrFail($id);
        $user = User::findOrFail($id);
        return view('User.blogdescription',compact('blog','user'));
    }

    public function addBlog()
    {
        return view('User.addblog');
    }

}
