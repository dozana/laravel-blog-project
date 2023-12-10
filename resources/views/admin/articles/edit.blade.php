@extends('admin.layout')

@section('title', 'Create Article')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Create Article</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">

                    <div class="card mb-3">
                        <div class="card-body">
                            <form action="{{ route('articles.update', $items_with_translates->first()->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('put')

                                @foreach($locales as $key => $locale)
                                    @php
                                        $current_locale_item = $items_with_translates->firstWhere('lang',$key);
                                    @endphp
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title ({{ $key }})</label>
                                        <input type="text" class="form-control" id="title" name="translates[{{ $key }}][title]" value="{{ $current_locale_item->title }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description ({{ $key }})</label>
                                        <textarea class="form-control" id="description"  name="translates[{{ $key }}][description]" rows="5">{{ $current_locale_item->description }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="text" class="form-label">Text ({{ $key }})</label>
                                        <textarea class="form-control" id="text"  name="translates[{{ $key }}][text]" rows="5">{{ $current_locale_item->text }}</textarea>
                                    </div>
                                @endforeach

                                <img src="{{ $items_with_translates->first()->image }}" width="80" class="mb-3" alt="">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image ({{ $key }})</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @if($errors->any())
                        <div class="row">
                            <div class="col-md-5 offset-4">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(Session::has('result'))
                        <div class="alert alert-{{ Session::get('result') ? 'success' : 'danger'}}">
                            Operation completed {{ Session::get('result') ? 'Successfully' : 'Failed'}}
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
