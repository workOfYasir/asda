@extends('../backend/layout/main')

@section('head')
    @yield('subhead')
@endsection

@section('content')
    @include('../backend/layout/components/mobile-menu')
        <!-- END: Mobile Menu -->
        <div class="flex">
            <!-- BEGIN: Side Menu -->
            <nav class="side-nav">

                <a href="" class="intro-x flex items-center pl-5 pt-4">
                    {{-- <img alt="Midone Tailwind HTML Admin Template" class="w-20" src="#"> --}}
                    <span class="hidden xl:block text-white text-lg ml-3"> </span>
                </a>
                <div class=" my-6"></div>
                <ul>
                    <li>
                        <a href="{{route('dashboard')}}" class="side-menu {{Request::routeIs('dashboard') ? 'side-menu--active' : ''}}">
                            <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                            <div class="side-menu__title"> Dashboard </div>
                        </a>
                    </li>
                    <!-- ////////// -->
                    <li class=" my-6"></li>
                    <li>
                        <a href="javascript:;" class="side-menu {{(Request::routeIs('Categorys'))||(Request::routeIs('shows')) ? 'side-menu--active side-menu--open' : ''}}">
                            <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                            <div class="side-menu__title"> Category <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                        </a>
                        <ul class=" {{(Request::routeIs('Categorys'))||(Request::routeIs('shows')) ? 'side-menu__sub-open' : ''}}">
                            <li>
                                <a href="{{route('Categorys')}}" class="side-menu {{Request::routeIs('Categorys') ? 'side-menu--active' : ''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Add Category </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('shows')}}" class="side-menu {{Request::routeIs('shows') ? 'side-menu--active' : ''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Show Category </div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <!-- ///////////////// -->
                    <li class=" my-6"></li>
                    <li>
                        <a href="javascript:;" class="side-menu {{(Request::routeIs('add')||Request::routeIs('display')) ? 'side-menu--active side-menu--open' : ''}}">
                            <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                            <div class="side-menu__title"> Product <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="{{(Request::routeIs('add')||Request::routeIs('display')) ? 'side-menu__sub-open' : ''}}">
                            <li>
                                <a href="{{route('add')}}" class="side-menu {{Request::routeIs('add') ? 'side-menu--active' : ''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Add Product </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('display')}}" class="side-menu {{Request::routeIs('display') ? 'side-menu--active' : ''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Show Product </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class=" my-6"></li>
                    <li>
                        <a href="javascript:;" class="side-menu {{(Request::routeIs('addJob')||Request::routeIs('display')) ? 'side-menu--active side-menu--open' : ''}}">
                            <div class="side-menu__icon"> <i data-feather="edit"></i> </div>
                            <div class="side-menu__title"> Carrer <i data-feather="chevron-down" class="side-menu__sub-icon"></i> </div>
                        </a>
                        <ul class="{{(Request::routeIs('addJob')||Request::routeIs('display')) ? 'side-menu__sub-open' : ''}}">
                            <li>
                                <a href="{{route('addJob')}}" class="side-menu {{Request::routeIs('addJob') ? 'side-menu--active' : ''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Add Job </div>
                                </a>
                            </li>
                            <li>
                                <a href="{{route('display')}}" class="side-menu {{Request::routeIs('display') ? 'side-menu--active' : ''}}">
                                    <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                                    <div class="side-menu__title"> Show Product </div>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- END: Side Menu -->
            <!-- END: Side Menu -->
            <!-- BEGIN: Content -->
            <div class="content">
                @include('../backend/layout/components/top-bar')
            @yield('subcontent')
        </div>
        <!-- END: Content -->
    </div>
@endsection
