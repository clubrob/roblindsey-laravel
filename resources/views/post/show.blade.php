@extends ('layouts/layout') 

@section ('content')

{{--  Facebook Code  --}}
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.11&appId=269164973103808';
    fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

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
                    <div class="social">
                        <div>
                            <h5>Share:</h5>
                        </div>
                        <div>
                            <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{ $post->title }}">Tweet</a>
                        </div>
                        <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true">
                            <a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Share</a>
                        </div>
                        <div class="linkedin-share-button">
                            <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
                            <script type="IN/Share"></script>
                        </div>
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
    
    {{--  Twitter Code  --}}
    <script>window.twttr = (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0],
        t = window.twttr || {};
    if (d.getElementById(id)) return t;
    js = d.createElement(s);
    js.id = id;
    js.src = "https://platform.twitter.com/widgets.js";
    fjs.parentNode.insertBefore(js, fjs);

    t._e = [];
    t.ready = function(f) {
        t._e.push(f);
    };

    return t;
    }(document, "script", "twitter-wjs"));</script>

    <script src="/js/app.js"></script>

@endsection
