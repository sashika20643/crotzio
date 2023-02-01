@extends('common.layout.shoplayout')

@section('content')
<div class="containe mt-5">
<div class="row d-flex justify-content-center align-items-center mt-2" >

    <div class="col-md-7 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Order Details</h4>
          <p class="card-description">  </p>
          <form class="forms-sample" enctype="multipart/form-data" method="POST" action="">
            @csrf
            <div class="form-group">
              <label for="exampleInputUsername1">Name</label>
              <input type="text" class="form-control" id="exampleInputUsername1" value="{{$user->name}}" name="title">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Deliver address</label>
                <input type="text" class="form-control" id="exampleInputUsername1" value="{{$user->adress}}" placeholder="Deliver adress" name="adress">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Postal Code</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Postal Code" name="postal_Code">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Phone number</label>
                <input type="text" class="form-control" id="exampleInputUsername1" value="{{$user->phone}}" placeholder="Phone number" name="phone_number">
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class=" container text-center mt-2" >

<h4>Total : <span style="color: red"> {{$total}}</span> </h4>
<button type="submit" class="btn btn-warning mt-2 mb-4"> Card Payment</button>
<br>
<button type="submit" class="btn btn-warning"> Pay On Delivery</button>
    </div>
</div>
</div>
@endsection
