<!DOCTYPE html>
<html>

<head>
    @include('pembagian_template.css')
</head>

<body>
    @include('pembagian_template.script')

    @include('pembagian_template.header')

    @include('pembagian_template.sidebar')
    <div class="mobile-menu-overlay"></div>

    @yield('content')

    {{-- sweetalert --}}

    @include('sweetalert::alert')

    {{-- sweetalert --}}

</body>

</html>
