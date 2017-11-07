<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\PostDetail;
use App\Photo;
use App\Tag;
use Image;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index','show','api']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Redirect to /blog URL for post list
        return redirect()->action('BlogController@index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Server validation form data
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'featured_image' => 'file|mimes:jpeg,png,jpg',
            'featured_image_description' => 'max:255',
        ]);

        //Instantiate models
        $post = new Post;
        $detail = new PostDetail;
        $photo = false;     //Initializing variable
        $tagIds = false;    //Initializing variable

        //Form data for posts table
        $post->title = $request->title;
        $post->slug_time = time();
        $post->slug = str_slug($request->title, '-') . '-' . $post->slug_time;

        //Form data for post_details table
        $detail->body = $request->body;
        $detail->summary = str_limit($detail->body, 140);

        //Form data for tags table
        if($request->tags) {
            $tag = new Tag;

            //Form input to array
            $tagNames = explode(',', $request->tags);

            //Trim white space
            foreach($tagNames as &$tagName) {
                $tagName = trim($tagName);
            }
            //Create new record in tags table if doesn't exist
            foreach($tagNames as $name) {
                $tags = Tag::firstOrCreate([
                    'tag_name'=>$name, 
                    'tag_slug'=>str_slug($name)]
                );
            }
            //Gather tag ids for all tag names in array
            $tagIds = Tag::whereIn('tag_name', $tagNames)->pluck('id')->toArray();
        }

        //Form data for photos table
        if($request->hasFile('featured_image')) {
            $photo = new Photo;

            //Gather form data
            $imgFile = $request->file('featured_image');
            $imgDescription = $request->featured_image_description;

            //Create variables
            $filename = $post->slug . '.' . $imgFile->getClientOriginalExtension();
            $location = public_path('images/blog/' . $filename);

            //Intervention Image library method for resizing/maintaining aspect ratio/
            //disallowing image upsizing/saving to $location folder
            Image::make($imgFile)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($location);

            //Setting values on the $photo object
            $photo->filename = $filename;
            $photo->description = $imgDescription;
        }

        //Save new post and relationships
        $post->save();
        $post->detail()->save($detail);
        if($photo) { $post->photos()->save($photo); }
        if($tagIds) { $post->tags()->sync($tagIds); };

        return redirect()->route('post.show', [$post->slug]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    { 
        //Retrieve $post object with details by post slug
        $post = Post::with('detail')->where('slug', $slug)->first();
        //Load relationships
        $post->load('photos', 'tags')->get();

        return view('post.show')->with('post', $post);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function api($slug)
    { 
        //Retrieve $post object with details by post slug
        $post = Post::with('detail')->where('slug', $slug)->first();
        //Load relationships
        $post->load('photos', 'tags')->get();

        return $post;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //Retrieve $post object with details by post slug
        $post = Post::with('detail')->where('slug', $slug)->first();
        //Load relationships
        $post->load('photos', 'tags')->get();

        return view('post.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
         //Server validation form data
         $validatedData = $request->validate([
            'title' => 'required|max:255',
            'body' => 'required',
            'featured_image' => 'file|mimes:jpeg,png,jpg',
            'featured_image_description' => 'max:255',
        ]);

        //Gather post and relationships
        $post = Post::where('slug', $slug)->first();
        $detail = $post->detail;
        $tags = $post->tags;
        $tagIds = false;
        $photos = $post->photos;
        $featuredPhoto = $photos->where('featured', 1)->first();

        $newFeaturedPhoto = false;
        $newFeatureDescription = false;

        //Form data for posts table
        $post->title = $request->input('title');
        $post->slug = str_slug($request->input('title'), '-') . '-' . $post->slug_time;

        //Form data for post_details table
        $detail->body = $request->input('body');
        $detail->summary = str_limit($detail->body, 140);

        //Check for new photo
        if($request->hasFile('featured_image')) {
            $post->photos()->detach($featuredPhoto);

            $featuredPhoto = new Photo;
            
            $imgFile = $request->file('featured_image');

            //Create variables
            $filename = $post->slug . '.' . $imgFile->getClientOriginalExtension();
            $location = public_path('images/blog/' . $filename);

            //Intervention Image library method for resizing/maintaining aspect ratio/
            //disallowing image upsizing/saving to $location folder
            Image::make($imgFile)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($location);

            //Setting values on the $photo object
            $featuredPhoto->filename = $filename;
            $newFeaturedPhoto = true;
        }
        if($request->input('featured_image_description')) {
            $imgDescription = $request->input('featured_image_description');
            if($featuredPhoto->description != $imgDescription) {
                $featuredPhoto->description = $imgDescription;
                $newFeatureDescription = true;
            }
        }

        //Form data for tags table
        if($request->input('tags')) {
            //Form input to array
            $tagNames = explode(',', $request->input('tags'));

            foreach($tagNames as &$tagName) {
                $tagName = trim($tagName);
            }
            //Create new record in tags table if doesn't exist
            foreach($tagNames as $name) {
                $tags = Tag::firstOrCreate([
                    'tag_name'=>$name, 
                    'tag_slug'=>str_slug($name)]
                );
            }
            //Gather tag ids for all tag names in array
            $tagIds = Tag::whereIn('tag_name', $tagNames)->pluck('id')->toArray();
        } else {
            $post->tags()->detach();
        }

        //Update post and relationships
        $post->save();
        $post->detail()->save($detail);
        if($newFeaturedPhoto) { $post->photos()->save($featuredPhoto); }
        if($newFeatureDescription) { 
            $post->photos()
                ->where('photos.id', $featuredPhoto->id)
                ->update(['description' => $featuredPhoto->description]); 
        }
        if($tagIds) { $post->tags()->sync($tagIds); }

        return redirect()->route('post.show', [$post->slug]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->detail()->delete();
        $post->tags()->detach();
        $post->photos()->detach();
        $post->delete();

        //Redirect to /blog URL for post list
        return redirect()->action('BlogController@index');
    }
}
