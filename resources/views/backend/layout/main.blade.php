@extends('backend/layout/base')

@section('body')
    <body class="app">

    @yield('content')


    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
        <!-- BEGIN: JS Assets-->
        <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link type="text/css" rel="stylesheet" href="http://example.com/image-uploader.min.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
        {{-- <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" /> --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"> </script>

        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=['your-google-map-api']&libraries=places"></script>
        {{-- <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script> --}}
        <script>let storedImage ="{{ route('storedImage') }}";</script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/ajax.js') }}"></script>
        <script src="{{ asset('js/category-status.js') }}"></script>
        <script src="{{ asset('js/orderStatus.js') }}"></script>
        <script src="{{ asset('js/customDropzone.js') }}"></script>

        <link rel="stylesheet" type="text/css" href="{{ asset('css\customDropzone.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js" integrity="sha512-oQq8uth41D+gIH/NJvSJvVB85MFk1eWpMK6glnkg6I7EdMqC1XVkW7RxLheXwmFdG03qScCM7gKS/Cx3FYt7Tg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/basic.css" integrity="sha512-+Vla3mZvC+lQdBu1SKhXLCbzoNCl0hQ8GtCK8+4gOJS/PN9TTn0AO6SxlpX8p+5Zoumf1vXFyMlhpQtVD5+eSw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/basic.min.css" integrity="sha512-MeagJSJBgWB9n+Sggsr/vKMRFJWs+OUphiDV7TJiYu+TNQD9RtVJaPDYP8hA/PAjwRnkdvU+NsTncYTKlltgiw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone-amd-module.js" integrity="sha512-9e9rr82F9BPzG81+6UrwWLFj8ZLf59jnuIA/tIf8dEGoQVu7l5qvr02G/BiAabsFOYrIUTMslVN+iDYuszftVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone-amd-module.min.js" integrity="sha512-U2WE1ktpMTuRBPoCFDzomoIorbOyUv0sP8B+INA3EzNAhehbzED1rOJg6bCqPf/Tuposxb5ja/MAUnC8THSbLQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.css" integrity="sha512-7uSoC3grlnRktCWoO4LjHMjotq8gf9XDFQerPuaph+cqR7JC9XKGdvN+UwZMC14aAaBDItdRj3DcSDs4kMWUgg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.js" integrity="sha512-9e9rr82F9BPzG81+6UrwWLFj8ZLf59jnuIA/tIf8dEGoQVu7l5qvr02G/BiAabsFOYrIUTMslVN+iDYuszftVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css" integrity="sha512-jU/7UFiaW5UBGODEopEqnbIAHOI8fO6T99m7Tsmqs2gkdujByJfkCbbfPSN4Wlqlb9TGnsuC0YgUgWkRBK7B9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

{{-- <script>
    $('#dropzonefrom').submit(function(){
        $('#customDropzone').css('display','block')
    })
</script> --}}
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">



    </body>

@endsection
