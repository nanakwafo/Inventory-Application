@if(Session::has('success'))
    <div class="alert alert-success">
        <strong>Success!</strong> {{Session::get('success')}}
    </div>
@endif