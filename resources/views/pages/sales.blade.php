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

<body id="page_home">
@include('navbar')
<!-- Header End -->

<!-- Body Wrapper Start -->
<div class="body_wrapper">
    <!-- Left Sidebar Start -->
    <div class="left_sidebar">
        <!-- Nav Tabs Start -->
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="nav-home" aria-selected="true">Sales</a>
            <a class="nav-item nav-link " id="nav-products-tab" data-toggle="tab" href="#products" role="tab"
               aria-controls="nav-home" aria-selected="false">Products</a>
        </div>
        <!-- Nav Tabs End -->
    </div>
    <!-- Left Sidebar End -->

    <!-- Right Sidebar Start -->
    <div class="right_sidebar">
        <!-- Tab Content Start -->
        <div class="tab-content" id="nav-tabContent">

            <!-- Sales Tab Content Start -->
            <div class="tab-pane fade show active" id="sales" role="tabpanel" aria-labelledby="nav-sales-tab">
                <div class="tab_header">
                    <h1>Sales</h1>

                </div>
                <!-- Order List Start -->
                <div class="order_list">
                    <div class="list_header d-flex">
                        <h2 class="text-center Name">Name</h2>
                        <h2 class="text-center User">User</h2>
                        <h2 class="text-center Client">Client</h2>
                        <h2 class="text-center Client">Total Paid</h2>
                        <h2 class="text-center Payment">Payment</h2>
                        <h2 class="text-right CreatedAt">CreatedAt</h2>
                    </div>

                    <ul>
                        @foreach($sales as $sale)
                        <li class="d-flex">
                            <h3 class="text-center Name">{{$sale->matricule}}</h3>
                            <h3 class="text-center User"><strong>{{\App\Models\User::where('id',$sale->user_id)->first()->username}}</strong></h3>
                            <h3 class="text-center Client">{{$sale->client_name}}</h3>
                            <h3 class="text-center Client">{{$sale->total_paid}} €</h3>
                            <h3 class="text-center Payment">{{\App\Models\Payment::where('id', $sale->payment_id)->first()->type}}</h3>
                            <h3 class="text-left CreatedAt">{{$sale->created_at}}</h3>
                            <div class="btn_container d-flex ml-auto">
                                <button type="button" class="btn">
                                    <a data-toggle="modal" data-target="#receipt_model"><i class="zmdi zmdi-print"></i></a>
                                </button>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Order List End -->

                <!-- Tab Footer start -->
{{--                <div class="tab_footer">--}}
{{--                    <div class="row no-gutter align-items-center">--}}
{{--                        <div class="col-12 col-md-12 col-lg-4 pb-3">--}}
{{--                            <h2>Showing 1 to 10 of 126 item</h2>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 col-md-12 col-lg-8 pb-3">--}}
{{--                            <div class="row align-items-center">--}}
{{--                                <form class="col-7">--}}
{{--                                    <div class="form-group d-flex align-items-center">--}}
{{--                                        <label for="exampleFormControlSelect1">Item per page</label>--}}
{{--                                        <select class="form-control mx-3" id="exampleFormControlSelect1" style="max-width: 80px;">--}}
{{--                                            <option>10</option>--}}
{{--                                            <option>15</option>--}}
{{--                                            <option>20</option>--}}
{{--                                            <option>25</option>--}}
{{--                                            <option>30</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </form>--}}

{{--                                <nav class="navigation col-5" aria-label="Page navigation example">--}}
{{--                                    <ul class="pagination justify-content-end mb-0">--}}
{{--                                        <li class="page-item disabled">--}}
{{--                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i class="zmdi zmdi-chevron-left"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                        <li class="page-item">--}}
{{--                                            <a class="page-link" href="#"><i class="zmdi zmdi-chevron-right"></i></a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </nav>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- Tab Footer End -->
            </div>
            <div class="tab-pane fade show" id="products" role="tabpanel" aria-labelledby="nav-products-tab">
                <div class="tab_header">
                    <h1>Products</h1>
                </div>
                <!-- Order List Start -->
                <div class="order_list">
                    <div class="list_header d-flex">
                        <h2 class="text-center order_num">Matricule</h2>
                        <h2 class="text-left Name">Product</h2>
                        <h2 class="text-center Amount">Price</h2>
                        <h2 class="text-center Table">Quantity</h2>
                        <h2 class="text-center Items">Amount</h2>
                        <h2 class="text-right Payment">CreatedAt</h2>
                    </div>

                    <ul>
                        @foreach($sales as $sale)
                            @foreach($sale->salesProducts as $sp)
                                <li class="d-flex">
                                    <h3 class="text-center order_num">{{\App\Models\Sale::where('id',$sp->sale_id)->first()->matricule}}</h3>
                                    <h3 class="text-left Name">{{\App\Models\Product::where('id',$sp->product_id)->first()->name}}</h3>
                                    <h3 class="text-center Amount">
                                        <strong>{{\App\Models\Product::where('id',$sp->product_id)->first()->price}} €</strong>
                                    </h3>
                                    <h3 class="text-center Table">{{$sp->quantity}}</h3>
                                    <h3 class="text-center Items">{{$sp->amount}} €</h3>
                                    <h3 class="text-right Payment">{{$sp->created_at}}</h3>
                                    <div class="btn_container d-flex mr-0 ml-auto">
                                        <button type="button" class="btn">
                                            <a data-toggle="modal" data-target="#receipt_model"><i
                                                    class="zmdi zmdi-print"></i></a>
                                        </button>
                                    </div>
                                </li>
                            @endforeach
                        @endforeach
                    </ul>
                </div>
                <!-- Order List End -->

                <!-- Tab Footer start -->
{{--                <div class="tab_footer">--}}
{{--                    <div class="row no-gutter align-items-center">--}}
{{--                        <div class="col-12 col-md-12 col-lg-4 pb-3">--}}
{{--                            <h2>Showing 1 to 10 of 126 item</h2>--}}
{{--                        </div>--}}
{{--                        <div class="col-12 col-md-12 col-lg-8 pb-3">--}}
{{--                            <div class="row align-items-center">--}}
{{--                                <form class="col-7">--}}
{{--                                    <div class="form-group d-flex align-items-center">--}}
{{--                                        <label for="exampleFormControlSelect1">Item per page</label>--}}
{{--                                        <select class="form-control mx-3" id="exampleFormControlSelect1"--}}
{{--                                                style="max-width: 80px;">--}}
{{--                                            <option>10</option>--}}
{{--                                            <option>15</option>--}}
{{--                                            <option>20</option>--}}
{{--                                            <option>25</option>--}}
{{--                                            <option>30</option>--}}
{{--                                        </select>--}}
{{--                                    </div>--}}
{{--                                </form>--}}

{{--                                <nav class="navigation col-5" aria-label="Page navigation example">--}}
{{--                                    <ul class="pagination justify-content-end mb-0">--}}
{{--                                        <li class="page-item disabled">--}}
{{--                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i--}}
{{--                                                    class="zmdi zmdi-chevron-left"></i></a>--}}
{{--                                        </li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                        <li class="page-item">--}}
{{--                                            <a class="page-link" href="#"><i class="zmdi zmdi-chevron-right"></i></a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </nav>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- Tab Footer End -->
            </div>
            <!-- Sales Tab Content End -->

            <!-- Expenses Tab Content Start -->
            <!-- Tab Content End -->
        </div>
    </div>
    <!-- Right Sidebar End -->
</div>
<!-- Body Wrapper End -->


<!-- Receipt Modal Start  -->
<div class="modal fade receipt_model" id="receipt_model" tabindex="-1" role="dialog" aria-labelledby="receipt_modelTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-right" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row no-gutters w-100 align-items-center">
                    <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                        <h2>Receipt</h2>
                    </div>
                    <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                        <div class="btn_container d-flex">
                            <button type="button" class="btn">
                                <a href="#"><i class="zmdi zmdi-download"></i></a>
                            </button>
                            <button type="button" class="btn">
                                <a href="#"><i class="zmdi zmdi-print"></i></a>
                            </button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-body p-0">
                <div class="about_restro text-center">
                    <h3>Suzlon Restro</h3>
                    <p>1024, Opera Park, New York, USA</p>
                </div>
                <div class="about_customer">
                    <h3 class="d-flex"><span>Jimmy Taylor</span> <span class="mr-0 ml-auto">Order num 00123</span></h3>
                    <h3 class="d-flex"><span>20-06-2020, 11:50 am</span> <span class="mr-0 ml-auto">by admin1</span></h3>
                </div>
                <ul>
                    <li class="d-flex">
                        <h4>1</h4>
                        <h3>Onion Sandwich</h3>
                        <h5 class="mr-0 ml-auto">$12.00</h5>
                    </li>
                    <li class="d-flex">
                        <h4>1</h4>
                        <h3>Cheese garlic Pizza
                            <span>With Extra Cheese</span>
                        </h3>
                        <h5 class="mr-0 ml-auto">$18.00
                            <span class="text-right">$3.00</span>
                        </h5>
                    </li>
                    <li class="d-flex">
                        <h4>1</h4>
                        <h3>Ham Burger</h3>
                        <h5 class="mr-0 ml-auto">$10.00</h5>
                    </li>
                    <li class="d-flex">
                        <h4>1</h4>
                        <h3>Vanilla Ice Cream</h3>
                        <h5 class="mr-0 ml-auto">$8.00</h5>
                    </li>
                </ul>

                <div class="amount_details">
                    <h3 class="d-flex">Sub Total <span class="ml-auto mr-0">$51.00</span></h3>
                    <h3 class="d-flex">Tax (5%) <span class="ml-auto mr-0">$3.00</span></h3>
                </div>
                <div class="total_paid">
                    <h3 class="d-flex align-items-center">Total Paid in <strong>Cash</strong> <span class="ml-auto mr-0">$54.00</span></h3>
                </div>
                <div class="receipt_footer">
                    <h2 class="text-center">Thank You For Visit <br> Suzlon Restro</h2>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- Receipt Modal End  -->



<!-- Add Expenses  Modal Start  -->
<div class="modal fade add_expenses receipt_model px-0" id="add_expenses" tabindex="-1" role="dialog" aria-labelledby="receipt_modelTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header px-0">
                <h2 class="col-10 mx-auto">Add Expense</h2>
            </div>
            <div class="modal-body p-0">
                <form>
                    <div class="col-10 mx-auto form_container">
                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6 col-sm-12 my-0">
                                <div class="form-group">
                                    <label>Date</label>
                                    <div class="select_box d-flex">
                                        <input mb-0 class="form-control" placeholder="Select Date" id="datetime">
                                        <i class="zmdi zmdi-calendar-alt" style="font-size: 1.3rem; top: 10px;"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 col-md-6 col-sm-12 my-0">
                                <div class="form-group">
                                    <label>Expense type</label>
                                    <div class="select_box d-flex">
                                        <select class="form-control custom-select">
                                            <option>Kichen</option>
                                            <option>Account</option>
                                            <option>Maintenace</option>
                                            <option>Interior</option>
                                        </select>
                                        <i class="zmdi zmdi-caret-down"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label> Name</label>
                            <input type="name" class="form-control" value="Opera Vegetables"name="name" id="name">
                        </div>

                        <div class="row">
                            <div class="col-12 col-lg-6 col-md-6 col-sm-12 my-0">
                                <div class="form-group">
                                    <label>user</label>
                                    <input type="name" class="form-control" value="120"name="user" id="user_id">
                                </div>
                            </div>

                            <div class="col-12 col-lg-6 col-md-6 col-sm-12 my-0">
                                <div class="form-group">
                                    <label>payment</label>
                                    <input type="name" class="form-control" value="VG24125"name="payment" id="payment">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Client</label>
                            <div class="custom-file upload_file">
                                <input class="form-control" id="customFile" value="Choose file"name="Client" id="client_name">
                                <button type="file" class="btn"><a href="#">Upload file</a></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>created At</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"name="created At" id="created At"></textarea>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <div class="row no-gutters w-100">
                            <div class="col-6"> <button type="file" class="btn Cencel" data-dismiss="modal"><a href="#">Cencel</a></button></div>
                            <div class="col-6"> <button type="file" class="btn"><a href="#">Add Expense</a></button></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>


<!-- Add Expenses Modal End  -->


<!-- Require Javascript Start -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- Require Javascript End -->
<script src="js/jquery.datetimepicker.full.js"></script>
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
