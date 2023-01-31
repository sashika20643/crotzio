@if (session()->has('massege'))

<div class="alert alert-success">
<button type="button" class="close" data-dismiss='alert' area-hidden='true'>X</button>
{{session()->get('massege')}}
</div>



@endif
@if($errors->any())
@foreach ($errors->all() as $error )
<div class="alert alert-danger">
<button type="button" class="close" data-dismiss='alert' area-hidden='true'>X</button>
{{ $error }}
</div>

@endforeach
@endif
