@extends('../layout/' . $layout)

@section('subhead')
    <title>CRUD Form - B One - Marketing</title>
@endsection

@section('subcontent')
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Form Layout</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-12">
            <!-- BEGIN: Form Layout -->

        <form method="POST" action="/marketing-list-page/update/{{ $marketing->id }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}

            <div class="intro-y box p-5">
                <div>
                    <label for="crud-form-1" class="form-label">Marketing Name</label>
                    <input name="marketing_name" type="text" class="form-control w-full" placeholder="Name Marketing" value=" {{ $marketing->marketing_name }}">
                </div>
                <div>
                    <label class="form-label mt-2">Address</label>
                    <textarea name="address" class="form-control" id="" cols="30" rows="10" placeholder="Input your Address here"></textarea>
                </div>
                {{-- <div class="mt-3">
                    <label>Description</label>
                    <div class="mt-2">
                        <div data-simple-toolbar="true" class="editor">
                            <p>Content of the editor.</p>
                        </div>
                    </div>
                </div> --}}
                <div class="text-right mt-5">
                    <a href="/marketing-list-page" type="button" class="btn btn-outline-secondary w-24 mr-1">Cancel</a>
                    <input type="submit" class="btn btn-primary w-24" value="Save">
                </div>
            </div>
        </form>
            <!-- END: Form Layout -->
        </div>
    </div>    
@endsection