@extends('admin.layout.master')

@

@section('content')
<!-- general form elements -->
    <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form role="form" method="post" action="{{ route('admin.product_category.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Slug</label>
                <input type="text" name="slug" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="my-select">Status</label>
                <select id="my-select" class="form-control" name="status">
                    <option>-- Please select --</option>
                    <option value="1">Show</option>
                    <option value="0">Hide</option>
                </select>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
    </div>
<!-- /.card -->
@endsection
