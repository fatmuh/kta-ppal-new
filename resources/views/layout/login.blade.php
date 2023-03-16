@extends('../layout/base')

@section('body')
    <body class="login">
        @yield('content')

        <!-- BEGIN: JS Assets-->
        <script src="{{ mix('dist/js/app.js') }}"></script>
        <script src="{{ mix('dist/js/additional.js') }}"></script>
        <!-- END: JS Assets-->
        @yield('script')

    </body>
@endsection
