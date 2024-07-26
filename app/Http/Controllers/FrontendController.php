<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\Comment;
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
        $user = User::findOrFail($blog->user_id);
        $comments = Comment::where('blog_id',$id)->with('user')->get();
        return view('User.blogdescription',compact('blog','user','comments'));
    }

    public function addBlog()
    {
        return view('User.addblog');
    }

}
