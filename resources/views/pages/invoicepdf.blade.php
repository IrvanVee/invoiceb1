<?php 
function kode_unik($u = 5){
    return substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789"),10,$u);
}
?>
<title>{{$invoice->vendor->vendor_name}} : {{$invoice->vendor->vendor_name}}</title>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <h1 class="mt-7 intro-y text-lg font-medium" style="font-size:30px;">Kode Invoice : <?php echo kode_unik(); ?>{{$invoice->id}}</h1>
    <h2 class="intro-y text-lg font-medium mt-3">Vendor : {{$invoice->vendor->vendor_name}}</h2>
    <h3 class="intro-y text-lg font-medium mt-3">Customer  : {{$invoice->customer->customer_name}}</h3>

    <p class="intro-y text-lg font-medium mt-3">No Refrensi : {{$invoice->refrensi}}</p>
    <p class="intro-y text-lg font-medium mt-3">Deadline : {{$invoice->duedate}}</p>
    <p class="intro-y text-lg font-medium mt-3">Diskon : {{$invoice->discount->nilai_discount}}% </p>
    <p class="intro-y text-lg font-medium mt-3">Tax : {{$invoice->tax->tax_value}}% </p>  
    <p class="intro-y text-lg font-medium mt-3">Pengiriman : Rp. {{number_format($invoice->pengiriman,-2,".",".")}}</p>  
    <div class="overflow-x-auto">
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">Product Name</th>
                    <th class="whitespace-nowrap">Price</th>
                    <th class="whitespace-nowrap">quantity</th>
                    <th class="whitespace-nowrap">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->detailinvoice as $detail)
                <tr @if($loop->odd) class="bg-info" @endif>
                    <td class="whitespace-nowrap">{{$detail->product->product_name}}</td>
                    <td class="whitespace-nowrap">Rp. {{number_format($detail->product->price,-2,".",".")}}</td>
                    <td class="whitespace-nowrap">{{$detail->quantity}}</td>
                    <td class="whitespace-nowrap">Rp. {{number_format($detail->sum_product,-2,".",".")}}</td>
                </tr>
                @endforeach
                <td class="whitespace-nowrap text-center" colspan="3">Total Semua : </td>
                <td class="whitespace-nowrap">Rp. {{number_format($detailinvoice,-2,".",".")}}</td>
            </tbody>
            <tfoot>
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
            </tfoot>
        </table>
    </div>
    <div class="card">
        <div class="card-header">
            Note :
        </div>
        <div class="card-body">
        <p class="card-text">{!!$invoice->note!!}</p>
        </div>
    </div>

    <div class="flex-container mt-3" style="width:100%; display:table;                    
    padding: 10px;">
<div class="flex-item" style="padding: 20px; width:50%; text-align: left; display: table-cell">
<p>Tertanda :  {{$invoice->customer->customer_name}}</p> 
<br>
<br>
<p>.........</p>               
</div>
<div class="flex-item" style=" margin: auto; padding: 20px; width:50%; text-align: right; display:table-cell"> 
<p>Tertanda :  {{$invoice->vendor->vendor_name}}</p>
<br>
<br>
<p>.........</p>
</div>                    
</div> 
    

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>

<style>
    *{
        font-family: 'Courier New', monospace;
    }
</style>