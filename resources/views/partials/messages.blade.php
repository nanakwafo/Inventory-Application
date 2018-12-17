@if(Session::has('success'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>Success!</strong> {{Session::get('success')}}
    </div>
@endif


@if(Session::has('printurl'))
    <div class="alert alert-primary alert-block">
        <a href="{{Session::get('printurl')}}" class="btn btn-success">Print receipt</a>
    </div>
@endif