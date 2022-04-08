@extends('../backend/layout/top-menu' )

@section('subhead')
    <title>CRUD Data List - Solar Point</title>
@endsection

@section('subcontent')

    <h2 class="intro-y text-lg font-medium mt-10">Data List Layout</h2>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-no-wrap items-center mt-2">
            <a class="button text-white bg-theme-1 shadow-md mr-2" href="{{route('Categorys')}}">Add New Category</a>
            <div class="dropdown relative">
                <button class="dropdown-toggle button px-2 box text-gray-700">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-feather="plus"></i>
                    </span>
                </button>
                <div class="dropdown-box mt-10 absolute w-40 top-0 left-0 z-20">
                    <div class="dropdown-box__content box p-2">
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="printer" class="w-4 h-4 mr-2"></i> Print
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to Excel
                        </a>
                        <a href="" class="flex items-center block p-2 transition duration-300 ease-in-out bg-white hover:bg-gray-200 rounded-md">
                            <i data-feather="file-text" class="w-4 h-4 mr-2"></i> Export to PDF
                        </a>
                    </div>
                </div>
            </div>
            {{-- <div class="hidden md:block mx-auto text-gray-600">Showing 1 to 10 of 150 entries</div> --}}
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-gray-700">
                    <input type="text" class="input w-56 box pr-10 placeholder-theme-13" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-feather="search"></i>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        @if($Category->isEmpty())
                        No Data Found
                        @else
                        <th class="whitespace-no-wrap">ID</th>
                        <th class="whitespace-no-wrap">Category Name</th>
                        <th class="text-center whitespace-no-wrap">Status</th>
                        <th class="text-center whitespace-no-wrap">Slug</th>
                         -->
                       @endif
                    </tr>
                </thead>
                <tbody>

                    @foreach($Category as $item)
                        <tr class="intro-x">
                            <td class="w-40">
                                <div class="flex">
                                {{$item->id}}
                                </div>
                            </td>
                            <td>

                                <div>
                                {{$item->category_name}}
                                </div>
                            </td>
                            <td class="w-40">
                                @if($item->status == 1)
                                <div class="flex items-center justify-center text-theme-9" id="categorystatus" data-id="{{$item->id}}" > <input type="checkbox"  id="categorystatus" data-id="{{$item->id}}"  data-toggle="toggle" data-on="Active" class="categorystatus w-4 h-4 mr-2" checked="checked" /> <div class="text-{{$item->id}}"> Active</div>
                                @else
                                <div class="flex items-center justify-center text-theme-6" id="categorystatus" data-id="{{$item->id}}" > <input type="checkbox"  id="categorystatus"  data-id="{{$item->id}}" data-value="{{$item->status}}" class="categorystatus w-4 h-4 mr-2"/> <div class="text-{{$item->id}}"> InActive </div></div>
                                @endif
                                    </td>
                            <td class="w-40">

                                <div>
                                {{$item->slug}}
                                </div>
                            </td>
                            <td class="table-report__action w-56">
                                 <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="{{route('Edit',$item->id)}}"> <i data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                    <a class="flex items-center text-theme-6" href="{{route('destroys',$item->id)}}" data-toggle="modal" data-target="#delete-confirmation-modal"> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i> Delete </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- END: Data List -->
       
    </div>
  

    <!-- END: Delete Confirmation Modal -->
    <script>
        var chategoryStatus = "{{route('changeajaxx')}}";
    </script>
@endsection
