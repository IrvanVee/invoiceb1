@extends('../layout/' . $layout)

@section('subhead')
<title>CRUD Form - B One - Quotation</title>
@endsection

@section('subcontent')
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Form Layout</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-12">
        <!-- BEGIN: Form Layout -->
        <form action="invoice-list-page/store" method="POST" class="form" enctype="multipart/form-data">
            @csrf
            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">Vendor</label>
                    <select class="tail-select w-full @error('vendor_id') is-invalid @enderror" id="crud-form-2"
                        name="vendor_id">
                        <option value="">silahkan pilih vendor</option>
                        @foreach($vendors as $vendor)
                        <option value="{{$vendor->id}}"
                            {{old('vendor_id') == $vendor->id ? 'selected' : null}}>
                            {{$vendor->vendor_name}}
                        </option>
                        @endforeach
                    </select>
                    @error('vendor_id')
                    <p class="mb-2" style="color: red;">{{$message}}</p>
                    @enderror
                </div>
                <div>
                    <label for="crud-form-1" class="form-label mt-3">Customer</label>
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
                </div>
                <div>
                    <label for="crud-form-1" class="form-label mt-3">Marketing</label>
                    <select data-placeholder="Vendor"
                        class="tail-select w-full @error('marketing_id') is-invalid @enderror" id="crud-form-2"
                        name="marketing_id">
                        <option value="">silahkan pilih marketing</option>
                        @foreach($marketings as $marketing)
                        <option value="{{$marketing->id}}" {{old('marketing_id') == $marketing->id ? 'selected' : null}}>
                            {{$marketing->marketing_name}}</option>
                        @endforeach
                    </select>
                    @error('customer_id')
                    <p class="mb-2" style="color: red;">{{$message}}</p>
                    @enderror
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
                                {{-- <th class="whitespace-nowrap">Vendor Name</th> --}}
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
                        {{-- <select data-placeholder="Discount" class="tail-select w-full @error('discount_id') is-invalid @enderror" id="discount" name="discount_id">
                            <option value="">Silahkan Pilih Discount</option>
                            @foreach ($discounts as $discount)
                            <option value="{{$discount->id}}" {{old('discount_id') == $discount->id ? 'selected' : null}}>{{$discount->nilai_discount}}</option>
                            @endforeach
                        </select> --}}
                        <input type="number" class="form-control" value="0" id="discount" placeholder="silahkan isi discount">
                        <label class="input-group-text" for="inputGroupSelect02">%</label>
                    </div>
                    <div class="input-group">
                        {{-- <select data-placeholder="Tax" name="tax_id" class="tail-select w-full" id="tax">
                            <option value="">Silahkan Pilih Tax</option>
                            @foreach ($taxs as $tax)
                            <option value="{{$tax->id}}" {{old('tax_id') == $tax->id ? 'selected' : null}}>{{$tax->tax_value}}</option>
                            @endforeach
                        </select> --}}
                        <input type="number" class="form-control" id="tax" value="0" placeholder="silahkan isi tax" placeholder="silahkan isi tax">
                        <label class="input-group-text" for="inputGroupSelect02">%</label>
                    </div>
                    @error('discount_id')
                    <p class="mb-2" style="color: red;">{{$message}}</p>
                    @enderror
                    @error('tax_id')
                    <p class="mb-2" style="color: red;">{{$message}}</p>
                    @enderror
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
                            <button type="button" class="btn btn-primary" id="totalall">totalkan</button>
                        </div>
                        <div class="input-group mt-2 sm:mt-2">
                            <div id="input-group-4" class="input-group-text">Pengiriman</div>
                            <input type="number" name="pengiriman" id="pengiriman" class="form-control" value="0" aria-describedby="input-group-4"
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
                            <input type="number" class="form-control @error('discount_id') is-invalid @enderror" name="discount_id" readonly id="outputdiscount" value="0"
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
                            <input type="number" class="form-control @error('tax_id') is-invalid @enderror" readonly id="outputtax"
                                aria-describedby="input-group-4" name="tax_id" value="0">
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
                    <div class="mt-3">
                        <label for="regular-form-2" class="form-label">Status</label>
                        <select class="form-select mt-2 sm:mr-2" name="status" id="status" aria-label="Default select example">
                            <option value="" selected disabled>Pilih Status</option>
                            <option>Pending</option>
                            <option>Dibayar</option>
                            <option>Terlambat</option>
                            <option>Dibatalkan</option>
                        </select>
                    </div>
                </div>
                <div class="mt-3">
                    <label>Tanda Tangan</label>
                    <input type="file" class="form-control" id="ttd" name="ttd">
                </div>
                <div class="mt-3">
                    <label>Note</label>
                    <div class="mt-2">
                        <textarea class="form-control" id="textarea" name="note" rows="3">
                            {{old('note')}}
                        </textarea>
                        {{-- @error('note')
                        <p class="mb-2" style="color: red;">{{$message}}</p>
                        @enderror --}}
                    </div>
                </div>
                <div class="text-right mt-5">
                    {{-- <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button> --}}
                    <a href="invoice-list-page" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <button type="submit" class="btn btn-primary w-24">Save</button>
                </div>
        </form>
    </div>
    <!-- END: Form Layout -->
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
        $("#discount").keyup(function () {
            // var diskon = $("#discount").text();
            // $("#outputdiscount").val(diskon);
            var diskon = $("#discount").val();
            if (diskon == 0) {
                $("#outputdiscount").val(0)
            } else {
                $("#outputdiscount").val(diskon)
            }
            // console.log(diskon)
        })
    })
    // end discount

    // begin tax
    $(function () {
        $("#tax").keyup(function () {
            var taks = $("#tax").val();
            if (taks == 0) {
                $("#outputtax").val(0);
            } else {
                $("#outputtax").val(taks);
            }
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
                                    <select class="form-select product_id" aria-label="Default select example"
                                        id="product_id${i}" name="product_id[]" data-id="${i}">
                                        <option value="" disabled selected="true">pilih produk</option>
                                        @foreach ($products as $product)
                                            <option value="{{$product->id}}">{{$product->product_name}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td class="whitespace-nowrap">
                                    <input type="number" class="form-control price" id="price${i}" readonly data-id="${i}">
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
    // function GetProduct(id, selector) {
    //     $.ajax({
    //         type: 'get',
    //         url: '{!!URL::to('findProductName')!!}',
    //         data: {'id': id},
    //         success: function (response) {
    //             var html = `<option value = "">Tambah Product</option>`;
    //             $.each(response.data, function (indexInArray, valueOfElement) { 
    //                 html += `<option value = "${valueOfElement.id}">${valueOfElement.product_name}</option> `
    //             });
    //             $(selector).html(html);
    //         },
    //         error: function () {

    //         }
    //     });
    // }
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
            $("#totalall").click(function(){
                // pehitungan antara discount dan price
                var totalprice = $("#totalprice").val();
                var outputdiscount = $("#outputdiscount").val();

                var hasildiscount = parseInt(totalprice) * parseInt(outputdiscount) / 100 - parseInt(totalprice);
                $("#hasildiscount").val(Math.abs(hasildiscount));
                // console.log(hasildiscount);

                if (outputdiscount == 0) {
                    $("#hasildiscount").val(0);
                }
                // perhitungan tax dan price
                var outputtax = $("#outputtax").val();

                var hasiltax = parseInt(totalprice) * parseInt(outputtax) / 100 - parseInt(totalprice);
                $("#hasiltax").val(Math.abs(hasiltax));
                if (outputtax == 0) {
                    $("#hasiltax").val(0);
                }
                // menghitung semua total dari hasil perhitungan
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