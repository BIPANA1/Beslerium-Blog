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


}
