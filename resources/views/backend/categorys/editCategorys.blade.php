@extends('../backend/layout/top-menu' )

@section('subhead')
    <title>CRUD Data List - Solar Point</title>

    @endsection

@section('subcontent')
<form method="POST" action="{{route('updates')}}">
  @csrf
  <input type="hidden" name="categories_id" value={{$category->id}}>
<div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">Category Module</h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div>

                    <label>Category Name</label>
                    <input type="text" class="input w-full border mt-2 @error('category_name') is-invalid @enderror" name="category_name" placeholder="category Name" value={{$category->category_name}} >
                </div>

                 <div>              
                      

                </div>
           
                    </div>
                </div>
              
                <div class="grid grid-cols-3 gap-6">
    
                    <div class="form-check form-switch relative" >

    </div>


<div class="relative">
    

   
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