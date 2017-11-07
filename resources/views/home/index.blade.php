@extends ('layouts/layout') 

@section ('content')
    <div id="app">
        <mainnav></mainnav>
        <splash></splash>
        <about></about>
        <blog></blog>
        <contact></contact>
    </div>

    @include('layouts/footer')

    <script src="/js/app.js"></script>
@endsection
