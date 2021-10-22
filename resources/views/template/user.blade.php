<!DOCTYPE html>
<html>

<head>
    @include('pembagian_template.css')
</head>

<body>
    <div class="login-page">
        <div class="login-header box-shadow">
            <div class="container">
                <div class="container-fluid d-flex justify-content-between align-items-center">
                    <div class="brand-logo">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('gambar/logo2.png') }}" width="70rem" alt="">
                        </a>
                    </div>
                    <div class="login-menu">
                        <ul>
                            <li><a href="{{ route('login') }}">Masuk</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @yield('user')

    @include('pembagian_template.script')
</body>

</html>
