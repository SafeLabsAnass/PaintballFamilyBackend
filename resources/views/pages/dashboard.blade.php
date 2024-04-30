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
<div class="body_wrapper ">
    <div class="container-fluid d-flex align-items-start ">
        <div class="right-dasboard text-white ml-5">
            <div class="chart-area p-3 p-xl-4 mb-4 ml-5">
                <div class="d-flex">
                    <div class="menus">
                        <ul class="d-flex list-unstyled text-muted h4">
                            <li class="text-success">Sales</li>
                            <li class="mx-4">This Month</li>
                        </ul>
                    </div>
                </div>
                <canvas id="bar-chart" width="800" height="230"></canvas>
            </div>
            <div class="row ml-5">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-12 mb-4 ">
                            <div class="chart-area p-3 p-xl-4 d-flex align-items-center">
                                <i class="zmdi zmdi-cutlery text-success"></i>
                                <div class='ml-4'>
                                    <span class="text-muted">Total Sales</span>
                                    <strong class="h1 d-block">{{$items->sales}}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="chart-area p-3 p-xl-4 d-flex align-items-center">
                                <i class="zmdi zmdi-cutlery text-success"></i>
                                <div class='ml-4'>
                                    <span class="text-muted">Total Categories</span>
                                    <strong class="h1 d-block">{{$items->categories}}</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 mb-4">
                            <div class="chart-area p-3 p-xl-4 d-flex align-items-center">
                                <i class="zmdi zmdi-cutlery text-success"></i>
                                <div class='ml-4'>
                                    <span class="text-muted">Total Products</span>
                                    <strong class="h1 d-block">{{$items->products}}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="chart-area p-5">
                        <canvas id="doughnut-chart" width="800" height="500"></canvas>
                    </div>
                </div>
            </div>
            <div class="row ml-5 mb-5">
                <div class="col-md-5">
                    <div class="chart-area p-3 p-xl-4">
                        <h4 class="text-white pb-5">Top Selling items</h4>
                        <div class="media mb-3">
                            <img src="images/1.png" class="align-self-center mr-3" alt="" width="65" height="65"
                                 style="border-radius: 15px;">
                            <div class="media-body">
                                <h5 class="my-1">{{$items->topProduct['product']}}</h5>
                                <span class="text-muted">{{$items->topProduct['times']}}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="chart-area p-3 p-xl-4 mb-4">
                        <h4 class="text-white mb-5">Payment Modes</h4>

                        <div class="progress-bar-box d-flex align-items-center mb-4">
                            @foreach($items->paymentsStatistics as $payment)
                                <span style="min-width: 120px;" class="h6 m-0">{{$payment['payment']['type']}}</span>
                            <div class="progress" style="height: 20px;width: 100%">
                                <div class="progress-bar bg-success" role="progressbar"
                                     style="width: {{$payment['percent']}}%"
                                     aria-valuenow="{{$payment['percent']}}" aria-valuemin="0"
                                     aria-valuemax="100"></div>
                            </div>
                                <span style="min-width: 100px;"
                                      class="text-right mr-5">{{$payment['totalPayment']}} <span
                                        class="text-muted">({{$payment['percent']}}%)</span></span>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<!-- Require Javascript End -->
<script src="{{ asset('js/jquery.datetimepicker.full.js')}}"></script>

<script>
    $("#datetime").datetimepicker();
</script>
<!-- Body Wrapper End -->

<!-- Require Javascript Start -->

<script src="{{ asset('js/jquery.min.js')}}"></script>
<script src="{{ asset('js/owl.carousel.min.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript">
    let listDays = [];
    let listCount = [];
    let count
    let listColors = []
    function showChart() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: 'GET',
            url: '/home/chart/',
            dataType: 'json',
            success: function (response) {
                if (response) {
                    for (let i = 0; i < response.items.lineChart.length ; i++) {
                        listDays.push(response.items.lineChart[i].days.toString())
                        listCount.push(response.items.lineChart[i].count)
                    }
                    count = response.items.lineChart.length
                    for (let i = 0; i < count ; i++) {
                        listColors.push("#28a745")
                    }
                    console.log(listDays,listCount,listColors)
                    new Chart(document.getElementById("bar-chart"), {
                        type: 'bar',
                        data: {
                            labels: listDays,
                            datasets: [{
                                label: "Items",
                                backgroundColor: listColors,
                                data: listCount,
                                position: 'outside'
                            }]
                        },
                        options: {
                            legend: {
                                display: false
                            },
                            title: {
                                //                    display: true,
                                //                    text: 'Predicted world population (millions) in 2050'
                            }
                        }
                    });

                }
            },
            error: function (xhr, status, error) {
                console.log(status);
                console.log(error);
                console.log(xhr);
                // Handle errors here
            }
        })
    }
    showChart();
    // Bar chart


    new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        legend: {
            position: 'bottom'
        },
        data: {
            labels: ["paintball 26%", "Ninja (26%)", "Beverage (12%)", "Minigolf (32%)", "Itallian (10%)", "Starter (9%)", "Surf (16%)", "Palycity (6%)", "Popular (6%)" ],
            datasets: [{
                //                    label: "Population (millions)",
                backgroundColor: ["#eb1e1e", "#f09514", "#f02899", "#03b8ff", "#009946", "#8d37e6", "#898989", "#3337f0","#898909"],
                data: [26, 26, 12, 32, 10, 9, 16, 6,6],
                borderWidth: [0, 0, 0, 0, 0, 0, 0, 0,0]
            }]
        },
        options: {
            title: {
                //                    display: true,
                //                    text: 'Predicted world population (millions) in 2050'
            }
        }
    });
</script>
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
