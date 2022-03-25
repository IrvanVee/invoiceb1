@extends('../layout/' . $layout)

@section('subhead')
    <title>CRUD Form Permission - B One - Admin</title>
@endsection

@section('subcontent')
@if (session('status'))
<div class="alert alert-success show mb-2">
    {{ session('status') }}
</div>
@endif
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Role</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
        <form method="POST" action="/role-list/update/{{$role->id}}">
            {{ csrf_field() }}
            @method('PUT')
            <div class="intro-y box p-5">
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control w-full" value="{{$role->name}}">
                    </div>
                    @error('name')
                        <p style="color: red;">name tidak boleh kosong</p>
                    @enderror
                </div>
                <div class="text-right mt-5">
                    <a href="role-list" type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <input type="submit" class="btn btn-success w-24" value="Update">
                </div>
            </div>
        </form>
            <!-- END: Form Layout -->
        </div>
    </div>    
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Role Permissions</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            @if($role->permissions)
            @foreach ($role->permissions as $role_permission)
                {{-- <span>{{$role_permission->name}}</span> --}}
                <form action="{{route('roles.permissions.revoke',[$role->id,$role_permission->id])}}" style="display: inline-block;margin-top:10px;margin-bottom:10px;" onsubmit="return confirm('are you sure to revoke?')" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">{{$role_permission->name}}</button>
                </form>
            @endforeach
        @endif
        <form method="POST" action="/role-list/permissions/{{$role->id}}">
            {{ csrf_field() }}
            {{-- @method('PUT') --}}
            <div class="intro-y box p-5">
                <div class="intro-y box p-5">
                    <div>
                        <label>Permission</label>
                        <div class="mt-2">
                            <select data-placeholder="Select your favorite actors" id="permission" name="permission" class="tom-select form-control w-full">
                                @foreach ($permissions as $permission)
                                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @error('permission')
                        <p style="color: red;">permission tidak boleh kosong</p>
                    @enderror
                </div>
                <div class="text-right mt-5">
                    <a href="role-list" type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <input type="submit" class="btn btn-success w-24" value="Assign">
                </div>
            </div>
        </form>
            <!-- END: Form Layout -->
        </div>
    </div>    
@endsection