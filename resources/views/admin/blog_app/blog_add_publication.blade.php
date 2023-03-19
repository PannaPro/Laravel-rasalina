@extends('admin.admin_master')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<style type="text/css">
    .page-content {
        margin-left: 15%;
    }

    .bootstrap-tagsinput .tag{
        margin-right: 10px;
        color: #000;
        background-color: #d4d4d4;
        padding: 4px;
        font-weight: 700px;
        font-family: Monseratt;
        font-size: 18px;
        
    }

</style>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Add New Blog Publication</h4>
                        <br>

                         <form method="post" action="{{ route('create.publication' ) }}" enctype="multipart/form-data">
                         @csrf


                         <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label>
                            <div class="col-sm-10">
                                 <select class="form-select" name="blog_category_id" id="example-text-input" aria-lavel="Default select example ">
                                        <option selected="">Open menu</option>

                                            @foreach( $categories as $item )
                                        <option value="{{ $item->id }}">  {{ $item->blog_category }} </option>

                                            @endforeach

                                 </select> 

                            </div> 
                        </div>


                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Publication Title</label>
                            <div class="col-sm-10">
                            <input name="blog_title" class="form-control" type="text" id="example-text-input">
                            @error('blog_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div> 
                        </div>


                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                            <textarea id="elm1" name="blog_description"></textarea>
                            </div> 
                        </div>


                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Publication Tags</label>
                            <div class="col-sm-10">
                            <input name="blog_tags" value="fresh news, tech" class="form-control" type="text" data-role="tagsinput">
                            </div> 
                        </div>
                            

                                       
                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">New Image</label>
                            <div class="col-sm-10">
                            <input name="blog_image" class="form-control" type="file" id="image">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-10">
                            <img class="avatar-xl avatar-size" id="showImage" src="
                            {{ url('upload/no_image.jpg') }}"
                            
                                alt="Card image cap">
                            
                            </div> 
                        </div>


                        <input type="submit" class="btn btn-dark" value="Create">

                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
    </div>

</div>

<script>

    //реди метод ипользуется для вызова функции только после того, как весь документ будет загружен (вся страница).
    $(document).ready(function () {
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function (e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0'])
        });
    });

</script>


@endsection 