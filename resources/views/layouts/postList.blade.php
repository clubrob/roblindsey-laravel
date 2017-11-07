<article class="blog-post">
    <div class="post-image">
        @if( $post->photos->isEmpty() )
            <img 
            src="/images/blog/rob-lindsey-design-default.png" 
            alt="Rob Lindsey Design">
        @else
            <img 
            src="/images/blog/{{ $post->photos()->where('featured', 1)->pluck('filename')->implode('', 'filename') }}" 
            alt="{{ $post->photos()->where('featured', 1)->pluck('description')->implode('', 'description') }}">
        @endif
    </div>
    <h3>
        <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>
    </h3>
    <div class="post-body">
        {!! Markdown::convertToHtml(str_limit($post->detail->body, 140)); !!}
        <p>
            <small>
                <em>Continue reading
                    <a href="/post/{{ $post->slug }}">{{ $post->title }}</a>
                </em>
            </small>
        </p>
    </div>
</article>