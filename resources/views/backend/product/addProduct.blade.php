@extends('../backend/layout/top-menu' )

@section('subhead')
    <title>CRUD Data List - Solar Point</title>

    @endsection

@section('subcontent')
<form method="POST" id="dropzonefrom" action="{{route('stored')}}">

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

                <input type="file" name="file" id="file">

                <!-- Drag and Drop container-->

                <div class="upload-area"  id="uploadfile">

                    <p>Select Or Drop Resume Here</p>

                    <center><img src="{{ asset('images/loader.gif') }}" alt="loader" id="wait" style="display:none;"><small style="display:none;">Resume Parsing Is In Process...</small></center>

                </div>

                <div class="text-right mt-5">
                   <button type="submit" id="submit-all" class="button w-24 bg-theme-1 text-white">Save</button>
                </div>
            </div>

            <!-- END: Form Layout -->
        </div>
    </div>
</form>
{{-- <div class="grid grid-cols-12 gap-6 mt-5" style="display:none" id="customDropzone">
    <div class="intro-y col-span-12">
    <form action="{{route('storedImage')}}" class="dropzone col-12" id="my-awesome-dropzone" >
        @csrf
    </form>
    </div>
</div> --}}
@endsection
