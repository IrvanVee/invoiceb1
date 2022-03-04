@extends('../layout/'.$layout)

@section('subhead')
    <title>Detail Product {{$product->product_name}}</title>
@endsection

@section('subcontent')
<a href="/product-list-page"><button class="btn btn-warning shadow-md mr-2 mt-6">Back</button></a>
    <h2 class="intro-y text-lg font-medium mt-5"> Vendor : {{$product->vendor->vendor_name}}</h2>
    <h3 class="intro-y text-lg font-medium mt-5"> Id  : {{$product->id}}</h3>
    <h2 class="intro-y text-lg font-medium mt-3"> Product Name: {{$product->product_name}}</h2>
    <h3 class="intro-y text-lg font-medium mt-5"> Price  : {{number_format($product->price,-2,".",".")}}</h3>

    <p class="intro-y text-lg font-medium mt-5">Stock : {{$product->stock}}</p>
    <p class="intro-y text-lg font-medium mt-3"> Created At: {{$product->created_at}}</p>
    <p class="intro-y text-lg font-medium mt-3"> Updated At: {{$product->updated_at}}</p>
    <div class="box zoom-in mt-5 mb-5 ml-5 mr-5">
        <div class="tns-outer" id="important-notes-ow"><div class="p-5 tns-item tns-slide-cloned">
                <div class="text-base font-medium truncate">Deskripsi : </div>
                <div class="text-slate-500 text-justify mt-1">{!! $product->deskripsi !!}</div>
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