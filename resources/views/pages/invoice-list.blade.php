@extends('../layout/' . $layout)

@section('subhead')
    <title>CRUD Data List - B One - Invoice</title>
@endsection

@section('subcontent')
@if (session('status'))
<div class="bg-indigo-900 text-center py-4 lg:px-4" style="background-color:rgba(25, 73, 149, 0.5);color:whitesmoke;">
    <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3 animate__animated animate__swing">{{ session('status') }}</span>
        {{-- <span class="font-semibold mr-2 text-left flex-auto">{{ session('status') }}</span> --}}
        {{-- <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg> --}}
    </div>
</div>
@endif
    <h2 class="intro-y text-lg font-medium mt-10">Data List Layout</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="/invoice-form-page"><button class="btn btn-primary shadow-md mr-2">Add New Invoice</button></a>
            {{-- <a href="javascript:;" data-toggle="modal" data-target="#basic-modal-preview" class="btn btn-success">Add Payment</a> --}}
            {{-- <div class="dropdown">
                <button class="dropdown-toggle btn px-2 box text-gray-700 dark:text-gray-300" aria-expanded="false">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <div class="dropdown-menu__content box dark:bg-dark-1 p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white dark:bg-dark-1 hover:bg-gray-200 dark:hover:bg-dark-2 rounded-md">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF
                        </a>
                    </div>
                </div>
            </div> --}}

        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="tables">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">DIBUAT</th>
                        <th class="whitespace-nowrap">INSTANCE</th>
                        <th class="text-center whitespace-nowrap">No.Referensi</th>
                        <th class="whitespace-nowrap">DIBAYAR</th>
                        <th class="whitespace-nowrap">TOTAL</th>
                        <th class="whitespace-nowrap">TUNGGAKAN</th>
                        <th class="text-center whitespace-nowrap">DEADLINE</th>
                        <th class="text-center whitespace-nowrap">STATUS</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($invoices as $invoice)
                        <tr>
                            <td>{{$invoice->created_at}}</td>
                            <td>{{$invoice->vendor->vendor_name}}</td>
                            <td class="text-center">{{$invoice->refrensi}}</td>
                            <td class="text-center">
                                @if ($invoice->dibayar == null)
                                    {{"-"}}
                                @else
                                    {{number_format($invoice->dibayar,-2,".",".")}}
                                @endif
                            </td>
                            <td class="text-center">{{number_format($invoice->total,-2,".",".")}}</td>
                            <td class="text-center">
                                @if ($invoice->tunggakan == null)
                                {{"-"}}
                            @else
                                {{number_format($invoice->tunggakan,-2,".",".")}}
                            @endif
                            </td>
                            <td class="text-center">{{$invoice->duedate}}</td>
                            <td class="text-center">{{$invoice->status}}</td>
                            <td class="text-center">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="/invoice-edit/edit/{{ $invoice->id }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    <form action="/invoice-list-page/delete/{{ $invoice->id }}" onsubmit="return confirm('are you sure')" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger text-theme-6 text-decoration-none">
                                            <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                        </button>
                                    </form>
                                </div>
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center" href="/invoice-detail/{{ $invoice->id }}">
                                        <i data-feather="list" class="w-4 h-4 mr-1"></i> Detail
                                    </a>
                                    {{-- <button type="button" >Pay</button> --}}
                                    <button type="button" id="edit" value="{{$invoice->id}}">
                                        <a href="javascript:;" data-toggle="modal" data-target="#basic-modal-preview" class="text-theme-9 ml-2">Pay</a>
                                    </button>
                                </div>
                            </td>
                            @empty
                            <td colspan="10" class="text-center" style="background-color:red;color:white;">Invoice Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="modal modal-dialog-centered modal-dialog-scrollable" id="basic-modal-preview">
            <div class="container" style="align-items: center;">
                <div class="modal__content p-10 text-left">
                    <h2 class="intro-y text-lg font-large">Add Payment</h2>
                    <form action="/invoice-payment/" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="id" name="id" class="form-control">
                        <div class="mt-2">
                            <label for="id">Nomor Refrensi</label>
                            <div class="input-group sm:mt-2">
                                <div id="input-group-4" class="input-group-text">No Refrensi</div>
                                <input type="number" class="form-control @error('refrensi') is-invalid @enderror" id="refrensi"
                                name="refrensi" readonly id="refrensi" aria-describedby="input-group-4">
                            </div>
                            @error('refrensi_id')
                            <span style="color:red;">{{$message}}</span>
                            @enderror
                        </div>
                        <label for="total">Total</label>
                        <div class="input-group sm:mt-2">
                            <div id="input-group-4" class="input-group-text">Total</div>
                            <input type="number" class="form-control @error('total') is-invalid @enderror" id="total"
                            name="total" readonly id="total" aria-describedby="input-group-4">
                        </div>
                        <label for="dibayar">Dibayar</label>
                        <div class="input-group sm:mt-2">
                            <div id="input-group-4" class="input-group-text">Dibayar</div>
                            <input type="number" id="dibayar" class="form-control @error('dibayar') is-invalid @enderror" id="dibayar"
                            name="dibayar" aria-describedby="input-group-4">
                        </div>
                        <button type="submit" class="btn btn-success" style="width:100%;margin-top:20px;">Add Payment</button>
                    </form>
                </div>
            </div>
        </div>
    <style>
        table thead tr {
        background-color: black;
        color: white;
        }
        .btn-danger{
            border: none;
            outline: none;
            background: none;
            cursor: pointer;
            /* color: #0000EE; */
            padding: 0;
            text-decoration: none;
            font-family: inherit;
            font-size: inherit;
        }   
        .container{
            background-color: white;
            color: black;
        }
        .modal__content{
            position: absolute;
            background-color: white;
            color: black;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
@endsection

@push('ajax')
<script>
    // alert("bismillah")
    $(document).ready(function () {

        $(document).on("click",'#edit', function () {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "/addpay/"+id,
                success: function (response) {
                    // console.log(response)
                    $("#refrensi").val(response.payment.refrensi)
                    $("#total").val(response.payment.total)
                    $("#dibayar").val(response.payment.dibayar)
                    $("#id").val(response.payment.id)
                }
            });
            // myModal.show();
            // window.$('#basic-modal-preview').modal('show');
        });
    });

</script>
@endpush