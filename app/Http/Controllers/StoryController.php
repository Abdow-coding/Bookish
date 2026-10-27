<?php

namespace App\Http\Controllers;
use App\Models\Story;
use Illuminate\Http\Request;

class StoryController extends Controller
{
public function index()
{
    $stories = Story::where('status', 'published')
        ->paginate(9);

    return view('blog_page', compact('stories'));
}

   public function show(string $slug)
{
    $story = Story::where('slug', $slug)->firstOrFail();

    return view('blog_layout', compact('story'));
}
}
