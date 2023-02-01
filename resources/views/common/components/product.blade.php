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
                <a href="" class="option1">
                  {{$product->catagory}}
                </a>
                <a href="{{route('addtocart')}}" class="option2">
                Buy Now
                </a>
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


    @endforeach
</div>
       <div class="btn-box">
          <a href="{{route('productpage')}}">
          View All products
          </a>
       </div>
    </div>
 </section>
