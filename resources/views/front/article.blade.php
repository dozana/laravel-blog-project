@extends('front.layout')

@section('title', trans('menu.index'))

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">

                <div class="card mb-4">
                    <a href="#">
                        <img class="card-img-top" src="https://dummyimage.com/850x350/dee2e6/6c757d.jpg" alt="..."/></a>
                    <div class="card-body">
                        <div class="small text-muted">@lang('site.date') : {{ $article->created_at }}</div>
                        <h2 class="card-title">{{ $article->title }}</h2>
                        <p class="card-text">{!! $article->text !!}</p>
                        <a class="btn btn-primary btn-sm" href="#!">Go Back</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
