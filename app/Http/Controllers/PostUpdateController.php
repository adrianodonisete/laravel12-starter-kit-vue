<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;

class PostUpdateController extends Controller
{
    public function __invoke(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255|min:3',
            'content' => 'required|string|min:10',
            'image' => 'nullable|image',
        ]);

        $data['slug'] = str($data['title'])->slug();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($post->image);
            $data['image'] = Storage::disk('public')->put('posts', $request->file('image'));
        } else {
            $data['image'] = $post->image;
        }

        $post->update($data);
        return to_route('posts.index')
            ->with('success', 'Post updated successfully');
    }
}
