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
    <script type="text/javascript">
        function show(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type: 'GET',
                url: 'payments/show/'+id.toString(),
                dataType: 'json',
                success: function (response) {
                    if(response.data) {
                        document.getElementById('type_edited').value = response.data[0].type
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                    // Handle errors here
                }
            })
        }
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
            <a class="nav-item nav-link active" id="nav-sales-tab" data-toggle="tab" href="#sales" role="tab" aria-controls="nav-home" aria-selected="true">Payments</a>

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
                    <h1 class="d-flex">
                        <span class="d-block" style="min-width: 161px;">Payments</span>
                        <button type="button" class="btn"><a data-toggle="modal" data-target="#add_payment">Add New</a>
                        </button>
                    </h1>
                </div>
                <!-- Order List Start -->
                <div class="order_list">
                    <div class="list_header d-flex">
                        <h2 class="text-left Name ml-3">Name</h2>
                        <h2 class="text-right CreatedAt">CreatedAt</h2>
                    </div>

                    <ul>
                        @foreach($payments as $payment)
                        <li class="d-flex">
                            <h3 class="text-left Name ml-3">{{$payment->type}}</h3>
                            <h3 class="text-left CreatedAt">{{$payment->created_at}}</h3>
                            <div class="btn_container d-flex ml-auto">
                                <button type="button" class="btn">
                                    <a href="{{url('payments/destroy/'.$payment->id)}}"><i
                                            class="zmdi zmdi-delete"></i></a>
                                </button>
                                {{Session::put('payment_id',$payment->id)}}
                                <button class="btn" type="button" id="btn_show" data-toggle="modal"
                                        data-target="#edit_payment" onclick="show({{$payment->id}})"><i
                                        class="zmdi zmdi-edit mb-5"></i></button>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- Order List End -->

                <!-- Tab Footer start -->
            </div>
            <!-- Sales Tab Content End -->

            <!-- Expenses Tab Content Start -->
            <!-- Tab Content End -->
        </div>
    </div>
    <!-- Right Sidebar End -->
</div>
<div class="modal fade add_category_model add_expenses receipt_model px-0" id="edit_payment"
     tabindex="-1" role="dialog" aria-labelledby="receipt_modelTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header px-0">
                <h2 class="col-10 mx-auto">Edit Payment</h2>
            </div>
            <div class="modal-body p-0">

                <form action="{{route('payment.edit',Session::get('payment_id'))}}" method="POST">
                    @csrf
                    <div class="col-10 mx-auto form_container">
                        <div class="form-group">
                            <label>Type</label>
                            <input type="text" class="form-control" name="type"
                                   id="type_edited" required>
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
                                <button type="submit" class="btn">Edit Payment</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade add_category_model add_expenses receipt_model px-0" id="add_payment" tabindex="-1"
     role="dialog" aria-labelledby="receipt_modelTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header px-0">
                <h2 class="col-10 mx-auto">Add Payment</h2>
            </div>
            <div class="modal-body p-0">

                <form action="{{ route('payment.store') }}" method="POST" id="addForm">
                    @csrf
                    <div class="col-10 mx-auto form_container">
                        <div class="form-group">
                            <label>Type</label>
                            <input id="type" type="text"
                                   class="form-control" name="type"
                                   required autocomplete="type" autofocus>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <div class="row no-gutters w-100 mb-5">
                            <div class="col-6">
                                <button type="reset" class="btn btn-warning" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary">Add Payment</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>

<!-- Body Wrapper End -->


<!-- Receipt Modal Start  -->

<!-- Add Expenses Modal End  -->


<!-- Require Javascript Start -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- Require Javascript End -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
      integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
      crossorigin="anonymous" referrerpolicy="no-referrer"/>
<script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="{{ asset('js/jquery.datetimepicker.full.js')}}"></script>


</body>

</html>
