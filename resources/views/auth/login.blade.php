<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Datetimepicker CSS -->
    <link href="{{ asset('css/jquery.datetimepicker.min.css')}}" type="text/css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css')}}" type="text/css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{ asset('css/responsive.css')}}" type="text/css" rel="stylesheet">

    <!-- Font CSS -->
    <link href="{{ asset('css/gogle_sans_font.css')}}" type="text/css" rel="stylesheet">

    <!--  For icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- Page Title -->
    <title></title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Require Javascript End -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
          integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.datetimepicker.full.js')}}"></script>
</head>

<body id="page_sign_in">
<div class="container mx-auto my-auto px-0">
    <form method="POST" action="{{ route('login.web') }}" id="loginForm" enctype="multipart/form-data">
        @csrf
        <div class="col-10 mx-auto pt-5 px-4 pt-1">
            <div class="logo_box mx-auto text-center">
                <img src="{{ asset('images/logo.png')}}" class="img-fluid">
            </div>
            <h2 class="text-white">Login to your Account</h2>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" class="form-control" placeholder="Enter Email" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input id="password" type="password" placeholder="Enter Password" class="form-control" name="password" required autocomplete="new-password">
                <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password mr-2"></span>
            </div>
            <div class="form-group">
                @if($admins==0)
                    <a class="nav-link" href="{{route('register')}}"><i class="zmdi zmdi-account-add"></i> Sign Up</a>
                @endif
            </div>
            <div class="form-group">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                       href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function () {
        $(".toggle-password").click(function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            const input = $($(this).attr("toggle"));
            if (input.attr("type") === "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    });
    document.getElementById('loginForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the default form submission
        // Make a POST request to your Laravel route
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                         }
        });
        $.ajax({
            type: 'POST',
            url: '{{ route('login') }}',
            data: $('#loginForm').serialize(),
            dataType: 'json',
            success: function (data) {
                if (data.status==="success") {
                    window.location = data.redirect;
                }
                else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: data.message,
                        showConfirmButton: false,
                        timer: 3000,
                        didOpen: () => {
                            Swal.showLoading();
                        }
                    });
                }
            },
            error: function (xhr, status, error) {
                console.log(xhr)
                console.log(status)
                console.log(error)
            }
        })
    });

</script>
<!-- Require Javascript Start -->


</body>

</html>
