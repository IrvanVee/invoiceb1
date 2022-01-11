@extends('../layout/' . $layout)

@section('subhead')
    <title>CRUD Form - B One - Tax</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Layout</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
        <form method="POST" action="tax-list-page/store">
            {{ csrf_field() }}

            <div class="intro-y box p-5">
                <div class="intro-y box p-5">
                    <div>
                        <label for="crud-form-1" class="form-label">Name</label>
                        <input name="name" type="text" class="form-control w-full" placeholder="Nama Pajak">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label">Nilai Pajak</label>
                        <input name="tax_value" type="text" class="form-control w-full" placeholder="Nilai Pajak">
                    </div>
                    <div>
                        <label for="crud-form-1" class="form-label">Percentage</label>
                        <select data-placeholder="percentage" class="tail-select w-full" name="percentage">
                            <option value="">Pilih Value</option>
                            <option value="$">Fixed $</option>
                            <option value="%">Percentage %</option>
                        </select>
                    </div>
                </div>
                
                <div class="text-right mt-5">
                    <a href="tax-list-page" type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <input type="submit" class="btn btn-primary w-24" value="Save">
                </div>
            </div>
        </form>
            <!-- END: Form Layout -->
        </div>
    </div>    
@endsection