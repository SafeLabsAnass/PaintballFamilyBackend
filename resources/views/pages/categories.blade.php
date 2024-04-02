<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
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
                    <img src="{{ asset('images/logo.png')}}" class="img-fluid">
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
                        <a href="index.html" class="img_box center_img">
                            <img src="images/profile.png" class="crop_img">
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
                <a class="nav-item nav-link active" id="nav_food_items" data-toggle="tab" href="#food_items" role="tab" aria-controls="nav-home" aria-selected="true">Food Items</a>
                <a class="nav-item nav-link" id="nav-Categories-tab" data-toggle="tab" href="#Categories" role="tab" aria-controls="nav-profile" aria-selected="false">Categories</a>
            </div>
            <!-- Nav Tabs End -->
        </div>
        <!-- Left Sidebar End -->

        <!-- Right Sidebar Start -->
        <div class="right_sidebar">
            <!-- Tab Content Start -->
            <div class="tab-content" id="nav-tabContent">

                <!-- Food Items Tab Content Start -->
                <div class="tab-pane fade show active" id="food_items" role="tabpanel" aria-labelledby="nav_food_items">
                    <div class="tab_header">
                        <h1 class="d-flex">
                            <span class="d-block" style="min-width: 161px;">Food Items</span>
                            <button type="button" class="btn"><a href="upload_item.html">Add New</a></button>
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
                            <h2 class="text-center order_num Code">Code</h2>
                            <h2 class="text-left Name">item Name</h2>
                            <h2 class="text-center Amount Category">Category</h2>
                            <h2 class="text-center Items Options">Options</h2>
                            <h2 class="text-center Table Price">Price</h2>
                            <h2 class="text-center Payment Sales ">Sales</h2>
                            <h2 class="text-right Action">Action</h2>
                        </div>

                        <ul>
                            <li class="d-flex">
                                <h3 class="text-center order_num Code">18754</h3>
                                <h3 class="text-left Name"><strong>Cheese Burst Sandwich</strong></h3>
                                <h3 class="text-center Amount Category">Fast Food</h3>
                                <h3 class="text-center Items Options">3 <i class="zmdi zmdi-storage"></i></h3>
                                <h3 class="text-center Table Price">$12.00</h3>
                                <h3 class="text-center Payment Sales">112</h3>
                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-eye"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a data-toggle="modal" data-target="#receipt_model"><i class="zmdi zmdi-image"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>
                            <li class="d-flex">
                                <h3 class="text-center order_num Code">18755</h3>
                                <h3 class="text-left Name"><strong>Red Source Pasta</strong></h3>
                                <h3 class="text-center Amount Category">Fast Food</h3>
                                <h3 class="text-center Items Options">2 <i class="zmdi zmdi-storage"></i></h3>
                                <h3 class="text-center Table Price">$12.00</h3>
                                <h3 class="text-center Payment Sales">214</h3>
                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-eye"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a data-toggle="modal" data-target="#receipt_model"><i class="zmdi zmdi-image"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>
                            <li class="d-flex">
                                <h3 class="text-center order_num Code">18756</h3>
                                <h3 class="text-left Name"><strong>Sugar Free Coke</strong></h3>
                                <h3 class="text-center Amount Category">Beverages</h3>
                                <h3 class="text-center Items Options">4 <i class="zmdi zmdi-storage"></i></h3>
                                <h3 class="text-center Table Price">$12.00</h3>
                                <h3 class="text-center Payment Sales">98</h3>
                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-eye"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a data-toggle="modal" data-target="#receipt_model"><i class="zmdi zmdi-image"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>
                            <li class="d-flex">
                                <h3 class="text-center order_num Code">18757</h3>
                                <h3 class="text-left Name"><strong>Cassata Vanilla Ice Cream</strong></h3>
                                <h3 class="text-center Amount Category">Dessert</h3>
                                <h3 class="text-center Items Options">2 <i class="zmdi zmdi-storage"></i></h3>
                                <h3 class="text-center Table Price">$12.00</h3>
                                <h3 class="text-center Payment Sales">221</h3>
                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-eye"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a data-toggle="modal" data-target="#receipt_model"><i class="zmdi zmdi-image"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>
                            <li class="d-flex">
                                <h3 class="text-center order_num Code">18758</h3>
                                <h3 class="text-left Name"><strong>Hamm Burger</strong></h3>
                                <h3 class="text-center Amount Category">Fast Food</h3>
                                <h3 class="text-center Items Options">2 <i class="zmdi zmdi-storage"></i></h3>
                                <h3 class="text-center Table Price">$12.00</h3>
                                <h3 class="text-center Payment Sales">221</h3>
                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-eye"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a data-toggle="modal" data-target="#receipt_model"><i class="zmdi zmdi-image"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>
                            <li class="d-flex">
                                <h3 class="text-center order_num Code">18759</h3>
                                <h3 class="text-left Name"><strong>Rosted Chicken Legs</strong></h3>
                                <h3 class="text-center Amount Category">Main Course</h3>
                                <h3 class="text-center Items Options">0 <i class="zmdi zmdi-storage"></i></h3>
                                <h3 class="text-center Table Price">$12.00</h3>
                                <h3 class="text-center Payment Sales">99</h3>
                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-eye"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a data-toggle="modal" data-target="#receipt_model"><i class="zmdi zmdi-image"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>

                            <li class="d-flex no_option">
                                <h3 class="text-center order_num Code">18760</h3>
                                <h3 class="text-left Name">
                                    <strong>
                                        <i class="zmdi zmdi-eye-off"></i>
                                        Rosted Chicken Legs
                                    </strong></h3>
                                <h3 class="text-center Amount Category">Main Course</h3>
                                <h3 class="text-center Items Options">0 <i class="zmdi zmdi-storage"></i></h3>
                                <h3 class="text-center Table Price">$12.00</h3>
                                <h3 class="text-center Payment Sales">99</h3>
                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-eye"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a data-toggle="modal" data-target="#receipt_model"><i class="zmdi zmdi-image"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>
                            <li class="d-flex">
                                <h3 class="text-center order_num Code">18761</h3>
                                <h3 class="text-left Name"><strong>Sugar Free Coke</strong></h3>
                                <h3 class="text-center Amount Category">Beverages</h3>
                                <h3 class="text-center Items Options">4 <i class="zmdi zmdi-storage"></i></h3>
                                <h3 class="text-center Table Price">$12.00</h3>
                                <h3 class="text-center Payment Sales">98</h3>
                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-eye"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a data-toggle="modal" data-target="#receipt_model"><i class="zmdi zmdi-image"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>
                            <li class="d-flex">
                                <h3 class="text-center order_num Code">18762</h3>
                                <h3 class="text-left Name"><strong>Cassata Vanilla Ice Cream</strong></h3>
                                <h3 class="text-center Amount Category">Dessert</h3>
                                <h3 class="text-center Items Options">2 <i class="zmdi zmdi-storage"></i></h3>
                                <h3 class="text-center Table Price">$12.00</h3>
                                <h3 class="text-center Payment Sales">221</h3>
                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-eye"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a data-toggle="modal" data-target="#receipt_model"><i class="zmdi zmdi-image"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>
                            <li class="d-flex">
                                <h3 class="text-center order_num Code">18763</h3>
                                <h3 class="text-left Name"><strong>Hamm Burger</strong></h3>
                                <h3 class="text-center Amount Category">Fast Food</h3>
                                <h3 class="text-center Items Options">2 <i class="zmdi zmdi-storage"></i></h3>
                                <h3 class="text-center Table Price">$12.00</h3>
                                <h3 class="text-center Payment Sales">221</h3>
                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-eye"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a data-toggle="modal" data-target="#receipt_model"><i class="zmdi zmdi-image"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
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
                <!-- Food Items Tab Content End -->




                <!-- Categories Tab Content Start -->
                <div class="tab-pane fade" id="Categories" role="tabpanel" aria-labelledby="nav-Categories-tab">
                    <div class="tab_header">
                        <h1 class="d-flex align-items-center">
                            Categories
                            <button type="button" class="btn"><a data-toggle="modal" data-target="#add_expenses">Add New</a></button>
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
                            <h2 class="text-center Code icon">Icon</h2>
                            <h2 class="text-left Name">Category Name</h2>
                            <h2 class="text-center Category item_category">Items In Category</h2>
                            <h2 class="text-center Category created_on">Created on</h2>
                            <h2 class="text-right Action">Action</h2>
                        </div>

                        <ul>
                            <li class="d-flex">
                                <h3 class="text-center Code icon">
                                    <img src="images/ic_starter.png">
                                </h3>
                                <h3 class="text-left Name"><strong>Starter</strong></h3>
                                <h3 class="text-center Category item_category">12</h3>
                                <h3 class="text-center Category created_on">12 June 2020 12:30 pm</h3>

                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>

                            <li class="d-flex">
                                <h3 class="text-center Code icon">
                                    <img src="images/ic_fastfood.png">
                                </h3>
                                <h3 class="text-left Name"><strong>Fast Food</strong></h3>
                                <h3 class="text-center Category item_category">28</h3>
                                <h3 class="text-center Category created_on">12 June 2020 12:30 pm</h3>

                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>

                            <li class="d-flex">
                                <h3 class="text-center Code icon">
                                    <img src="images/ic_Dessert.png">
                                </h3>
                                <h3 class="text-left Name"><strong>Dessert</strong></h3>
                                <h3 class="text-center Category item_category">18</h3>
                                <h3 class="text-center Category created_on">12 June 2020 12:30 pm</h3>

                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>


                            <li class="d-flex">
                                <h3 class="text-center Code icon">
                                    <img src="images/ic_Beverages.png">
                                </h3>
                                <h3 class="text-left Name"><strong>Baverages</strong></h3>
                                <h3 class="text-center Category item_category">23</h3>
                                <h3 class="text-center Category created_on">12 June 2020 12:30 pm</h3>

                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>


                            <li class="d-flex">
                                <h3 class="text-center Code icon">
                                    <img src="images/ic_maincourse.png">
                                </h3>
                                <h3 class="text-left Name"><strong>Main Course</strong></h3>
                                <h3 class="text-center Category item_category">35</h3>
                                <h3 class="text-center Category created_on">12 June 2020 12:30 pm</h3>

                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>
                            <li class="d-flex">
                                <h3 class="text-center Code icon">
                                    <img src="images/ic_starter.png">
                                </h3>
                                <h3 class="text-left Name"><strong>Starter</strong></h3>
                                <h3 class="text-center Category item_category">12</h3>
                                <h3 class="text-center Category created_on">12 June 2020 12:30 pm</h3>

                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>

                            <li class="d-flex">
                                <h3 class="text-center Code icon">
                                    <img src="images/ic_fastfood.png">
                                </h3>
                                <h3 class="text-left Name"><strong>Fast Food</strong></h3>
                                <h3 class="text-center Category item_category">28</h3>
                                <h3 class="text-center Category created_on">12 June 2020 12:30 pm</h3>

                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>

                            <li class="d-flex">
                                <h3 class="text-center Code icon">
                                    <img src="images/ic_Dessert.png">
                                </h3>
                                <h3 class="text-left Name"><strong>Dessert</strong></h3>
                                <h3 class="text-center Category item_category">18</h3>
                                <h3 class="text-center Category created_on">12 June 2020 12:30 pm</h3>

                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>


                            <li class="d-flex">
                                <h3 class="text-center Code icon">
                                    <img src="images/ic_Beverages.png">
                                </h3>
                                <h3 class="text-left Name"><strong>Baverages</strong></h3>
                                <h3 class="text-center Category item_category">23</h3>
                                <h3 class="text-center Category created_on">12 June 2020 12:30 pm</h3>

                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>


                            <li class="d-flex">
                                <h3 class="text-center Code icon">
                                    <img src="images/ic_maincourse.png">
                                </h3>
                                <h3 class="text-left Name"><strong>Main Course</strong></h3>
                                <h3 class="text-center Category item_category">35</h3>
                                <h3 class="text-center Category created_on">12 June 2020 12:30 pm</h3>

                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="#"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>
                        </ul>
                    </div>
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
                <!-- Categories Tab Content Start -->
            </div>
            <!-- Tab Content End -->
        </div>
        <!-- Right Sidebar End -->
    </div>
    <!-- Body Wrapper End -->


    <!-- Add Category  Modal Start  -->
    <div class="modal fade add_category_model add_expenses receipt_model px-0" id="add_expenses" tabindex="-1" role="dialog" aria-labelledby="receipt_modelTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header px-0">
                    <h2 class="col-10 mx-auto">Add Category</h2>
                </div>
                <div class="modal-body p-0">
                    <form>
                        <div class="col-10 mx-auto form_container">
                            <div class="row pb-5">
                                <div class="col-12 col-lg-5 col-md-6 col-sm-12">
                                    <div class="img_box">
                                        <i class="zmdi zmdi-image-alt"></i>
                                        <p>Upload Icon</p>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7 col-md-6 col-sm-12 pt-2">
                                    <div class="d-flex info">
                                        <i class="zmdi zmdi-info-outline d-block text-white"></i>
                                        <p>Icon Should have in <br>1:1 ratio for better viewing <br> experience.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Add Category</label>
                                <input type="name" class="form-control" value="Italian Food">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="row no-gutters w-100">
                                <div class="col-6"> <button type="file" class="btn Cencel" data-dismiss="modal"><a href="#">Cencel</a></button></div>
                                <div class="col-6"> <button type="file" class="btn"><a href="#">Add Category</a></button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- Add Category Modal End  -->


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
