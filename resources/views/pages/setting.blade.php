<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Datetimepicker CSS -->
    <link href="css/jquery.datetimepicker.min.css" type="text/css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/widgEditor.css" />

    <!-- Responsive CSS -->
    <link href="css/responsive.css" type="text/css" rel="stylesheet">

    <!-- Font CSS -->
    <link href="css/gogle_sans_font.css" type="text/css" rel="stylesheet">

    <!--  For icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <!-- Custom CSS -->
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <!-- Page Title -->
    <title></title>

</head>

<body id="page_items">
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
<div class="body_wrapper container-fluid">
    <div class="row no-gutters">
        <div class="col m-1" style="max-width: 45%;">
            <div class="bg-second p-4">
                <h3 class="mt-0 mb-4 text-white">Setting</h3>
                <form>
                    <div class="row pb-5 align-items-center">
                        <div class="col-12 col-lg-5 col-md-6 col-sm-12">
                            <div class="img_box d-flex align-items-center text-white p-3 bg-success" style="border-radius: 20px;">
                                <i class="zmdi zmdi-image-alt mr-3" style="font-size: 2rem;"></i>
                                <p class="m-0">Upload Icon</p>
                            </div>
                        </div>
                        <div class="col-12 col-lg-7 col-md-6 col-sm-12 pt-2">
                            <div class="d-flex info">
                                <i class="zmdi zmdi-info-outline d-block text-white mt-2 mr-4"></i>
                                <p class="text-muted m-0">Icon Should have in <br>1:1 ratio for better viewing <br> experience.</p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Company Name</label>
                        <input type="text" class="form-control" value="Italian Food">
                    </div>
                    <div class="form-group">
                        <label>Company Phone Num</label>
                        <input type="text" class="form-control" value="+1 987 987 6322">
                    </div>
                    <div class="form-group">
                        <label>Company Email Address Num</label>
                        <input type="email" class="form-control" value="mail2italianfood@gmail.com">
                    </div>
                    <h3 class="mt-0 my-4 text-white">PayPal Payment</h3>

                    <div class="form-group">
                        <label>PayPal secret key</label>
                        <input type="text" class="form-control" value="paypal_frgyrh_frgbsw454d_fgrekzn">
                    </div>
                    <div class="form-group">
                        <label>PayPal Publishable key</label>
                        <input type="text" class="form-control" value="paypal_frgyrh_frgbsw454d_fgrekzn">
                    </div>

                </form>
            </div>
        </div>
        <div class="col m-1">
            <div class="bg-second p-4 mb-2">
                <h3 class="mt-0 mb-5 text-white">Text in the Receipt Header</h3>
                <form>
                    <div class="row">
                        <div class="col-md-12">
                            <fieldset class="bg-white">
                                <textarea id="noise" name="noise" class="widgEditor nothing"></textarea>
                            </fieldset>
                        </div>
                        <h3 class="mt-0 my-4 text-white col-12">Text in the Receipt Header</h3>
                        <div class="col-md-12 mb-4">
                            <fieldset class="bg-white">
                                <textarea id="noise2" name="noise" class="widgEditor nothing"></textarea>
                            </fieldset>
                        </div>
                    </div>
                </form>
            </div>
            <div class="bg-second p-4 mb-4">
                <h3 class="mt-0 mb-5 text-white">Other Setting</h3>
                <form>
                    <div class="form-group">
                        <label>Currency</label>
                        <select class="form-control" style="background: var(--bg-color)! important;">
                            <option>USD</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Rounding (Number of decimal)</label>
                        <select class="form-control" style="background: var(--bg-color)! important;">
                            <option>0.01</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>TimeZone</label>
                        <select class="form-control" style="background: var(--bg-color)! important;">
                            <option>America/St_Barthelemy</option>
                        </select>
                    </div>
                </form>
            </div>
            <button type="submit" class="btn py-3" style="max-width: 200px">Submit</button>

        </div>
    </div>
</div>
<!-- Require Javascript Start -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!-- Require Javascript End -->



<script src="js/widgEditor.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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
