@extends('admin.layout.master')
@section('content')
<!-- general form elements -->
    <div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Quick Example</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    {{-- {{ dd($errors->all()) }} --}}

    <form role="form" method="post" action="{{ route('admin.product_category.store') }}">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label for="exampleInputEmail1">Name</label>
                <input type="text" id="name" name="name" class="form-control"  placeholder="Enter name" value="{{ old('name') }}">
            </div>

            @error('name')
                <div class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            <div class="form-group">
                <label for="exampleInputPassword1">Slug</label>
                <input type="text" id="slug" name="slug" class="form-control" placeholder="Enter password" value="{{ old('slug') }}">
            </div>

            @error('slug')
                <div class="alert alert-danger">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror

            <div class="form-group">
                <label for="my-select">Status</label>
                <select id="my-select" class="form-control" name="status" >
                    <option value="">-- Please select --</option>
                    <option {{ old('status') === '1' ? 'selected' : '' }} value="1">Show</option>
                    <option {{ old('status') === '0' ? 'selected' : '' }}  value="0">Hide</option>
                </select>
            </div>

            @error('status')
                <div>
                    <strong class="alert alert-danger">{{ $message }}</strong>
                </div>
            @enderror
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
    </div>
<!-- /.card -->
@endsection

@section('my-custom-js')
<script>
    $(document).ready(function(){
        $('#name').on('keyup', function(){
            let slug = $(this).val();

            $.ajax({
                method: "GET",
                url: "{{ route('admin.product_category.make_slug') }}",
                data: {slug: slug},
                success: function(response){
                    $('#slug').val(response.slug);
                }
            })
        });
    })
</script>
@endsection
