<?php

namespace App\Http\Controllers;

use App\Models\blog;
use App\Models\blog_vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function upvote($id)
    {
        $blog = Blog::findOrFail($id);
        $userId = Auth::id();

        $existingVote = blog_vote::where('user_id', $userId)->where('blog_id', $id)->first();

        if ($existingVote && $existingVote->vote_type === 'upvote') {
            return redirect()->back()->with('error', 'Already upvoted');
        }

        if ($existingVote && $existingVote->vote_type === 'downvote') {
            $blog->downvote = max(0, $blog->downvote - 1);
            $existingVote->delete();
        }

        $blog->upvote = $blog->upvote + 1;
        $blog->save();

        blog_vote::create([
            'user_id' => $userId,
            'blog_id' => $id,
            'vote_type' => 'upvote'
        ]);

        return response()->json(['upvote' => $blog->upvote, 'downvote' => $blog->downvote]);
    }

    public function downvote($id)
    {
        $blog = Blog::findOrFail($id);
        $userId = Auth::id();

        $existingVote = blog_vote::where('user_id', $userId)->where('blog_id', $id)->first();

        if ($existingVote && $existingVote->vote_type === 'downvote') {
            return redirect()->back()->with('error', 'Already downvoted');
        }

        if ($existingVote && $existingVote->vote_type === 'upvote') {
            $blog->upvote = max(0, $blog->upvote - 1);
            $existingVote->delete();
        }

        $blog->downvote = $blog->downvote + 1;
        $blog->save();

        blog_vote::create([
            'user_id' => $userId,
            'blog_id' => $id,
            'vote_type' => 'downvote'
        ]);

        return response()->json(['upvote' => $blog->upvote, 'downvote' => $blog->downvote]);

    }
}
