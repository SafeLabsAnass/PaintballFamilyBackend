<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

</head>

<body id="page_items">

<!-- Header Start -->
<header class="container-fluid ">
    <nav class="navbar navbar-expand-xl navbar-light align-items-center">
        <div class="nav-item">
            <a class="navbar-brand nav-link px-2" href="dashboard.html">
                <img src="{{ asset('images/logo.png')}}" class="img-fluid" alt="">
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <i class="zmdi zmdi-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-0 ml-auto d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="home.html"><i class="zmdi zmdi-assignment"></i> POS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="items.html"><i class="zmdi zmdi-cutlery"></i> Items</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="people.html"><i class="zmdi zmdi-accounts-alt"></i> People</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="sales_expenses.html"><i class="zmdi zmdi-collection-text"></i> Sales & Expenses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="setting.html"><i class="zmdi zmdi-settings"></i> Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orders_status.html"><i class="zmdi zmdi-hourglass-alt"></i> Orders Status</a>
                </li>
                <li class="nav-item profile_img">
                    <a href="" class="img_box center_img">
                        <img src="{{ asset('images/profile.png')}}" class="crop_img" alt="">
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div class="header_spacebar"></div>
<!-- Header End -->

<!-- Body Wrapper Start -->
<div class="body_wrapper">
    <!-- Left Sidebar Start -->
    <div class="left_sidebar">
        <!-- Nav Tabs Start -->
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav_customers_items" data-toggle="tab" href="#customers" role="tab" aria-controls="nav-home" aria-selected="true">Customers</a>
            <a class="nav-item nav-link" id="nav_waiters_tab" data-toggle="tab" href="#waiters" role="tab" aria-controls="nav-profile" aria-selected="false">Waiters</a>
            <a class="nav-item nav-link" id="nav_admins_tab" data-toggle="tab" href="#admins" role="tab" aria-controls="nav-profile" aria-selected="false">Admins</a>
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
                        @foreach($users as $user)
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
                                <button type="button" class="btn">
                                    <a data-toggle="modal" data-target="#add_people"><i class="zmdi zmdi-edit"></i></a>
                                </button>
                            </div>
                        </li>
                        @endforeach

                    </ul>
                </div>
                <!-- Order List End -->

                <!-- Tab Footer start -->
                <div class="tab_footer">
                    <div class="row no-gutter align-items-center">
                        <div class="col-12 col-md-12 col-lg-4 pb-3">
                            <h2>Showing 1 to 10 of 126 item</h2>
                        </div>
                        <div class="col-12 col-md-12 col-lg-8 pb-3">
                            <div class="row align-items-center">
                                <form class="col-7">
                                    <div class="form-group d-flex align-items-center">
                                        <label for="exampleFormControlSelect1">Item per page</label>
                                        <select class="form-control mx-3" id="exampleFormControlSelect1" style="max-width: 80px;">
                                            <option>10</option>
                                            <option>15</option>
                                            <option>20</option>
                                            <option>25</option>
                                            <option>30</option>
                                        </select>
                                    </div>
                                </form>

                                <nav class="navigation col-5" aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="zmdi zmdi-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="zmdi zmdi-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab Footer End -->
            </div>
            <!-- Food Items Tab customers End -->

            <!-- Categories Tab waiters Start -->
            <div class="tab-pane fade" id="waiters" role="tabpanel" aria-labelledby="nav_waiters_tab">
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
                        <li class="d-flex">
                            <h3 class="text-center order_num Code people">1</h3>
                            <h3 class="text-left Name"><strong>Jimmy Taylor</strong></h3>
                            <h3 class="text-left phone">+1 987 675 5432</h3>
                            <h3 class="text-left email">jimmytaylor1234@gmail.com</h3>
                            <h3 class="text-left text-muted created">12 June 2020 12:30 pm</h3>
                            <div class="btn_container d-flex mr-0 ml-auto">
                                <button type="button" class="btn">
                                    <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                </button>
                                <button type="button" class="btn">
                                    <a data-toggle="modal" data-target="#add_people"><i class="zmdi zmdi-edit"></i></a>
                                </button>
                            </div>
                        </li>
                        <li class="d-flex">
                            <h3 class="text-center order_num Code people">2</h3>
                            <h3 class="text-left Name"><strong>Jimmy Taylor</strong></h3>
                            <h3 class="text-left phone">+1 987 675 5432</h3>
                            <h3 class="text-left email">jimmytaylor1234@gmail.com</h3>
                            <h3 class="text-left text-muted created">12 June 2020 12:30 pm</h3>
                            <div class="btn_container d-flex mr-0 ml-auto">
                                <button type="button" class="btn">
                                    <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                </button>
                                <button type="button" class="btn">
                                    <a data-toggle="modal" data-target="#add_people"><i class="zmdi zmdi-edit"></i></a>
                                </button>
                            </div>
                        </li>
                        <li class="d-flex">
                            <h3 class="text-center order_num Code people">3</h3>
                            <h3 class="text-left Name"><strong>Jimmy Taylor</strong></h3>
                            <h3 class="text-left phone">+1 987 675 5432</h3>
                            <h3 class="text-left email">jimmytaylor1234@gmail.com</h3>
                            <h3 class="text-left text-muted created">12 June 2020 12:30 pm</h3>
                            <div class="btn_container d-flex mr-0 ml-auto">
                                <button type="button" class="btn">
                                    <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                </button>
                                <button type="button" class="btn">
                                    <a data-toggle="modal" data-target="#add_people"><i class="zmdi zmdi-edit"></i></a>
                                </button>
                            </div>
                        </li>

                    </ul>
                </div>
                <!-- Order List End -->

                <!-- Tab Footer start -->
                <div class="tab_footer">
                    <div class="row no-gutter align-items-center">
                        <div class="col-12 col-md-12 col-lg-4 pb-3">
                            <h2>Showing 1 to 10 of 126 item</h2>
                        </div>
                        <div class="col-12 col-md-12 col-lg-8 pb-3">
                            <div class="row align-items-center">
                                <form class="col-7">
                                    <div class="form-group d-flex align-items-center">
                                        <label for="exampleFormControlSelect1">Item per page</label>
                                        <select class="form-control mx-3" id="exampleFormControlSelect1" style="max-width: 80px;">
                                            <option>10</option>
                                            <option>15</option>
                                            <option>20</option>
                                            <option>25</option>
                                            <option>30</option>
                                        </select>
                                    </div>
                                </form>

                                <nav class="navigation col-5" aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="zmdi zmdi-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="zmdi zmdi-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab Footer End -->
            </div>
            <!-- Categories Tab waiters Start -->

            <!-- Categories Tab admins Start -->
            <div class="tab-pane fade" id="admins" role="tabpanel" aria-labelledby="nav_admins_tab">
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
                        <li class="d-flex">
                            <h3 class="text-center order_num Code people">1</h3>
                            <h3 class="text-left Name"><strong>Jimmy Taylor</strong></h3>
                            <h3 class="text-left phone">+1 987 675 5432</h3>
                            <h3 class="text-left email">jimmytaylor1234@gmail.com</h3>
                            <h3 class="text-left text-muted created">12 June 2020 12:30 pm</h3>
                            <div class="btn_container d-flex mr-0 ml-auto">
                                <button type="button" class="btn">
                                    <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                </button>
                                <button type="button" class="btn">
                                    <a data-toggle="modal" data-target="#add_people"><i class="zmdi zmdi-edit"></i></a>
                                </button>
                            </div>
                        </li>
                        <li class="d-flex">
                            <h3 class="text-center order_num Code people">2</h3>
                            <h3 class="text-left Name"><strong>Jimmy Taylor</strong></h3>
                            <h3 class="text-left phone">+1 987 675 5432</h3>
                            <h3 class="text-left email">jimmytaylor1234@gmail.com</h3>
                            <h3 class="text-left text-muted created">12 June 2020 12:30 pm</h3>
                            <div class="btn_container d-flex mr-0 ml-auto">
                                <button type="button" class="btn">
                                    <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                </button>
                                <button type="button" class="btn">
                                    <a data-toggle="modal" data-target="#add_people"><i class="zmdi zmdi-edit"></i></a>
                                </button>
                            </div>
                        </li>
                        <li class="d-flex">
                            <h3 class="text-center order_num Code people">3</h3>
                            <h3 class="text-left Name"><strong>Jimmy Taylor</strong></h3>
                            <h3 class="text-left phone">+1 987 675 5432</h3>
                            <h3 class="text-left email">jimmytaylor1234@gmail.com</h3>
                            <h3 class="text-left text-muted created">12 June 2020 12:30 pm</h3>
                            <div class="btn_container d-flex mr-0 ml-auto">
                                <button type="button" class="btn">
                                    <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                </button>
                                <button type="button" class="btn">
                                    <a data-toggle="modal" data-target="#add_people"><i class="zmdi zmdi-edit"></i></a>
                                </button>
                            </div>
                        </li>

                    </ul>
                </div>
                <!-- Order List End -->

                <!-- Tab Footer start -->
                <div class="tab_footer">
                    <div class="row no-gutter align-items-center">
                        <div class="col-12 col-md-12 col-lg-4 pb-3">
                            <h2>Showing 1 to 10 of 126 item</h2>
                        </div>
                        <div class="col-12 col-md-12 col-lg-8 pb-3">
                            <div class="row align-items-center">
                                <form class="col-7">
                                    <div class="form-group d-flex align-items-center">
                                        <label for="exampleFormControlSelect1">Item per page</label>
                                        <select class="form-control mx-3" id="exampleFormControlSelect1" style="max-width: 80px;">
                                            <option>10</option>
                                            <option>15</option>
                                            <option>20</option>
                                            <option>25</option>
                                            <option>30</option>
                                        </select>
                                    </div>
                                </form>

                                <nav class="navigation col-5" aria-label="Page navigation example">
                                    <ul class="pagination justify-content-end mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="zmdi zmdi-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="zmdi zmdi-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab Footer End -->
            </div>
            <!-- Categories Tab admins Start -->
        </div>
        <!-- Tab Content End -->
    </div>
    <!-- Right Sidebar End -->
