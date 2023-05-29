<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Faq;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index(Request $request): Response
    {
        return Inertia::render('Faq', [
            'faqs' => Faq::all(),
        ]);
    }
}
