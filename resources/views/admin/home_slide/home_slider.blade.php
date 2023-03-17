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

                        <h4 class="card-title">Edit Home Slider</h4>
                        <br>

                         <form method="post" action="{{ route('update.slider') }}" enctype="multipart/form-data">
                         @csrf


                        <input type="hidden" name="id" value="{{ $homeslide->id }}">

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Main title</label>
                            <div class="col-sm-10">
                            <input name="title" class="form-control" type="text" value="{{ $homeslide->title }}"  id="example-text-input">
                            </div> 
                        </div>


                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short title or discription</label>
                            <div class="col-sm-10">
                            <input name="short_title" class="form-control" type="text" value="{{ $homeslide->short_title }}"  id="example-text-input">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Video url</label>
                            <div class="col-sm-10">
                                <input name="video_url" class="form-control" type="text"
                                value="{{ $homeslide->video_url }}"  id="example-text-input">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Homeslide Image</label>
                            <div class="col-sm-10">
                            <input name="home_slide" class="form-control" type="file" id="image">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-10">
                            <img class="avatar-xl avatar-size" id="showImage" src="{{
                                
(!empty($homeslide->home_slide))? url($homeslide->home_slide): url('upload/no_image.jpg')
                            
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