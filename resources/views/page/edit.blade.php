@extends ('layouts.dashboardLayout') 

@section ('content')

<section class="section">
    <div class="container">
        <h1>Edit Page</h1>
    
        @include('layouts.errors')

        <form method="post" action="/page/{{ $page->id }}" class="form">
            {{ method_field('PATCH') }}

            @include('page.form', [
                'submitButtonText' => 'Update Page'
            ])
        </form>
        <form action="/page/{{ $page->id }}" method="post" class="form">
            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <div class="field">
                <div class="control">
                    <button class="button" type="submit">Delete</button>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection