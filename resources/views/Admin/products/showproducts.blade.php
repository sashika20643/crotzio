@extends('Admin.layout.adminlayout')

@section('content')
   <!-- partial -->
   <div class="main-panel">
    <div class="content-wrapper">

@include('Admin.components.notify')
<div class="d-flex justify-content-center text-center flex-column">
<h1> All Products </h1>

<div class="row mt-5">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Product details</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>

                  <th> Id </th>
                  <th> Image </th>
                  <th> Product Name </th>

                  <th> quantity </th>
                  <th> catagory </th>
                  <th> price </th>
                  <th> discount_price </th>
                  <th> Update </th>
                  <th> Delete </th>

                </tr>
              </thead>
              <tbody>


                    @foreach ($products as $item)

                    <tr>
<td>{{$item->id}}
</td>

    <td>
        <img src="{{asset('product/'.$item->image)}}" alt="logo" />
    </td>
<td>
{{$item->title}}
</td>

    <td>
        {{$item->quantity}}
        </td>
        <td>
            {{$item->catagory}}
            </td>
            <td>
                {{$item->price}}
                </td>
                <td>
                    {{$item->discount_price}}
                    </td>
                  <td>
                    <a href="{{route('EditProduct',$item->id)}}" class="btn btn-outline-success">Edit</a>
                  </td>
                  <td>
                    <a href="{{route('DeleteProduct',$item->id)}}" onclick="confirmation(event)" class="btn btn-outline-danger">Delete</a>
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
</div>


@endsection
