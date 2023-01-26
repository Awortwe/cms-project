@extends('admin.admin_master')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add Post</h4><hr>


                        <form action="{{ route('posts.store') }}" method="post"  enctype="multipart/form-data">
                           @csrf
                            <div class="row mb-3">
                                <label for="title" class="col-sm-2 col-form-label">Title</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="title" type="text" id="title">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="description" class="col-sm-2 col-form-label">Description</label>
                                <div class="form-group col-sm-10">
                                    <textarea name="description" id="description" cols="5" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="content" class="col-sm-2 col-form-label">Content</label>
                                <div class="form-group col-sm-10">
                                    <input id="content" type="hidden" name="content">
                                    <trix-editor input="content"></trix-editor>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="published_at" class="col-sm-2 col-form-label">Published At</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="published_at" type="text" id="published_at">
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="row mb-3">
                                <label for="image" class="col-sm-2 col-form-label">Image</label>
                                <div class="form-group col-sm-10">
                                    <input class="form-control" name="image" type="file" id="image">
                                </div>
                            </div>
                            <!-- end row -->

                            <select class="form-select" aria-label="Default select example">
                                <option selected="">Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>

                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label"></label>
                                <div class="form-group col-sm-10">
                                    <img class="rounded avatar-lg"  id="showImage"
                                    src="{{ asset('uploads/no_image.jpg') }}"
                                    data-holder-rendered="true">
                                </div>
                            </div>


                            <input type="submit" value="Add Post" class="btn btn-info waves-effect waves-light">
                        </form>
                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>

@endsection

@section('script')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#published_at',{
            enableTime: true
        })
    </script>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection


