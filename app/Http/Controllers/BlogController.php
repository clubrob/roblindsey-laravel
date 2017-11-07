<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Tag;

class BlogController extends Controller
{
    //
    public function index()
    {
        //
        $posts = Post::with('detail')->get();

        return view('blog/index')->with('posts', $posts);
    }

    public function posts($all = null)
    {
        if($all == 'all') {        
            $posts = Post::with([
                    'detail' => function($query) {
                        $query->select('post_id', 'summary');
                    },
                    'photos' => function($query) {
                        $query->where('featured', 1);
                    }
                ])
                ->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $posts = Post::with([
                'detail' => function($query) {
                    $query->select('post_id', 'summary');
                },
                'photos' => function($query) {
                    $query->where('featured', 1);
                }
            ])
            ->orderBy('created_at', 'desc')->take(3)->get();
        }

        return $posts;
    }

    public function tags($slug = null)
    {
        if($slug) {
            $tag = Tag::with(['posts.detail', 'posts.photos', 'posts.tags'])
                    ->where('tag_slug', $slug)
                    ->orderBy('created_at', 'desc')
                    ->first();
            $posts['data'] = $tag->posts;
            return $posts;

        } else {
            $tags = Tag::orderBy('tag_name', 'desc')->get();
        }

        return $tags;
    }
}
