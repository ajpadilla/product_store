<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Invoice</title>
    {!! Html::style('assets/css/invoice/style.css') !!}
  </head>
  <body>
    <main>
      <div id="details" class="clearfix">
        <div id="invoice">
          <h1>INVOICE {{ $invoice->id }}</h1>
          <div class="date">Date of Invoice: {{ $invoice->date }}</div>
          <div class="date">Client: {{ $invoice->client->full_name }}</div>
          <div class="date">Address: {{ $invoice->address }}</div>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">#</th>
            <th class="desc">NAME</th>
            <th class="unit">DESCRIPTION</th>
            <th class="desc">QUANTITY</th>
            <th class="unit">PRICE</th>
            <th class="total">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($invoice->orders as $index => $order)
            <tr>
              <td class="no">{{ $index + 1 }}</td>
              <td class="desc">{{ $order->product->name }}</td>
              <td class="unit">{{ $order->product->description }}</td>
              <td class="desc">{{ $order->quantity }}</td>
              <td class="unit">{{ $order->price }}</td>
              <td class="total">{{ $order->amount  }} </td>
            </tr>
          @endforeach
        </tbody>
        <tfoot>
          <tr>
            <td colspan="4"></td>
            <td >TOTAL</td>
            <td>{{ $invoice->total }}</td>
          </tr>
        </tfoot>
      </table>
  </body>
</html>