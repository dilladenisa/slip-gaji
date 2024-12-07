<!DOCTYPE html>
<html lang="en">

<head>
    <title>Slip Gaji - Sesi</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('auth/images/icons/logo_pa.png') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('auth/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body style="background-color: #666666;">

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                    @csrf
                    <span class="login100-form-title p-b-43">
                        Register
                    </span>
                    <div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $item)
                                        <li>{{ $item }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <ul>
                                    <li>
                                        {{ Session::get('success') }}

                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid name is required: kevin">
                        <input class="input100" type="text" name="fullname" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Full Name</span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Valid name is required: kevin">
                        <input class="input100" type="text" name="nip" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">NIP</span>
                    </div>

                    <div class="validate-input custom-select" style="margin-top: 5px;">
                        <select class="input101" name="jabatan" required style="border: none;">
                            <option value="" disabled selected>Select Role</option>
                            <option value="hakim">Hakim</option>
                            <option value="wakilhalim">Wakil Halim</option>
                            <option value="sekertaris">Sekertaris</option>
                            <option value="pranatakomputer">Pranata Komputer</option>
                        </select>
                    </div>
                    

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100 pass" type="password" name="password" required>
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>
                    
                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Register
                        </button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            Account Allready? <a href="{{ route('login') }}" class="text-primary">Login</a>
                        </span>
                    </div>

                </form>

                <div class="login100-more" style="background-image: url('{{ asset('auth/images/bg-01.jpg') }}');">
                </div>
            </div>
        </div>
    </div>





    <!--===============================================================================================-->
    <script src="{{ asset('auth/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('auth/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('auth/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('auth/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('auth/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('auth/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('auth/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('auth/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('auth/js/main.js') }}"></script>


</body>

</html>