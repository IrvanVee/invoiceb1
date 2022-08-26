@extends('../layout/'.$layout)

@section('subhead')
    <title>Detail Invoice {{$invoice->vendor->vendor_name}}</title>
@endsection

@section('subcontent')
<a href="/invoice-list-page"><button class="btn btn-warning shadow-md mr-2 mt-6">Back</button></a>
<a href="/invoicepdf/{{$invoice->id}}" class="btn btn-danger" target="_blank">Cetak PDF</a>
<h1 class="mt-10" style="font-size:30px;">Quotation Id : {{$invoice->id}}</h1>
    <h2 class="intro-y text-lg font-medium mt-5">Vendor : {{$invoice->vendor->vendor_name}}</h2>
    <h3 class="intro-y text-lg font-medium mt-5">Customer  : {{$invoice->customer->customer_name}}</h3>
    <h3 class="intro-y text-lg font-medium mt-5">Marketing  : {{$invoice->marketing->marketing_name}}</h3>

    <p class="intro-y text-lg font-medium mt-5">No Refrensi : {{$invoice->refrensi}}</p>
    <p class="intro-y text-lg font-medium mt-3">Deadline : {{$invoice->duedate}}</p>
    <p class="intro-y text-lg font-medium mt-3">Diskon : {{$invoice->discount_id}}% </p>
    <p class="intro-y text-lg font-medium mt-3">Tax : {{$invoice->tax_id}}% </p>  
    <p class="intro-y text-lg font-medium mt-3">Pengiriman : Rp. {{number_format($invoice->pengiriman,-2,".",".")}}</p>  
    <div class="overflow-x-auto">
        <table class="table mt-3">
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
                <tr>
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
    <div class="box zoom-in mt-5 mb-5 ml-5 mr-5">
        <div class="tns-outer" id="important-notes-ow"><div class="p-5 tns-item tns-slide-cloned">
                <div class="text-base font-medium truncate">Note : </div>
                <div class="text-slate-500 text-justify mt-1">{!! $invoice->note !!}</div>
            </div>
@endsection

<style>
    table{
        border: 2px solid rgba(25, 73, 149, 0.5);
    }
    tr ,th{
        border: 2px solid rgba(25, 73, 149, 0.5);
    }
    tr ,td{
        border: 2px solid rgba(25, 73, 149, 0.5);
    }
</style>