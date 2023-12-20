<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/favicon.ico') }}" />
    <link href="{{ asset('/assets/front/css/bootstrap.min.css') }}" rel="stylesheet" />
    @yield('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('index') }}">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="{{ route('index') }}">@lang('menu.index')</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">@lang('menu.about')</a></li>
                <li class="nav-item"><a class="nav-link" href="#!">@lang('menu.contact')</a></li>

                @auth
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link px-lg-3">
                            @lang('site.dashboard')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#!"
                           class="nav-link px-lg-3"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        >
                            @lang('site.logout')
                        </a>
                    </li>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                @else
                    <li class="nav-item">
                        <a class="nav-link px-lg-3" href="{{ route('register') }}">
                            @lang('site.register')
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-lg-3" href="{{ route('login') }}">
                            @lang('site.login')
                        </a>
                    </li>
                @endauth

                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <li class="nav-item">
                        <a  href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="nav-link">
                            {{ strtoupper(mb_substr($properties['name'], 0, 2)) }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</nav>

@php
    $articles_page = Route::current()->getName() == 'article' ? true : false;
@endphp

<header class="py-5 bg-light border-bottom mb-4" style="background-image: url('{{ $articles_page ? $article->image : asset('assets/front/img/noisy-tv.jpg') }}')">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">{{ $articles_page ? $article->title : 'Clean Blog' }}</h1>
            <p class="lead mb-0">Blog Slogan</p>
        </div>
    </div>
</header>

@yield('content')

<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('/assets/front/js/scripts.js') }}"></script>
@yield('scripts')

</body>
</html>