</div>
<!-- Body Wrapper End -->


<!-- Add people  Modal Start  -->
<div class="modal fade add_category_model add_expenses receipt_model px-0" id="add_people" tabindex="-1" role="dialog" aria-labelledby="receipt_modelTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header px-0">
                <h2 class="col-10 mx-auto">Add People</h2>
            </div>
            <div class="modal-body p-0">
                <form action="{{url('user/store')}}" method="post">
                    <div class="col-10 mx-auto form_container">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" class="form-control" value="Jimmy Taylor" name="first_name">
                        </div>
                        <div class="form-group">
                            <label>last_name</label>
                            <input type="text" class="form-control" value="Jimmy Taylor" name="last_name">
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" class="form-control" value="+1 987 645 5432">
                        </div>
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" class="form-control" value="jimmytaylor1234@gmail.com">
                        </div>
                        <div class="form-group">
                            <label>gender</label>
                            <select class="form-control" name="gender">
                                <option>Female</option>
                                <option>Male</option>
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="row no-gutters w-100">
                            <div class="col-6"> <button type="file" class="btn Cencel" data-dismiss="modal"><a href="#">Cencel</a></button></div>
                            <div class="col-6"> <button type="file" class="btn"><a href="#">Add People</a></button></div>
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

<script>
    $("#datetime").datetimepicker();
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
</body>

</html>
