<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('User.viewProfile', compact('user'));

    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('User.viewProfile', compact('user'));

    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->address = $request->input('address');

        $image_title = null;
        if($request->hasFile('image')){
         $img = $request->file('image');
         $imgpath = 'upload/user/';
         $imgname = now()->format('ymdhiss') . rand(10000, 99999) . '.' . $img->getClientOriginalExtension();
         $img->move($imgpath, $imgname);
         $image_title = $imgpath . $imgname;
        $user['image'] = $image_title;
        }
        $user->update();
        return redirect()->back()->with('success','Updated Successfully!');

    }
}
