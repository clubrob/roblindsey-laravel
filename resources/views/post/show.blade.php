@extends ('layouts/layout') 

@section ('content')

<div id="app">
    <blognav></blognav>
    <div class="page-sig">
        <div class="wordmark">
            <a href="/"><img src="/images/rob-lindsey-design-wordmark.svg" alt="Rob Lindsey Design"></a>
        </div>
    </div>
    <section class="section full-post">
        <div class="container">
            <div class="row">
                <div class="col70">
                    <h1>{{ $post->title }}</h1>
                    <div class="featured-image">
                        @if( $post->photos->isEmpty() )
                            <img src="/images/blog/rob-lindsey-design-default.png" alt="Rob Lindsey Design">
                        @else
                            <img src="/images/blog/{{ $post->photos()->pluck('filename')->implode('', 'filename') }}" alt="{{ $post->photos()->pluck('description')->implode('', 'description') }}">
                        @endif
                    </div>
                    
                    <div class="full-body">
                        {!! Markdown::convertToHtml($post->detail->body) !!}
                    </div>
                    <div class="tag-wrap">
                        <h5>Tags</h5>
                        <div class="tags">
                            @foreach($post->tags as $tag)
                                <span><a href="/blog/tag/{{ $tag->tag_slug }}">{{ $tag->tag_name }}</a></span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col30">
                    
                </div>
            </div>
        </div>
    </section>
</div>

    @include('layouts/footer')

    <script src="/js/app.js"></script>

@endsection
