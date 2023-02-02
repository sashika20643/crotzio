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
                  <th> User Name </th>
                  <th> Address </th>
                  <th> Telephone Number </th>
                  <th> Email </th>
                  <th > product </th>

                  <th> Total </th>
                  <th> payment status </th>
                  <th> delivery status </th>
                </tr>
              </thead>
              <tbody>


                    @foreach ($orders as $item)

                    <tr>
<td>{{$item->id}}
</td>

<td>
{{$item->u_name}}
</td>
<td>
    {{$item->adress}}
    </td>
    <td>
        {{$item->phone}}
        </td>
        <td>
            {{$item->email}}
            </td>
            <td>
                <table style="border: none">
                    @php
                        $tot=0;
                    @endphp
                @foreach ($productorders as $it )
                @if($it->o_id==$item->id)
              <tr >
<td style="border: none;border-top:none;">
    {{$it->p_id}}
</td>

<td style="border: none;border-top:none;">
    {{$it->product_name}}
</td>

<td style="border: none;border-top:none;">
    <img src="{{asset('product/'.$it->image)}}" alt="logo" />
</td>
<td style="border: none;border-top:none;">
    {{$it->quantity}}
</td>
<td style="border: none;border-top:none;">
    {{$it->price}}
</td>
              </tr>

              @php
              $tot +=$it->price*$it->quantity;
          @endphp
@endif
                @endforeach
            </table>
                </td>

                <td style="color: rgb(133, 185, 29)">
                    {{$tot}}
                    </td>
                  <td>
                    <a href="{{route('completepayment',$item->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-outline-success " >{{$item->paymet_status}}</a>
                  </td>
                  <td>
                    <a href=""  class="btn btn-outline-danger">{{$item->deliver_status}}</a>
                  </td>
                  <td>
                    <a href="{{route('completeorder',$item->id)}}" onclick="return confirm('Are you sure?')" class="btn btn-outline-warning">Complete</a>
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
