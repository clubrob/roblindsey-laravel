@extends ('layouts/layout') 

@section ('content')
    <div id="app">
        <blognav></blognav>
        <h1 class="section-title">RobLog</h1>
        <bloglist endpoint="/blog/posts.json/all"></bloglist>
    </div>

    @include('layouts/footer')

    <script src="/js/app.js"></script>
@endsection