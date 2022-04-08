@extends('backend/layout/base')

@section('body')
    <body class="app">
      
    @yield('content')
   
        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=['your-google-map-api']&libraries=places"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/ajax.js') }}"></script>
        <script src="{{ asset('js/category-status.js') }}"></script>
        <script src="{{ asset('js/orderStatus.js') }}"></script>
  

    <!-- END: JS Assets-->
    </body>
@endsection
