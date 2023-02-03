@extends('common.layout.shoplayout')

@section('content')

<div class="container pt-5 ">
    <h3 class="text-center" >{{$product->title}}</h3>
    <div class="modal-body d-flex">
        <div class="img-box " >
            <img src="{{asset('product/'.$product->image)}}" alt="" style="max-width:400px !important">
         </div>
         <div class="container ml-5 p-5">

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
<section style="background-color: #eee;">
    <div class="container my-5 py-5">
      <div class="row d-flex justify-content-center">
        <div class="col-md-12 col-lg-10 col-xl-8">
          <div class="card">
            <div class="card-body">
                <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                    <div class="d-flex flex-start w-100">
                      <img class="rounded-circle shadow-1-strong mr-3"
                        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="40"
                        height="40" />
                        <form action="{{route('AddComment',$product->id)}}" method="post" style="width:100%">
                            @csrf
                      <div class="form-outline w-100">
                        <textarea name="comment" class="form-control" id="textAreaExample" rows="4"
                          style="background: #fff;"></textarea>

                      </div>
                    </div>
                    <div class="float-end mt-2 pt-1 text-right">
                      <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                    </div>
                </form>
                  </div>
                  @foreach ($comments as $comment )


              <div class="d-flex flex-start align-items-center">
                <img class="rounded-circle shadow-1-strong mr-3"
                  src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar" width="60"
                  height="60" />
                <div>
                  <h6 class="fw-bold text-primary mb-1">{{$comment->username}}</h6>

                </div>
              </div>

              <p class="mt-3 mb-1 pb-2">
                {{$comment->comment}}
              </p>
            @if (Auth::check())
            @if(Auth::user()->id==$comment->u_id)
            <a href="{{route('DeleteComment',$comment->id)}}" type="button" class="btn btn-danger btn-sm">Delete comment</a>
            @endif

            @endif

              @endforeach

            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
      @endsection
