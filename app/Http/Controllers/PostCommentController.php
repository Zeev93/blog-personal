<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\PostComment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'post_id' => 'required'
        ]);


        $postComment = new PostComment($data);
        $postComment->user_id = auth()->user()->id;
        $postComment->published_at = Carbon::now();
        $postComment->save();

        return redirect()->route('visit.post', ['post' => $postComment['post_id']]);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostComment  $postComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostComment $postComment)
    {
        $postComment->delete();
        return redirect()->route('visit', ['post' => $postComment->post_id]);
    }
}
