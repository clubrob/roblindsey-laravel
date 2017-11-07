@extends ('layouts.dashboardLayout') 
 
@section ('content')
<section class="section dashboard">
    <div class="container">
        <h2 class="title is-2">Posts</h2>
        <p><a href="/blog/post/create" target="_blank">New Post</a></p>
        <table class="table is-bordered is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td><a href="/blog/post/{{ $post->slug }}" target="_blank">{{ $post->title }}</a></td>
                    <td>{{ $post->created_at->toDayDateTimeString() }}</td>
                    <td><a class="button" href="/blog/post/{{ $post->slug }}" target="_blank">View</a> <a class="button" href="/blog/post/{{ $post->slug }}/edit" target="_blank">Edit</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $posts->links() }}
    </div>
</section>
@endsection