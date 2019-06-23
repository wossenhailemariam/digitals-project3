<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentsRequest;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{



    public function store(CommentsRequest $request)
    {
    //CLEANED UP: USED OBSERVER 
        Comment::create([
            'body' => $request->input('body'),
            'url' => $request->input('url'),
            'commentable_type' => $request->input('commentable_type'),
            'commentable_id' => $request->input('commentable_id'),
            'user_id' => Auth::user()->id
        ]);
        return back()->with('success' , 'Comment created successfully');
    }

}
