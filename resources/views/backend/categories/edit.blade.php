@extends('admin.admin_master')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Category</h4><hr>


                        <form action="{{ route('categories.update', $category->id) }}" method="post">
                           @csrf
                           <input type="hidden" name="id" value="{{ $category->id }}">
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Category Name</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="name"
                                    value="{{ $category->name }}" type="text" id="example-text-input">
                                </div>
                            </div>
                            <!-- end row -->


                            <input type="submit" value="Update Category" class="btn btn-info waves-effect waves-light">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>


@endsection
