@extends('common.layout.shoplayout')

@section('content')


@if (Session::has('success'))

<div class="alert alert-success text-center">

    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>

    <p>{{ Session::get('success') }}</p>

</div>

@endif

<section class="inner_page_head">
    <div class="container_fuild">
       <div class="row">
          <div class="col-md-12">
             <div class="full">
                <h3>Product Grid</h3>
             </div>
          </div>
       </div>
    </div>
 </section>
 <section class="product_section layout_padding">
    <div class="container">
       <div class="heading_container heading_center">
          <h2>
             Our <span>products</span>
          </h2>
       </div>
       <div class="row">
    @foreach ($products as $product )


          <div class="col-sm-6 col-md-4 col-lg-3">
             <div class="box">
                <div class="option_container">
                   <div class="options">
                      <a class="option1" data-toggle="modal" data-target="#model{{$product->id}}">
                        Show details
                      </a>
                      <form action="{{route('addtocart',$product->id)}}" method="POST">
                        @csrf
                        <input type="number" name="quantity" id="" min="1" max="{{$product->quantity}}" value="1" hidden="true">
                        <input type="submit" value=" Add to cart"  class="option2">


                      </form>

                   </div>
                </div>
                <div class="img-box">
                   <img src="{{asset('product/'.$product->image)}}" alt="">
                </div>
                <div class="detail-box">
                   <h5>
                    {{$product->title}}

                   </h5>
                   <div>
                    <h6>
                       <span style="color:red;text-decoration:2px line-through;">{{$product->price}}/=</span>
                       <span style="color:green;"> {{$product->discount_price}}/=</span>
                       </h6>

                   </div>

                </div>
             </div>
          </div>




  <!-- Modal -->
  <div class="modal fade" id="model{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle"> {{$product->title}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex">
            <div class="img-box " >
                <img src="{{asset('product/'.$product->image)}}" alt="" style="max-width:200px !important">
             </div>
             <div class="container">

                <p>
                    {{$product->description}}
                </p>
                <h6>Catagory: <span style="color:orange"> {{$product->catagory}} </span></h6>

                <h6>original price: <span style="color: blue"> {{$product->price}}/= </span></h6>
                <h6>Discount price: <span style="color: green"> {{$product->discount_price}}/= </span></h6>

                <form action="{{route('addtocart',$product->id)}}" method="POST">
                    @csrf
                    <input type="number" min="1" max="{{$product->quantity}}" name="quantity" id="" value="1" >
                    <input type="submit" value=" Add to cart"  class="option2">


                  </form>
             </div>

        </div>

      </div>
    </div>
  </div>



          @endforeach




    </div>


 </section>
<div class="container">
    {!!$products->withQueryString()->links('pagination::bootstrap-5')!!}

</div>

@endsection
