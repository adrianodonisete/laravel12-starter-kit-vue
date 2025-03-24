<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostDestroyController extends Controller
{
    public function __invoke(Post $post)
    {
        $post->image && Storage::disk('public')->delete($post->image);
        $post->delete();
        return to_route('posts.index')
            ->with('success', 'Post deleted successfully');
    }
}
