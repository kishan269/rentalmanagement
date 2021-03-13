<div class="modal-dialog modal-lg" role="document">
    <form enctype="multipart/form-data" id="saveLandlord">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fa fa-user"></i> Add Landlord</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="first_name">First Name</label>
                                <input type="text" name="first_name" class="form-control" value=""
                                       placeholder="First Name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="middle_name">Middle Name</label>
                                <input type="text" name="middle_name" class="form-control" value=""
                                       placeholder="Middle Name">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="last_name" class="form-control" value=""
                                       placeholder="Last Name">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" class="form-control" value="" placeholder="Email Address">
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
                                <input type="text" name="id_type" class="form-control" value="" placeholder="Citizenship">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="id_number">ID Number</label>
                                <input type="text" name="id_number" class="form-control" value="" placeholder="ID Number">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" value="" placeholder="Address">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone_number">Phone Number</label>
                                <input type="text" name="phone_number" class="form-control" value="" placeholder="Phone Number">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancel
                </button>
                <button type="submit" class="btn btn-success"><i class="fa fa-user"></i> Add
                    Landlord
                </button>
            </div>
        </div>
    </form>
</div>


