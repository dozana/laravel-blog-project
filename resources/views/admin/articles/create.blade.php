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
                            <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                @foreach($locales as $key => $locale)
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Title ({{ $key }})</label>
                                        <input type="text" class="form-control" id="title" name="translates[{{ $key }}][title]" value="{{ old('translates.'.$key.'.title') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="description" class="form-label">Description ({{ $key }})</label>
                                        <textarea class="form-control" id="description"  name="translates[{{ $key }}][description]" rows="5">{{ old('translates.'.$key.'.description') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="text" class="form-label">Text ({{ $key }})</label>
                                        <textarea class="form-control" id="text"  name="translates[{{ $key }}][text]" rows="5">{{ old('translates.'.$key.'.text') }}</textarea>
                                    </div>
                                @endforeach

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

                </div>
            </div>
        </div>
    </div>
@endsection
