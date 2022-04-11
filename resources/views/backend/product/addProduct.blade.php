@extends('../backend/layout/top-menu' )

@section('subhead')
    <title>CRUD Data List - Solar Point</title>

    @endsection

@section('subcontent')
<form method="POST" action="{{route('stored')}}"  enctype="multipart/form-data">
  @csrf
<div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Product Module</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div>
                <style>
strong {
  font-weight: bold;
  color:red;

}
</style>
<!-- </head> -->
                    <label>Product Name</label>
                    <input type="text" class="input w-full border mt-2 @error('name') is-invalid @enderror" name="name" placeholder="Product Name">

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong class="">{{ $message }}</strong>
                    </span>
                @enderror

                <div class="form-group">
                    <label>Category</label>
                    <select id='myselect' multiple name="category_id[]">
                        @foreach($category as $apple)
                        <option value="{{$apple->id}}">{{$apple['category_name']}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Choose Images</label>
                    <input type="file"  name="images[]" multiple>
                </div>

                {{-- <label>Category</label>
                    <!-- <input type="text" class="input w-full border mt-2 @error('category_id') is-invalid @enderror" name="category_id" placeholder="category_id"> -->
                    <select class="input w-full border mt-2 @error('category_id') is-invalid @enderror" aria-label="Default select example" name="category_id" placeholder="category_id">
                        <option selected>Select Category</option>
                        @foreach($category as $apple)
                        <option value="{{$apple->id}}">{{$apple['category_name']}}</option>
                        <!-- <option value="2">Two</option>
                        <option value="3">Three</option> -->
                        @endforeach
                        </select>
                @error('category_id')
                    <span class="invalid-feedback" role="alert">
                        <strong class="">{{ $message }}</strong>
                    </span>
                @enderror
                </div>

                 <div>
                       <div class="mt-3">
                    <label>Unit</label>
                    <div class="relative mt-2">
                        <input type="text" name="unit" class="input pr-12 w-full border col-span-4 @error('unit') is-invalid @enderror" placeholder="unit">
                        <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">Watt</div>
                        @error('unit')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    </div>
                    </div>

                </div>
                <div class="mt-3">
                    <label>Unit Name</label>
                    <div class="relative mt-2">
                        <input type="text" name="unit_name" class="input pr-12 w-full border col-span-4 @error('unit_name') is-invalid @enderror" placeholder="Unit Name">
                        <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">Watt</div>
                        @error('unit_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    </div>
                </div>
                <div class="mt-3">
                    <label>Unit Price</label>
                    <div class="relative mt-2">
                        <input type="text" name="unit_price" class="input pr-16 w-full border col-span-4 @error('unit_price') is-invalid @enderror" placeholder="Unit Price">
                        <div class="absolute top-0 right-0 rounded-r w-16 h-full flex items-center justify-center bg-gray-100 border text-gray-600">H</div>
                        @error('unit_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    </div>
                </div>


                <div class="mt-3">
                    <label>Quantity</label>
                    <div class="relative mt-2">
                        <input type="text" name="quantity" class="input pr-16 w-full border col-span-4 @error('quantity') is-invalid @enderror" placeholder="Quantity">
                        <div class="absolute top-0 right-0 rounded-r w-16 h-full flex items-center justify-center bg-gray-100 border text-gray-600">H</div>
                        @error('quantity')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    </div>
                </div> --}}


                <div id="dropzone">
                    <form class="dropzone needsclick" id="demo-upload" action="" enctype="multipart/form-data">
                    @csrf
                      <div class="dz-message needsclick">
                        Drop files here or click to upload.<br>
                        <span class="note needsclick">(This is just a demo dropzone. Selected
                        files are <strong>not</strong> actually uploaded.)</span>
                      </div>
                    </form>
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
