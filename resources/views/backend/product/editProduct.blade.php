@extends('../backend/layout/top-menu' )

@section('subhead')
    <title>CRUD Data List - Solar Point</title>

    @endsection

@section('subcontent')
<form method="POST" action="{{route('updating')}}">
  @csrf
  <input type="hidden" name="products_id" value={{$product->id}}>
<div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Product Module</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div>

                    <label>Product Name</label>
                    <input type="text" class="input w-full border mt-2 @error('name') is-invalid @enderror" name="name" placeholder="Product Name" value={{$product->name}} >
                </div>

                 <div>              
                       <div class="mt-3">
                    <label>Unit</label>
                    <div class="relative mt-2">
                        <input type="text" name="unit" class="input pr-12 w-full border col-span-4 @error('unit') is-invalid @enderror" placeholder="unit" value={{$product->unit}}>
                        <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">Watt</div>
                 
                    </div>
                    </div>

                </div>
                <div class="mt-3">
                    <label>Unit Name</label>
                    <div class="relative mt-2">
                        <input type="text" name="unit_name" class="input pr-12 w-full border col-span-4 @error('unit_name') is-invalid @enderror" placeholder="unit name" value={{$product->unit_name}}>
                        <div class="absolute top-0 right-0 rounded-r w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600">Watt</div>
                  
                    </div>
                </div>
                <div class="mt-3">
                    <label>Unit Price</label>
                    <div class="relative mt-2">
                        <input type="text" name="unit_price" class="input pr-16 w-full border col-span-4 @error('unit_price') is-invalid @enderror" placeholder="unit price" value={{$product->unit_price}}>
                        <div class="absolute top-0 right-0 rounded-r w-16 h-full flex items-center justify-center bg-gray-100 border text-gray-600">H</div>
                 
                    </div>
                </div>
                <div class="mt-3">
                    <label>Quantity</label>
                    <div class="relative mt-2">
                        <input type="text" name="quantity" class="input pr-16 w-full border col-span-4 @error('quantity') is-invalid @enderror" placeholder="quantity" value={{$product->quantity}}>
                        <div class="absolute top-0 right-0 rounded-r w-16 h-full flex items-center justify-center bg-gray-100 border text-gray-600">H</div>
                 
                    </div>
                </div>
               
                </div>
              
                <div class="grid grid-cols-3 gap-6">
    
                    <div class="form-check form-switch relative" >
                    <!-- <label class="checkbox-inline">
      <input type="checkbox" name="status" value="" id="status" class="form-check-input">
      <label class="form-check-label" for="status">Active Status</label>  -->
    </div>


<div class="form-check form-switch">
  <!-- <input class="" type="checkbox" id="flexSwitchCheckDefault">
  <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label> -->
</div>
<div class="relative">
    

    <!-- <label class="checkbox-inline">
      <input type="checkbox" name="checkbox" value="">Create And Stay on the Same Page
    </label> -->
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