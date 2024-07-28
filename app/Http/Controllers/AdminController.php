<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function blog()
    {
        // $blog = blog::with('user')->get();
        $blog = blog::all();
        $user = Auth::user();
        return view('admin.blog',compact('blog','user'));

    }
    public function user()
    {
        $user = User::all();
        return view('admin.user',compact('user'));

    }

    public function popularity()
    {
        $blog = blog::all();
        $user = Auth::user();
        return view('Admin.popularity',compact('blog','user'));
    }

    public function highest()
    {
        $blog = blog::withCount('upvotes')->orderBy('upvote_count','desc')->get();
        return response()->json($blog);

    }

    public function lowest()
    {
        $blog = blog::withCount('downvote')->orderBy('downvote_count','asc')->get();
        return response()->json($blog);

    }


}
