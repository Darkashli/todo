@if (count($errors) > 0)
  @foreach ($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible close">
        <button type="button" class="close" data-dismiss="alert">×</button>
      {{$error}}
    </div>
  @endforeach  
@endif

@if (session('success'))
  <div class="alert alert-success alert-dismissible close">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
      <strong>Success!</strong>
    {{session('success')}}
  </div>
@endif

@if (session('error'))
  <div class="alert alert-danger alert-dismissible close">
      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
      <strong>Failed!</strong>
    {{session('error')}}
  </div>
@endif