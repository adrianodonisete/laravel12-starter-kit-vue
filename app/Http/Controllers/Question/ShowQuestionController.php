<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class ShowQuestionController extends Controller
{
    public function show(): Response
    {
        return Inertia::render('question/ShowQuestion', []);
    }

    public function alert(): Response
    {
        return Inertia::render('question/AlertQuestion', []);
    }
}
