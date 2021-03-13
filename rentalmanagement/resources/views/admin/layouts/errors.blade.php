@if (\Illuminate\Support\Facades\Session::has('errors'))
    <section class="content-header">
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5>Error!</h5>
            {!! \Illuminate\Support\Facades\Session::get('errors') !!}
        </div>
    </section>

@endif