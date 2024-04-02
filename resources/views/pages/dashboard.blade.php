<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- Custom CSS -->
    <link href="css/style.css" type="text/css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" type="text/css" rel="stylesheet">

    <!-- Font CSS -->
    <link href="css/gogle_sans_font.css" type="text/css" rel="stylesheet">

    <!--  For icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.css">
    <!-- Page Title -->
    <title></title>

    <!--
	 Owl-carousel CSS
	<link href="css/owl.carousel.min.css" type="text/css" rel="stylesheet">
-->

</head>

<body id="page_home">
<!-- Header Start -->
<header class="container-fluid ">
    <nav class="navbar navbar-expand-xl navbar-light align-items-center">
        <div class="nav-item">
            <a class="navbar-brand nav-link px-2" href="dashboard.html">
                <img src="images/logo.png" class="img-fluid">
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
    <div class="container-fluid d-flex align-items-start">
        <div class="left-dasboard p-4 text-center text-white">
            <h2 class="m-0">Realtime<br>Orders</h2>
            <strong class="display-1">8</strong>
            <p class="text-muted m-0">(39 Items)</p>
            <a href="#" class="btn-outline-success px-5 py-3 d-inline-block mt-4 mb-2">View Status</a><br>
            <a href="#" class="btn-success px-5 py-3 d-inline-block mt-2 mb-4" style="border-radius: 30px;">Add Order</a>
            <h2 class="m-0">60%</h2>
            <small class="text-muted">6/10</small>
            <p class="h5 mb-4 mt-3">TABLES OCCUPIED</p>
            <p class="h1 mb-0">$683.4</p>
            <small class="text-muted">68 orders/210 items</small>
            <p class="h5 mt-4">SALES TODAY</p>
        </div>
        <div class="right-dasboard text-white">
            <div class="chart-area p-3 p-xl-4 mb-4">
                <div class="d-flex">
                    <div class="menus">
                        <ul class="d-flex list-unstyled text-muted h4">
                            <li class="text-success">Sales</li>
                            <li class="mx-4">Revanue</li>
                            <li>Orders</li>
                        </ul>
                    </div>
                    <div class="select ml-auto mr-0">
                        <select class="btn-outline-success py-2 px-4 h5">
                            <option>This Week</option>
                            <option>This Month</option>
                            <option>Last 3 Months</option>
                            <option>Last 6 Months</option>
                            <option>Last 12 Months</option>
                        </select>
                    </div>
                </div>
                <canvas id="bar-chart" width="800" height="230"></canvas>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="chart-area p-3 p-xl-4 d-flex align-items-center">
                                <i class="zmdi zmdi-cutlery text-success"></i>
                                <div class='ml-4'>
                                    <span class="text-muted">Total Orders</span>
                                    <strong class="h1 d-block">128</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="chart-area p-3 p-xl-4 d-flex align-items-center">
                                <i class="zmdi zmdi-cutlery text-success"></i>
                                <div class='ml-4'>
                                    <span class="text-muted">Total Orders</span>
                                    <strong class="h1 d-block">128</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="chart-area p-3 p-xl-4 d-flex align-items-center">
                                <i class="zmdi zmdi-cutlery text-success"></i>
                                <div class='ml-4'>
                                    <span class="text-muted">Total Orders</span>
                                    <strong class="h1 d-block">128</strong>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <div class="chart-area p-3 p-xl-4 d-flex align-items-center">
                                <i class="zmdi zmdi-cutlery text-success"></i>
                                <div class='ml-4'>
                                    <span class="text-muted">Total Orders</span>
                                    <strong class="h1 d-block">128</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="chart-area p-3">
                        <canvas id="doughnut-chart" width="800" height="500"></canvas>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="chart-area p-3 p-xl-4">
                        <h4 class="text-white mb-5">Top Selling items</h4>
                        <div class="media mb-3">
                            <img src="images/1.png" class="align-self-center mr-3" alt="" width="65" height="65" style="border-radius: 15px;">
                            <div class="media-body">
                                <h5 class="my-1">Cream Pancake</h5>
                                <span class="text-muted">124 times</span>
                            </div>
                        </div>
                        <div class="media mb-3">
                            <img src="images/1.png" class="align-self-center mr-3" alt="" width="65" height="65" style="border-radius: 15px;">
                            <div class="media-body">
                                <h5 class="my-1">Cream Pancake</h5>
                                <span class="text-muted">124 times</span>
                            </div>
                        </div>
                        <div class="media mb-3">
                            <img src="images/1.png" class="align-self-center mr-3" alt="" width="65" height="65" style="border-radius: 15px;">
                            <div class="media-body">
                                <h5 class="my-1">Cream Pancake</h5>
                                <span class="text-muted">124 times</span>
                            </div>
                        </div>
                        <div class="media mb-3">
                            <img src="images/1.png" class="align-self-center mr-3" alt="" width="65" height="65" style="border-radius: 15px;">
                            <div class="media-body">
                                <h5 class="my-1">Cream Pancake</h5>
                                <span class="text-muted">124 times</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="chart-area p-3 p-xl-4 mb-4">
                        <h4 class="text-white mb-5">Orders from</h4>
                        <div class="progress-bar-box d-flex align-items-center mb-4">
                            <span style="min-width: 120px;" class="h6 m-0">Tables</span>
                            <div class="progress" style="height: 20px;width: 100%">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 92%" aria-valuenow="92" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span style="min-width: 100px;" class="text-right">602 <span class="text-muted">(92%)</span></span>
                        </div>
                        <div class="progress-bar-box d-flex align-items-center mb-4">
                            <span style="min-width: 120px;" class="h6 m-0">Takeaway</span>
                            <div class="progress" style="height: 20px;width: 100%">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 8%" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span style="min-width: 100px;" class="text-right">52 <span class="text-muted">(8%)</span></span>
                        </div>
                    </div>
                    <div class="chart-area p-3 p-xl-4 mb-4">
                        <h4 class="text-white mb-5">Payment Modes</h4>

                        <div class="progress-bar-box d-flex align-items-center mb-4">
                            <span style="min-width: 120px;" class="h6 m-0">Cash</span>
                            <div class="progress" style="height: 20px;width: 100%">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 64%" aria-valuenow="64" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span style="min-width: 100px;" class="text-right">22.8k <span class="text-muted">(64%)</span></span>
                        </div>
                        <div class="progress-bar-box d-flex align-items-center mb-4">
                            <span style="min-width: 120px;" class="h6 m-0">Credit Card</span>
                            <div class="progress" style="height: 20px;width: 100%">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 31%" aria-valuenow="31" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span style="min-width: 100px;" class="text-right">10.5k <span class="text-muted">(31%)</span></span>
                        </div>
                        <div class="progress-bar-box d-flex align-items-center mb-4">
                            <span style="min-width: 120px;" class="h6 m-0">Online</span>
                            <div class="progress" style="height: 20px;width: 100%">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 5%" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <span style="min-width: 100px;" class="text-right">3.1k <span class="text-muted">(5%)</span></span>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>
