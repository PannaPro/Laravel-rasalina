@extends('admin.admin_master')
@section('admin')

<style>
    .page-content {
        margin-left: 15%;
    }
</style>

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Portfolio Slide</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item active">Data Tables</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Portfolio Data</h4>
                                        
                                        <form action="post" >
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Number</th>
                                                <th>Name</th>
                                                <th>Title</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                        
        
                                            <tbody>
                                                @php ($i = 1)
                                                @foreach( $portfolioData as $item )

                                            <tr>
                                                <td> {{ $i++ }}</td>
                                                <td> {{ $item->portfolio_name }}</td>
                                                <td> {{ $item->portfolio_title }}</td>

                                                <td> <img src="{{ asset($item->portfolio_image) }}"
                                                alt="" style="width: 150px; hight:200px;"> </td>
                                                <td>
                                                    <a href="{{ route('update.portfolio', $item->id) }}" class="btn btn-info sm" title="Edit Portfolio">
                                                    <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a href="{{ route('delete.portfolio', $item->id) }}" class="btn btn-danger sm" title="Delete Portfolio" id="delete">
                                                    <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                
                                                </td>
                                            </tr>

                                                @endforeach
                                            </tbody>
                                        </table>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                        
                        <!-- end row-->
                        
                    </div> <!-- container-fluid -->
                </div>

@endsection