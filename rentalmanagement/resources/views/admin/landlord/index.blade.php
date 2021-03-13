@extends('admin.layouts.master')
@section('title')
    Client
@endsection
@section('content')

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">
                            Landlord
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active"> Landlord</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
                <a class="btn btn-xs btn-success" id="add-client"><i class="fa fa-plus"></i> Add
                    new  Landlord
                </a>
            </div><!-- /.container-fluid -->
        </div>

        <section class="content">

            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <h2><span class="badge badge-success"> Landlord Table</span></h2>
                    </div>
                    <div class="float-right">
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                                    title="Collapse">
                                <i class="fa fa-minus"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip"
                                    title="Remove">
                                <i class="fa fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="clientTable" class="ui celled table" cellspacing="0">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Contact Number</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                          $sno=1;
                        ?>
                        @foreach($landlords as $landlord)
                                <tr>
                                    <td>{{ $sno }}</td>
                                    <td>{{ $landlord->first_name }} {{ $landlord->middle_name }} {{ $landlord->last_name }}</td>
                                    <td>{{ $landlord->email }}</td>
                                    <td>{{ $landlord->address }}</td>
                                    <td>{{ $landlord->phone_number }} </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="{{ route('admin.landlord.show',$landlord->id) }}">View</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('admin.landlord.edit',$landlord->id) }}">Edit</a>
                                        <form id="deleteForm-{{ $user->id }}" action="{{ route('admin.landlord.destory',$landlord->id) }}" method="POST" style="display: inline-block">
                                            {{ csrf_field() }}
                                            <input type="hidden" value="{{$landlord->id}}" name="id">
                                            <button type="button" class="btn btn-sm btn-danger btn-delete" data-id="{{ $landlord->id }}" >Delete</button>
                                        </form>
                                    </td>
                                </tr>

                            <?php
                        $sno=$sno+1;
                        ?>
                        @endforeach
                        </tbody>

                    </table>
                </div>
                <!-- /.card-body -->
            </div>

        </section>



    <!-- Modal -->
        <div class="modal fade" id="quickView" tabindex="-1" role="dialog" aria-labelledby="quickView" aria-hidden="true">
        </div>


@endsection

@section('scripts')
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <script type='text/javascript' src="{{ asset('assets/admin/js/select2.full.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <script>
        $(document).on('click', '.btn-delete', function (e) {
            e.preventDefault();
            var thi = $(this).attr('data-id');
            console.log(thi);
            swal({
                title: "Are you sure want to Delete?",
                text: "Once deleted, you will not be able to recover !",
                icon: "error",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {

                    $('#deleteForm-'+thi).submit();

                } else {
                    swal("Cancelled", "Deleting Canceled ", "warning");
                }
            });

        });

        var $modal = $('#quickView');

        $(document).on("click", "#add-client", function (e) {
            e.preventDefault();
            var tempEditUrl = "{{route('admin.landlord.create')}}";
            $modal.load(tempEditUrl, function (response) {
                $modal.modal({show: true});
            });
        });


        $(document).on('submit', '#saveLandlord', function (e) {
            e.preventDefault();
            $(this).attr('disabled');
            var form = new FormData($('#saveLandlord')[0]);
            var params = $('#saveLandlord').serializeArray();

            var myUrl = "{{ route('admin.landlord.store') }}";

            $.each(params, function (i, val) {
                form.append(val.name, val.value)
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: myUrl,
                contentType: false,
                processData: false,
                data: form,
                beforeSend: function (data) {
                },
                success: function (data) {
                    console.log(data);

                    $('#quickView').modal('hide');
                    swal(data, 'Successfully Added', "success");
                    //$('#adminTable').DataTable().ajax.reload();
                    //$('#userTable').DataTable().ajax.reload();
                },
                error: function (err) {
                    if (err.status == 422) {
                        $.each(err.responseJSON.errors, function (i, error) {
                            var el = $(document).find('[name="' + i + '"]');
                            el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(15000));
                        });
                    }
                }
            });
        });

    </script>
@endsection
