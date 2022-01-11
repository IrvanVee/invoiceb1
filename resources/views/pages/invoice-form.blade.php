@extends('../layout/' . $layout)

@section('subhead')
    <title>CRUD Form - B One - Invoice</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Layout</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">Vendor</label>
                    <select data-placeholder="Vendor" class="tail-select w-full" id="crud-form-2">
                        <option value="">Pilih Vendor</option>
                        <option value="1">vendor 1</option>
                        <option value="2">vendor 2</option>
                    </select>
                </div>
                <div>
                    <label for="crud-form-1" class="form-label mt-3">Customer</label>
                    <select data-placeholder="Vendor" class="tail-select w-full" id="crud-form-2">
                        <option value="">Pilih Pelanggan</option>
                        <option value="1">pelanggan 1</option>
                        <option value="2">pelanggan 2</option>
                    </select>
                </div>
                <div>
                    <label class="form-label mt-2">No. Referensi</label>
                    <input type="number" class="form-control" placeholder="masukkan nomor referensi" aria-describedby="input-group-4"> 
                </div>

                <div>
                    <label class="form-label mt-2">Due Date</label>
                    <input type="date" class="form-control sm">
                </div>
                {{-- <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Marketing</label>
                    <select data-placeholder="Marketing" class="tail-select w-full" id="crud-form-2">
                        <option value="">Pilih Marketing</option>
                        <option value="1">marketing 1</option>
                        <option value="2">marketing 2</option>
                    </select>
                </div> --}}
                <div class="mt-3">
                    <label for="crud-form-2" class="form-label">Produk</label>
                    <select data-placeholder="Select the Product" class="tail-select w-full" id="crud-form-2" multiple>
                        <option value="1" selected>Produk 1</option>
                        <option value="2">Produk 2</option>
                        <option value="3" selected>Produk 3</option>
                        <option value="4">Produk 4</option>
                    </select>
                </div>
                <div class="sm:grid grid-cols-3 mt-3">
                    
                    <select data-placeholder="Discount" class="tail-select w-full" id="crud-discount">
                        <option value="">No Discount</option>
                        <option value="1">10%</option>
                        <option value="2">20%</option>
                    </select>
                    <select data-placeholder="Tax" class="tail-select w-full" id="crud-tax">
                        <option value="">No Tax</option>
                        <option value="1">10%</option>
                        <option value="2">20%</option>
                    </select>
                    <select data-placeholder="Status" class="tail-select w-full" id="crud-status">
                        <option value="1">Draft</option>
                        <option value="2">Dibayar</option>
                        <option value="3">Terlambat</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label class="form-label">Price</label>
                    <div class="m:grid grid-cols-3 gap-2">
                        <div class="input-group sm">
                            <div id="input-group-3" class="input-group-text">Quantity</div>
                            <input type="number" class="form-control" value="unit" aria-describedby="input-group-3">
                        </div>
                        <div class="input-group mt-2 sm:mt-2">
                            <div id="input-group-4" class="input-group-text">Price</div>
                            <input type="number" class="form-control" value="$" aria-describedby="input-group-4">
                        </div>
                        <div class="input-group mt-2 sm:mt-2">
                            <div id="input-group-4" class="input-group-text">Prngiriman</div>
                            <input type="number" class="form-control" value="Ongkir" aria-describedby="input-group-4">
                        </div>
                    </div>
                </div>
                <div class="mt-3 sm-grid grid-cols-3">
                    <label class="mr-6" for="">Discount:</label>
                    <label class="mr-6" for="">Tax:</label>
                    <label class="mr-6" for="">Total:</label>
                </div>
                {{-- <div class="mt-3">
                    <label>Active Status</label>
                    <div class="mt-2">
                        <input type="checkbox" class="form-check-switch">
                    </div>
                </div> --}}
                <div class="mt-3">
                    <label>Note</label>
                    <div class="mt-2">
                        <div data-simple-toolbar="true" class="editor">
                            
                        </div>
                    </div>
                </div>
                <div class="text-right mt-5">
                    <button type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                    <button type="button" class="btn btn-primary w-24">Save</button>
                </div>
            </div>
            <!-- END: Form Layout -->
        </div>
    </div>    
@endsection