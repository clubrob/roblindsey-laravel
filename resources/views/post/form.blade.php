{{ csrf_field() }}

@if(! $post->photos->isEmpty())
    <img 
        src="/images/blog/{{ $post->photos()->pluck('filename')->implode('', 'filename') }}" 
        alt="{{ $post->photos()->pluck('description')->implode('', 'description') }}">
@endif
<div class="field">
    <label class="label" for="featured_image">
            @if(! $post->photos->isEmpty())
                Replace Featured Image
            @else
                Add Featured Image
            @endif
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
            value="{{ old('featured_image_description') ?? $post->photos()->pluck('description')->implode('', 'description') }}"
            placeholder="Featured Image Alt Text">
    </div>
</div>
<hr>
<div class="field">
    <label class="label" for="title">Post Title</label>
    <div class="control">
        <input 
            class="input" 
            type="text" 
            name="title" 
            value="{{ old('title') ?? $post->title }}"
            placeholder="Post Title">
    </div>
</div>
<div class="field">
    <label class="label" for="body">Post Body</label>
    <div class="control">
        <textarea 
            class="textarea"
            name="body" 
            id="" 
            ols="30" 
            rows="10"
            placeholder="Post Body">{{ old('body') ?? $post->detail['body'] }}</textarea>
    </div>
</div>
<div class="field">
    <label class="label" for="tags">Tags</label>
    <div class="control">
        <input 
            class="input" 
            type="text" 
            name="tags"
            value="{{ old('tags') ?? $post->tags->implode('tag_name', ',') }}"
            placeholder="Comma-separated Tags">
    </div>
</div>
<div class="field">
    <div class="control">
        <button class="button is-primary" type="submit">
            {{ $submitButtonText ?? 'Create Post' }}
        </button>
    </div>
</div>