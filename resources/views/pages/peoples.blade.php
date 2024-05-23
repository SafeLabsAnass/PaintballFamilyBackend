<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Datetimepicker CSS -->
<link href="{{ asset('css/jquery.datetimepicker.min.css')}}" type="text/css" rel="stylesheet"><link rel="icon" href="{{ asset('storage/' . \App\Models\Company::all()->first()->logo) }}">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        if({{\Illuminate\Support\Facades\Session::get('tabSuperOpened')}}==='superAdmin'){
            $('#nav_customers_items').removeClass('active');
            $('#nav_super_admin_items').addClass('active');
            $('#customers').removeClass('active');
            $('#super_admin').addClass('active');
        }
        else{
            $('#nav_super_admin_items').removeClass('active');
            $('#nav_customers_items').addClass('active');
            $('#super_admin').removeClass('active');
            $('#customers').addClass('active');
        }
    </script>
    <script type="text/javascript">
        var user_id
        function show(id) {
            user_id = id
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: '/user/show/'+id.toString(),
                dataType: 'json',
                success: function (response) {
                    if(response.data) {
                        document.getElementById('username_edited').value = response?.data[0]?.username
                        document.getElementById('first_name_edited').value = response?.data[0]?.first_name
                        document.getElementById('last_name_edited').value = response?.data[0]?.last_name
                        document.getElementById('phone_edited').value = response?.data[0]?.phone
                        document.getElementById('email_edited').value = response?.data[0]?.email
                        document.getElementById('site_edited').value = response?.data[0]?.site
                        document.getElementById('gender_edited').value = response?.data[0]?.gender
                    }
                },
                error: function(xhr, status, error) {
                        console.log(status);
                    // Handle errors here
                }
            })
        }
        function showSuper(id) {
            user_id = id
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: '/user/show/'+id.toString(),
                dataType: 'json',
                success: function (response) {
                    if(response.data) {
                        document.getElementById('username_edited_1').value = response.data[0].username
                        document.getElementById('first_name_edited_1').value = response.data[0].first_name
                        document.getElementById('last_name_edited_1').value = response.data[0].last_name
                        document.getElementById('phone_edited_1').value = response.data[0].phone
                        document.getElementById('email_edited_1').value = response.data[0].email
                        document.getElementById('site_edited_1').value = response.data[0].site
                        document.getElementById('gender_edited_1').value = response.data[0].gender
                    }
                },
                error: function(xhr, status, error) {
                        console.log(status);
                    // Handle errors here
                }
            })
        }
        let tabOpened
        $(document).ready(function() {
            document.getElementById('editForm').addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission
                // Make a POST request to your Laravel route

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: 'user/edit/' + user_id,
                    data: $('#editForm').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        if (data.status === "success") {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Vous êtes redirigé vers le tableau d\'utilisateur',
                                showConfirmButton: false,
                                timer: 3000,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                                didClose: ()=>{
                                    window.location = data.redirect
                                }
                            });
                        } else {
                            if (data.status) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Les donnees entrants sont similaire avec les anciennes donnees!',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    didOpen: () => {
                                        Swal.showLoading()
                                    },
                                    didClose: ()=>{
                                        window.location = data.redirect
                                    }
                                });
                                // window.location.reload();
                            }
                        }
                    },
                    error: function (data) {
                        console.log(data)

                    }
                })
            });
        });
        // hello
        $(document).ready(function() {
            document.getElementById('editForm1').addEventListener('submit', function (event) {
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/user/edit/' + user_id,
                    data: $('#editForm1').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        if (data.status === "success") {
                            tabOpened = data.tabSuperOpened
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Vous êtes redirigé vers le tableau d\'utilisateur',
                                showConfirmButton: false,
                                timer: 3000,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                                didClose: ()=>{
                                    window.location = data.redirect
                                }
                            });
                        } else {
                            if (data.status) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: 'Les donnees entrants sont similaire avec les anciennes donnees !',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    didOpen: () => {
                                        Swal.showLoading()
                                    },
                                    didClose: ()=>{
                                        window.location = data.redirect
                                    }
                                });
                                // window.location.reload();
                            }
                        }
                    },
                    error: function (data) {
                        console.log(data)

                    }
                })
            });

        });

        $(document).ready(function () {
            $(".toggle-password-i").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
                const input = $($(this).attr("toggle"));
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
            $(".toggle-password-ii").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
                const input = $($(this).attr("toggle"));
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });
        $(document).ready(function () {
            $(".toggle-password-iii").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
                const input = $($(this).attr("toggle"));
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
            $(".toggle-password-iiiᵉ").click(function () {
                $(this).toggleClass("fa-eye fa-eye-slash");
                const input = $($(this).attr("toggle"));
                if (input.attr("type") === "password") {
                    input.attr("type", "text");
                } else {
                    input.attr("type", "password");
                }
            });
        });
        let message = ''

    </script>

