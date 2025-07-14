@extends('admin.layout.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <form method="get" action="{{ route('admin.product.index') }}">
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
                <th>Image</th>
                <th>Price</th>
                <th>Quantity</th>
                <th style="width: 100px">Shipping</th>
                <th>Weight</th>
                <th>Status</th>
                <th>Product Category Name</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($datas as  $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row -> name}}</td>
                        <td>
                            <img class="w-75" src="{{ asset('images/'.$row->main_image )}}" alt="">
                        </td>
                        <td>
                            {{ $row -> price }}
                        </td>
                        <td>
                            {{ $row -> quantity }}
                        </td>
                        <td>
                            {{ $row -> shipping }}
                        </td>
                        <td>
                            {{ $row -> weight }}
                        </td>
                        <td>
                            <span class="badge {{ $row->status ? 'bg-success' : 'bg-danger' }}">
                                {{ $row->status ? 'Show' : 'Hide' }}
                            </span>
                        </td>
                        <td>
                            {{ $row -> productCategory ? $row->productCategory->name : '' }}
                        </td>
                        <td>{{ \Carbon\Carbon::parse($row->created_at)->format('m/d/Y H:i:s') }}</td>
                        <td>
                            <a class="btn btn-success" href="{{ route('admin.product_category.detail', ['productCategory' => $row->id]) }}">Detail</a>
                            <form action="{{ route('admin.product.destroy', ['product' => $row]) }}" method="post">
                                @csrf
                                @method('DELETE')
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
        {{-- <ul class="pagination pagination-sm m-0 float-right">
            <li class="page-item"><a class="page-link" href="#">«</a></li>
                @for ($page = 1 ; $page <= $totalPages; $page++)
                    <li class="page-item">
                        <a class="page-link" href="?page={{ $page }}">{{ $page }}</a>
                    </li>
                @endfor
            <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul> --}}

            {{$datas->withQueryString()->links()}}
        </div>
    </div>
@endsection
