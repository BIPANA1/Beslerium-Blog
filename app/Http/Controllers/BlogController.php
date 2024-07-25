<?php

namespace App\Http\Controllers;

use App\Models\blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request ->validate([
        'title'=> ['required', 'string'],
        'image'=> ['required','mimes:png,jpg,jpeg,svg,gif'],
        'description'=>['required','string']
       ]);

       $blog = new blog();
       $blog->title = $request->input('title');
       $blog->description = $request->input('description');

       $image_title = null;
       if($request->hasFile('image')){
        $img = $request->file('image');
        $imgpath = 'upload/user/';
        $imgname = now()->format('ymdhiss') . rand(10000, 99999) . '.' . $img->getClientOriginalExtension();
        $img->move($imgpath, $imgname);
        $image_title = $imgpath . $imgname;
       }
       $blog['image'] = $image_title;
       $blog->user_id = auth()->user()->id;
       $blog->save();
       return redirect()->route('user.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $blog = blog::findOrFail($id);
        return view('User.blogdescription',compact('blog'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
           $blog = blog::findOrFail($id);
           $blog->title = $request->input('title');
           $blog->description = $request->input('description');
           $image_title = null;
           if($request->hasFile('image')){
            $img = $request->file('image');
            $imgpath = 'upload/user/';
            $imgname = now()->format('ymdhiss') . rand(10000, 99999) . '.' . $img->getClientOriginalExtension();
            $img->move($imgpath, $imgname);
            $image_title = $imgpath . $imgname;
           $blog['image'] = $image_title;

           }
           $blog->user_id = auth()->user()->id;
           $blog->update();
           return redirect()->back()->with('success','Successfully Deleted!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = blog::findOrFail($id);
        $data->delete();
        return redirect()->route('admin.blog');

    }
}
