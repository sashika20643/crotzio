@extends('common.layout.shoplayout')

@section('content')
<div class="container">
<div class="d-flex justify-content-center text-center flex-column">


    <div class="row mt-5">
        <div class="col-12 grid-margin">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">shopping cart</h4>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>

                      <th> Id </th>
                      <th> Image </th>
                      <th> Product Name </th>

                      <th> quantity </th>

                      <th> price </th>
                      <th> total </th>

                      <th> Delete </th>

                    </tr>
                  </thead>
                  <tbody>
@php
    $total=0;
@endphp

                        @foreach ($cart as $item)

                        <tr>
    <td>{{$item->id}}
    </td>

        <td>
            <img src="{{asset('product/'.$item->image)}}" style="max-height: 100px;" alt="logo" />
        </td>
    <td>
    {{$item->product_title}}
    </td>

        <td>
            <div class="d-flex justify-content-center align-items-center">
<a href="{{route('Minqty',$item->id)}}" class="btn btn-warning mr-2" style="max-width:fit-content;max-height:fit-content;">
    -
</a>

            {{$item->quantity}}
            <a href="{{route('Addqty',$item->id)}}" class="btn btn-warning ml-2" style="max-width:fit-content;max-height:fit-content;"                >
                +
            </a>
        </div>
            </td>

                <td>
                    {{$item->price}}
                    </td>
                    <td>
                        {{$item->total}}
                        </td>

                      <td>
                        <a href="{{route('DeleteCart',$item->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-outline-danger">Delete</a>
                      </td>
                    </tr>

                    @php
    $total +=$item->total;
@endphp
                    @endforeach
                    <tr>

                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><h4> Total :</h4></td>
                        <td><h4 style="color:red"> {{$total}}/=</h4> </td>
                        <td><a href="{{route('purchesoption')}}" class="btn btn-success">Purches</a></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection
