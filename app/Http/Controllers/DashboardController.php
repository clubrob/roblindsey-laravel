<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Page;
use App\Photo;
use App\Tag;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function posts()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(15);
        
        return view('dashboard.posts')->with('posts', $posts);
    }

    public function pages()
    {
        $pages = Page::orderBy('title', 'asc')->paginate(15);
        
        return view('dashboard.pages')->with('pages', $pages);
    }

    public function photos()
    {
        $photos = Photo::with('posts')->orderBy('created_at', 'desc')->paginate(15);
        
        return view('dashboard.photos')->with(['photos' => $photos]);
    }
    
    public function tags()
    {
        $tags = Tag::with('posts')->orderBy('tag_name', 'asc')->paginate(15);
        
        return view('dashboard.tags')->with('tags', $tags);
    }
}
