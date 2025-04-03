<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use Inertia\Inertia;
use Inertia\Response;

class ShowQuestionController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('question/ShowQuestion', []);
    }
}
