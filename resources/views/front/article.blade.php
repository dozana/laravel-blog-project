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

                <!-- კომენტარების მთვლელი -->
                <h4 class="mt-5">@lang('site.comments') ({{ $article->comments->where('confirmed')->count() }})</h4>
                <hr class="mt-3">

                <!-- თუ გავილი გვაქვს ავტორიზაცია გამოვიტანოთ დასამატებელი ფორმა -->
                @auth
                    <form method="POST" action="{{ route('comment',$article->id) }}">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if(Session::has('inserting_results'))
                            <div class="alert alert-{{ Session::get('inserting_results')['class'] }}">
                                {{ Session::get('inserting_results')['message'] }}
                            </div>
                        @endif
                        @csrf
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <div class="form-group">
                            <textarea name="comment" class="form-control" rows="5" placeholder="@lang('site.comment')"></textarea>
                        </div>
                        <div class="form-group mt-1">
                            <input type="submit" value="@lang('site.add')" class="form-control btn btn-success">
                        </div>
                    </form>
                @else
                    <div class="alert alert-warning text-center">
                        <small>@lang('site.login_to_comment')</small>
                    </div>
                @endauth

                <!-- კომენტარები -->
                <hr class="mt-3">
                @forelse($article->comments->where('confirmed',1)->reverse() as $comment)
                    <div class="alert alert-primary">
                        {{ $comment->comment }}
                        <p>
                            @lang('site.author') : {{ $comment->user->email }}</span>
                        </p>
                        <p>
                            @lang('site.date') : {{ $comment->created_at }}</span>
                        </p>
                    </div>
                @empty
                    <div class="alert alert-warning text-center">
                        <small>@lang('site.no_comment')</small>
                    </div>
                @endforelse

            </div>
        </div>
    </div>
@endsection
