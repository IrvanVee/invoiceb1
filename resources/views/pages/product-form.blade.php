@extends('../layout/' . $layout)

@section('subhead')
    <title>CRUD Form - B One - Product</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Layout</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <form method="POST" action="product-list-page/store" >
                {{ csrf_field() }}

            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">Product Name</label>
                    <input type="text" name="product_name" class="form-control w-full" placeholder="Input Product Name" value="{{old('product_name')}}">
                    @error('product_name')
                        <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Vendor</label>
                    <select data-placeholder="Select Vendor" class="tail-select w-full" name="vendor_id" value="{{old('vendor_id')}}">
                    @foreach ($vendors as $vendor)
                        <option value="{{$vendor->id}}">{{$vendor->vendor_name}}</option>
                    @endforeach
                    </select>
                    @error('vendor_id')
                    <span style="color:red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="crud-form-3" class="form-label">Price</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="price" aria-describedby="input-group-1" value="{{old('price')}}">
                    </div>
                    @error('price')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="mt-3">
                    <label for="crud-form-4" class="form-label">Stock</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="stock" aria-describedby="input-group-2" value="{{old('stock')}}">
                        <div class="input-group-text">pcs</div>
                        {{-- <span style="color:red;">{{$message}}</span> --}}
                    </div>
                    @error('stock')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="mt-3">
                    <label>Description</label>
                    <div class="input-group">
                     <textarea class="form-control" id="textarea" name="deskripsi" rows="3" value="{{old('stock')}}"></textarea>
                    </div>
                    @error('deskripsi')
                    <p style="color:red;">{{$message}}</p>
                    @enderror
                </div>
                <div class="text-right mt-5">
                    <a href="product-list-page" type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <input type="submit" class="btn btn-primary w-24" value="Save" >
                </div>
            </div>
        </form>
            <!-- END: Form Layout -->
        </div>
    </div>    
@endsection

@push('tinyscript')
<script>
tinymce.init({
    selector:'#textarea',
    // widht:350,
    width: '100%',
    branding:false,
})
</script>
@endpush