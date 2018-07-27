<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 26.07.18
 * Time: 17:02
 */

namespace App\Http\Controllers\Post;


use App\Post;

class PostController
{
    /**
     * Shows all blog Posts
     *
     * @return Response
     */
    public function show()
    {
        return view('post/posts', ['posts' => Post::all()]);
    }
}