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

                        <h4 class="card-title">Edit About Slider</h4>
                        <br>

                         <form method="post" action="{{ route('update.about') }}" enctype="multipart/form-data">
                         @csrf


                        <input type="hidden" name="id" value="{{ $aboutData->id }}">

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Main title</label>
                            <div class="col-sm-10">
                            <input name="title" class="form-control" type="text" value="{{ $aboutData->title }}"  id="example-text-input">
                            </div> 
                        </div>


                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short title</label>
                            <div class="col-sm-10">
                            <input name="short_title" class="form-control" type="text" value="{{ $aboutData->short_title }}"  id="example-text-input">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short description</label>
                            <div class="col-sm-10">
                            <textarea required name="short_description" id="short_description" cols="100" rows="5">{{ $aboutData->short_description }}</textarea>    
                        </div> 
                        </div>

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Long description</label>
                            <div class="col-sm-10">
                            <textarea id="elm1" name="long_description">{{ $aboutData->long_description }}</textarea>
                        </div> 
                        </div>


                        
                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">About Main Image</label>
                            <div class="col-sm-10">
                            <input name="about_image" class="form-control" type="file" id="image">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-10">
                            <img class="avatar-xl avatar-size" id="showImage" src="{{
                                
(!empty($aboutData->about_image))? url($aboutData->about_image): url('upload/no_image.jpg')
                            
                            }}" alt="Card image cap">
                            
                            </div> 
                        </div>


                        <input type="submit" class="btn btn-dark" value="Update Slide page">

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