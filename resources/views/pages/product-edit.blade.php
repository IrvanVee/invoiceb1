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
            <form method="POST" action="/product-list-page/update/{{ $product->id }}" >
                {{ csrf_field() }}
                {{ method_field('PUT') }}
            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">Product Name</label>
                    <input type="text" name="product_name" class="form-control w-full" placeholder="Input Product Name" value="{{ $product->product_name }}">
                </div>
                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Vendor</label>
                    <select data-placeholder="Select Vendor" class="tail-select w-full" name="vendor">
                        <option value="">Select Vendor</option>
                        <option value="1">Vendor 1</option>
                        <option value="2">Vendor 2</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="crud-form-3" class="form-label">Price</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="price" aria-describedby="input-group-1" value="{{ $product->price }}">
                    </div>
                </div>
                <div class="mt-3">
                    <label for="crud-form-4" class="form-label">Stock</label>
                    <div class="input-group">
                        <input type="number" class="form-control" name="stock" aria-describedby="input-group-2" value="{{ $product->stock }}">
                        <div class="input-group-text">pcs</div>
                    </div>
                </div>
                <div class="mt-3">
                    <label>Description</label>
                    <div class="mt-2">
                        <div data-simple-toolbar="true" class="editor">
                        </div>
                    </div>
                </div>
                <div class="text-right mt-5">
                    <a href="/product-list-page" type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <input type="submit" class="btn btn-primary w-24" value="Save" >
                </div>
            </div>
        </form>
            <!-- END: Form Layout -->
        </div>
    </div>    
@endsection