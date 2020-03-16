<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Invoice PDF</title>
</head>
<body style="background-color:white;">
  <div style="width:94%;margin-left:3%;margin-right:3%;">
    <div>
    <div style="background-color:grey;">
      <h3 style="text-align:center;color:white;">Invoice Copy</h3>
    </div>
  </div>
  <div style="">
    <center><h1>XYZ Company LTD.</h1></center></center>
    <div class="">
    <h4 style="float:right;margin-right:80px;">Date : <strong>{{ date('d/m/Y') }}</strong></h4>
  </div>
  <div style="width:50%;">
    <address style="margin-top:120px;">
      <strong>Name : {{ $order->name }}</strong><br>
      <strong>Shop Name : {{ $order->shopName }}</strong><br>
      Address: {{ $order->address }}<br>
      City : {{ $order->city }}<br>
      Phone : {{ $order->phone }}
  </address>
  </div>
  <div style="float:right;margin-top:-80px;">
    <p><strong>Order Date: </strong>{{ $order->order_date }} </p>
    <p><strong>Order Status: </strong><span style="background-color:@if($order->order_status=='pending') red @else green @endif;color:white;padding:2.5px;border-radius:7px;">{{ $order->order_status }}</span></p>
    <p><strong>Order ID: </strong>{{ $order->order_id }}</p>

  </div>

  <div style="margin-top:180px;width:100%;">

    <table width="98%;" style="margin-left:1%;margin-right:%;">
      <thead>
        <tr>
          <th width="10%" style="padding-top: 12px;padding-bottom:12px;text-align: left;">SL.</th>
          <th width="45%" style="padding-top: 12px;padding-bottom:12px;text-align: left;">Item</th>
          <th width="15%" style="padding-top: 12px;padding-bottom:12px;text-align: left;">Quantity</th>
          <th width="15%" style="padding-top: 12px;padding-bottom:12px;text-align: left;">Unit Cost</th>
          <th width="15%" style="padding-top: 12px;padding-bottom:12px;text-align: left;">Total</th>

        </tr>

      </thead>

      <tbody>
        @php
          $sl=1;
        @endphp
        @foreach($contents as $content)
          <tr>
            <td width="10%" style="padding:5px;">{{ $sl++ }}</td>
            <td width="45%" style="padding:5px;">{{ $content->product_name }}</td>
            <td width="15%" style="padding:5px;">{{ $content->quantity }}</td>
            <td width="15%" style="padding:5px;">{{ $content->unitcost }}</td>
            <td width="15%" style="padding:5px;">{{ $content->total }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>


     <div style="float:right;margin-top:40px;">
      <p><b>Sub-total: <i style="color: green;">{{ $order->sub_total }}</i></b></p>
      <p><b>Discount: 0.0%</b></p>
      <p><b>VAT: <i style="color: green;">{{ $order->vat }}</i></b></p>
      <h3><b>Total: <i style="color: green;">{{ $order->total }}</i></b></h3>
    </div>
    <div style="float:left;margin-top:40px;">
      <p><b>Payment By: <i style="color: green;">{{ $order->payment_status }}</i></b></p>
      <p><b>Paid: <i style="color: green;">{{ $order->pay }}</i></b></p>
      <p><b>Due: <i style="color: green;">{{ $order->due }}</i></b></p>
    </div>

  </div>
</body>
</html>
