<!-- BEGIN: Top Bar -->
<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <div class="-intro-x breadcrumb mr-auto hidden sm:flex">
        <a href="" class="">Application</a>
        <i data-feather="chevron-right" class="breadcrumb__icon"></i>
        <a href="" class="breadcrumb--active">
            @if(Request::routeIs('add')||Request::routeIs('display'))
                Products Modules
            @elseif((Request::routeIs('Appliances'))||(Request::routeIs('show')))
                Appliances Module
            @elseif((Request::routeIs('Categorys'))||(Request::routeIs('shows')))
                Categories Modlue
            @elseif(Request::routeIs('make')||(Request::routeIs('indicate')))
                Customers Module
            @endif
        </a>
    </div>
    <!-- END: Breadcrumb -->
   
    <!-- BEGIN: Notifications -->
    <div class="intro-x dropdown relative mr-auto sm:mr-6">
        <div class="dropdown-toggle notification " id="bullet">
            <i data-feather="bell" class="notification__icon"></i>
        </div>
        <div class="notification-content dropdown-box mt-8 absolute top-0 left-0 sm:left-auto sm:right-0 z-20 -ml-10 sm:ml-0">
            <div class="notification-content__box dropdown-box__content box">
                <div class="notification-content__title col-12" >Notifications
                    <div class="notification-content__title" id="notify">
                    </div>
                </div>
            </div>
        </div>
            </div>
       
    
    <!-- END: Notifications -->
 
</div>



<!-- END: Top Bar -->
