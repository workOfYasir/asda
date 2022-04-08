@extends('../backend/layout/top-menu' )

@section('subhead')
    <title>Dashboard - SPoint</title>
@endsection

@section('subcontent')
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 xxl:col-span-9 grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">General Report</h2>
                    <a href="" class="ml-auto flex text-theme-1">
                        <i data-feather="refresh-ccw" class="w-4 h-4 mr-3"></i> Reload Data
                    </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="shopping-cart" class="report-box__icon text-theme-10"></i>
                                    <div class="ml-auto">
                                        
                                    </div>
                                </div>
                                @if(isset($Appliance))
                               <a href="{{route('show')}}"> <div class="text-3xl font-bold leading-8 mt-6">{{$Appliance}}</div></a>
                                @endif
                                <div>


                                    <div class="text-base text-gray-600 mt-1">Total Appliances</div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="credit-card" class="report-box__icon text-theme-11"></i>
                                    <div class="ml-auto">
                                       
                                    </div>
                                </div>
                                @if(isset($Category))
                                <a href="{{route('shows')}}"><div class="text-3xl font-bold leading-8 mt-6">{{$Category}}</div></a>
                                @endif
                                <div class="text-base text-gray-600 mt-1">Total Category</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="monitor" class="report-box__icon text-theme-12"></i>
                                    <div class="ml-auto">
                                        
                                    </div>
                                </div>
                                @if(isset($Product))
                                <a href="{{route('display')}}"> <div class="text-3xl font-bold leading-8 mt-6">{{$Product}}</div></a>
                                @endif
                                <div class="text-base text-gray-600 mt-1">Total Products</div>
                            </div>
                        </div>
                    </div>

                    <!--  -->
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="user" class="report-box__icon text-theme-9"></i>
                                    <div class="ml-auto">
                                        
                                    </div>
                                </div>
                                @if(isset($User))
                                <a href="{{route('user')}}"><div class="text-3xl font-bold leading-8 mt-6">{{$User}}</div></a>
                                @endif
                                <div class="text-base text-gray-600 mt-1">Total Users</div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <!-- END: General Report -->
  
    </div>
@endsection
