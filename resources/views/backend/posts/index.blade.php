@extends('admin.admin_master')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Posts</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href="{{ route('posts.create') }}"
                        class="btn btn-dark btn-rounded waves-effect waves-light"
                        style="float: right;">
                            Add Post</a><br><br>
                        <h4 class="card-title">All Posts</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>S1</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($posts as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <img src="{{ asset($item->image) }}" alt=""
                                    width="60px" height="50px">
                                </td>
                                <td>{{ $item->title }}</td>
                                <td>
                                    <a href="{{ route('posts.edit', $item->id) }}"
                                        class="btn btn-info sm"
                                    title="Edit Post"> <i class="fas fa-edit"></i></a>
                                    <a href="{{ route('posts.delete', $item->id) }}"
                                        class="btn btn-danger sm" id="delete"
                                    title="Trash"> <i class="fas fa-trash-alt" ></i></a>
                                </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->


    </div> <!-- container-fluid -->
</div>
@endsection
