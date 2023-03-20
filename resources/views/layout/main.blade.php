@extends('../layout/base')

@section('body')
    <body class="main">
        @yield('content')

        @include('layout.components.toast')

        <!-- BEGIN: JS Assets-->
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=["your-google-map-api"]&libraries=places"></script>
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <script src="{{ mix('dist/js/additional.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/custom.js') }}"></script>
        <script src="https://kta.ppal.or.id/js/bluebird.js"></script>
        <script src="https://kta.ppal.or.id/js/html2canvas.min.js"></script>
        <script type="module" src="{{ asset('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
        <!-- END: JS Assets-->

        @yield('script')
    </body>
@endsection
