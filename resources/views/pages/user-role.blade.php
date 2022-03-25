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
    <h2 class="text-lg font-medium mr-auto">User Role</h2>
</div>
<div class="mt-5">
    <h2 class="text-lg font-medium mr-auto">User Name : {{$user->name}}</h2>
    <br>
    <h3 class="text-lg font-medium mr-auto">User Email : {{$user->email}}</h3>
</div>
<div class="intro-y flex items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">Roles</h2>
</div>
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12 lg:col-span-6">
        <!-- BEGIN: Form Layout -->
        @if($user->roles)
        @foreach ($user->roles as $user_role)
            {{-- <span>{{$user_role->name}}</span> --}}
            <form action="{{route('users.roles.remove',[$user->id,$user_role->id])}}" style="display: inline-block;margin-top:10px;margin-bottom:10px;" onsubmit="return confirm('are you sure to remove?')" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">{{$user_role->name}}</button>
            </form>
        @endforeach
    @endif
    <form method="POST" action="/roles/user/roles/{{$user->id}}">
        {{ csrf_field() }}
        {{-- @method('PUT') --}}
        <div class="intro-y box p-5">
            <div class="intro-y box p-5">
                <div>
                    <label>Roles</label>
                    <div class="mt-2">
                        <select data-placeholder="Select your favorite actors" id="role" name="role" class="tom-select form-control w-full">
                            @foreach ($roles as $role)
                                <option value="{{$role->name}}">{{$role->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @error('role')
                    <p style="color: red;">permission tidak boleh kosong</p>
                @enderror
            </div>
            <div class="text-right mt-5">
                <a href="/users-list-page/" type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                <input type="submit" class="btn btn-success w-24" value="Assign">
            </div>
        </div>
    </form>
    </div>
</div>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Permissions</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            @if($user->permissions)
            @foreach ($user->permissions as $user_permission)
                {{-- <span>{{$user_permission->name}}</span> --}}
                <form action="{{route('users.permissions.revoke',[$user->id,$user_permission->id])}}" style="display: inline-block;margin-top:10px;margin-bottom:10px;" onsubmit="return confirm('are you sure to revoke?')" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">{{$user_permission->name}}</button>
                </form>
            @endforeach
        @endif
        <form method="POST" action="/user-list/permissions/{{$user->id}}">
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
                    <a href="/role-list/" type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <input type="submit" class="btn btn-success w-24" value="Assign">
                </div>
            </div>
        </form>
            <!-- END: Form Layout -->
        </div>
    </div>   
@endsection