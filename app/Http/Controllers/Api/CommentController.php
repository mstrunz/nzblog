<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 28.07.18
 * Time: 15:23
 */

namespace App\Http\Controllers\Api;


use App\Comment;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Validate and save a new comment to the database.
     *
     * @param Request $request
     * @return PostResource
     */
    public function store(Post $post,Request $request)
    {
        $commentRequest = $this->validate($request, [
            'comment' => 'required|min:3'
        ]);

        $comment = new Comment();
        $comment->body = $commentRequest['comment'];
        $comment->post_id = $post->_id;
        $comment->save();
    }
}