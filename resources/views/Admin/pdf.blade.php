<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Document</title>
    <style>
        table {
          border-collapse: collapse;
          width: 100%;
        }

        th, td {
          text-align: left;
          padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
          background-color: #04AA6D;
          color: white;
        }
        </style>
</head>
<body>
<h1  style="border-bottom:2px solid black;text-align:center">Order Details</h1>
<div  style="display:flex;justify-content:space-between;align-items:center">
    <div style="display:inline-block; margin-right:30px;">

    <button style="background-color:white;padding-top:3px;padding-bottom:3px;padding-left:6px;padding-right:6px;border:none;outline:1px solid green;color:green"> Order id:{{$order->id}}</button>

    </div>
<div class="" style="display:inline-block;margin-right:30px;">
    <button style="background-color:white;padding-top:3px;padding-bottom:3px;padding-left:6px;padding-right:6px;border:none;outline:1px solid red;color:red">Payment: {{$order->paymet_status}}</button>
</div>
<div class="" style="display:inline-block;margin-right:30px;">
    <button style="background-color:white;padding-top:3px;padding-bottom:3px;padding-left:6px;padding-right:6px;border:none;outline:1px solid orange;color:orange">delivey: {{$order->deliver_status}}</button>
</div>

</div>
<div class="container">
    <h3 style="text-decoration: underline;">Customer Details</h3>
    <table>
        <tr>
            <td> Customer ID:</td>
            <td> {{$order->u_id}}</td>

        </tr>
        <tr>
            <td>Customer Name:</td>
            <td>{{$order->u_name}}</td>

        </tr>
        <tr>
            <td>Customer Adress:</td>
            <td>{{$order->adress}}</td>

        </tr>
        <tr>
            <td>Customer Phone:</td>
            <td>{{$order->phone}}</td>

        </tr>
        <tr>
            <td>Customer Email:</td>
            <td>{{$order->email}}</td>
        </tr>
        <tr>
            <td>Customer Postal Code:</td>
            <td>{{$order->postal_code}}</td>
        </tr>

    </table>

</div>


<div class="container">
    <h3 style="text-decoration: underline;">Products Details</h3>
    <table>
        <tr>
            <th>ID</th>
            <th> Name</th>

            <th>Quantity</th>
            <th>Price</th>
            <th>total</th>

        </tr>
        @php
        $tot =0;
    @endphp
        @foreach ($productorders as $it )

              <tr >
<td >
    {{$it->p_id}}
</td>

<td >
    {{$it->product_name}}
</td>

<td >
    {{$it->quantity}}
</td>
<td >
    ${{$it->price}}
</td>
<td >
    ${{$it->price*$it->quantity }}
</td>
              </tr>

              @php
              $tot +=$it->price*$it->quantity;
          @endphp

                @endforeach

<tr>
<td></td>
<td></td>
<td></td>
<td><h4>Toatl :</h4></td>
<td ><h4 style="color: red">${{$tot}}</h4></td>

</tr>
    </table>

</div>
</body>
</html>
