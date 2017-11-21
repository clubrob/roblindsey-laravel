@extends ('layouts/layout') 

@section ('content')
    @include('layouts.errors')
    
    <div id="app">
        <contact
            @if (session('message'))
                message="{{ session('message') }}"
                showmodal = {{ session('show') }}
            @endif
        ></contact>
    </div>

    @include('layouts/footer')

    <script src="/js/app.js"></script>
@endsection
