@extends('../layout/' . $layout)

@section('subhead')
    <title>CRUD Data List - B One - Quotation</title>
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
    <div class="grid grid-cols-12 gap-6 mt-5 mb-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="/quote-form-page"><button class="btn btn-primary shadow-md mr-2">Add New Quotation</button></a>
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
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2" id="table">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">TANGGAL DIBUAT</th>
                        <th class="whitespace-nowrap">INSTANCE</th>
                        <th class="text-center whitespace-nowrap">No.Referensi</th>
                        <th class="whitespace-nowrap">TOTAL</th>
                        <th class="text-center whitespace-nowrap">DEADLINE</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($quotation as $q)
                        <tr>
                            <td>{{$q->created_at}}</td>
                            <td>{{$q->customer->instance}}</td>
                            <td class="text-center">{{$q->refrensi}}</td>
                            <td>{{number_format($q->total,-2,".",".")}}</td>
                            <td class="text-center">{{$q->duedate}}</td>
                            <td>
                                @role('marketing|admin')
                                {{-- edit show delete --}}
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="/quote-edit/edit/{{ $q->id }}">
                                        <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    </a>
                                    {{-- <a class="flex items-center text-theme-6" href="/quotation-list-page/delete/{{ $q->id }}">
                                        <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </a> --}}
                                    <form action="/quotation-list-page/delete/{{ $q->id }}" onsubmit="return confirm('are you sure')" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger text-theme-6 text-decoration-none">
                                        <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </button>
                                    </form>
                                </div>
                                <div class="flex justify-center items-center">
                                <a class="flex items-center" href="/quote-detail/{{ $q->id }}">
                                    <i data-feather="list" class="w-4 h-4 mr-1"></i> Detail
                                </a>
                                @endrole
                                @role('vendor|admin')
                                <a class="flex items-center" href="/quote-invoice/{{ $q->id }}">
                                    <i data-feather="corner-up-right" class="w-4 h-4 ml-3 mr-1"></i> 
                                    Invoice
                                </a>
                                @endrole
                                </div>
                            </td>
                            @empty
                            <td style="background-color: red;color:white;" colspan="6">Data Kosong</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <style>
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
        table.dataTable thead tr {
        background-color: black;
        color: white;
        }
        </style>
@endsection

@push('datatables')
<script>
$(document).ready(function() {
    $('#table').DataTable();
});
</script>
@endpush