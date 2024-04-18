<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">

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

    <script type="text/javascript">
        function show(id) {
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
                        document.getElementById('username_edited').value = response.data[0].username
                        document.getElementById('first_name_edited').value = response.data[0].first_name
                        document.getElementById('last_name_edited').value = response.data[0].last_name
                        document.getElementById('phone_edited').value = response.data[0].phone
                        document.getElementById('email_edited').value = response.data[0].email
                        document.getElementById('site_edited').value = response.data[0].site
                        document.getElementById('gender_edited').value = response.data[0].gender
                    }
                },
                error: function(xhr, status, error) {
                        console.log(status);
                    // Handle errors here
                }
            })
        }
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
            <a class="nav-item nav-link active" id="nav_customers_items" data-toggle="tab" href="#customers" role="tab" aria-controls="nav-home" aria-selected="true">Admins</a>
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
                        <span class="d-block" style="min-width: 161px;">People</span>
                        <button type="button" class="btn"><a data-toggle="modal" data-target="#add_people">Add New</a></button>
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
                                    <button class="btn" type="button" id="btn_show" data-toggle="modal" data-target="#edit_people" onclick="show({{$user->id}})"><i class="zmdi zmdi-edit mb-5"></i></button>
                            </div>

                        </li>
                            <div class="modal fade add_category_model add_expenses receipt_model px-0" id="edit_people" tabindex="-1" role="dialog" aria-labelledby="receipt_modelTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header px-0">
                                            <h2 class="col-10 mx-auto">Edit People</h2>
                                        </div>
                                        <div class="modal-body p-0">

                                            <form action="{{route('user.edit',$user->id)}}" method="POST" id="editForm" onsubmit="edit({{$user->id}});">
                                                @csrf
                                                <div class="col-10 mx-auto form_container">
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text" class="form-control" name="username" id="username_edited" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" name="first_name" id="first_name_edited">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" name="last_name" id="last_name_edited">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Phone Number</label>
                                                        <input type="text" class="form-control" name="phone" id="phone_edited">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Email Address</label>
                                                        <input type="email" class="form-control" name="email" id="email_edited">
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
                                                            <button type="submit" class="btn">Edit People</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>



                        @endforeach

                    </ul>
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

    <script type="text/javascript">
        function edit(id) {
            const btn_show = document.getElementById('btn_show');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'POST',
                url: '/user/edit/'+id.toString(),
                data: $('#editForm').serialize(),
                dataType: 'json',
                success: function (data) {
                    if (data.status==="success") {
                        Swal.fire({
                            position: 'Modification réussie',
                            icon: 'success',
                            title: 'Vous êtes redirigé vers le tableau d\'utilisateur',
                            showConfirmButton: false,
                            timer: 6000,
                            onOpen: () => {
                                Swal.showLoading();
                            }
                        });
                        window.location = data.redirect;
                    }
                    else{
                        if (data.status) {
                            Swal.fire({
                                position: 'Oops...',
                                icon: 'error',
                                title: 'Les donnees entrants sont similaire avec les anciennes !',
                                showConfirmButton: false,
                                timer: 6000,
                                onOpen: () => {
                                    Swal.showLoading()
                                }
                            });
                            window.location = data.redirect
                        }
                    }
                },
                error: function (data) {
                    console.log(data)

                }
            })
        }
    </script>

<!-- Add people  Modal Start  -->
<div class="modal fade add_category_model add_expenses receipt_model px-0" id="add_people" tabindex="-1" role="dialog" aria-labelledby="receipt_modelTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header px-0">
                <h2 class="col-10 mx-auto">Add People</h2>
            </div>
            <div class="modal-body p-0">

                <form action="{{route('user.store')}}" method="post">
                    @csrf
                    <div class="col-10 mx-auto form_container">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" id="username" >
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" name="first_name" id="first_name">
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" class="form-control" name="last_name" id="last_name">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" name="phone" id="phone">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" name="email" id="email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label>Site</label>
                            <input type="text" class="form-control" name="site_id" id="site_id">
                        </div>
                        <div class="form-group">
                            <label>gender</label>
                            <select class="form-control" name="gender" id="gwnder">
                                <option>Male</option>
                                <option>Female</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="row no-gutters w-100">
                            <div class="col-6"> <button type="reset" class="btn Cencel" data-dismiss="modal">Cancel</button></div>
                            <div class="col-6"> <button type="submit" class="btn">Add People</button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<!-- Add people Modal End  -->
<!-- Require Javascript Start -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- Require Javascript End -->
<script src="{{ asset('js/jquery.datetimepicker.full.js')}}"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
      integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


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
</body>

</html>
