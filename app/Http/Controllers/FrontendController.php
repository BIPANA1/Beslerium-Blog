<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user = Auth::user();
        $comment = Comment::where('blog_id',$id)->get();
        return view('User.blogdescription',compact('blog','user','comment'));
    }

    public function addBlog()
    {
        return view('User.addblog');
    }

}
