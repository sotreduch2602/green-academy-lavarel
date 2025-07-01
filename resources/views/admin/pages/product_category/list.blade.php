@extends('admin.layout.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Bordered Table</h3>
            @if (session('msg'))
                @if (session('msg') === 'success')
                    <div class="alert alert-success">Success</div>
                @else
                    <div class="alert alert-danger">Failed</div>
                @endif
            @endif
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th style="width: 10px">#</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Status</th>
                <th style="width: 100px">Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($datas as  $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row -> name}}</td>
                        <td>
                            {{ $row -> slug }}
                        </td>
                        <td>
                            <span class="badge bg-danger">{{ $row->status ? 'Show' : 'Hide' }}</span>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($row->created_at)->format('m/d/Y H:i:s') }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.product_category.detail', ['id' => $row->id]) }}">Detail</a>
                            <form action="{{ route('admin.product_category.destroy', [
                            'id' => $row->id]) }}" method="post">
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you sure')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
                @for ($page = 1 ; $page <= $totalPages; $page++)
                    <li class="page-item">
                        <a class="page-link" href="?page={{ $page }}">{{ $page }}</a>
                    </li>
                @endfor
            <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
        </div>
    </div>
@endsection
