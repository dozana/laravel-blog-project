@extends('admin.layout')

@section('title', 'Edit Contact Info')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Contact Info</h1>
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
                            <form action="{{ route('contacts.update', $item->id) }}" method="post">
                                @csrf
                                @method('put')

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $item->phone }}">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-Mail</label>
                                    <input type="text" class="form-control" id="email" name="email" value="{{ $item->email }}">
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary btn-block">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <a href="" class="btn btn-sm btn-success">
                        {{ Cache::has('contacts') ? 'clear cache' : 'cache it' }}
                    </a>

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
