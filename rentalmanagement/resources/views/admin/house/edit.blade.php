@extends('admin.layouts.master')
@section('title')
    Client
@endsection
@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">Edit Landlord</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Update</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.landlord.update',$landlord->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control" value="{{ $landlord->first_name }}"
                                       placeholder="First Name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" name="middle_name" class="form-control" value="{{ $landlord->middle_name }}"
                                       placeholder="Middle Name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value="{{ $landlord->last_name }}"
                                       placeholder="Last Name">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" class="form-control" value="{{ $landlord->email }}" placeholder="Email Address">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" value="" placeholder="********">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" value="" placeholder="********">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="id_type">ID Type</label>
                                <input type="text" name="id_type" class="form-control" value="{{ $landlord->id_type }}" placeholder="Citizenship">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_number">ID Number</label>
                                <input type="text" name="id_number" class="form-control" value="{{ $landlord->id_number }}" placeholder="ID Number">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $landlord->address }}" placeholder="Address">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" value="{{ $landlord->phone_number }}" placeholder="Phone Number">
                            </div>
                        </div>
                        <button type="submit"  class="btn btn-success pull-right"><i class="fa fa-user"></i>
                            Edit Landlord
                        </button>
                    </form>


                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type='text/javascript' src="{{ asset('assets/admin/js/select2.full.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>

@endsection
