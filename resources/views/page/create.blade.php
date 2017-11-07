@extends ('layouts.dashboardLayout') 

@section ('content')

<section class="section">
    <div class="container">
        <h1 class="title is-1">New Page</h1>

        @include('layouts.errors')
    
        <form method="post" action="/page" class="form">
            @include('page.form', [
                'page' => new App\Page
            ])
        </form>
    </div>
</section>

@endsection