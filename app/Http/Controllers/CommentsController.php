<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use Gate;
use Session;

use App\Comment;

class CommentsController extends Controller
{
    /**
     * Add comment to database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $discussion_id
     * @param  int  $discussion_id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $discussion_id, $parent_id) 
    {
        // authenticate and retrieve user
    	if(($user = Auth::user()) == null) { abort(403); }

        // check for no parent
        $parent_id = ($parent_id == 0 ? null : $parent_id);

        // create DB entry
        $comment = new Comment;
        $comment->body = $request->body;
       	$comment->discussion()->associate($discussion_id);
       	$comment->user()->associate($user);
        $comment->parent()->associate($parent_id);
       	$comment->save();

        // update timestamp
        $comment->discussion->updated = time();
        $comment->discussion->save();

        Session::flash('success', 'Comment successfully added!');
        return back();
    }

    /**
     * Update the specified comment in storage.
     *
     * @param  Request $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);

        // authorization
        if (Gate::denies('update-comment', $comment)) abort(403);

        $comment->update($request->all());
        
        return back();
    }

    /**
     * Remove the specified comment from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        
        // authorization
        if (Gate::denies('update-comment', $comment)) abort(403);

        $comment->update(['body' => '(Comment Deleted)']);

        return back();
    }


}
