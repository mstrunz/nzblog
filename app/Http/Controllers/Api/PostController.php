<?php
/**
 * Created by PhpStorm.
 * User: max
 * Date: 26.07.18
 * Time: 17:02
 */

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }

    /**
     * Shows all blog Posts
     *
     * @return PostResource
     */
    public function index()
    {

        $posts = Post::latest()
            ->paginate(20);

        return PostResource::collection($posts);
    }

    /**
     * Fetch and return the post.
     *
     * @param Post $post
     * @return PostResource
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }


    /**
     * Validate and save a new post to the database.
     *
     * @param Request $request
     * @return PostResource
     */
    public function store(Request $request)
    {
        $postRequest = $this->validate($request, [
            'body' => 'required|min:3',
            'title' => 'required|min:3'
        ]);
        //$postRequest->user = Auth::id();

        $post = Post::create($postRequest);
        // TODO: There is possible a better way to add the user to the request and than save it all together
        $post->user  = Auth::id();
        // TODO: Save a DateTime Object instead
        $post->date = date('Y-m-d');
        $post->save();
        return new PostResource($post);
    }

}