@extends('admin.layout.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <form method="get" action="{{ route('admin.product_category.list') }}">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="search" class="form-control float-right" placeholder="Search"
                                value="{{ request()->get('search') }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                        </div>
                    </div>

                    <select name="sort" id="sort">
                        <option value="">---Please Select</option>
                        <option {{ request()->get('sort') === 'oldest' ? 'selected' : '' }} value="oldest">Oldest</option>
                        <option {{ request()->get('sort') === 'latest' ? 'selected' : '' }} value="latest">Latest</option>
                    </select>
                </form>
            </h3>
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
                            <a class="btn btn-success" href="{{ route('admin.product_category.detail', ['productCategory' => $row->id]) }}">Detail</a>
                            <form action="{{ route('admin.product_category.destroy', [
                            'productCategory' => $row->id]) }}" method="post">
                                @csrf
                                <button class="btn btn-danger" onclick="return confirm('Are you sure')">Delete</button>
                            </form>

                            @if (!is_null($row->deleted_at))
                                <form action="{{ route('admin.product_category.restore', ['id' => $row->id]) }}" method="post">
                                    @csrf
                                    <button class="btn btn-warning" onclick="return confirm('Are you sure to restore?')">Restore</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        {{-- <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
                @for ($page = 1 ; $page <= $totalPages; $page++)
                    <li class="page-item">
                        <a class="page-link" href="?page={{ $page }}">{{ $page }}</a>
                    </li>
                @endfor
            <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul> --}}

            {{$datas->links()}}
        </div>
    </div>
@endsection
