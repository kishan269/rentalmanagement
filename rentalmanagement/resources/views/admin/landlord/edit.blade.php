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
                        <li class="breadcrumb-item">Edit User</li>
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
                    @foreach($user as $u)
                    <form action="{{ route('user.update',$u->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="name">User Name</label>
                                        <input type="text" name="name" class="form-control" value="{{ $u->name }}">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="name">Email</label>
                                        <input type="Email" name="email" class="form-control" value="{{ $u->email }}">
                                    </div>

                                        <div class="form-group col-md-12">
                                            <label for="roles" class="col-md-2 col-form-label text-md-left">Role</label>
                                            <div class="col-md-6">
                                                @foreach($roles as $rule)
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="roles[]"value="{{$rule->id}}" id="flexCheckDefault" @if($u->role==$rule->name) checked @endif>
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            {{$rule->name}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <button type="submit"  class="btn btn-success pull-right"><i class="fa fa-user"></i>
                            Edit User
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



    <script>
        function generateRandomInteger() {
            return Math.floor(Math.random() * 90000) + 10000;
        }

        jQuery(document).on('click', '.btn-delete-course', function (e) {
            e.preventDefault();

            var $this = $(this);

            var course = $this.attr('data-course');

            if (!course) {
                $this.closest("tr").remove();
                return false;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('admin')  }}",
                data: {
                    title:course
                },
                beforeSend: function () {
                    $this.prop('disabled', true);
                },
                success: function (data) {
                    $this.closest("tr").remove();
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    //
                },
                complete: function () {
                    $this.prop('disabled', false);
                }
            });
        });

        jQuery(document).on('click', '.btn-add-course', function (e) {
            e.preventDefault();
            var lastRow = $('table.table-course > tbody > tr').last().attr('data-row');
            var counter = lastRow ? parseInt(lastRow) + 1 : 1;
            var randomInteger = generateRandomInteger();
            var newRow = jQuery('<tr data-row="' + counter + '">' +
                '<td>' + counter + '</td>' +
                '<td><input type="text" name="course[title][' + randomInteger + ']" class="form-control" required/></td>' +
                '<td><button type="button" class="btn btn-danger btn-xs btn-delete-course" data-faq=""><i class="fa fa-trash"></i></button></td>' +
                '</tr>');
            jQuery('table.table-course').append(newRow);
        });
    </script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            ClassicEditor
                .create(document.querySelector('#editor1'))
                .then(function (editor) {
                    // The editor instance
                })
                .catch(function (error) {
                    console.error(error)
                })

            // bootstrap WYSIHTML5 - text editor

            $('.textarea').wysihtml5({
                toolbar: {fa: true}
            })
        })
    </script>


@endsection
