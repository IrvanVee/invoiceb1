<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" />
    <title>{{$quotation->marketing->marketing_name}} : {{$quotation->customer->instance}}</title>
</head>
<body>
<div class="flex-container mt-3" style="width:100%; display:table;">
<div class="flex-item" style="width:50%; text-align: left; display: table-cell">
    <img src="https://files.fm/thumb_show.php?i=w677pagtk" style="width: 60%;" alt="">
    <p><b>Marketing</b></p>
    <hr width="200" style="margin-top: 5px;margin-bottom:5px;float:left;">
    <p><b>{{$quotation->marketing->marketing_name}}</b></p>
    <p>{{$quotation->marketing->address}}</p>
</div>
<div class="flex-item" style=" margin: auto; width:50%; text-align: right; display:table-cell"> 
<h1>Quotation</h1>
<table class="table" style="float:right">
    <tbody>
      <tr>
        <th scope="row" style="text-align:right;">Refrensi</th>
        <td style="padding-right: 100px;"></td>
        <td style="text-align:right;">{{ $quotation->refrensi }}</td>
      </tr>
      <tr>
        <th scope="row" style="text-align:right;">Tanggal</th>
        <td style="padding-right: 100px;"></td>
        <td style="text-align:right;">{{ $quotation->created_at }}</td>
      </tr>
      <tr>
        <th scope="row" style="text-align:right;">Deadline</th>
        <td style="padding-right: 100px;"></td>
        <td style="text-align:right;">{{ $quotation->duedate }}</td>
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
    <p style="text-align: left;margin-left:83px;"><b>{{$quotation->customer->instance}}</b></p>
    <p style="text-align: left;margin-left:83px;">{{$quotation->customer->address}}</p>       
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
            @foreach ($quotation->detailquotation as $detail)
            <tr style="background-color: #f2f2f2;">
                <td class="whitespace-nowrap"><b>{{$detail->product->product_name}}</b>
                {!!$detail->product->deskripsi!!}</td>
                <td class="whitespace-nowrap">Rp. {{number_format($detail->product->price,-2,".",".")}}</td>
                <td class="whitespace-nowrap">{{$detail->quantity}}</td>
                <td class="whitespace-nowrap">Rp. {{number_format($detail->sum_product,-2,".",".")}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <table class="table" style="float:right;margin-top:5%;">
    <tbody>
      <tr>
        <th scope="row" style="text-align:right;">Sub Total</th>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="text-align:right;">{{number_format($detailquotation,-2,".",".")}}</td>
      </tr>
      <tr></tr>
      <tr>
        <th scope="row" style="text-align:right;">Pajak</th>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="text-align:right;">{{$quotation->tax->tax_value}}</td>
      </tr>
      <tr></tr>
      <tr>
        <th scope="row" style="text-align:right;">Diskon</th>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="text-align:right;">{{$quotation->discount->nilai_discount}}</td>
      </tr>
      <tr></tr>
      <tr>
        <th scope="row" style="text-align:right;">Total</th>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="padding-left: 100px;"></td>
        <td style="text-align:right;">Rp. {{number_format($quotation->total,-2,".",".")}}</td>
      </tr>
    </tbody>
  </table>
  
  <div class="" style="margin-top: 25%">
    <p><b>Marketing</b></p>
    <hr width="40%" style="margin-top: 5px;margin-bottom:5px;float:left;">
    <p><b>{{$quotation->marketing->marketing_name}}</b></p>
    <p>{{$quotation->marketing->address}}</p>
  </div>
  <div class="" style="margin-top:-14 %;">
    <p style="text-align: left;margin-left:70%;margin-bottom:20%:"><b>{{ $quotation->created_at }}</b></p>
    <p style="text-align: center;margin-left:60%;"><b>{{$quotation->customer->customer_name}}</b></p>
  </div>
      
</div> 
</body>
</html>