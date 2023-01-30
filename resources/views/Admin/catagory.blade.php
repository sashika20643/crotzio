@extends('Admin.layout.adminlayout')

@section('content')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">

@if (session()->has('massege'))

<div class="alert alert-success">
    <button type="button" class="close" data-dismiss='alert' area-hidden='true'>X</button>
{{session()->get('massege')}}
</div>

@endif

<div class="d-flex justify-content-center flex-column text-center">
    <h2 class="text-center mb-5">Catogories</h2>

        <form action="{{route('AddCatagory')}}" method="POST">
            @csrf
            <input type="text" name="cname">
            <input type="submit" value="create">

        </form>

</div>

            </div>
        </div>
        <!-- main-panel ends -->

@endsection
