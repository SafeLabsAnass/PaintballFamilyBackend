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
    <link href="{{ asset('css/jquery.datetimepicker.min.css') }}" type="text/css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css') }}" type="text/css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{ asset('css/responsive.css') }}" type="text/css" rel="stylesheet">

    <!-- Font CSS -->
    <link href="{{ asset('css/gogle_sans_font.css') }}" type="text/css" rel="stylesheet">

    <!--  For icon -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- Page Title -->
    <title></title>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
    </script>

    <script>
        let sale_id
        function show(id){
            sale_id = id
        }
        function showSale(id) {
            $(document).ready(function() {
                $.ajax({
                    type: 'GET',
                    url: '/sale/show/' + id,
                    success: function(response) {
                        if (response) {
                            if (id === response.id) {
                                const date = new Date(response?.created_at);
                                document.getElementById('facture_id').textContent = response?.facture_id
                                document.getElementById('user').textContent = 'by ' + response?.user
                                document.getElementById('adresse').textContent = response?.adresse
                                document.getElementById('payment_type').textContent = response
                                    ?.payment_type
                                document.getElementById('client_name').textContent = response
                                    ?.client_name
                                document.getElementById('created_at').textContent = date.getDay() +
                                    '/' + date.getMonth() + '/' + date.getFullYear() + ', at ' + date
                                    .getHours() + 'h:' + date.getMinutes() + 'min'
                                document.getElementById('total_amount').textContent = response
                                    ?.total_amount + ' €'
                                document.getElementById('income').textContent = response?.income + ' €'
                                document.getElementById('amount_given').textContent = response
                                    ?.amount_given + ' €'
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
                                document.getElementById('total_amount_show').value = response?.total_amount
                                document.getElementById('total_paid_show').value = response?.total_paid
                                // document.getElementById('total_paid_show').disabled = response?.total_amount === response?.total_paid;
                                const statusList = document.getElementById("status");
                                let select = document.getElementById("status");
                                select.innerHTML = '';
                                let list_status;
                                list_status = ['Paid', 'Unpaid', 'Draft']
                                let list_status_not_in_status = []
                                list_status.forEach(status => {
                                    // Create li element
                                    let option;
                                    if (response?.status === status) {
                                        option = document.createElement("option")
                                        option.textContent = status;
                                        statusList.appendChild(option);                                     }
                                    else{
                                        list_status_not_in_status.push(status)
                                    }
                                    // Append li to ul
                                });
                                list_status_not_in_status.forEach(status => {
                                    const option = document.createElement("option")
                                    // Create li element
                                    option.textContent = status;
                                    // Optionally, set a value for the option
                                    statusList.appendChild(option);
                                    // Append li to ul
                                });
                            }
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log(status);
                        console.log(error);
                        console.log(xhr);
                        // Handle errors here
                    }
                })
            });
        }
        $(document).ready(function() {
            document.getElementById('editForm').addEventListener('submit', function (event) {
                event.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'POST',
                    url: '/sale/edit/' + sale_id,
                    data: $('#editForm').serialize(),
                    dataType: 'json',
                    success: function(data) {
                        if (data.status === "success") {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: data.message !== '' ? data.message : '',
                                showConfirmButton: false,
                                timer: 3000,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                                didClose: ()=>{
                                    location.reload();
                                }
                            });
                        } else {
                            if (data.status) {
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    title: data.message !== '' ? data.message : '',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    didOpen: () => {
                                        Swal.showLoading();
                                    },
                                });
                                // window.location.reload();
                            }
                        }
                    },
                    error: function(xhr, status, error) {
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
            $('#receipt_model').on('hidden.bs.modal', function() {
                const productList = document.getElementById("product-list");
                productList.innerHTML = ''
            });
        });
    </script>
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
                <a class="nav-item nav-link active mt-5" id="nav-sales-tab" data-toggle="tab" href="#sales"
                    role="tab" aria-controls="nav-home" aria-selected="true">Sales</a>
                {{--            <a class="nav-item nav-link " id="nav-products-tab" data-toggle="tab" href="#products" role="tab" --}}
                {{--               aria-controls="nav-home" aria-selected="false">Products</a> --}}
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
                            <h2 class="text-center order_num">FactureId</h2>
                            <h2 class="text-center Items">User</h2>
                            <h2 class="text-center Items">Client</h2>
                            <h2 class="text-center Items">Total Amount</h2>
                            <h2 class="text-center Items">Total Paid</h2>
                            <h2 class="text-center Items">Payment</h2>
                            <h2 class="text-center Items">Status</h2>
                            <h2 class="text-center CreatedAt">CreatedAt</h2>
                        </div>

                        <ul>
                            @foreach ($sales as $sale)
                                <li class="d-flex">
                                    <h3 class="text-center order_num">{{ $sale->facture_id }}</h3>
                                    <h3 class="text-center Items">
                                        <strong>{{ \App\Models\User::where('id', $sale->user_id)->first()->username }}</strong>
                                    </h3>
                                    <h3 class="text-center Items">{{ $sale->client_name }}</h3>
                                    <h3 class="text-center Items">{{ $sale->total_amount }} €</h3>
                                    <h3 class="text-center Items">{{ $sale->total_paid }} €</h3>
                                    <h3 class="text-center Items">
                                        {{ \App\Models\Payment::where('id', $sale->payment_id)->first()->type }}</h3>
                                    <h3 class="text-center Items">
                                        {{ $sale->status }}</h3>
                                    <h3 class="text-center text-muted CreatedAt">
                                        {{ $sale->created_at }}</h3>
                                    <div class="btn_container d-flex ml-auto">
                                        @if ($sale->status == 'Paid')
                                        <button type="button" id="btn-click" class="btn"
                                            onclick="showSale({{ $sale->id }})">
                                            <a data-toggle="modal" data-target="#receipt_model"><i
                                                    class="zmdi zmdi-eye"></i></a>
                                        </button>
                                        @else
                                        <button type="button" id="btn-click" class="btn"
                                        onclick="showSale({{ $sale->id }})">
                                        <a data-toggle="modal" data-target="#receipt_model"><i
                                                class="zmdi zmdi-eye"></i></a>
                                        </button>
                                        <button type="button" id="btn-click" class="btn"><a href="{{route('sale.destroy.web',$sale->id)}}"><i
                                                class="zmdi zmdi-delete"></i></a>
                                        </button>
                                        <button class="btn" type="button" id="btn_show" data-toggle="modal"
                                            data-target="#edit_sale" onclick="show({{ $sale->id }});showSale({{$sale->id}})"><i
                                                class="zmdi zmdi-edit mb-5"></i></button>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Order List End -->
                    <div class="tab_footer">
                        <div class="row no-gutter align-items-center">
                            <div class="col-12 col-md-12 col-lg-4 pb-3">
                                <h2>Showing 1 to {{$sales->count()}} of {{App\Models\Sale::all()->count()}}
                                    items</h2>
                            </div>
                            <div class="col-12 col-md-12 col-lg-8 pb-3">
                                <div class="row align-items-center">
                                    {{--                                    <form class="col-7" id="itemsPerPageForm" action="{{ route('updatePerPage') }}"--}}
                                    {{--                                          method="POST">--}}
                                    {{--                                        <div class="form-group d-flex align-items-center">--}}
                                    {{--                                            @csrf--}}
                                    {{--                                            <label for="exampleFormControlSelect1">Item per page--}}

                                    {{--                                            </label>--}}
                                    {{--                                            <select class="form-control mx-3" id="exampleFormControlSelect1"--}}
                                    {{--                                                    style="max-width: 80px;">--}}
                                    {{--                                                @foreach($items[2] as $item)--}}
                                    {{--                                                    @if($item == $items[1]->count())--}}
                                    {{--                                                        <option>{{$item}}</option>--}}
                                    {{--                                                        @break--}}
                                    {{--                                                    @endif--}}
                                    {{--                                                @endforeach--}}
                                    {{--                                                @foreach($items[2] as $item)--}}
                                    {{--                                                    @if($item != $items[1]->count())--}}
                                    {{--                                                        <option>{{$item}}</option>--}}
                                    {{--                                                        @endif--}}
                                    {{--                                                    @endforeach--}}
                                    {{--                                            </select>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </form>--}}
                                    <nav class="navigation col-5" aria-label="Page navigation example">
                                        <ul class="pagination justify-content-end mb-0">
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $sales->previousPageUrl() }}"><i
                                                        class="zmdi zmdi-chevron-left"></i></a>
                                            </li>
                                            @for ($i = 1; $i <= $sales->lastPage(); $i++)
                                                <li class="page-item"><a class="page-link"
                                                                         href="{{ $sales->url($i) }}">{{$i}}</a></li>
                                            @endfor
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $sales->nextPageUrl() }}"><i
                                                        class="zmdi zmdi-chevron-right"></i></a>
                                            </li>
                                        </ul>
                                    </nav>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tab Footer start -->
                </div>

        </div>
        <!-- Right Sidebar End -->
    </div>
    <!-- Body Wrapper End -->


    <!-- Receipt Modal Start  -->
    <div class="modal fade receipt_model" id="receipt_model" tabindex="-1" role="dialog"
        aria-labelledby="receipt_modelTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-right" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="row no-gutters w-100 align-items-center">
                        <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                            <h2>Receipt</h2>
                        </div>
                        <div class="col-12 col-lg-6 col-md-6 col-sm-6">
                            <div class="btn_container d-flex">
                                {{--                            <button type="button" class="btn"> --}}
                                {{--                                <a href="#"><i class="zmdi zmdi-print"></i></a> --}}
                                {{--                            </button> --}}
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-body p-0">
                    <div class="about_restro text-center">
                        <h3>{{ \App\Models\Company::all()->first()->name }}</h3>
                        <p id="adresse"></p>
                    </div>
                    <div class="about_customer">
                        <h3 class="d-flex"><span id="client_name"></span><span class="mr-0 ml-auto"
                                id="facture_id"></span>
                        </h3>
                        <h3 class="d-flex"><span id="created_at"></span> <span class="mr-0 ml-auto"
                                id="user"></span></h3>
                    </div>
                    <ul id="product-list">
                    </ul>

                    <div class="amount_details">
                        <h3 class="d-flex">Amount Given <span class="ml-auto mr-0" id="amount_given"></span></h3>
                        <h3 class="d-flex">Income<span class="ml-auto mr-0" id="income"></span></h3>
                    </div>
                    <div class="total_paid">
                        <h3 class="d-flex align-items-center">Total Paid in <strong id="payment_type"></strong> <span
                                class="ml-auto mr-0" id="total_amount"></span></h3>
                    </div>
                    <div class="receipt_footer">
                        <h2 class="text-center" id="thanks_message"></h2>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <div class="modal fade add_category_model add_expenses receipt_model px-0" id="edit_sale" tabindex="-1"
     role="dialog" aria-labelledby="receipt_modelTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header px-0">
                <h2 class="col-10 mx-auto">Edit Status</h2>
            </div>
            <div class="modal-body p-0">

                <form id="editForm">
                    <div class="col-10 mx-auto form_container">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" style="background: var(--bg-color)! important;" id="status">
                                    </select>
                        </div>
                        <div class="form-group">
                            <label>Payment</label>
                            <select name="payment" style="background: var(--bg-color)! important;">
                                @foreach(\App\Models\Payment::all() as $payment)
                                    <option>{{$payment->type}}</option>
                                @endforeach
                                    </select>
                        </div>
                        <div class="form-group">
                            <label>Total Amount</label>
                            <input type="number" class="form-control" name="total_amount"
                                   id="total_amount_show" min="0" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="
this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'">
                        </div>
                        <div class="form-group">
                            <label>Total Paid</label>
                            <input type="number" class="form-control" name="total_paid"
                                   id="total_paid_show" min="0" value="0" step="0.01" title="Currency" pattern="^\d+(?:\.\d{1,2})?$" onblur="
this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="row no-gutters w-100 mb-5">
                            <div class="col-6">
                                <button type="reset" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Edit Sale</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/he@1.2.0/he.js"></script>
    <script type="text/javascript">
        var thanksMessage = "Your actual thanks message here";
        var encodedContent =
            "@isset(\App\Models\InvoiceSetting::all()->first()->thanks_message) {{ \App\Models\InvoiceSetting::all()->first()->thanks_message }} @else '' @endif"
        var decodedContent = he.decode(encodedContent);
        plainText = String(decodedContent);
        document.getElementById("thanks_message").innerHTML = plainText
    </script>
    <!-- Receipt Modal End  -->



    <!-- Add Expenses  Modal Start  -->

    <!-- Add Expenses Modal End  -->


    <!-- Require Javascript Start -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
        integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Require Javascript End -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


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
