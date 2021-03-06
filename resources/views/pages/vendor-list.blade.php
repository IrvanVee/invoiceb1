@extends('../layout/' . $layout)

@section('subhead')
<title>CRUD Data List - B One - Vendor</title>
@endsection

@section('subcontent')
@if (session('status'))
        <div class="bg-indigo-900 text-center py-4 lg:px-4"
            style="background-color:rgba(25, 73, 149, 0.5);color:whitesmoke;">
            <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex"
                role="alert">
                <span
                    class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3 animate__animated animate__swing">{{ session('status') }}</span>
                {{-- <span class="font-semibold mr-2 text-left flex-auto">{{ session('status') }}</span> --}}
                {{-- <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg> --}}
            </div>
        </div>
        @endif
<h2 class="intro-y text-lg font-medium mt-10">Data List Layout</h2>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
        <a href="vendor-form-page" class="btn btn-primary shadow-md mr-2">Add New Vendor</a>
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
        <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 Data</div>
        <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
            <div class="w-56 relative text-gray-700 dark:text-gray-300">
                <input type="text" class="form-control w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
            </div>
        </div>
    </div>
    <!-- BEGIN: Data List -->

    <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
        <table class="table table-report mt-2">
            <thead>
                <tr>
                    <th class="whitespace-nowrap">VENDOR NAME</th>
                    <th class="whitespace-nowrap">ADDRESS</th>
                    <th class="text-center whitespace-nowrap">ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vendor as $v)
                <tr class="intro-x">
                    {{-- <td class="w-40">
                                <div class="flex">
                                    <div class="w-10 h-10 image-fit zoom-in">
                                        <img alt="Rubick Tailwind HTML Admin Template" class="tooltip rounded-full" src="{{ asset('dist/images/' . $faker['images'][0]) }}"
                    title="Uploaded at {{ $faker['dates'][0] }}">
    </div>
    <div class="w-10 h-10 image-fit zoom-in -ml-5">
        <img alt="Rubick Tailwind HTML Admin Template" class="tooltip rounded-full"
            src="{{ asset('dist/images/' . $faker['images'][1]) }}" title="Uploaded at {{ $faker['dates'][0] }}">
    </div>
    <div class="w-10 h-10 image-fit zoom-in -ml-5">
        <img alt="Rubick Tailwind HTML Admin Template" class="tooltip rounded-full"
            src="{{ asset('dist/images/' . $faker['images'][2]) }}" title="Uploaded at {{ $faker['dates'][0] }}">
    </div>
</div>
</td> --}}
<td>
    {{-- <a href="" class="font-medium whitespace-nowrap">{{ $T-> }}</a> --}}
    <div class="text-gray-600 text-l font-medium whitespace-nowrap mt-0.5">{{ $v->vendor_name }}</div>
</td>
<td>
    {{-- <a href="" class="font-medium whitespace-nowrap">{{ $T-> }}</a> --}}
    <div class="text-gray-600 text-l font-medium whitespace-nowrap mt-0.5">{{ $v->address }}</div>
</td>
{{-- <td>
                                <a href="" class="font-medium whitespace-nowrap">{{ $faker['products'][0]['name'] }}</a>
</td> --}}
{{-- <td class="text-center">{{ $t->percentage }}</td> --}}
{{-- <td class="w-40">
                                <div class="flex items-center justify-center {{ $faker['true_false'][0] ? 'text-theme-9' : 'text-theme-6' }}">
<i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ $faker['true_false'][0] ? 'Active' : 'Inactive' }}
</div>
</td> --}}
<td class="table-report__action w-56">
    <div class="flex justify-center items-center">
        <a class="flex items-center mr-3" href="vendor-list-page/edit/{{ $v->id }}">
            <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
        </a>
        {{-- <a class="flex items-center text-theme-6" href="vendor-list-page/delete/{{ $v->id }}">
            <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
        </a> --}}
        <form action="/vendor-list-page/delete/{{ $v->id }}" onsubmit="return confirm('are you sure?')" method="post">
        @csrf
        @method("DELETE")
        <button type="submit" class="btn btn-danger text-theme-6 text-decoration-none">Delete</button>
        </form>
    </div>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
<!-- END: Data List -->
<!-- BEGIN: Pagination -->
<div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
    <ul class="pagination">
        <li>
            <a class="pagination__link" href="">
                <i class="w-4 h-4" data-feather="chevrons-left"></i>
            </a>
        </li>
        <li>
            <a class="pagination__link" href="">
                <i class="w-4 h-4" data-feather="chevron-left"></i>
            </a>
        </li>
        <li>
            <a class="pagination__link" href="">...</a>
        </li>
        <li>
            <a class="pagination__link" href="">1</a>
        </li>
        <li>
            <a class="pagination__link pagination__link--active" href="">2</a>
        </li>
        <li>
            <a class="pagination__link" href="">3</a>
        </li>
        <li>
            <a class="pagination__link" href="">...</a>
        </li>
        <li>
            <a class="pagination__link" href="">
                <i class="w-4 h-4" data-feather="chevron-right"></i>
            </a>
        </li>
        <li>
            <a class="pagination__link" href="">
                <i class="w-4 h-4" data-feather="chevrons-right"></i>
            </a>
        </li>
    </ul>
    <select class="w-20 form-select box mt-3 sm:mt-0">
        <option>10</option>
        <option>25</option>
        <option>35</option>
        <option>50</option>
    </select>
</div>
<!-- END: Pagination -->
</div>
<!-- BEGIN: Delete Confirmation Modal -->
<div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">Are you sure?</div>
                    <div class="text-gray-600 mt-2">Do you really want to delete these records? <br>This process cannot
                        be undone.</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-dismiss="modal"
                        class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="button" class="btn btn-danger w-24">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END: Delete Confirmation Modal -->
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
</style>
@endsection
