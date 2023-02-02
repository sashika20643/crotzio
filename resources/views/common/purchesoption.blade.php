@extends('common.layout.shoplayout')

@section('content')
<div class="containe mt-5">
<div class="row d-flex justify-content-center align-items-center mt-2" >

    <div class="col-md-7 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add Order Details</h4>
          <p class="card-description">  </p>
          <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{route('addorder')}}">
            @csrf
            <div class="form-group">
              <label for="exampleInputUsername1">Name</label>
              <input type="text" class="form-control" id="exampleInputUsername1" value="{{$user->name}}" name="name">
            </div>

            <div class="form-group">
                <label for="exampleInputUsername1">Email</label>
                <input type="text" class="form-control" id="exampleInputUsername1" value="{{$user->email}}" name="email">
              </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Deliver address</label>
                <input type="text" class="form-control" id="exampleInputUsername1" value="{{$user->adress}}" placeholder="Deliver adress" name="adress">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Postal Code</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Postal Code" name="postal_code">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Phone number</label>
                <input type="text" class="form-control" id="exampleInputUsername1" value="{{$user->phone}}" placeholder="Phone number" name="phone_number">
            </div>

            <div class="form-group">
                <h6>Payment Method</h6>
                <div class="form-group">
                    <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault1" value="card" style="fill: yellow">
                    <label class="form-check-label" for="flexRadioDefault1">
                      card payment
                    </label>
                  </div>
                  <div class="form-group">
                    <input class="form-check-input" type="radio" name="payment" value="deliver" id="flexRadioDefault2" checked >
                    <label class="form-check-label" for="flexRadioDefault2">
                     On delivery
                    </label>
                  </div>
              </div>

              <div class=" container text-center mt-4" >

                <h4>Total : <span style="color: red"> {{$total}}</span> </h4>
                <br>
                <button type="submit" class="btn btn-warning"> Place Order</button>
                    </div>
                </div>
          </form>
        </div>
      </div>
    </div>

</div>
@endsection
