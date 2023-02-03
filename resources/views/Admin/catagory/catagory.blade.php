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
@if($errors->has('cname'))

<div class="alert alert-danger">
    <button type="button" class="close" data-dismiss='alert' area-hidden='true'>X</button>
    {{ $errors->first('cname') }}
</div>

@endif

<div class="d-flex justify-content-center flex-column text-center">
    <h2 class="text-center mb-5">Catogories</h2>

        <form action="{{route('AddCatagory')}}" method="POST">
            @csrf
            <input type="text" name="cname">
            <input type="submit" value="create" class="btn btn-outline-success">

        </form>
        <div class="row mt-5">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">catagory details</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>

                          <th> Id </th>
                          <th> Catagory Name </th>
                          <th> Update </th>
                          <th> Delete </th>

                        </tr>
                      </thead>
                      <tbody>


                            @foreach ($catagories as $cat)

                            <tr>
<td>{{$cat->id}}
</td>
<td>
    {{$cat->name}}
</td>
                          <td>
                            <div class="btn btn-outline-success">Edit</div>
                          </td>
                          <td>
                            <a href="{{route('DeleteCatagory',$cat->id)}}" onclick="confirmation(event)" class="btn btn-outline-danger">Delete</a>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
</div>

            </div>
        </div>
        <!-- main-panel ends -->

@endsection
