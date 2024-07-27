<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        $request->validate([
            'comment'=> ['string','required'],
            'blog_id' => ['required', 'integer'],

        ]);
        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->blog_id =  $request->input('blog_id');
        $comment->user_id = auth()->user()->id;
        $comment->save();
        // dd($comment);
        return redirect()->back()->with('success','Comment added sucessfully');

    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $comment = Comment::findOrFail($id);
        return view('User.editComment',compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {

        $comment = Comment::findOrFail($id);
        $comment->comment = $request->input('comment');
        $comment->update();
        return redirect()->route('user.blogDescription',['id'=>$comment->blog_id])->with('sucess','Comment updated sucessfully');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();
        return redirect()->back();

    }
}
