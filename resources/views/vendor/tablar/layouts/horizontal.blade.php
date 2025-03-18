@php
    $stickyTopClass = config('tablar.sticky_top_nav_bar') ? 'sticky-top' : '';
    $layoutData['cssClasses'] =  'navbar navbar-expand-md '.$stickyTopClass.' d-print-none';
@endphp
@section('body')
    <body class="d-none">
        <div class="page" id="app">
            <!-- Top Navbar -->
            @include('tablar::partials.navbar.topbar')
            <div class="page-wrapper">
                <!-- Page Content -->
                @hasSection('content')
                    @yield('content')
                @endif
                <!-- Page Error -->
                @include('tablar::error')
                @include('tablar::partials.footer.bottom')
            </div>
        </div>
    </body>
@stop
