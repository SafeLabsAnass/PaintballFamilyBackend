<!doctype html>
<html lang="en">
<head>

    <!-- Required meta tags -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Datetimepicker CSS -->
<link href="{{ asset('css/jquery.datetimepicker.min.css')}}" type="text/css" rel="stylesheet"><link rel="icon" href="{{ asset('storage/' . \App\Models\Company::all()->first()->logo) }}">    <!-- Bootstrap CSS -->
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

<body id="page_home">
@include('navbar')
<!-- Header End -->

<!-- Body Wrapper Start -->
<div class="body_wrapper">
    <!-- Order Section Start -->
    <div class="order_section">
        <!-- Tab Bottons Start -->
        <div class="tab_btn_container d-flex w-100">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-order1" data-toggle="tab" href="#order1" role="tab"
                   aria-controls="order1" aria-selected="true">
                    <strong>1</strong>
                    <span>2:30</span>
                </a>

                <a class="nav-item nav-link" id="nav-order2" data-toggle="tab" href="#order2" role="tab"
                   aria-controls="order2" aria-selected="false"><strong>2</strong>
                    <span>0:42</span>
                </a>
            </div>

            <button type="button" class="btn ml-auto mr-0"><a href="#">+</a></button>
        </div>
        <!-- Tab Bottons End -->

        <div class="order_item_container">


            <!-- Tab Content Start -->
            <div class="tab-content" id="nav-tabContent">

                <!-- Tab Items Start -->
                <div class="tab-pane fade show active" id="order1" role="tabpanel" aria-labelledby="nav-order1">

                    <div class="order_header">
                        <div class="row align-items-center">
                            <div class="col-4">
                                <h2>Item</h2>
                            </div>
                            <div class="col-2 text-center">
                                <h2>Price</h2>
                            </div>
                            <div class="col-3 text-center">
                                <h2>Qnt.</h2>
                            </div>
                            <div class="col-3 text-right">
                                <h2>Total($)</h2>
                            </div>
                        </div>
                    </div>

                    <!-- Food List Start -->
                    <ul p-0>
                        <li>
                            <div class="row">
                                <div class="col-4">
                                    <h2>Farm Ville <br>Pizza</h2>
                                </div>
                                <div class="col-2 text-center">
                                    <h3>12.00</h3>
                                </div>
                                <div class="col-3 text-center">
                                    <h3 class="d-flex align-items-center">
                                        <i class="zmdi zmdi-minus"></i>
                                        <strong>1</strong>
                                        <i class="zmdi zmdi-plus"></i>
                                    </h3>
                                </div>
                                <div class="col-3 text-right">
                                    <h4>12.00</h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-4">
                                    <h2>Cheese <br>Burst Sandwich</h2>
                                </div>
                                <div class="col-2 text-center">
                                    <h3>8.00</h3>
                                </div>
                                <div class="col-3 text-center">
                                    <h3 class="d-flex align-items-center">
                                        <i class="zmdi zmdi-minus"></i>
                                        <strong>1</strong>
                                        <i class="zmdi zmdi-plus"></i>
                                    </h3>
                                </div>
                                <div class="col-3 text-right">
                                    <h4>8.00</h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-4">
                                    <h2>White Source <br>Pasta</h2>
                                </div>
                                <div class="col-2 text-center">
                                    <h3>10.00</h3>
                                </div>
                                <div class="col-3 text-center">
                                    <h3 class="d-flex align-items-center">
                                        <i class="zmdi zmdi-minus"></i>
                                        <strong>1</strong>
                                        <i class="zmdi zmdi-plus"></i>
                                    </h3>
                                </div>
                                <div class="col-3 text-right">
                                    <h4>10.00</h4>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-4">
                                    <h2>Veg Cheese <br>Burger</h2>
                                </div>
                                <div class="col-2 text-center">
                                    <h3>6.50</h3>
                                </div>
                                <div class="col-3 text-center">
                                    <h3 class="d-flex align-items-center">
                                        <i class="zmdi zmdi-minus"></i>
                                        <strong>2</strong>
                                        <i class="zmdi zmdi-plus"></i>
                                    </h3>
                                </div>
                                <div class="col-3 text-right">
                                    <h4>13.00</h4>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- Food List End -->

                    <div class="order_footer">
                        <div class="amount_details">
                            <h2 class="d-flex text-right">
                                <span class="text">Sub total </span>
                                <span class="mr-0 ml-auto">43.00</span>
                            </h2>
                            <h2 class="d-flex text-right">
                                <span class="text">Tax</span>
                                <span class="mr-0 ml-auto"> 3.00</span>
                            </h2>
                            <h2 class="d-flex text-right">
                                <span class="text">Other Charge</span>
                                <span class="mr-0 ml-auto">0.00</span>
                            </h2>
                        </div>
                        <div class="amount_payble">
                            <h2 class="d-flex text-right">
                                <span class="text">Amount to Pay</span>
                                <span class="mr-0 ml-auto">46.00</span>
                            </h2>
                        </div>

                        <div class="btn_box">
                            <div class="row no-gutter mx-0">
                                <button type="button" class="btn col-6 Cancel"><a href="#">Cancel</a></button>
                                <button type="button" class="btn col-6 place_order"><a href="#">Place Order</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab Items End -->


                <!-- Tab Items Start -->
                <div class="tab-pane fade" id="order2" role="tabpanel" aria-labelledby="nav-order2">

                    <div class="order_header">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h2 class="text-success">Order Placed Successfully !!</h2>
                            </div>
                        </div>
                    </div>

                    <!-- Food List Start -->
                    <form class="px-3 py-4">
                        <h4 class="text-white">Amount to Pay <strong>$46.00</strong></h4>
                        <p class="text-muted">Enter below information for Customer record.</p>
                        <div class="form-group">
                            <label>Select Payment Method</label>
                            <select>
                                <option>Cash</option>
                                <option>Net Banking</option>
                                <option>UPI</option>
                                <option>Credit /Debit Card</option>
                                <option>Mobile Banking</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Customer Info (Optional)</label>
                            <input type="text" class="form-control mb-3" placeholder="Enter Full Name">
                            <input type="text" class="form-control mb-3" placeholder="Enter Phone Number">
                            <input type="text" class="form-control mb-3" placeholder="Enter Email Address">
                        </div>
                        <!-- Food List End -->
                    </form>
                    <div class="order_footer">
                        <div class="btn_box">
                            <div class="row no-gutter mx-0">
                                <button type="button" class="btn col-6 Cancel"><a href="#">Cancel</a></button>
                                <button type="button" class="btn col-6 place_order"><a href="#">Payment</a></button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Tab Items end -->
            </div>
            <!-- Tab Content End -->
        </div>
    </div>
    <!-- Order Section End -->

    <!-- Food Item Section Start -->
    <div class="item_section mt-4 mt-md-0">
        <div class="item_section_header">
            <div class="tab_btn_container">
                <div class="nav nav-tabs owl-carousel" id="nav-tab" role="tablist">

                    <a class="nav-item nav-link active" id="nav-order1" data-toggle="tab" href="#order1" role="tab"
                       aria-controls="order1" aria-selected="true">
                        <img src="images/ic_fastfood.png">
                        <h5>FastFood</h5>
                    </a>

                    <a class="nav-item nav-link" id="nav-order2" data-toggle="tab" href="#order2" role="tab"
                       aria-controls="order2" aria-selected="false">
                        <img src="images/ic_starter.png">
                        <h5>Starter</h5>
                    </a>
                    <a class="nav-item nav-link" id="nav-order2" data-toggle="tab" href="#order2" role="tab"
                       aria-controls="order2" aria-selected="false">
                        <img src="images/ic_maincourse.png">
                        <h5>Main Cource</h5>
                    </a>
                    <a class="nav-item nav-link" id="nav-order2" data-toggle="tab" href="#order2" role="tab"
                       aria-controls="order2" aria-selected="false">
                        <img src="images/ic_Beverages.png">
                        <h5>Beverages</h5>
                    </a>
                    <a class="nav-item nav-link" id="nav-order2" data-toggle="tab" href="#order2" role="tab"
                       aria-controls="order2" aria-selected="false">
                        <img src="images/ic_Dessert.png">
                        <h5>Dessert</h5>
                    </a>
                    <a class="nav-item nav-link active" id="nav-order1" data-toggle="tab" href="#order1" role="tab"
                       aria-controls="order1" aria-selected="true">
                        <img src="images/ic_fastfood.png">
                        <h5>FastFood</h5>
                    </a>

                    <a class="nav-item nav-link" id="nav-order2" data-toggle="tab" href="#order2" role="tab"
                       aria-controls="order2" aria-selected="false">
                        <img src="images/ic_starter.png">
                        <h5>Starter</h5>
                    </a>
                    <a class="nav-item nav-link" id="nav-order2" data-toggle="tab" href="#order2" role="tab"
                       aria-controls="order2" aria-selected="false">
                        <img src="images/ic_maincourse.png">
                        <h5>Main Cource</h5>
                    </a>

                </div>
            </div>

            <form class="search_box">
                <div class="form-group d-flex">
                    <div class="input-group-prepend">
                        <div class="input-group-text"><i class="zmdi zmdi-search"></i></div>
                    </div>
                    <input type="search" class="form-control" placeholder="Search Items">
                    <button type="button" class="btn"><a href="index.html">Search</a></button>
                </div>
            </form>
        </div>
        <div class="tab-content" id="item_tab_content">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-3 col-md-12 col-sm-6">
                        <div class="item active">
                            <div class="item_img center_img">
                                <img src="images/1.png" class="crop_img">
                            </div>
                            <div class="text_box" (click)="item_detail()">
                                <h2>Veg Cheese <br>Burger</h2>
                                <h3>$12.00</h3>
                            </div>
                            <div class="option d-flex">
                                <ion-icon class="zmdi zmdi-minus-circle-outline"></ion-icon>
                                <h5 class="mr-0 ml-auto">1</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 col-md-12 col-sm-6">
                        <div class="item active">
                            <div class="item_img center_img">
                                <img src="images/2.png" class="crop_img">
                            </div>
                            <div class="text_box" (click)="item_detail()">
                                <h2>Whote Source <br>Pasta</h2>
                                <h3>$12.00</h3>
                            </div>
                            <div class="option d-flex">
                                <ion-icon class="zmdi zmdi-minus-circle-outline"></ion-icon>
                                <h5 class="mr-0 ml-auto">2</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 col-md-12 col-sm-6">
                        <div class="item active">
                            <div class="item_img center_img">
                                <img src="images/3.png" class="crop_img">
                            </div>
                            <div class="text_box" (click)="item_detail()">
                                <h2>Farm Ville <br>Pizza</h2>
                                <h3>$12.00</h3>
                            </div>
                            <div class="option d-flex">
                                <ion-icon class="zmdi zmdi-minus-circle-outline"></ion-icon>
                                <h5 class="mr-0 ml-auto">1</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 col-md-12 col-sm-6">
                        <div class="item active">
                            <div class="item_img center_img">
                                <img src="images/4.png" class="crop_img">
                            </div>
                            <div class="text_box" (click)="item_detail()">
                                <h2>Cheese <br> Burst Sandwich</h2>
                                <h3>$12.00</h3>
                            </div>
                            <div class="option d-flex">
                                <ion-icon class="zmdi zmdi-minus-circle-outline"></ion-icon>
                                <h5 class="mr-0 ml-auto">1</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 col-md-12 col-sm-6">
                        <div class="item active">
                            <div class="item_img center_img">
                                <img src="images/1.png" class="crop_img">
                            </div>
                            <div class="text_box" (click)="item_detail()">
                                <h2>Veg Cheese <br>Burger</h2>
                                <h3>$12.00</h3>
                            </div>
                            <div class="option d-flex">
                                <ion-icon class="zmdi zmdi-minus-circle-outline"></ion-icon>
                                <h5 class="mr-0 ml-auto">1</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 col-md-12 col-sm-6">
                        <div class="item active">
                            <div class="item_img center_img">
                                <img src="images/2.png" class="crop_img">
                            </div>
                            <div class="text_box" (click)="item_detail()">
                                <h2>Whote Source <br>Pasta</h2>
                                <h3>$12.00</h3>
                            </div>
                            <div class="option d-flex">
                                <ion-icon class="zmdi zmdi-minus-circle-outline"></ion-icon>
                                <h5 class="mr-0 ml-auto">2</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 col-md-12 col-sm-6">
                        <div class="item active">
                            <div class="item_img center_img">
                                <img src="images/3.png" class="crop_img">
                            </div>
                            <div class="text_box" (click)="item_detail()">
                                <h2>Farm Ville <br>Pizza</h2>
                                <h3>$12.00</h3>
                            </div>
                            <div class="option d-flex">
                                <ion-icon class="zmdi zmdi-minus-circle-outline"></ion-icon>
                                <h5 class="mr-0 ml-auto">1</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 col-md-12 col-sm-6">
                        <div class="item active">
                            <div class="item_img center_img">
                                <img src="images/4.png" class="crop_img">
                            </div>
                            <div class="text_box" (click)="item_detail()">
                                <h2>Cheese <br> Burst Sandwich</h2>
                                <h3>$12.00</h3>
                            </div>
                            <div class="option d-flex">
                                <ion-icon class="zmdi zmdi-minus-circle-outline"></ion-icon>
                                <h5 class="mr-0 ml-auto">1</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 col-md-12 col-sm-6">
                        <div class="item active">
                            <div class="item_img center_img">
                                <img src="images/1.png" class="crop_img">
                            </div>
                            <div class="text_box" (click)="item_detail()">
                                <h2>Veg Cheese <br>Burger</h2>
                                <h3>$12.00</h3>
                            </div>
                            <div class="option d-flex">
                                <ion-icon class="zmdi zmdi-minus-circle-outline"></ion-icon>
                                <h5 class="mr-0 ml-auto">1</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 col-md-12 col-sm-6">
                        <div class="item active">
                            <div class="item_img center_img">
                                <img src="images/2.png" class="crop_img">
                            </div>
                            <div class="text_box" (click)="item_detail()">
                                <h2>Whote Source <br>Pasta</h2>
                                <h3>$12.00</h3>
                            </div>
                            <div class="option d-flex">
                                <ion-icon class="zmdi zmdi-minus-circle-outline"></ion-icon>
                                <h5 class="mr-0 ml-auto">2</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 col-md-12 col-sm-6">
                        <div class="item active">
                            <div class="item_img center_img">
                                <img src="images/3.png" class="crop_img">
                            </div>
                            <div class="text_box" (click)="item_detail()">
                                <h2>Farm Ville <br>Pizza</h2>
                                <h3>$12.00</h3>
                            </div>
                            <div class="option d-flex">
                                <ion-icon class="zmdi zmdi-minus-circle-outline"></ion-icon>
                                <h5 class="mr-0 ml-auto">1</h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6 col-xl-3 col-md-12 col-sm-6">
                        <div class="item active">
                            <div class="item_img center_img">
                                <img src="images/4.png" class="crop_img">
                            </div>
                            <div class="text_box" (click)="item_detail()">
                                <h2>Cheese <br> Burst Sandwich</h2>
                                <h3>$12.00</h3>
                            </div>
                            <div class="option d-flex">
                                <ion-icon class="zmdi zmdi-minus-circle-outline"></ion-icon>
                                <h5 class="mr-0 ml-auto">1</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
        </div>
    </div>

    <!-- Food Item Section End -->
</div>
<!-- Body Wrapper End -->

<!-- Require Javascript Start -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>

<script src="js/jquery.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 20,
        nav: false,
        dot: false,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 4
            },
            1200: {
                items: 8
            }
        }
    })
</script>
<script type="text/javascript">
    jQuery(function ($) {
        var path = window.location.href;
        $('a.nav-link').each(function () {
            if (this.href === path) {
                $(this).closest('.nav-item').addClass('active');
            }
        });
    });
</script>
<!-- Require Javascript End -->

</body>

</html>
