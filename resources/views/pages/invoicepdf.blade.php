<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" />
    <title>{{$invoice->vendor->vendor_name}} : {{$invoice->customer->customer_name}}</title>
</head>
<body>
<div class="flex-container mt-3" style="width:100%; display:table;">
<div class="flex-item" style="width:50%; text-align: left; display: table-cell">
    <img src="https://files.fm/thumb_show.php?i=w677pagtk" style="width: 60%;" alt="">
    <p><b>Vendor</b></p>
    <hr width="200" style="margin-top: 5px;margin-bottom:5px;float:left;">
    <p><b>{{$invoice->vendor->vendor_name}}</b></p>          
</div>
<div class="flex-item" style=" margin: auto; width:50%; text-align: right; display:table-cell"> 
<h1>Invoice</h1>
<table class="table" style="float:right">
    <tbody>
      <tr>
        <th scope="row" style="text-align:right;">Refrensi</th>
        <td style="padding-right: 100px;"></td>
        <td style="text-align:right;">{{ $invoice->refrensi }}</td>
      </tr>
      <tr>
        <th scope="row" style="text-align:right;">Tanggal</th>
        <td style="padding-right: 100px;"></td>
        <td style="text-align:right;">{{ $invoice->created_at }}</td>
      </tr>
      <tr>
        <th scope="row" style="text-align:right;">Deadline</th>
        <td style="padding-right: 100px;"></td>
        <td style="text-align:right;">{{ $invoice->duedate }}</td>
      </tr>
      <tr>
        <th scope="row" style="text-align:right;">NPWP</th>
        <td style="padding-right: 100px;"></td>
        <td style="text-align:right;">1234567890</td>
      </tr>
    </tbody>
  </table>
    <p style="text-align: left;margin-left:83px;margin-top:42%;"><b>Customer</b></p>
    <hr width="200" style="margin-top: 5px;margin-bottom:5px;float:right;">
    <p style="text-align: left;margin-left:83px;"><b>{{$invoice->customer->customer_name}}</b></p>       
</div>                    
</div>
<div class="overflow-x-auto">
    <table style="border-collapse: collapse;width:100%;border:1px solid white;">
        <thead style="background-color: black;color:white">
            <tr>
                <th class="whitespace-nowrap">Product Name</th>
                <th class="whitespace-nowrap">Price</th>
                <th class="whitespace-nowrap">quantity</th>
                <th class="whitespace-nowrap">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->detailinvoice as $detail)
            <tr style="background-color: #f2f2f2;">
                <td class="whitespace-nowrap">{{$detail->product->product_name}}</td>
                <td class="whitespace-nowrap">Rp. {{number_format($detail->product->price,-2,".",".")}}</td>
                <td class="whitespace-nowrap">{{$detail->quantity}}</td>
                <td class="whitespace-nowrap">Rp. {{number_format($detail->sum_product,-2,".",".")}}</td>
            </tr>
            @endforeach
            {{-- <td class="whitespace-nowrap text-center" colspan="3">Total Semua : </td>
            <td class="whitespace-nowrap">Rp. {{number_format($detailinvoice,-2,".",".")}}</td> --}}
        </tbody>
        {{-- <tfoot>
            <tr>
                <td colspan="4" style="text-align: center;">Total Yang harus di bayar  <strong>Rp. {{number_format($invoice->total,-2,".",".")}}</strong></td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center;">Dibayar <strong>Rp. @if ($invoice->dibayar == null)
                    <strong>0</strong>
                @else
                <strong>{{number_format($invoice->dibayar,-2,".",".")}}</strong>
                @endif
                </td>
                <td colspan="4" style="text-align: center;">Tunggakan <strong>Rp. @if ($invoice->tunggakan == null)
                    <strong>0</strong>
                @else
                <strong>{{number_format($invoice->tunggakan,-2,".",".")}}</strong>
                @endif
                </td>
            </tr>
        </tfoot> --}}
    </table>
    <table class="table" style="float:right;margin-top:5%;">
    <tbody>
      <tr>
        <th scope="row" style="text-align:right;">Sub Total</th>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="text-align:right;">{{number_format($detailinvoice,-2,".",".")}}</td>
      </tr>
      <tr></tr>
      <tr>
        <th scope="row" style="text-align:right;">Pajak</th>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="text-align:right;">{{$invoice->tax->tax_value}}</td>
      </tr>
      <tr></tr>
      <tr>
        <th scope="row" style="text-align:right;">Diskon</th>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="text-align:right;">{{$invoice->discount->nilai_discount}}</td>
      </tr>
      <tr></tr>
      <tr>
        <th scope="row" style="text-align:right;">Total</th>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="text-align:right;">Rp. {{number_format($invoice->total,-2,".",".")}}</td>
      </tr>
    </tbody>
  </table>
  
  <div class="" style="margin-top: 25%">
    <p><b>Vendor</b></p>
    <hr width="40%" style="margin-top: 5px;margin-bottom:5px;float:left;">
    <p><b>{{$invoice->vendor->vendor_name}}</b></p>
  </div>
  <div class="" style="margin-top:-14 %;">
    <p style="text-align: left;margin-left:70%;margin-bottom:20%:"><b>{{ $invoice->created_at }}</b></p>
    <p style="text-align: center;margin-left:60%;"><b>{{$invoice->customer->customer_name}}</b></p>
  </div>
      
</div> 
</body>
</html>