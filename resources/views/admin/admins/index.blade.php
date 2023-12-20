@extends('admin.layout')

@section('title', 'All Admins')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">All Admins</h1>
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
                                        <th scope="col">Name</th>
                                        <th scope="col">E-Mail</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($items as $key => $item)
                                        <tr>
                                            <th scope="row">{{ ++$key }}</th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <a href="{{ route('admins.edit', $item->id) }}" class="btn btn-xs btn-primary" style="float: left; margin-right: 5px">
                                                    <i class="fa fa-edit"></i>
                                                </a>

                                                @if($item->id != 1)
                                                    <form action="{{ route('admins.destroy', $item->id) }}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="_method" value="delete">
                                                        <a href="#!" class="btn btn-xs btn-danger btn-destroy">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </form>
                                                @endif

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
