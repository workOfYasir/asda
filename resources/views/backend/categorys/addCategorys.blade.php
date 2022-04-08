@extends('../backend/layout/top-menu' )

@section('subhead')
    <title>CRUD Data List - Solar Point</title>

    @endsection

@section('subcontent')
<form method="POST" action="{{route('stores')}}">
  @csrf
<div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Category Module</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div>
              
<!-- </head> -->
                    <label>Category Name</label>
                    <input type="text" class="input w-full border mt-2 @error('category_name') is-invalid @enderror" name="category_name" placeholder="Category Name">
                    
                @error('category_name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="">{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                <div class="grid grid-cols-3 gap-6 mt-5">
    
    <div class="form-check form-switch relative" >
    <label class="checkbox-inline">
<input type="checkbox" name="status" value="on" id="status" class="form-check-input">
<label class="form-check-label" for="status">Active Status</label> </div>

                </div>
                </div>

                  
                <div class="text-right mt-5">
                <button type="submit" class="button w-24 bg-theme-1 text-white">Save</button>
                </div>
            </div>

            <!-- END: Form Layout -->
        </div>
    </div> 
</form>
@endsection