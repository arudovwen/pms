<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Notifications\CommentedUser;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('comments');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


       //   dd(auth()->id());
    //    $attributes = request(['body','url','commentable_type', 'commentable_id' ]);
    //    $attributes['user_id'] = auth()->id();
    //    if(auth()->check()){
    //    $comment = Comment::create($attributes);
    if (Auth::check()) {
        $comment= Comment::create([
            'body' => $request->input('body'),
            'url' => $request->input('url'),
            'commentable_type' => $request->input('commentable_type'),
            'commentable_id' => $request->input('commentable_id'),
            'user_id'=> Auth::user()->id
         ]);

       if ($comment){
        $user = auth()->user();
        $user->notify(new CommentedUser($comment, $user));
        return back()->with('success', 'Comment added successful');
       }

         return back()->withInput();
       }
   }


    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return back();
    }
}