</head>

<body id="page_home">
@include('navbar')

<!-- Body Wrapper Start -->
<div class="body_wrapper">
    <!-- Left Sidebar Start -->
    <div class="left_sidebar">
        <!-- Nav Tabs Start -->
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active mt-5" id="nav_customers_items" data-toggle="tab" href="#customers" role="tab"
               aria-controls="nav-home" aria-selected="false">User</a>
            <a class="nav-item nav-link" id="nav_super_admin_items" data-toggle="tab" href="#super_admin" role="tab"
               aria-controls="nav-profile" aria-selected="true">Manager</a>
        </div>
        <!-- Nav Tabs End -->
    </div>
    <!-- Left Sidebar End -->

    <!-- Right Sidebar Start -->
    <div class="right_sidebar">
        <!-- Tab Content Start -->
        <div class="tab-content" id="nav-tabContent">

            <!-- Food Items Tab customers Start -->
            <div class="tab-pane fade show active" id="customers" role="tabpanel" aria-labelledby="nav_customers_items">
                <div class="tab_header">
                    <h1 class="d-flex">
                        <span class="d-block" style="min-width: 161px;">Users</span>
                        <button type="button" class="btn"><a data-toggle="modal" data-target="#add_admin">Add New</a>
                        </button>
                    </h1>
                </div>

                <!-- Order List Start -->
                <div class="order_list">
                    <div class="list_header d-flex">
                        <h2 class="text-center order_num Code people">SNo.</h2>
                        <h2 class="text-left Name">Name</h2>
                        <h2 class="text-left phone">Phone Number</h2>
                        <h2 class="text-left email">Email Address</h2>
                        <h2 class="text-left created">Created</h2>
                        <h2 class="text-right Action people">Action</h2>
                    </div>

                    <ul>
                        @foreach($items[0] as $user)
                            @if($user->hasRole('administrator'))
                                <li class="d-flex">
                                    <h3 class="text-center order_num Code people">{{$user->id}}</h3>
                                    <h3 class="text-left Name">
                                        <strong>{{$user->first_name}} {{$user->last_name}}</strong></h3>
                                    <h3 class="text-left phone">{{$user->phone}}</h3>
                                    <h3 class="text-left email">{{$user->email}}</h3>
                                    <h3 class="text-left text-muted created">{{$user->created_at}}</h3>
                                    <div class="btn_container d-flex mr-0 ml-auto">
                                        <button type="button" class="btn">
                                            <a href="{{url('user/destroy/'.$user->id)}}"><i
                                                    class="zmdi zmdi-delete"></i></a>
                                        </button>
                                        <button class="btn" type="button" id="btn_show" data-toggle="modal"
                                                data-target="#edit_people" onclick="show({{$user->id}})"><i
                                                class="zmdi zmdi-edit mb-5"></i></button>
                                    </div>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                            <div class="modal fade add_category_model add_expenses receipt_model px-0" id="edit_people"
                                 tabindex="-1" role="dialog" aria-labelledby="receipt_modelTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header px-0">
                                            <h2 class="col-10 mx-auto">Edit User</h2>
                                        </div>
                                        <div class="modal-body p-0">

                                            <form id="editForm">
                                                <div class="col-10 mx-auto form_container">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" name="username"
                                                               id="username_edited">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" name="first_name"
                                                               id="first_name_edited">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" name="last_name"
                                                               id="last_name_edited">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input type="text" class="form-control" name="phone"
                                                               id="phone_edited">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email Address</label>
                                                        <input type="email" class="form-control" name="email"
                                                               id="email_edited">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Site</label>
                                                        <select class="form-control"
                                                                style="background: var(--bg-color)! important;"
                                                                name="site" id="site_edited">
                                                            @foreach($items[1] as $site)
                                                                <option>{{$site->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>gender</label>
                                                        <select class="form-control" name="gender" id="gender_edited">
                                                            <option>Male</option>
                                                            <option>Female</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="modal-footer mb-5">
                                                    <div class="row no-gutters w-100">
                                                        <div class="col-6">
                                                            <button type="reset" class="btn Cencel"
                                                                    data-dismiss="modal">Cancel
                                                            </button>
                                                        </div>
                                                        <div class="col-6">
                                                            <button type="submit" class="btn">Edit User</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <!-- Order List End -->

                <!-- Tab Footer start -->
                <!-- Food Items Tab customers End -->

                <!-- Categories Tab waiters Start -->
                <!-- Categories Tab waiters Start -->

                <!-- Categories Tab admins Start -->
                <!-- Categories Tab admins Start -->
            </div>
            <div class="tab-pane fade show" id="super_admin" role="tabpanel" aria-labelledby="nav_super_admin_items">
                <div class="tab_header">
                    <h1 class="d-flex">
                        <span class="d-block" style="min-width: 200px;">Managers</span>
                        <button type="button" class="btn"><a data-toggle="modal" data-target="#add_super_admin">Add
                                New</a></button>
                    </h1>
                    <form class="search_box">
                        <div class="form-group d-flex">
                            <div class="input-group-prepend">
                                <div class="input-group-text"><i class="zmdi zmdi-search"></i></div>
                            </div>
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                    </form>
                </div>

                <!-- Order List Start -->
                <div class="order_list">
                    <div class="list_header d-flex">
                        <h2 class="text-center order_num Code people">SNo.</h2>
                        <h2 class="text-left Name">Name</h2>
                        <h2 class="text-left phone">Phone Number</h2>
                        <h2 class="text-left email">Email Address</h2>
                        <h2 class="text-left created">Created</h2>
                        <h2 class="text-right Action people">Action</h2>
                    </div>

                    <ul>
                        @foreach($items[0] as $user)
                            @if($user->hasRole('superadministrator'))
                        <li class="d-flex">
                            <h3 class="text-center order_num Code people">{{$user->id}}</h3>
                            <h3 class="text-left Name"><strong>{{$user->first_name}} {{$user->last_name}}</strong></h3>
                            <h3 class="text-left phone">{{$user->phone}}</h3>
                            <h3 class="text-left email">{{$user->email}}</h3>
                            <h3 class="text-left text-muted created">{{$user->created_at}}</h3>
                            <div class="btn_container d-flex mr-0 ml-auto">
                                <button type="button" class="btn">
                                    <a href="{{url('user/destroy/'.$user->id)}}" ><i class="zmdi zmdi-delete"></i></a>
                                </button>
                                    <button class="btn" type="button" id="btn_show" data-toggle="modal" data-target="#edit_people_1" onclick="showSuper({{$user->id}})"><i class="zmdi zmdi-edit mb-5"></i></button>
                            </div>
                        </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="modal fade add_category_model add_expenses receipt_model px-0" id="edit_people_1" tabindex="-1" role="dialog" aria-labelledby="receipt_modelTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable" role="document">
                        <div class="modal-content">
                            <div class="modal-header px-0">
                                <h2 class="col-10 mx-auto">Edit User</h2>
                            </div>
                            <div class="modal-body p-0">

                                <form id="editForm1">

                                    <div class="col-10 mx-auto form_container">
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" class="form-control" name="username" id="username_edited_1" >
                                        </div>
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name_edited_1">
                                        </div>
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name_edited_1">
                                        </div>
                                        <div class="form-group">
                                            <label>Phone Number</label>
                                            <input type="text" class="form-control" name="phone" id="phone_edited_1">
                                        </div>
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" class="form-control" name="email" id="email_edited_1">
                                        </div>
                                        <div class="form-group">
                                            <label>Site</label>
                                            <select class="form-control" style="background: var(--bg-color)! important;" name="site" id="site_edited">
                                                @foreach($items[1] as $site)
                                                    <option>{{$site->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>gender</label>
                                            <select class="form-control" name="gender" id="gender_edited">
                                                <option>Male</option>
                                                <option>Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer mb-5">
                                        <div class="row no-gutters w-100">
                                            <div class="col-6"> <button type="reset" class="btn Cencel" data-dismiss="modal">Cancel</button></div>
                                            <div class="col-6">
                                                <button type="submit" class="btn">Edit User</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Order List End -->

                <!-- Tab Footer start -->
            <!-- Food Items Tab customers End -->

            <!-- Categories Tab waiters Start -->
            <!-- Categories Tab waiters Start -->

            <!-- Categories Tab admins Start -->
            <!-- Categories Tab admins Start -->
        </div>
        <!-- Tab Content End -->
    </div>
    <!-- Right Sidebar End -->
</div>
<!-- Body Wrapper End -->

<!-- Add people  Modal Start  -->
    <div class="modal fade add_category_model add_expenses receipt_model px-0" id="add_admin" tabindex="-1"
         role="dialog" aria-labelledby="receipt_modelTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header px-0">
                <h2 class="col-10 mx-auto">Add User</h2>
            </div>
            <div class="modal-body p-0">

                <form id="addForm">
                    <div class="col-10 mx-auto form_container">
                        <div class="form-group">
                            <label>Username</label>
                            <input id="username" type="text"
                                   class="form-control @error('username') is-invalid @enderror" name="username"
                                   value="{{ old('Username') }}" required autocomplete="username" autofocus>
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input id="firstname" type="text"
                                   class="form-control @error('firstname') is-invalid @enderror" name="first_name"
                                   value="{{ old('firstname') }}" required autocomplete="first_name" autofocus>
                            @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input id="lastname" type="text"
                                   class="form-control @error('lastname') is-invalid @enderror" name="last_name"
                                   value="{{ old('Last_name') }}" required autocomplete="last_name" autofocus>
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                   name="phone" value="{{ old('Phone') }}" required autocomplete="phone" autofocus>
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input id="password" type="password" class="form-control" name="password"
                                   required autocomplete="new-password">
                            <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password-i mr-2"></span>
                            <input type="text" class="form-control" name="role" style="display: none;"
                                   value="administrator">
                        </div>
                        <div class="form-group">
                            <label>Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                            <span toggle="#password-confirm"
                                  class="fa fa-fw fa-eye field-icon toggle-password-ii mr-2"></span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Site</label>
                            <select class="form-control" style="background: var(--bg-color)! important;" name="site"
                                    id="site_edited">
                                @foreach($items[1] as $site)
                                    <option>{{$site->name}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group">
                            <label>gender</label>
                            <select class="form-control" name="gender" id="gender">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="row no-gutters w-100 mb-5">
                            <div class="col-6">
                                <button type="reset" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Add User</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    </div>
    <div class="modal fade add_category_model add_expenses receipt_model px-0" id="add_super_admin" tabindex="-1"
         role="dialog" aria-labelledby="receipt_modelTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header px-0">
                    <h2 class="col-10 mx-auto">Add Manager</h2>
                </div>
                <div class="modal-body p-0">

                    <form id="addForm1">
                        <div class="col-10 mx-auto form_container">
                            <div class="form-group">
                                <label>Username</label>
                                <input id="username" type="text"
                                       class="form-control @error('username') is-invalid @enderror" name="username"
                                       value="{{ old('Username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label>First Name</label>
                                <input id="firstname" type="text"
                                       class="form-control @error('firstname') is-invalid @enderror" name="first_name"
                                       value="{{ old('firstname') }}" required autocomplete="first_name" autofocus>
                                @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Last Name</label>
                                <input id="lastname" type="text"
                                       class="form-control @error('lastname') is-invalid @enderror" name="last_name"
                                       value="{{ old('Last_name') }}" required autocomplete="last_name" autofocus>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                                       name="phone" value="{{ old('Phone') }}" required autocomplete="phone" autofocus>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input id="password1" type="password" class="form-control" name="password"
                                       required autocomplete="new-password">
                                <span toggle="#password1" class="fa fa-fw fa-eye field-icon toggle-password-iii mr-2"></span>
                                <input type="text" class="form-control" name="role" style="display: none;"
                                       value="superadministrator">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input id="password-confirm1" type="password" class="form-control"
                                       name="password_confirmation" required autocomplete="new-password">
                                <span toggle="#password-confirm1"
                                      class="fa fa-fw fa-eye field-icon toggle-password-iiiᵉ mr-2"></span>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Site</label>
                                <select class="form-control" style="background: var(--bg-color)! important;" name="site"
                                        id="site_edited">
                                    @foreach($items[1] as $site)
                                        <option>{{$site->name}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group">
                                <label>gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="row no-gutters w-100 mb-5">
                                <div class="col-6">
                                    <button type="reset" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary">Add Manager</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

    <!-- Add people Modal End  -->
<!-- Require Javascript Start -->
{{--<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>--}}
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- Require Javascript End -->
<script src="{{ asset('js/jquery.datetimepicker.full.js')}}"></script>
{{--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
          integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
{{--    <script src="https://code.jquery.com/jquery-3.7.1.js"--}}
{{--            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="--}}
{{--            crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
    <script src="{{ asset('js/jquery.datetimepicker.full.js')}}"></script>
    <script>
        $(document).ready(function() {
            document.getElementById('addForm').addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission
                // Make a POST request to your Laravel route

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{route('user.store')}}',
                    data: $('#addForm').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        if (data.status === "success") {
                            window.location = data.redirect
                        } else {

                        }
                    },
                    error: function (data) {
                        message = data.responseJSON;
                        const list_message = [];
                        if (message.errors) {
                            if (message.errors.password) {
                                for (let i = 0; i < message.errors.password.length; i++) {

                                    list_message.push(message.errors.password[i]);
                                }
                            } else if (message.errors.email) {
                                for (let i = 0; i < message.errors.email.length; i++) {

                                    list_message.push(message.errors.email[i]);
                                }
                            } else if (message.errors.last_name) {
                                for (let i = 0; i < message.errors.last_name.length; i++) {

                                    list_message.push(message.errors.last_name[i]);
                                }
                            } else if (message.errors.first_name) {
                                for (let i = 0; i < message.errors.first_name.length; i++) {

                                    list_message.push(message.errors.first_name[i]);
                                }
                            } else if (message.errors.username) {
                                for (let i = 0; i < message.errors.username.length; i++) {

                                    list_message.push(message.errors.username[i]);
                                }
                            } else {
                                for (let i = 0; i < message.errors.phone.length; i++) {
                                    list_message.push(message.errors.phone[i]);
                                }
                            }
                        }
                        let message_error = ''
                        list_message.map((data) => {
                            message_error += data + ' '
                        })
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: message_error,
                            showConfirmButton: false,
                            timer: 4000,
                            didOpen: () => {
                                Swal.showLoading()
                            },

                        });
                    }
                })
            });
        });
        $(document).ready(function() {
            document.getElementById('addForm1').addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission
                // Make a POST request to your Laravel route

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '{{route('user.store')}}',
                    data: $('#addForm1').serialize(),
                    dataType: 'json',
                    success: function (data) {
                        if (data.status === "success") {
                            window.location = data.redirect
                        } else {

                        }
                    },
                    error: function (data) {
                        message = data.responseJSON;
                        const list_message = [];
                        if (message.errors) {
                            if (message.errors.password) {
                                for (let i = 0; i < message.errors.password.length; i++) {

                                    list_message.push(message.errors.password[i]);
                                }
                            } else if (message.errors.email) {
                                for (let i = 0; i < message.errors.email.length; i++) {

                                    list_message.push(message.errors.email[i]);
                                }
                            } else if (message.errors.last_name) {
                                for (let i = 0; i < message.errors.last_name.length; i++) {

                                    list_message.push(message.errors.last_name[i]);
                                }
                            } else if (message.errors.first_name) {
                                for (let i = 0; i < message.errors.first_name.length; i++) {

                                    list_message.push(message.errors.first_name[i]);
                                }
                            } else if (message.errors.username) {
                                for (let i = 0; i < message.errors.username.length; i++) {

                                    list_message.push(message.errors.username[i]);
                                }
                            } else {
                                for (let i = 0; i < message.errors.phone.length; i++) {
                                    list_message.push(message.errors.phone[i]);
                                }
                            }
                        }
                        let message_error = ''
                        list_message.map((data) => {
                            message_error += data + ' '
                        })
                        Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: message_error,
                            showConfirmButton: false,
                            timer: 4000,
                            didOpen: () => {
                                Swal.showLoading()
                            }

                        });
                    }
                })
            });
        });
    </script>

<script type="text/javascript">
    jQuery(function($) {
        var path = window.location.href;
        $('a.nav-link').each(function() {
            if (this.href === path) {
                $(this).closest('.nav-item').addClass('active');
            }
        });
    });
</script>
</div>
</body>

</html>
