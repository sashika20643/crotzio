@extends('common.layout.shoplayout')

@section('content')


         <!-- slider section -->
        @include('common.components.slidebar')
         <!-- end slider section -->
      </div>
      <!-- why section -->
      @include('common.components.why')
      <!-- end why section -->

      <!-- arrival section -->
     @include('common.components.arrival')
      <!-- end arrival section -->

      <!-- product section -->
      @include('common.components.product')
      <!-- end product section -->

      <!-- subscribe section -->
      @include('common.components.subscribe')
      <!-- end subscribe section -->
      <!-- client section -->
      @include('common.components.client')

      <!-- end client section -->
      <!-- footer start -->
      @endsection
