<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['show']);
    }

    public function show($slug)
    {
        $tag = Tag::where('tag_slug', $slug)
                ->first();

        return view('tag.show')->with(['tag' => $tag]);
    }

    public function destroy($slug)
    {
        $tag = Tag::where('tag_slug', $slug)->first();

        $tag->posts()->detach();
        $tag->delete();

        return redirect()->action('DashboardController@tags');
    }
}
