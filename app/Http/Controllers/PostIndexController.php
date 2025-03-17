<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Inertia\Response;

class PostIndexController extends Controller
{
    public function __invoke(): Response
    {
        $posts = auth()->user()->posts()->latest()->get();
        return Inertia::render('posts/Index', compact('posts'));
    }
}
