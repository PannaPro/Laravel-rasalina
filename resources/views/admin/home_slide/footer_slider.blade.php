@extends('admin.admin_master')
@section('admin')

<style>
    .page-content {
        margin-left: 15%;
    }
</style>

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Edit Footer Slider</h4>
                        <br>

                         <form method="post" action="{{ route('update.footer') }}" enctype="multipart/form-data">
                         @csrf


                        <input type="hidden" name="id" value="{{ $footer->id }}">

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                            <input name="phone_number" class="form-control" type="text" value="{{ $footer->phone_number }}"  id="example-text-input">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Short Description</label>
                            <div class="col-sm-10">
                            <input name="short_description" class="form-control" type="text" value="{{ $footer->short_description }}"  id="example-text-input">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Adress</label>
                            <div class="col-sm-10">
                            <input name="adress" class="form-control" type="text" value="{{ $footer->adress }}"  id="example-text-input">
                            </div> 
                        </div>


                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input name="email" class="form-control" type="text" value="{{ $footer->email }}"  id="example-text-input">
                            </div> 
                        </div>

    <!-- ссылки  -->
                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Facebook url</label>
                            <div class="col-sm-10">
                                <input name="facebook" class="form-control" type="text"
                                value="{{ $footer->facebook }}"  id="example-text-input">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Twitter url</label>
                            <div class="col-sm-10">
                                <input name="twitter" class="form-control" type="text"
                                value="{{ $footer->twitter }}"  id="example-text-input">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Instagramm url</label>
                            <div class="col-sm-10">
                                <input name="instagramm" class="form-control" type="text"
                                value="{{ $footer->instagramm }}"  id="example-text-input">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">GitHub url</label>
                            <div class="col-sm-10">
                                <input name="gitHub" class="form-control" type="text"
                                value="{{ $footer->gitHub }}"  id="example-text-input">
                            </div> 
                        </div>

                        <div class="row mb-4">
                            <label for="example-text-input" class="col-sm-2 col-form-label">Copyright</label>
                            <div class="col-sm-10">
                            <input name="copyright" class="form-control" type="text" value="{{ $footer->copyright }}"  id="example-text-input">
                            </div> 
                        </div>
    <!-- ссылки  -->

                        <input type="submit" class="btn btn-dark" value="Update Footer">

                        </form>
                    </div>
                </div>
            </div>
            <!-- end row -->

        </div>
    </div>

</div>

@endsection 