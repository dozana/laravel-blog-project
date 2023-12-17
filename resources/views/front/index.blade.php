@extends('front.layout')

@section('title', trans('menu.index'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                <div class="row">
                    <div class="col-lg-6">
                        @forelse($articles as $article)
                            <div class="card mb-4">
                                <a href="{{ route('article', $article->id) }}">
                                    <img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..."/>
                                </a>
                                <div class="card-body">
                                    <div class="small text-muted">@lang('site.date') : {{ $article->created_at }}</div>
                                    <small>Author: @lang('site.author')</small>
                                    <h2 class="card-title h4">{{ $article->title }}</h2>
                                    <p class="card-text">{{ $article->description }}</p>
                                    <a class="btn btn-primary" href="{{ route('article', $article->id) }}">Read more →</a>
                                </div>
                            </div>

                            @if(!$loop->last)
                                <!-- დიზაინში არსებული გამყოფი ხაზი აღარაა საჭირო ბოლო სიახლის შემდეგ -->
                                <hr class="my-4" />
                            @endif
                        @empty
                            <div class="alert alert-danger">@lang('site.no_data')</div>
                        @endforelse

                    </div>
                </div>

                <nav aria-label="Pagination">
                    <ul class="pagination justify-content-center my-4">
                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a>
                        </li>
                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>
                        <li class="page-item"><a class="page-link" href="#!">2</a></li>
                        <li class="page-item"><a class="page-link" href="#!">3</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>
                        <li class="page-item"><a class="page-link" href="#!">15</a></li>
                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>
                    </ul>
                </nav>

            </div>
            <div class="col-lg-4">
                @include('partials.sidebar.search')
                @include('partials.sidebar.categories')
                @include('partials.sidebar.widget')
            </div>
        </div>
    </div>
@endsection
