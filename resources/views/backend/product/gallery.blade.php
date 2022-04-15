{{-- 

<div class="modal fade" id="gallery-modal-{{  $key }}" role="dialog" style="display: none;">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="login-form-text">Login Form</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          
<div class="grid grid-cols-12 gap-6 mt-5">
    <div class="intro-y col-span-12">
<form action="{{route('storedImage',$item->id)}}" class="dropzone col-12" id="my-awesome-dropzone" >
@csrf</form>
    </div>
</div>
        </div>
    </div>
  </div> --}}

  <div class="modal" id="gallery-modal-{{ $key }}" style="display: none;">
     <div class="modal__content">
        <div class="p-5 text-center">
            <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i>
            <div class="text-3xl mt-5">Are you sure?</div>
            <div class="text-gray-600 mt-2">Do you really want to delete these records? This process cannot be undone.</div>
        </div>
        <div class="px-5 pb-8 text-center">
        </div>
    </div>
</div> 
