@extends('admin.admin_master')

@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Tags</h4>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <a href=""
                        class="btn btn-dark btn-rounded waves-effect waves-light"
                        style="float: right;">
                            Add Tag</a><br><br>
                        <h4 class="card-title">All Tags</h4>


                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th style="width: 5%">S1</th>
                                <th>Name</th>
                                <th style="width: 20%">Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            @foreach ($tags as $key=>$item)
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <a href=""
                                        class="btn btn-info sm"
                                    title="Edit Tag"> <i class="fas fa-edit"></i></a>
                                    <a href=""
                                        class="btn btn-danger sm" id="delete"
                                    title="Delete Tag"> <i class="fas fa-trash-alt" ></i></a>
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
