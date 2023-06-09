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

                        <h4 class="card-title">Add New Portfolio</h4>
                        <br>

                         <form method="post" action="{{ route('add.portfolio.slide')}}" enctype="multipart/form-data">
                         @csrf



                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                            <div class="col-sm-10">
                            <input name="portfolio_name" class="form-control" type="text" id="example-text-input">
                            @error('portfolio_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div> 
                        </div>


                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                            <div class="col-sm-10">
                            <input name="portfolio_title" class="form-control" type="text" id="example-text-input">
                            @error('portfolio_title')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            </div> 
                        </div>
                            

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
                            <div class="col-sm-10">
                            <textarea id="elm1" name="portfolio_description"></textarea>
                        </div> 
                        </div>


                        
                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">New Image</label>
                            <div class="col-sm-10">
                            <input name="portfolio_image" class="form-control" type="file" id="image">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-10">
                            <img class="avatar-xl avatar-size" id="showImage" src="
                            {{ url('upload/no_image.jpg') }}"
                            
                                alt="Card image cap">
                            
                            </div> 
                        </div>


                        <input type="submit" class="btn btn-dark" value="Add Portfolio">

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