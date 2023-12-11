@extends('front.layout')

@section('title', trans('menu.index'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-8">

                @forelse($articles as $article)
                    <div class="post-preview">
                        <a href="post.html">
                            <h2 class="post-title">{{ $article->title }}</h2>
                            <h3 class="post-subtitle">{{ $article->description }}</h3>
                        </a>
                        <p class="post-meta">
                            @lang('site.author')
                            <a href="#!">Start Bootstrap</a>
                            @lang('site.date') : {{ $article->created_at }}
                        </p>
                    </div>
                    @if(!$loop->last)
                        <!-- დიზაინში არსებული გამყოფი ხაზი აღარაა საჭირო ბოლო სიახლის შემდეგ -->
                        <hr class="my-4" />
                    @endif
                @empty
                    <div class="alert alert-danger">@lang('site.no_data')</div>
                @endforelse


{{--                <div class="card mb-4">--}}
{{--                    <a href="#!"><img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg"--}}
{{--                                      alt="..."/></a>--}}
{{--                    <div class="card-body">--}}
{{--                        <div class="small text-muted">January 1, 2023</div>--}}
{{--                        <h2 class="card-title">Featured Post Title</h2>--}}
{{--                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis--}}
{{--                            aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi--}}
{{--                            vero voluptate voluptatibus possimus, veniam magni quis!</p>--}}
{{--                        <a class="btn btn-primary" href="#!">Read more →</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-6">--}}
{{--                        <!-- Blog post-->--}}
{{--                        <div class="card mb-4">--}}
{{--                            <a href="#!"><img class="card-img-top"--}}
{{--                                              src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..."/></a>--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="small text-muted">January 1, 2023</div>--}}
{{--                                <h2 class="card-title h4">Post Title</h2>--}}
{{--                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.--}}
{{--                                    Reiciendis aliquid atque, nulla.</p>--}}
{{--                                <a class="btn btn-primary" href="#!">Read more →</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Blog post-->--}}
{{--                        <div class="card mb-4">--}}
{{--                            <a href="#!"><img class="card-img-top"--}}
{{--                                              src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..."/></a>--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="small text-muted">January 1, 2023</div>--}}
{{--                                <h2 class="card-title h4">Post Title</h2>--}}
{{--                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.--}}
{{--                                    Reiciendis aliquid atque, nulla.</p>--}}
{{--                                <a class="btn btn-primary" href="#!">Read more →</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-6">--}}
{{--                        <!-- Blog post-->--}}
{{--                        <div class="card mb-4">--}}
{{--                            <a href="#!"><img class="card-img-top"--}}
{{--                                              src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..."/></a>--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="small text-muted">January 1, 2023</div>--}}
{{--                                <h2 class="card-title h4">Post Title</h2>--}}
{{--                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.--}}
{{--                                    Reiciendis aliquid atque, nulla.</p>--}}
{{--                                <a class="btn btn-primary" href="#!">Read more →</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <!-- Blog post-->--}}
{{--                        <div class="card mb-4">--}}
{{--                            <a href="#!"><img class="card-img-top"--}}
{{--                                              src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..."/></a>--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="small text-muted">January 1, 2023</div>--}}
{{--                                <h2 class="card-title h4">Post Title</h2>--}}
{{--                                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.--}}
{{--                                    Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>--}}
{{--                                <a class="btn btn-primary" href="#!">Read more →</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <nav aria-label="Pagination">--}}
{{--                    <hr class="my-0"/>--}}
{{--                    <ul class="pagination justify-content-center my-4">--}}
{{--                        <li class="page-item disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">Newer</a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item active" aria-current="page"><a class="page-link" href="#!">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#!">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#!">3</a></li>--}}
{{--                        <li class="page-item disabled"><a class="page-link" href="#!">...</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#!">15</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#!">Older</a></li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}

            </div>
            <div class="col-lg-4">
                @include('partials.sidebar.search')
                @include('partials.sidebar.categories')
                @include('partials.sidebar.widget')
            </div>
        </div>
    </div>
@endsection
