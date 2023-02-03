<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ config('app.name') }} dashboard</title>
    <!-- plugins:css -->
    @include('Admin.components.stylesheet')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  </head>
  <body>
    @include('sweetalert::alert')

    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('Admin.components.sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
    @include('Admin.components.navbar')

@yield('content')

</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
@include('Admin.components.scripts')
<script>

    function confirmation(ev) {

      ev.preventDefault();

      var urlToRedirect = ev.currentTarget.getAttribute('href');

      console.log(urlToRedirect);

      swal({

          title: "Are you sure to complete this",

          text: "You will not be able to revert this!",

          icon: "warning",

          buttons: true,

          dangerMode: true,

      })

      .then((willCancel) => {

          if (willCancel) {







              window.location.href = urlToRedirect;



          }





      });





  }

</script>
<!-- End custom js for this page -->
</body>
</html>
