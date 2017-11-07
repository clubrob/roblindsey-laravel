{{ csrf_field() }}

<div class="field">
    <label class="label" for="title">Page Title</label>
    <div class="control">
        <input 
            class="input"
            type="text" 
            name="title" 
            value="{{ old('title') ?? $page->title }}"
            placeholder="Page Title">
    </div>
</div>
<div class="field">
    <label class="label" for="body">Page Body</label>
    <div class="control">
        <textarea 
            class="textarea"
            name="body" 
            id="" 
            ols="30" 
            rows="10"
            placeholder="Page Body">{{ old('body') ?? $page->detail['body'] }}</textarea>
    </div>
</div>
<div class="field">
    <div class="control">
        <button class="button is-primary" type="submit">
            {{ $submitButtonText ?? 'Create Page' }}
        </button>
    </div>
</div>