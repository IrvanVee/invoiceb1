@extends('../layout/' . $layout)

@section('subhead')
    <title>CRUD Data List - B One - Permission</title>
@endsection

@section('subcontent')
    <h2 class="intro-y text-lg font-medium mt-10">Data List Layout</h2>
    @if (session('status'))
    <div class="alert alert-success show mb-2">
        {{ session('status') }}
        </div>
    @endif
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="/permission-form/" class="btn btn-primary shadow-md mr-2">Add New Permission</a>
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
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">NO</th>
                        <th class="whitespace-nowrap">PERMISSION NAME</th>
                        {{-- <th class="text-center whitespace-nowrap">ROLES</th> --}}
                        {{-- <th class="text-center whitespace-nowrap">STATUS</th> --}}
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach (array_slice($fakers, 0,2) as $faker)   --}}
                    @forelse ($permissions as $permission)
                    <tr class="intro-x">
                        <td>
                            {{-- <a href="" class="font-medium whitespace-nowrap">{{ $faker['products'][0]['name'] }}</a> --}}
                            <div class="text-gray-600 text-l whitespace-nowrap font-medium mt-0.5">{{ $loop->iteration }}</div>
                        </td>
                        <td>
                            <a href="" class="font-medium whitespace-nowrap">{{ $permission->name }}</a>
                        </td>
                        {{-- <td class="text-center">{{ $u->roles }}</td> --}}
                        {{-- <td class="w-40">
                            <div class="flex items-center justify-center {{ $faker['true_false'][0] ? 'text-theme-9' : 'text-theme-6' }}">
                                <i data-feather="check-square" class="w-4 h-4 mr-2"></i> {{ $faker['true_false'][0] ? 'Active' : 'Inactive' }}
                            </div>
                        </td> --}}
                        <td class="table-report__action w-56">
                            <div class="flex justify-center items-center">
                                <a class="flex items-center mr-3" href="/permission-edit/edit/{{ $permission->id }}">
                                    <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit
                                </a>
                                {{-- <a class="flex items-center text-theme-6" href="users-list-page/delete/{{ $u->id }}">
                                    <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                </a> --}}
                                <form action="/permission-delete/delete/{{ $permission->id }}" onsubmit="return confirm('are you sure')" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger text-theme-6 text-decoration-none">
                                        <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <td style="color: red;text-align:center;" colspan="3">tidak ada hak akses</td>
                    @endforelse
                    {{-- @endforeach --}}
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
            {{-- <select class="w-20 form-select box mt-3 sm:mt-0">
                <option>10</option>
                <option>25</option>
                <option>35</option>
                <option>50</option>
            </select> --}}
        </div>
        <!-- END: Pagination -->
    </div>
    <!-- BEGIN: Delete Confirmation Modal -->
    {{-- <div id="delete-confirmation-modal" class="modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="p-5 text-center">
                        <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
                        <div class="text-3xl mt-5">Are you sure?</div>
                        <div class="text-gray-600 mt-2">Do you really want to delete these records? <br>This process cannot be undone.</div>
                    </div>
                    <div class="px-5 pb-8 text-center">
                        <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                        <button type="button" class="btn btn-danger w-24">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
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