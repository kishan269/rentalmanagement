@extends('admin.layouts.master')
@section('title')
    Client
@endsection
@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Landlords Detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">landlord Detail</li>
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
                    <h3 class="card-title">Landlord Detail</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <form action="#" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="form-group col-md-3">
                                        <label for="landlord_name">First Name</label>
                                        <input type="text" name="landlord_name" class="form-control"
                                               value="{{ $landlord->first_name }} {{ $landlord->middle_name }} {{ $landlord->last_name }}"
                                               readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="email">Email Address</label>
                                        <input type="email" name="email" class="form-control" value="{{ $landlord->email }}" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="id_type">ID Type</label>
                                        <input type="text" name="id_type" class="form-control" value="{{ $landlord->id_type }}" readonly>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="id_number">ID Number</label>
                                        <input type="text" name="id_number" class="form-control" value="{{ $landlord->id_number }}" readonly>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" class="form-control" value="{{ $landlord->address }}" readonly>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" name="phone_number" class="form-control" value="{{ $landlord->phone_number }}" readonly>
                                    </div>
                                </div>
                    </form>


                </div>
            </div>
        </div>
    </section>
@endsection
