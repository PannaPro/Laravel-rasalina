@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<style>
    .page-content {
        margin-left: 20%;
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add New Blog Category</h4>
                        <br><br>
                    
                         <form method="post" action="{{ route('create.blog.category')}}" enctype="multipart/form-data">
                         @csrf


                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-5">
                            <input name="blog_category" class="form-control" type="text" id="example-text-input">
                            </div>
                        </div>
                        <br><br>

                        <input type="submit" class="btn btn-dark" value="Add New Category">

                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
    </div>

</div>




@endsection 