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

                        <h4 class="card-title">Edit Profile Page </h4>
                        <br>

                         <form method="post" action="{{ route('store.profile') }}" enctype="multipart/form-data">
                         @csrf

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                            <input name="name" class="form-control" type="text" value="{{ $editData->name }}"  id="example-text-input">
                            </div> 
                        </div>


                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input name="email" class="form-control" type="text" value="{{ $editData->email }}"  id="example-text-input">
                            </div> 
                        </div>


                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">User Name</label>
                            <div class="col-sm-10">
                            <input name="username" class="form-control" type="text" value="{{ $editData->username }}"  id="example-text-input">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                            <div class="col-sm-10">
                            <input name="profile_image" class="form-control" type="file" id="image">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-10">
                            <img class="rounded-circle avatar-xl avatar-size" id="showImage" src="{{
                                
                                (!empty($editData->profile_image))? url('upload/profile_images/'.$editData->profile_image): url('upload/no_image.jpg')
                            
                            }}" alt="Card image cap">
                            </div> 
                        </div>


                        <input type="submit" class="btn btn-dark" value="Update Profile">

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