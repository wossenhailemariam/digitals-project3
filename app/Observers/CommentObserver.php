<?php

namespace App\Observers;

use App\Comment;

class CommentObserver
{
    /**
     * Handle the comment "created" event.
     *
     * @param  \App\Comment  $comment
     * @return void
     */
    public function creating(Comment $comment)
    {
        if(!$comment){
            return back()->withInput()->with('errors', 'Error creating new Comment');
        }
    }
}