<!-- Body Wrapper End -->

<!-- Require Javascript Start -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="js/jquery.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script>
    // Bar chart
    new Chart(document.getElementById("bar-chart"), {
        type: 'bar',
        data: {
            labels: ["12 Jan", "13 Jan", "14 Jan", "15 Jan", "16 Jan"],
            datasets: [{
                label: "Items",
                backgroundColor: ["#28a745", "#28a745", "#28a745", "#28a745", "#28a745"],
                //                    backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#e8c3b9", "#c45850"],
                data: [478, 567, 634, 584, 483],
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


    new Chart(document.getElementById("doughnut-chart"), {
        type: 'doughnut',
        legend: {
            position: 'bottom'
        },
        data: {
            labels: ["FastFood 26%", "Main Course (26%)", "Beverage (12%)", "Dessert (32%)", "Itallian (10%)", "Starter (9%)", "Indaian (16%)", "Other (6%)"],
            datasets: [{
                //                    label: "Population (millions)",
                backgroundColor: ["#eb1e1e", "#f09514", "#f02899", "#03b8ff", "#009946", "#8d37e6", "#898989", "#3337f0"],
                data: [26, 26, 12, 32, 10, 9, 16, 6],
                borderWidth: [0, 0, 0, 0, 0, 0, 0, 0]
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
    jQuery(function($) {
        var path = window.location.href;
        $('a.nav-link').each(function() {
            if (this.href === path) {
                $(this).closest('.nav-item').addClass('active');
            }
        });
    });
</script>
<!-- Require Javascript End -->

</body>

</html>
