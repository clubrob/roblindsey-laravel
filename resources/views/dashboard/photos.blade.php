@extends ('layouts.dashboardLayout') 
 
@section ('content')
<section class="section dashboard">
    <div class="container">
        <h2 class="title is-2">Photos</h2>
        <table class="table is-bordered is-striped is-fullwidth">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Thumbnail</th>
                    <th>Associated Post(s)</th>
                    <th>Featured</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($photos as $photo)
                <tr>
                    <td>{{ $photo->id }}</td>
                    <td><a href="/images/blog/{{ $photo->filename }}" target="_blank"><img style="width: 200px; height: auto;" src="/images/blog/{{ $photo->filename }}" alt="{{ $photo->description }}"></a></td>
                    <td>
                    <ul>
                        @if(! $photo->posts->isEmpty())
                            @foreach($photo->posts as $post)
                                <li><a href="/blog/post/{{ $post->slug }}" target="_blank">{{ $post->title }}</a></li>
                            @endforeach
                        @endif
                    </ul>
                    </td>
                    <td>{!! $photo->featured ? e('Featured') : e('Not Featured'); !!} </td>
                    <td>{{ $photo->created_at->toDayDateTimeString() }}</td>
                    <td>
                        <form action="/blog/photo/{{ $photo->id }}" method="post">
                            {{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button class="button" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $photos->links() }}
    </div>
</section>
@endsection