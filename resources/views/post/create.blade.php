@extends ('layouts.dashboardLayout') 

@section ('content')

<section class="section columns is-mobile is-centered">
    <div class="container column is-half is-narrow">
        <h1 class="title is-1">New Blog Post</h1>
        
        @include('layouts.errors')

        <form method="post" action="/blog/post" enctype="multipart/form-data" class="form">
            @include('post.form', [
                'post' => new App\Post
            ])
        </form>
        {{--  <br><br><hr>

        <h3 class="title is-3">Post Images</h3>

        <form method="post" action="/blog/photos" enctype="multipart/form-data" class="form">
            <div class="field">
                <label class="label" for="featured_image">Add Post Images
                </label>
                <input 
                class="input" 
                type="file" 
                name="featured_image"
                >
            </div>
            <br>
            <div class="field">
                <label class="label is-small" for="featured_image_description">Image Alt Text</label>
                <div class="control">
                    <input 
                        class="input is-small" 
                        type="text" 
                        name="featured_image_description"
                        placeholder="Image Alt Text">
                </div>
            </div>
            <div class="field">
                <div class="control">
                    <button class="button is-primary" type="submit">
                        Add Image
                    </button>
                </div>
            </div>
        </form>  --}}
    </div>
</section>

@endsection