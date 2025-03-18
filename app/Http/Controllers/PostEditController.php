<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Post;

class PostEditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Post $post): Response
    {
        return Inertia::render('posts/Edit', ['currentPost' => new PostResource($post)]);
    }
}
