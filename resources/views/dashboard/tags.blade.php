@extends ('layouts.dashboardLayout') 
 
@section ('content')
<section class="section dashboard">
    <div class="container">
        <h2 class="title is-2">Tags</h2>
        <table class="table is-bordered is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tag</th>
                    <th>Associated Post(s)</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td>{{ $tag->id }}</td>
                    <td><a href="/blog/tag/{{ $tag->tag_slug }}" target="_blank">{{ $tag->tag_name }}</a></td>
                    <td>
                        <ul>
                            @if(! $tag->posts->isEmpty())
                                @foreach($tag->posts as $post)
                                    <li><a href="/blog/post/{{ $post->slug }}" target="_blank">{{ $post->title }}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </td>
                    <td>{{ $tag->created_at->toDayDateTimeString() }}</td>
                    <td>
                        <form action="/blog/tag/{{ $tag->tag_slug }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="button" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $tags->links() }}
    </div>
</section>
@endsection