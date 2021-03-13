@extends('admin.layouts.master')
@section('title')
    Client
@endsection
@section('content')
<section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>User Detail</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item">View User</li>
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

                    <form action="#" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    @foreach($users as $user)
                                    <div class="form-group col-md-12">
                                        <label for="name">User Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="name">Email</label>
                                        <input type="Email" name="email" class="form-control" value="{{ $user->email }}">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="name">Role</label>
                                        <input type="Email" name="email" class="form-control" value="{{ $user->role }}">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>
    </section>
@endsection
