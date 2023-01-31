@extends('admin.admin_master')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Tag</h4><hr>


                        <form action="" method="post" id="myForm">
                           @csrf
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Tag Name</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="name" value="{{ $tag->name }}"
                                    type="text" id="example-text-input">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            <!-- end row -->


                            <input type="submit" value="Update Tag" class="btn btn-info waves-effect waves-light">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

@endsection
