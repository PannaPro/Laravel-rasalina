@extends('admin.admin_master')
@section('admin')

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
                <div style="margin: 20px">
                    <a href="{{ route('blog.category') }}"><button type="button" class="btn btn-outline-danger">Назад
                    </button></a>
                    <div class="card-body">

                        <h4 class="card-title">Add New Blog Category</h4>
                        <br><br>
                    
                         <form method="post" action="{{ route('update.blog.category') }}" enctype="multipart/form-data">
                         @csrf

                         <input name="id" type="hidden" value="{{ $updateCategory->id }}">

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Category Name</label>
                            <div class="col-sm-5">
                            <input name="blog_category" class="form-control" type="text"
                            id="example-text-input" value="{{$updateCategory->blog_category}}">
                            @error('blog_category')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div> 
                        </div>
                        <br><br>

                        <input type="submit" class="btn btn-dark" value="Update Name Category">

                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
    </div>

</div>




@endsection 