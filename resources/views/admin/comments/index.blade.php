@extends('admin.layout')

@section('title', 'All Comments')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">All Comments</h1>
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
                                    <th scope="col">Publish</th>
                                    <th scope="col">Author</th>
                                    <th scope="col">Comment</th>
                                    <th scope="col">Article</th>
                                    <th scope="col">Date</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($items as $key => $item)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>
                                            <input type="checkbox" class="confirm-checkbox" data-id="{{ $item->id }}" {{ $item->confirmed ? 'checked' : '' }}>
                                        </td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->comment }}</td>
                                        <td>{{ $item->article }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>

                                            <form action="{{ route('comments.destroy', $item->id) }}" method="post">
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
        $('.confirm-checkbox').change(function() {
            let id = $(this).data('id');

            $.ajax({
                url: "/admin/comments/confirm", // მარშრუტის შესაბამისი ბმული
                type: 'post',
                dataType: 'json',
                data: {id: id, _token : '{{ csrf_token() }}'} // კომენტარის id და POST მეთოდისათვის საჭირო თოქენი
            }).done(function (data){

                alert(data.message);

            });
        });

        $('.btn-destroy').on('click', function(){
            if(confirm('დარწმუნებული ხართ ?')) {
                $(this).parent('form').submit();
            }
        });
    </script>
@endsection
