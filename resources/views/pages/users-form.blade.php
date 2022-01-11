@extends('../layout/' . $layout)

@section('subhead')
    <title>CRUD Form - B One - Users</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Layout</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
        <form method="POST" action="users-list-page/store">

            {{ csrf_field() }}
            <div class="intro-y box p-5">
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Email</label>
                        <input name="email" type="text" class="form-control w-full" placeholder="Input text">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label">Password</label>
                        <input name="password" type="text" class="form-control w-full" placeholder="Input text">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control w-full" placeholder="Input text">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label">Roles</label>
                        <select data-placeholder="" class="tail-select w-full" name="roles">
                            <option value="">Pilih Roles</option>
                            <option value="Marketing">Marketing</option>
                            <option value="Vendor">Vendor</option>
                            <option value="Admin">Admin</option>
                        </select>
                    </div>
                </div>
                
                <div class="text-right mt-5">
                    <a href="users-list-page" type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <input type="submit" class="btn btn-primary w-24" value="Save">
                </div>
            </div>
        </form>
            <!-- END: Form Layout -->
        </div>
    </div>    
@endsection