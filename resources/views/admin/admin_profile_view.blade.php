@extends('admin.admin_master')
@section('admin')

<div class="page-content ">
<div class="container">
<style>
   .new-position { 
    padding: 20px;
   }

   .avatar-center {
    text-align:center;
   }

   .avatar-size {
    height: 10.5rem;
    width: 10.5rem;
   }
  </style>


<div class="row">
    <div class="col-lg-2">
    </div>
    <div class="col-lg-6">
        <div class="card new-position"><br><br>
            <div class="avatar-center">
            <img class="rounded-circle avatar-xl avatar-size"  src="{{
                
                
                (!empty($adminData->profile_image))? url('upload/profile_images/'.$adminData->profile_image): url('upload/no_image.jpg')



            }}" alt="Card image cap">
            </div>

            <div class="card-body">
                <h4 class="card-title">Name : {{ $adminData->name }} </h4>
                <hr>
                <h4 class="card-title">User Email : {{ $adminData->email }} </h4>
                <hr>
                <h4 class="card-title">User Name : {{ $adminData->username }} </h4>
                <hr>
                <h4 class="card-title">Create data : <br><br>{{ $adminData->created_at->format('jS \o\f F Y (l)') }} </h4>
                <hr>
                <a href="{{ route('edit.profile') }}" class="btn btn-info btn-rounded waves-effect waves-light" > Edit Profile</a>
            </div>
        </div>
    </div> 

</div> 


</div>
</div>

@endsection 