@extends ('layouts/layout') 

@section ('content')
    <div id="app">
        <blognav></blognav>
        <h1 class="section-title">Tag: {{ $tag->tag_name }}</h1>
        <bloglist endpoint="/blog/tags.json/{{ $tag->tag_slug }}"></bloglist>
    </div>

    @include('layouts/footer')

    <script src="/js/app.js"></script>
@endsection