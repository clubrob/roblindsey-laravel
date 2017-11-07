@extends ('layouts.dashboardLayout') 

@section ('content')

<section class="section columns is-mobile is-centered">
    <div class="container column is-half is-narrow">
        <h1 class="title is-1">Edit Post</h1>
    
        @include('layouts.errors')

        <form method="post" action="/blog/post/{{ $post->slug }}" enctype="multipart/form-data" class="form">
            {{ method_field('PATCH') }}
            {{ csrf_field() }}

            @include('post.form', [
                'submitButtonText' => 'Update Post'
            ])
        </form>
        <br>
        <form action="/post/{{ $post->slug }}" method="post">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <div class="field">
                <div class="control">
                    <button class="button is-danger" type="submit">Delete</button>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection