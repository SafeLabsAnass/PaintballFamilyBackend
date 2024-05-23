<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
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
    @include('navbar')

    <!-- Header End -->

    <!-- Body Wrapper Start -->
    <div class="body_wrapper container-fluid">
        <div class="row ml-5">
            <!-- Left Sidebar Start -->
            <div class="col" style="max-width: 250px">
            <div class="upload text-center my-4">
                <a class="back-link" href="{{route('categories')}}"><i class="zmdi zmdi-arrow-left"></i> Back</a>
            </div>
            </div>

            <div class="col ml-5">
                <div class="row no-gutters">
                    <div class="col m-1">
                        <div class="bg-second p-4">
                            <h3 class="mt-0 mb-5 text-white">Upload a product</h3>
                            <form action="{{route('product.store.web')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row" style="max-width: 600px">
                                    <div class="upload-box mt-1 mr-4 mb-3 mx-auto">
                                            <label for="img" class="img m-0 active">
                                                <i class="zmdi zmdi-image-alt"></i>
                                                <input id="img" type="file" name="image">
                                                <span>Upload product image</span>
                                            </label>
                                        </div>
                                    <div class="upload-box  mt-1 ml-4 mb-3  mx-auto">
                                        <center><img id="preview" src="#" alt="Image Preview" style="max-width: 200px; max-height: 200px; display: none;"></center>
                                    </div>
                                    </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input type="text" class="form-control" placeholder="" required="" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price (In $)</label>
                                            <input type="text" class="form-control" placeholder="" required="" name="price">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Choose Product Category</label>
                                    <select name="category" class="form-control" style="background: var(--bg-color)! important;">
                                        @foreach($categories as $category)
                                        <option>{{$category->name}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Item description</label>
                                    <textarea name="description" class="form-control" style="min-height: 100px;max-height: 100px;"></textarea>

                                </div>
                                <button type="submit" class="btn btn-outline-primary btn-lg rounded-pill">Add Product</button>

                            </form>
                        </div>
                    </div>
                    <div class="col m-1 second-box">
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
    <script>
        document.getElementById('img').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function(e) {
                document.getElementById('preview').style.display = 'block';
                document.getElementById('preview').src = e.target.result;
                // You can access the image data here via e.target.result
            };

            reader.readAsDataURL(file);
        });
    </script>

</body>

</html>
