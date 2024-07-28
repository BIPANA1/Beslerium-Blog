<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\comment_votes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    public function upvote($id)
    {
        $comment = Comment::findOrFail($id);
        $userId = Auth::id();

        $existingVote = comment_votes::where('user_id', $userId)->where('comment_id', $id)->first();

        if($existingVote && $existingVote->vote_type === 'upvote'){
            return redirect()->back()->with('error', 'Already upvoted');
        }
        if($existingVote && $existingVote->vote_type === 'downvote'){
            $comment->downvote = max(0, $comment->downvote - 1);
            $existingVote->delete();
        }
        $comment->upvote = $comment->upvote + 1;
        $comment->save();
        // dd($comment);

        comment_votes::create([
            'user_id' => $userId,
            'comment_id' =>  $id,
            'vote_type' => 'upvote'
        ]);
        return response()->json(['upvote' => $comment->upvote, 'downvote' => $comment->downvote]);
    }

    public function downvote($id)
    {
        $comment = Comment::findOrFail($id);
        $userId = Auth::id();

        $existingVote = comment_votes::where('user_id', $userId)->where('comment_id', $id)->first();

        if($existingVote && $existingVote->vote_type === 'downvote'){
            return redirect()->back()->with('error', 'Already downvote');
        }
        if($existingVote && $existingVote->vote_type === 'upvote'){
            $comment->upvote = max(0, $comment->upvote - 1);
            $existingVote->delete();
        }
        $comment->downvote = $comment->downvote + 1;
        $comment->save();

        comment_votes::create([
            'user_id' => $userId,
            'comment_id' =>  $id,
            'vote_type' => 'downvote'
        ]);
        return response()->json(['upvote' => $comment->upvote, 'downvote' => $comment->downvote]);
    }
}
