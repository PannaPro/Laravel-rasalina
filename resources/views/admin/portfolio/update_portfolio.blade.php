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

                    <div style="margin: 20px">
                    <a href="{{ url()->previous() }}"><button type="button" class="btn btn-outline-danger">Назад
                    </button></a>

                    
                    </div>

                    <div class="card-body">

                        <h4 class="card-title">Update Portfolio</h4>
                        <br>

                         <form method="post" action="{{ route('request.update.portfolio') }}" enctype="multipart/form-data">
                         @csrf

                        <input type="hidden" name="id" value="{{ $updatePortfolio->id }}">

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                            <div class="col-sm-10">
                            <input name="portfolio_name" class="form-control" type="text"
                            id="example-text-input" value="{{$updatePortfolio->portfolio_name}}">
                            </div> 
                        </div>


                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio title</label>
                            <div class="col-sm-10">
                            <input name="portfolio_title" class="form-control" type="text"
                            id="example-text-input" value="{{$updatePortfolio->portfolio_title}}">
                            </div> 
                        </div>
                            

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
                            <div class="col-sm-10">
                            <textarea id="elm1" name="portfolio_description">{{$updatePortfolio->portfolio_description}}</textarea>
                            </div> 
                        </div>

                        
                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">About Main Image</label>
                            <div class="col-sm-10">
                            <input name="portfolio_image" class="form-control" type="file" id="image">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <div class="col-sm-10">
                            <img class="avatar-xl avatar-size" id="showImage" src="
                            {{ 
(!empty($updatePortfolio->portfolio_image))? url($updatePortfolio->portfolio_image): url('upload/no_image.jpg')
                            }}"
                            alt="Card image cap">
                            
                            </div> 
                        </div>


                        <input type="submit" class="btn btn-dark" value="Update Portfolio">

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