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
@if($errors->any())
   @foreach ($errors->all() as $error )
   <div class="alert alert-danger">
    <button type="button" class="close" data-dismiss='alert' area-hidden='true'>X</button>
    {{ $error }}
</div>

   @endforeach
@endif


<h2 class="text-center mb-3">
   Update Product
</h2>
<div class="row d-flex justify-content-center">

    <div class="col-md-10 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Add product details</h4>
          <p class="card-description">  </p>
          <form class="forms-sample" enctype="multipart/form-data" method="POST" action="{{route('updateproduct')}}">
            @csrf
            <div class="form-group" style="display: none">
                <label for="exampleInputUsername1">Id</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Productname" value="{{$product->id}}" name="id">
              </div>

            <div class="form-group">
              <label for="exampleInputUsername1">Name</label>
              <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Productname" value="{{$product->title}}" name="title">
            </div>
            <div class="form-group">
                <label for="exampleInputUsername1">Description</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Product description" value="{{$product->description}}" name="description">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1" class="mb-2">Image</label>
                <br>
                <img src="{{asset('product/'.$product->image)}}" alt="{{$product->title}}" class="mt-3 mb-3" style="max-height:150px ;" />

                <input type="file" class="form-control" id="exampleInputUsername1" placeholder="Productname" name="image">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">quantity</label>
                <input type="number" min="1" class="form-control" id="exampleInputUsername1" placeholder="quantity"value="{{$product->quantity}}" name="quantity">
              </div>
              <div class="form-group">
                <label>Catagory</label>
                <select class="js-example-basic-single" name="catagory" style="width:100%">
                 @foreach ($catagories as $cat )
                 <option value="{{$cat->name}}">{{$cat->name}}</option>
                 @endforeach


                </select>
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Price</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="price" value="{{$product->price}}" name="price">
              </div>
              <div class="form-group">
                <label for="exampleInputUsername1">Discount_price</label>
                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="discount_price" value="{{$product->discount_price}}" name="discount_price">
              </div>
              <div class="d-flex justify-content-between">
              <button type="submit" class="btn btn-warning mr-2">Cancel</button>
            <button type="submit" class="btn btn-primary mr-2">Update</button>
        </div>
          </form>
        </div>
      </div>
    </div>
</div>
</div>
</div>
<!-- main-panel ends -->

@endsection
