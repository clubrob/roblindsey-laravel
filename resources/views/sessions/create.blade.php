@extends ('layouts.dashboardLayout') 

@section ('content')
<section class="section">
    <div class="container">
        <h1 class="title is-1">Log In</h1>

        @include('layouts.errors')

        <form class="col50" action="/login" method="post">
            {{ csrf_field() }}

            <div class="field">
                <label class="label" class="label" for="email">Email:</label class="label">
                <div class="control">
                    <input class="input" type="email" name="email" id="email">
                </div>
            </div>

            <div class="field">
                <label class="label" class="label" for="password">Password:</label class="label">
                <div class="control">
                    <input class="input" type="password" name="password" id="password">
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <button class="button" type="submit">Log In</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection