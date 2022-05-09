@extends('../layout/' . $layout)

@section('subhead')
<title>CRUD Form - B One - Quotation</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Form Layout</h2>
</div>
@if (session('status'))
    <div class="alert alert-success show mb-2">
        {{ session('status') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger show mb-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <!-- BEGIN: Form Layout -->
        <form action="qoute-list-page/store" method="POST" class="form">
            @csrf
            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">Marketing</label>
                    <select class="tail-select w-full @error('marketing_id') is-invalid @enderror" id="crud-form-2"
                        name="marketing_id">
                        <option value="">silahkan pilih marketing</option>
                        @foreach($marketings as $marketing)
                        <option value="{{$marketing->id}}"
                            {{old('marketing_id') == $marketing->id ? 'selected' : null}}>{{$marketing->marketing_name}}
                        </option>
                        @endforeach
                    </select>
                    @error('marketing_id')
                    <p class="mb-2" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                <label for="crud-form-1" class="form-label mt-3">Customer</label>
                <div class="input-group">
                    <select data-placeholder="Vendor"
                        class="tail-select w-full @error('customer_id') is-invalid @enderror" id="crud-form-2"
                        name="customer_id">
                        <option value="">silahkan pilih customer</option>
                        @foreach($customers as $customer)
                        <option value="{{$customer->id}}" {{old('customer_id') == $customer->id ? 'selected' : null}}>
                            {{$customer->customer_name}}</option>
                        @endforeach
                    </select>
                    @error('customer_id')
                    <p class="mb-2" style="color: red;">{{$message}}</p>
                    @enderror
                    {{-- <div id="input-group-price" class="input-group-text">.00</div> --}}
                    {{-- <a href="/customers-form-page" class="btn btn-sm btn-primary w-24 mr-1 mb-2">Tambah Customer</a> --}}
                    <div class="text-center"> 
                        <a href="javascript:;" data-toggle="modal" data-target="#medium-modal-size-preview" class="button inline-block bg-theme-1 text-white">Add Customer</a> 
                    </div>
                </div>
                <label class="form-label mt-2">No. Referensi</label>
                <div class="input-group">
                    <input type="number" onkeypress="return hanyaangka(event)"
                        class="form-control @error('refrensi') is-invalid @enderror"
                        placeholder="masukkan nomor referensi" aria-describedby="input-group-4" name="refrensi"
                        value="{{ old('refrensi')}}" id="refrensi">
                    <button class="btn btn-outline-warning" type="button" onclick="random();">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-codesandbox block mx-auto">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="7.5 4.21 12 6.81 16.5 4.21"></polyline>
                            <polyline points="7.5 19.79 7.5 14.6 3 12"></polyline>
                            <polyline points="21 12 16.5 14.6 16.5 19.79"></polyline>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                    </button>
                </div>
                @error('refrensi')
                <p class="mb-2" style="color: red;">{{$message}}</p>
                @enderror
                <div>
                    <label class="form-label mt-2">Due Date</label>
                    <input type="date" class="form-control @error('duedate') is-invalid @enderror" id="duedate"
                        name="duedate" data-single-mode="true" value="{{ old('duedate')}}">
                    @error('duedate')
                    <p class="mb-2" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                <br>
                <div class="overflow-x-auto">
                    <table class="table" id="tableproduct">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">Vendor Name</th>
                                <th class="whitespace-nowrap">Product Name</th>
                                <th class="whitespace-nowrap">Price Product</th>
                                <th class="whitespace-nowrap">Quantity</th>
                                <th class="whitespace-nowrap">Sum Product</th>
                                <th class="whitespace-nowrap">
                                    <button type="button" class="btn btn-primary btn-tambah" id="btn-tambah">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-plus block mx-auto">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="table_body">

                        </tbody>
                        {{-- <tfoot>
                            <tr>
                                <td colspan="4">Total : </td>
                                <td>
                                    <input type="number" class="form-control" id="totalprice" readonly>
                                </td>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>
                <div class="sm:grid grid-cols-2 mt-3">
                    <label for="diskon">Diskon</label>
                    <label for="tax">Tax</label>
                    <div class="input-group">
                        <select data-placeholder="Discount" class="tail-select w-full" id="discount" name="discount_id">
                            @foreach ($discounts as $discount)
                            <option value="{{$discount->id}}">{{$discount->nilai_discount}}</option>
                            @endforeach
                        </select>
                        <label class="input-group-text" for="inputGroupSelect02">%</label>
                    </div>
                    <div class="input-group">
                        <select data-placeholder="Tax" name="tax_id" class="tail-select w-full" id="tax">
                            @foreach ($taxs as $tax)
                            <option value="{{$tax->id}}">{{$tax->tax_value}}</option>
                            @endforeach
                        </select>
                        <label class="input-group-text" for="inputGroupSelect02">%</label>
                    </div>
                    {{-- end div --}}
                </div>
                <div class="mt-3">
                    <label class="form-label">Price</label>
                    <div class="m:grid grid-cols-3 gap-2">
                        {{-- <div class="input-group sm">
                            <div id="input-group-3" class="input-group-text">Quantity</div>
                            <input type="number" class="form-control" id="quantity" aria-describedby="input-group-3">
                        </div> --}}
                        <div class="input-group mt-2 sm:mt-2">
                            <div id="input-group-4" class="input-group-text">Price</div>
                            <input type="number" class="form-control" id="totalprice" readonly>
                        </div>
                        <div class="input-group mt-2 sm:mt-2">
                            <div id="input-group-4" class="input-group-text">Pengiriman</div>
                            <input type="number" name="pengiriman" id="pengiriman" class="form-control" aria-describedby="input-group-4"
                                value="0">
                        </div>
                    </div>
                </div>
                <br>
                <div class="mt-3">
                    <label class="form-label">Discount</label>
                    <div class="m:grid grid-cols-3 gap-2">
                        <div class="input-group sm">
                            <div id="input-group-3" class="input-group-text">Discount</div>
                            <input type="number" class="form-control" readonly id="outputdiscount"
                                aria-describedby="input-group-3">
                        </div>
                        <div class="input-group sm sm:mt-2">
                            <div id="input-group-3" class="input-group-text">Hasil Discount</div>
                            <input type="number" readonly class="form-control" id="hasildiscount"
                                aria-describedby="input-group-3">
                        </div>
                        <br>
                        <label class="form-label">Tax</label>
                        <div class="input-group mt-2 sm:mt-2">
                            <div id="input-group-4" class="input-group-text">Tax</div>
                            <input type="number" class="form-control" readonly id="outputtax"
                                aria-describedby="input-group-4">
                        </div>
                        <div class="input-group sm sm:mt-2">
                            <div id="input-group-3" class="input-group-text">Hasil Tax</div>
                            <input type="number" readonly class="form-control" id="hasiltax"
                                aria-describedby="input-group-3">
                        </div>
                        <br>
                        <div class="input-group mt-2 sm:mt-2">
                            <div id="input-group-4" class="input-group-text">Total</div>
                            <input type="number" class="form-control @error('total') is-invalid @enderror" id="total"
                                name="total" readonly aria-describedby="input-group-4">
                        </div>
                        @error('total')
                        <p class="mb-2" style="color: red;">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-3">
                    <label>Keterangan</label>
                    <div class="mt-2">
                        <textarea class="form-control" id="textarea" name="note" rows="3">
                            {{old('note')}}
                        </textarea>
                        @error('note')
                        <p class="mb-2" style="color: red;">{{$message}}</p>
                        @enderror
                    </div>
                </div>
                <div class="text-right mt-5">
                    {{-- <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button> --}}
                    <a href="quote-list-page" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <button type="submit" class="btn btn-primary w-24">Save</button>
                </div>
        </form>
    </div>
    <!-- END: Form Layout -->
    <div class="modal modal-dialog-centered" id="medium-modal-size-preview">
        <div class="container w-50" style="width: 50%;align-items: center;">
            <div class="modal__content p-10 text-left rounded-0">
                <form method="POST" action="/customers-list-page/store/tambah">
                    {{ csrf_field() }}
    
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Instance</label>
                        <input type="text" name="instance" class="form-control w-full" value="{{old('instance')}}">
                        @error('instance')
                        <div class="bg-red-400 p-2 shadow-sm rounded mt-2" style="color:red;">
                            {{ $message }}
                        </div>
                    @enderror
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label">Customer Name</label>
                        <input name="customer_name" type="text" class="form-control w-full" value="{{old('customer_name')}}">
                        @error('customer_name')
                        <div class="bg-red-400 p-2 shadow-sm rounded mt-2" style="color:red;">
                            {{ $message }}
                        </div> 
                        @enderror
                    </div>
                    <div>
                        <label class="form-label mt-2">Contact</label>
                        <input name="contact" type="text" class="form-control" placeholder="Input Email or Phone Number" aria-describedby="input-group-4" value="{{old('contact')}}"> 
                        @error('contact')
                        <div class="bg-red-400 p-2 shadow-sm rounded mt-2" style="color:red;">
                            {{ $message }}
                        </div> 
                        @enderror
                    </div>
                    <div>
                        <label class="form-label mt-2">Address</label>
                        <textarea name="address" class="form-control" id="" cols="30" rows="10" placeholder="Input your Address here" value="{{old('address')}}"></textarea> 
                        @error('address')
                        <div class="bg-red-400 p-2 shadow-sm rounded mt-2" style="color:red;">
                            {{ $message }}
                        </div> 
                        @enderror
                    </div>
                    <div class="text-right mt-5">
                        <button type="button"  class="btn btn-gray close" data-dismiss="modal" aria-hidden="true">Cancel</button>
                        {{-- <input type="submit" class="btn btn-primary w-24" value="Save"> --}}
                        <button class="btn btn-primary w-24" type="submit">Save</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

{{-- BEGIN:UNTUK TEXT AREA DENGAN MENGGUNAKAN TINYMCE  --}}
@push('tinyscript')
<script>
    tinymce.init({
        selector: '#textarea',
        // widht:350,
        width: '100%',
        branding: false,
    });
</script>
@endpush
{{-- END  --}}

{{-- BEGIN:UNTUK MEMBUAT INPUT OTOMATIS KETIKA DI PILIH TAX DENGAN DISKON --}}
@push('selectedjs')
<script>
    // begin discount
    $(function () {
        $("#discount").change(function () {
            var diskon = $("#discount option:selected").text();
            $("#outputdiscount").val(diskon);
        })
    })
    // end discount

    // begin tax
    $(function () {
        $("#tax").change(function () {
            var taks = $("#tax option:selected").text();
            $("#outputtax").val(taks);
        })
    })
    // end tax

</script>
@endpush
{{-- END --}}

{{-- BEGIN:MEMBUAT DYNAMIC DROPDOWN DENGAN AJAX --}}
@push('ajax')
<script>
    $(document).on("click",".btn-hapus", function () {
        var number = $(this).attr("data-id");
        var sum_totalproduct = $("#sum_product" + number).val();
        var totalprice = $("#totalprice").val();
        var totalprice = parseInt(totalprice) - parseInt(sum_totalproduct);
        $("#totalprice").val(totalprice);
        $(this).parent().parent().remove();
    });
    $(document).on("keyup",".quantity",GetFullPrice);
    $(document).ready(function () {
        GetData();
        var i = 0;
        $(document).on("click", ".btn-tambah", function () {
            var table = $("#table_body");
            table.append(
                `<tr class="item">
                                <td class="whitespace-nowrap">
                                    <select class="form-select vendor_id" aria-label="Default select example"
                                        name="vendor_id[]" id="vendor_id${i}" data-id="${i}">
                                        <option value="0" disabled selected="true">--pilih--</option>
                                        @foreach ($vendors as $vendor)
                                        <option value="{{$vendor->id}}">{{$vendor->vendor_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="whitespace-nowrap">
                                    <select class="form-select product_id" aria-label="Default select example"
                                        id="product_id${i}" name="product_id[]" data-id="${i}">
                                        <option value="" disabled selected="true">pilih produk</option>
                                        {{-- @foreach ($products as $product)
                                            <option value="{{$product->id}}">{{$product->product_name}}</option>
                                        @endforeach --}}
                                    </select>
                                </td>
                                <td class="whitespace-nowrap">
                                    <input type="number" class="form-control price" id="price${i}" data-id="${i}">
                                </td>
                                <td>
                                    <input type="number" class="form-control quantity" name="quantity[]" id="quantity${i}" data-id="${i}">
                                </td>
                                <td class="whitespace-nowrap">
                                    <input type="number" class="form-control sum_product" id="sum_product${i}" name="sum_product[]" readonly data-id="${i}">
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger btn-hapus" id="btn-hapus${i}" data-id="${i}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-minus block mx-auto">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </td>
                            </tr>`
            );
            GetData();
            i++;
        });
    });

    function GetData(){
        $(".vendor_id").on("change", function (e) {
            var number = $(this).attr('data-id');
            var id = $(this).val();
            var seleksi = "#product_id"+number;
            GetProduct(id,seleksi);
        });
        $(".product_id").on("change", function (e) {
            var number = $(this).attr('data-id');
            var id = $(this).val();
            var seleksi = "#price"+number;
            GetPrice(id,seleksi);
        });
    }
    function GetPrice(id,selector){
        $.ajax({
                type: 'get',
                url: '{!!URL::to('findPrice')!!}',
                data: {'id': id},
                dataType: 'json',
                success: function (response) {
                    // console.log("price/harga");
                    // console.log(data);
                    console.log(response.price);

                    $(selector).val(response.data.price);
                },
                error: function () {

                }
            });
    }
    function GetFullPrice(e){
        var id = $(this).val();
        var full_total = 0;
        var number = $(this).attr('data-id');
        var quantity = $("#quantity" + number).val();
        var price = $("#price" + number).val();
        var full_total = quantity * price;
        $("#sum_product" + number).val(full_total);
        var sum_totalproduct = 0;
        var data_ =  $(".sum_product").each(function () {}).length
        if (data_ > 0) {
            $(".sum_product").each(function () {
            var totalprice = $(this).val();
            sum_totalproduct += parseInt($(this).val());
            })
        } else {
            sum_totalproduct = 0;
        }
        $("#totalprice").val(parseInt(sum_totalproduct));
    }
    function GetProduct(id, selector) {
        $.ajax({
            type: 'get',
            url: '{!!URL::to('findProductName')!!}',
            data: {'id': id},
            success: function (response) {
                var html = `<option value = "">Tambah Product</option>`;
                $.each(response.data, function (indexInArray, valueOfElement) { 
                    html += `<option value = "${valueOfElement.id}">${valueOfElement.product_name}</option> `
                });
                $(selector).html(html);
            },
            error: function () {

            }
        });
    }
    function random() {
        // alert("tes")
        document.getElementById("refrensi").value =
            Math.floor(Math.random() * 1000);
    }

    function hanyaangka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
@endpush
@push('count')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#totalprice,#outputdiscount").keyup(function(){
                var totalprice = $("#totalprice").val();
                var outputdiscount = $("#outputdiscount").val();

                var hasildiscount = parseInt(totalprice) * parseInt(outputdiscount) / 100 - parseInt(totalprice);
                $("#hasildiscount").val(Math.abs(hasildiscount));
                // console.log(hasildiscount);

                if (outputdiscount == 0) {
                    $("#hasildiscount").val(0);
                }
            })
            $("#totalprice , #outputtax").keyup(function(){
                var totalprice = $("#totalprice").val();
                var outputtax = $("#outputtax").val();

                var hasiltax = parseInt(totalprice) * parseInt(outputtax) / 100 - parseInt(totalprice);
                $("#hasiltax").val(Math.abs(hasiltax));
                if (outputtax == 0) {
                    $("#hasiltax").val(0);
                }
            })
            $("#totalprice , #hasildiscount , #hasiltax").keyup(function(){
                var totalprice = $("#totalprice").val();
                var hasildiscount = $("#hasildiscount").val();
                var hasiltax = $("#hasiltax").val();
                var pengiriman = $("#pengiriman").val();

                var total = parseInt(totalprice) - parseInt(hasildiscount) + parseInt(hasiltax) + parseInt(pengiriman);
                $("#total").val(Math.abs(total));
            })
        });
    </script>
@endpush
{{-- END --}}
