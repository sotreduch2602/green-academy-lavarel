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

                        <td><span class="badge bg-danger">{{ $row->status }}</span></td>
                        <td>{{ \Carbon\Carbon::parse($row->created_at)->format('m/d/Y H:i:s') }}</td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">
        <ul class="pagination pagination-sm m-0 float-right">

            <li class="page-item"><a class="page-link" href="#">«</a></li>
                <?php
                    $page = 4;
                    $itemPerPage =3;
                ?>
                @for ($i = 1 ; $i <= $page; $i++  )
                    <li class="page-item">
                        <a class="page-link" href="#">{{ $i }}</a>
                    </li>
                @endfor
            <li class="page-item"><a class="page-link" href="#">»</a></li>
        </ul>
        </div>
    </div>
@endsection
