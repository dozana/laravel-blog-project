@extends('admin.layout')

@section('title', 'All Articles')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">All Articles</h1>
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
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Photo</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $key => $item)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>{{ $item->title }}</td>
                                        <td>
                                            <img src="{{ $item->image }}" style="width: 50px; height: 50px;">
                                        </td>
                                        <td>
                                            <a href="{{ route('articles.edit', $item->id) }}" class="btn btn-sm btn-primary" style="float: left; margin-right: 5px">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <form action="{{ route('articles.destroy', $item->id) }}" method="post">
                                                @csrf
                                                <input type="hidden" name="_method" value="delete">
                                                <a href="#!" class="btn btn-sm btn-danger btn-destroy">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

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

@section('scripts')
    <script>
        $('.btn-destroy').on('click', function(){
            if(confirm('Are you sure?')) {
                $(this).parent('form').submit();
            }
        });
    </script>
@endsection
