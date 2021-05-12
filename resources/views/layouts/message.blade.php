
@if(Session::has('success'))
    <div class="col-md-12 animated fadeInDown alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>
@elseif(Session::has('delete'))
    <div class="col-md-12 animated fadeInDown alert alert-danger" role="alert">
        {{Session::get('delete')}}
    </div>
@endif

@if ($errors->any())
<div class="col-md-12 animated fadeInDown alert alert-danger" role="alert">
<ul>
@foreach ($errors->all() as $error)
<li>{{ $error }}</li>
@endforeach
</ul>
</div>
@endif

