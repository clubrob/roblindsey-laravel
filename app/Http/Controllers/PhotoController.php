<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\File;
use Image;

class PhotoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store($id)
    {
        $photo = new Photo;
        $post = Post::find($id);
        
        //Gather form data
        $imgFile = $request->file('post_photo');
        $imgDescription = $request->post_photo_description;

        //Create variables
        $filename = $post->slug . '.' . $imgFile->getClientOriginalExtension();
        $location = public_path('images/blog/' . $filename);
        $featured = 0;

        //Intervention Image library method for resizing/maintaining aspect ratio/
        //disallowing image upsizing/saving to $location folder
        Image::make($imgFile)->resize(800, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($location);

        //Setting values on the $photo object
        $photo->filename = $filename;
        $photo->description = $imgDescription;
        $photo->featured = $featured;

        $photo->save();
        $photo->posts()->save($post);
    }

    public function destroy($id)
    {
        $photo = Photo::find($id);

        @unlink(public_path('images/blog/') . $photo->filename);

        $photo->posts()->detach();
        $photo->delete();

        return redirect()->action('DashboardController@photos');
    }
}
