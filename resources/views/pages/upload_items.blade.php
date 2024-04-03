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

    <!-- Custom CSS -->
    <link href="css/style.css" type="text/css" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="css/responsive.css" type="text/css" rel="stylesheet">

    <!-- Font CSS -->
    <link href="css/gogle_sans_font.css" type="text/css" rel="stylesheet">

    <!--  For icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />

    <!-- Page Title -->
    <title></title>

</head>

<body id="page_items">
    <!-- Header Start -->
    <header class="container-fluid ">
        <nav class="navbar navbar-expand-xl navbar-light align-items-center">
            <a class="navbar-brand px-2" href="#">
                <img src="images/logo.png" class="img-fluid">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <i class="zmdi zmdi-menu"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <ul class="navbar-nav mr-0 ml-auto d-flex align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="zmdi zmdi-assignment"></i> POS</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#"><i class="zmdi zmdi-cutlery"></i> Items</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="zmdi zmdi-accounts-alt"></i> People</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="zmdi zmdi-collection-text"></i> Sales & Expenses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="zmdi zmdi-settings"></i> Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="zmdi zmdi-hourglass-alt"></i> Orders Status</a>
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
        <div class="row">
            <!-- Left Sidebar Start -->
            <div class="col" style="max-width: 250px">
                <div class="upload text-center my-4">
                    <a class="back-link" href="items.html"><i class="zmdi zmdi-arrow-left"></i> Back</a>
                    <div class="upload-box mt-5 mb-4 mx-auto">
                        <label for="img" class="img m-0 active">
                            <i class="zmdi zmdi-image-alt"></i>
                            <input id="img" type="file">
                            <span>Upload items image</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="row no-gutters">
                    <div class="col m-1">
                        <div class="bg-second p-4">
                            <h3 class="mt-0 mb-5 text-white">Upload an items</h3>
                            <form>
                                <div class="form-group">
                                    <label>Item Name</label>
                                    <input type="text" class="form-control" placeholder="" required="" value="Cream Pancake">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Item Name</label>
                                            <input type="text" class="form-control" placeholder="" required="" value="Cream Pancake">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Item Price (In $)</label>
                                            <input type="text" class="form-control" placeholder="" required="" value="Cream Pancake">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Choose Items Category</label>
                                    <select class="form-control" style="background: var(--bg-color)! important;">
                                        <option>Fast Foot</option>
                                        <option>Dinner Foot</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Item description</label>
                                    <textarea class="form-control" style="min-height: 100px;max-height: 100px;"></textarea>

                                </div>
                                <div class="form-group">
                                    <label>Add Ingredients (Separated by commas)</label>
                                    <select class="form-control tokenizer" multiple="multiple">
                                        <option selected="selected">Flour</option>
                                        <option selected="selected">Sugar</option>
                                        <option selected="selected">Salt</option>
                                        <option selected="selected">Egg</option>
                                        <option selected="selected">Butter Milk</option>
                                        <option selected="selected">Butter</option>
                                    </select>

                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Serve for</label>
                                            <select class="form-control" style="background: var(--bg-color)! important;">
                                                <option>2 People</option>
                                                <option>Dinner Foot</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Cook time (in min)</label>
                                            <input type="text" class="form-control" placeholder="" required="" value="12">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Energy (in kcal)</label>
                                            <input type="text" class="form-control" placeholder="" required="" value="227">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col m-1 second-box">
                        <div class="bg-second p-4">
                            <h3 class="mt-0 mb-5 text-white">Add option <small>(Optional)</small></h3>
                            <form>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Option</label>
                                            <input type="text" class="form-control" placeholder="" required="" value="Cream Pancake">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Price (In $)</label>
                                            <input type="text" class="form-control" placeholder="" required="" value="22">
                                        </div>
                                    </div>
                                </div>
                                <div id="showmore"></div>
                                <button class="btn-outline-success d-block py-2 px-5" type="button" id="addmore"><i class="zmdi zmdi-plus"></i> Add More</button>
                                <div class="modal-footer">
                                    <div class="row no-gutters w-100">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center px-4 text-white py-2" style="background: #4f5159; ">
                                                Item in stock
                                                <label class="switch ml-auto my-1">
                                                    <input type="checkbox">
                                                    <span class="slider round"></span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-12"> <button type="file" class="btn"><small>Upload Items</small></button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <!-- Require Javascript Start -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Require Javascript End -->

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="js/jquery.datetimepicker.full.js"></script>
    <script>
        $("#datetime").datetimepicker();

        $(".tokenizer").select2({
            tags: true,
            tokenSeparators: [',', ' ']
        })

        $("#addmore").on('click', function() {
            $('#showmore').append('<div class="row"><div class="col-md-8"><div class="form-group"><input type="text" class="form-control" placeholder="Add option" required=""></div></div><div class="col-md-4"><div class="form-group"><input type="text" class="form-control" placeholder="Add price" required=""></div></div></div>')
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

</body>

</html>
