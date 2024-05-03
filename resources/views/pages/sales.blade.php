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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let sale_id
        $(document).ready(function() {
            document.getElementById('btn-click').addEventListener('click', function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'GET',
                    url: '/sale/show/' + sale_id,
                    success: function (response) {
                        if (response) {
                            if (sale_id === response.id) {
                                const date = new Date(response?.created_at);
                                document.getElementById('matricule').textContent = response?.matricule
                                document.getElementById('user').textContent = 'by ' + response?.user
                                document.getElementById('adresse').textContent = response?.adresse
                                document.getElementById('payment_type').textContent = response?.payment_type
                                document.getElementById('client_name').textContent = response?.client_name
                                document.getElementById('created_at').textContent = date.getDay() + '/' + date.getMonth() + '/' + date.getFullYear() + ', at ' + date.getHours() + 'h:' + date.getMinutes() + 'min'
                                document.getElementById('total_paid').textContent = response?.total_paid + ' €'
                                document.getElementById('income').textContent = response?.income + ' €'
                                document.getElementById('amount_given').textContent = response?.amount_given + ' €'
                                const productList = document.getElementById("product-list");
                                response?.sales_products.forEach(product => {
                                    const li = document.createElement("li");
                                    // Create li element
                                    li.classList.add("d-flex");
                                    // Set innerHTML of li with product details
                                    li.innerHTML = `<h4>${product.product}</h4>
                                <h3></h3>
                                <h5 class="mr-0 ml-auto">${product.price} € x ${product.quantity}</h5>`;

                                    // Append li to ul
                                    productList.appendChild(li);
                                });
                            }
                        }
                    },
                    error: function (xhr, status, error) {
                        console.log(status);
                        console.log(error);
                        console.log(xhr);
                        // Handle errors here
                    }
                })
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#receipt_model').on('hidden.bs.modal', function () {
                const productList = document.getElementById("product-list");
                productList.innerHTML = ''
                // will only come inside after the modal is shown
            });

        });
    </script>
{{--    hello--}}

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
{{--            <a class="nav-item nav-link " id="nav-products-tab" data-toggle="tab" href="#products" role="tab"--}}
{{--               aria-controls="nav-home" aria-selected="false">Products</a>--}}
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
                        <h2 class="text-center order_num">Name</h2>
                        <h2 class="text-center Name">User</h2>
                        <h2 class="text-center Amount">Client</h2>
                        <h2 class="text-center Table">Total Paid</h2>
                        <h2 class="text-center Items">Payment</h2>
                        <h2 class="text-center CreatedAt" style="position: relative; left: 6.2%">CreatedAt</h2>
                    </div>

                    <ul>
                        @foreach($sales as $sale)
                        <li class="d-flex">
                            <h3 class="text-center order_num">{{$sale->matricule}}</h3>
                            <h3 class="text-center Name">
                                <strong>{{\App\Models\User::where('id',$sale->user_id)->first()->username}}</strong>
                            </h3>
                            <h3 class="text-center Amount">{{$sale->client_name}}</h3>
                            <h3 class="text-center Table">{{$sale->total_paid}} €</h3>
                            <h3 class="text-center Items">{{\App\Models\Payment::where('id', $sale->payment_id)->first()->type}}</h3>
                            <h3 class="text-center text-muted CreatedAt"
                                style="position: relative; left: 6.2%">{{$sale->created_at}}</h3>
                            <div class="btn_container d-flex ml-auto">
                                <button type="button" id="btn-click" class="btn" onclick="
                                sale_id={{$sale->id}};">
                                    <a data-toggle="modal" data-target="#receipt_model"><i class="zmdi zmdi-eye"></i></a>
                                </button>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Order List End -->

                <!-- Tab Footer start -->
            </div>
{{--            <div class="tab-pane fade show" id="products" role="tabpanel" aria-labelledby="nav-products-tab">--}}
{{--                <div class="tab_header">--}}
{{--                    <h1>Products</h1>--}}
{{--                </div>--}}
{{--                <!-- Order List Start -->--}}
{{--                <div class="order_list">--}}
{{--                    <div class="list_header d-flex">--}}
{{--                        <h2 class="text-center order_num">Matricule</h2>--}}
{{--                        <h2 class="text-left   Name">Product</h2>--}}
{{--                        <h2 class="text-center Amount">Price</h2>--}}
{{--                        <h2 class="text-center Table">Quantity</h2>--}}
{{--                        <h2 class="text-center Items">Amount</h2>--}}
{{--                        <h2 class="text-right  CreatedAt" style="position: relative; left: 4.5%">CreatedAt</h2>--}}
{{--                    </div>--}}

{{--                    <ul>--}}
{{--                        @foreach($sales as $sale)--}}
{{--                            @foreach($sale->salesProducts as $sp)--}}
{{--                                <li class="d-flex">--}}
{{--                                    <h3 class="text-center order_num">{{\App\Models\Sale::where('id',$sp->sale_id)->first()->matricule}}</h3>--}}
{{--                                    <h3 class="text-left Name">{{\App\Models\Product::where('id',$sp->product_id)->first()->name}}</h3>--}}
{{--                                    <h3 class="text-center Amount">--}}
{{--                                        <strong>{{\App\Models\Product::where('id',$sp->product_id)->first()->price}} €</strong>--}}
{{--                                    </h3>--}}
{{--                                    <h3 class="text-center Table">{{$sp->quantity}}</h3>--}}
{{--                                    <h3 class="text-center Items">{{$sp->amount}} €</h3>--}}
{{--                                    <h3 class="text-right text-muted CreatedAt"--}}
{{--                                        style="position: relative; left: 4.5%">{{$sp->created_at}}</h3>--}}
{{--                                    <div class="btn_container d-flex mr-0 ml-auto">--}}
{{--                                        <button type="button" class="btn">--}}
{{--                                            <a data-toggle="modal" data-target="#receipt_model"><i--}}
{{--                                                    class="zmdi zmdi-print"></i></a>--}}
{{--                                        </button>--}}
{{--                                    </div>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        @endforeach--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--                <!-- Order List End -->--}}

{{--                <!-- Tab Footer start -->--}}
{{--            </div>--}}
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
{{--                            <button type="button" class="btn">--}}
{{--                                <a href="#"><i class="zmdi zmdi-print"></i></a>--}}
{{--                            </button>--}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-body p-0">
                <div class="about_restro text-center">
                    <h3>Paintball Family</h3>
                    <p id="adresse"></p>
                </div>
                <div class="about_customer">
                    <h3 class="d-flex"><span id="client_name"></span><span class="mr-0 ml-auto" id="matricule"></span>
                    </h3>
                    <h3 class="d-flex"><span id="created_at"></span> <span class="mr-0 ml-auto" id="user"></span></h3>
                </div>
                <ul id="product-list">
                </ul>

                <div class="amount_details">
                    <h3 class="d-flex">Amount Given <span class="ml-auto mr-0" id="amount_given"></span></h3>
                    <h3 class="d-flex">Income<span class="ml-auto mr-0" id="income"></span></h3>
                </div>
                <div class="total_paid">
                    <h3 class="d-flex align-items-center">Total Paid in <strong id="payment_type"></strong> <span
                            class="ml-auto mr-0" id="total_paid"></span></h3>
                </div>
                <div class="receipt_footer">
                    <h2 class="text-center">Thank You For Visit <br> Paintball Family</h2>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- Receipt Modal End  -->



<!-- Add Expenses  Modal Start  -->

<!-- Add Expenses Modal End  -->


<!-- Require Javascript Start -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
      integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>
<!-- Require Javascript End -->
{{----}}



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
