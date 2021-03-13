@if (\Illuminate\Support\Facades\Session::has('success'))


        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-eye"></i> Success!</h5>
            {!! \Illuminate\Support\Facades\Session::get('success') !!}
        </div>
    </section>


@endif