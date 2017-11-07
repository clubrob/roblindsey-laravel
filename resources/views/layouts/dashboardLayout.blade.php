<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rob Lindsey Design - Wordpress, Drupal, Custom Projects, Web Consulting</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.6.0/css/bulma.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="/dashboard">
                <img src="/images/botdot.svg" alt="Rob Lindsey Designs" width="28" height="28">
            </a>

            <button class="button navbar-burger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
        @if(Auth::check())
            <div class="navbar-menu">
                <a href="/" class="navbar-item" target="_blank">Frontend</a>
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Content
                    </a>
                    <div class="navbar-dropdown">
                        <a href="/dashboard/posts" class="navbar-item">
                            Posts
                        </a>
                        <a href="/dashboard/pages" class="navbar-item">
                            Pages
                        </a>
                        <a href="/dashboard/photos" class="navbar-item">
                            Photos
                        </a>
                        <a href="/dashboard/tags" class="navbar-item">
                            Tags
                        </a>
                    </div>
                </div>
                <a href="#" class="navbar-item">User Profile</a>
                <a href="/logout" class="navbar-item">Logout</a>
            </div>
        @endif
    </nav>

    @yield('content') @include('layouts.footer')

</body>

</html>