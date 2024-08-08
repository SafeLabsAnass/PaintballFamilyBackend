<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <!-- Required meta tags -->
    <meta charset="utf-8">
<!--
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Datetimepicker CSS -->
    <link href="{{ asset('css/jquery.datetimepicker.min.css')}}" type="text/css" rel="stylesheet">
    <link rel="icon" href="{{ asset('storage/' . \App\Models\Company::all()->first()->logo) }}">
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
    <script>
        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        let checkTab = ''
        $(document).ready(function () {
            document.getElementById('nav-Categories-tab').addEventListener('click',function (){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: 'check-category-tab',
                    dataType: 'json',
                    success: function (response) {
                    },
                    error: function (xhr, status, error) {
                        console.log(status);
                        // Handle errors here
                    }
                })

                document.cookie = "tabProductOpened="
            });
            document.getElementById('nav_food_items').addEventListener('click', function () {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type: 'GET',
                    url: 'check-product-tab',
                    dataType: 'json',
                    success: function (response) {
                    },
                    error: function (xhr, status, error) {
                        console.log(status);
                        // Handle errors here
                    }
                })
                document.cookie = "tabProductOpened=product"
            });

            if (getCookie('tabProductOpened') === "product") {
                $('#nav-Categories-tab').removeClass('active');
                $('#nav_food_items').addClass('active');
                $('#Categories').removeClass('active');
                $('#food_items').addClass('active');
            } else {
                $('#nav_food_items').removeClass('active');
                $('#nav-Categories-tab').addClass('active');
                $('#food_items').removeClass('active');
                $('#Categories').addClass('active');
            }
            document.getElementById('exampleFormControlSelect1').addEventListener('change', function () {
                document.getElementById('itemsPerPageForm').submit();
            });
        });

    </script>


</head>

<body id="page_items">
    <!-- Header Start -->
    @include('navbar')
    <!-- Header End -->

    <!-- Body Wrapper Start -->
    <div class="body_wrapper">
        <!-- Left Sidebar Start -->
        <div class="left_sidebar">
            <!-- Nav Tabs Start -->
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active mt-5" id="nav-Categories-tab" data-toggle="tab" href="#Categories" role="tab" aria-controls="nav-profile" aria-selected="true">Categories</a>
                <a class="nav-item nav-link" id="nav_food_items" data-toggle="tab" href="#food_items" role="tab" aria-controls="nav-home" aria-selected="false">Products</a>
            </div>
            <!-- Nav Tabs End -->
        </div>
        <!-- Left Sidebar End -->

        <!-- Right Sidebar Start -->
        <div class="right_sidebar">
            <!-- Tab Content Start -->
            <div class="tab-content" id="nav-tabContent">

                <!-- Food Items Tab Content Start -->
                <div class="tab-pane fade show" id="food_items" role="tabpanel" aria-labelledby="nav_food_items">
                    <div class="tab_header">
                        <h1 class="d-flex">
                            <span class="d-block" style="min-width: 161px;">Products</span>
                            <button type="button" class="btn"><a href="{{route('upload_product')}}">Add New</a></button>
                        </h1>
                    </div>

                    <!-- Order List Start -->
                    <div class="order_list">
                        <div class="list_header d-flex">
                            <h2 class="text-center order_num Code">Image</h2>
                            <h2 class="text-left Name">item Name</h2>
                            <h2 class="text-center Amount Category">Category</h2>
                            <h2 class="text-center Table Price">Price</h2>
                        </div>

                        <ul>
                            @foreach($items[1] as $product)
                            <li class="d-flex">
                                <h3 class="text-center order_num Image"> <img width="70" height="70" src="{{ config('app.url') }}/storage/{{$product->image}}" alt=""></h3>
                                <h3 class="text-left Name"><strong>{{$product->name}}</strong></h3>
                                <h3 class="text-center Amount Category">{{DB::table('categories')->where('id',$product->category_id)->first()->name}}</h3>
                                <h3 class="text-center Table Price">{{$product->price}} €</h3>
                                <div class="btn_container d-flex ml-auto">
                                    <button type="button" class="btn">
                                        <a href="{{route('product.destroy.web',$product->id)}}" onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?')" ><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="{{route('product.show.web',$product->id)}}"><i class="zmdi zmdi-edit"></i></a>
                                    </button>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Order List End -->
                    <div class="tab_footer">
                        <div class="row no-gutter align-items-center">
                            <div class="col-12 col-md-12 col-lg-4 pb-3">
                                <h2>Showing 1 to {{$items[1]->count()}} of {{App\Models\Product::all()->count()}}
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
                                                <a class="page-link" href="{{ $items[1]->previousPageUrl() }}"><i
                                                        class="zmdi zmdi-chevron-left"></i></a>
                                            </li>
                                            @for ($i = 1; $i <= $items[1]->lastPage(); $i++)
                                                <li class="page-item"><a class="page-link"
                                                                         href="{{ $items[1]->url($i) }}">{{$i}}</a></li>
                                            @endfor
                                            <li class="page-item">
                                                <a class="page-link" href="{{ $items[1]->nextPageUrl() }}"><i
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
                <!-- Food Items Tab Content End -->




                <!-- Categories Tab Content Start -->
                <div class="tab-pane fade show active" id="Categories" role="tabpanel" aria-labelledby="nav-Categories-tab">
                    <div class="tab_header">
                        <h1 class="d-flex align-items-center">
                            Categories
                            <button type="button" class="btn"><a data-toggle="modal" data-target="#add_expenses">Add New</a></button>
                        </h1>
                    </div>
                    <!-- Order List Start -->
                    <div class="order_list">
                        <div class="list_header d-flex">
                            <h2 class="text-center Code icon">Icon</h2>
                            <h2 class="text-left Name">Category Name</h2>
                            <h2 class="text-center Category created_on">Created on</h2>
                        </div>

                        <ul>
                            @foreach($items[0] as $category)
                            <li class="d-flex">
                                <h3 class="text-center Code icon">
                                    <img src="{{ config('app.url') }}/storage/{{$category->image}}">
                                </h3>
                                <h3 class="text-left Name"><strong>{{$category->name}}</strong></h3>
                                <h3 class="text-center Category created_on">{{$category->created_at}}</h3>

                                <div class="btn_container d-flex mr-0 ml-auto">
                                    <button type="button" class="btn">
                                        <a href="{{route('category.destroy.web',$category->id)}}" onclick="return confirm('Voulez-vous vraiment supprimer cette catégorie ?')"><i class="zmdi zmdi-delete"></i></a>
                                    </button>
                                    <button type="button" class="btn">
                                        <a href="{{route('category.show.web',$category->id)}}"><i class="zmdi zmdi-edit"></i></a>
                                    </button>

                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Tab Footer start -->
{{--                    <div class="tab_footer">--}}
{{--                        <div class="row no-gutter align-items-center">--}}
{{--                            <div class="col-12 col-md-12 col-lg-4 pb-3">--}}
{{--                                <h2>Showing 1 to 6 of {{$items[0]->count()}} items</h2>--}}
{{--                            </div>--}}
{{--                            <div class="col-12 col-md-12 col-lg-8 pb-3">--}}
{{--                                <div class="row align-items-center">--}}
{{--                                    <form class="col-7">--}}
{{--                                        <div class="form-group d-flex align-items-center">--}}
{{--                                            <label for="exampleFormControlSelect1">Item per page</label>--}}
{{--                                            <select class="form-control mx-3" id="exampleFormControlSelect1"--}}
{{--                                                    style="max-width: 80px;">--}}
{{--                                                <option>10</option>--}}
{{--                                                <option>15</option>--}}
{{--                                                <option>20</option>--}}
{{--                                                <option>25</option>--}}
{{--                                                <option>30</option>--}}
{{--                                            </select>--}}
{{--                                        </div>--}}
{{--                                    </form>--}}

{{--                                    <nav class="navigation col-5" aria-label="Page navigation example">--}}
{{--                                        <ul class="pagination justify-content-end mb-0">--}}
{{--                                            <li class="page-item disabled">--}}
{{--                                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true"><i--}}
{{--                                                        class="zmdi zmdi-chevron-left"></i></a>--}}
{{--                                            </li>--}}
{{--                                            <li class="page-item"><a class="page-link"--}}
{{--                                                                     href="{{ $items[0]->previousPageUrl() }}">1</a>--}}
{{--                                            </li>--}}
{{--                                            <li class="page-item"><a class="page-link"--}}
{{--                                                                     href="{{ $items[0]->nextPageUrl() }}">2</a></li>--}}
{{--                                            <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                            <li class="page-item">--}}
{{--                                                <a class="page-link" href="#"><i--}}
{{--                                                        class="zmdi zmdi-chevron-right"></i></a>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </nav>--}}

{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <!-- Categories Tab Content Start -->
            </div>
            <!-- Tab Content End -->
        </div>
        <!-- Right Sidebar End -->
    </div>
    <!-- Body Wrapper End -->


    <!-- Add Category  Modal Start  -->
    <div class="modal fade add_category_model add_expenses receipt_model px-0" id="add_expenses" tabindex="-1" role="dialog" aria-labelledby="receipt_modelTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header px-0">
                    <h2 class="col-10 mx-auto">Add Category</h2>
                </div>
                <div class="modal-body p-0">
                    <form action="{{route('category.store.web')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-10 mx-auto form_container">
                            <div class="row pb-5">
                                <div class="row" style="max-width: 600px">
                                    <div class="upload-box mt-1 mr-4 mb-3 mx-auto">
                                        <label for="img" class="img m-0 active">
                                            <i class="zmdi zmdi-image-alt"></i>
                                            <input id="img" type="file" name="image">
                                            <span>Upload product image</span>
                                        </label>
                                    </div>
                                    <div class="upload-box  mt-1 ml-4 mb-3 mr-5">
                                        <center><img id="preview" src="#" alt="Image Preview" style="max-width: 200px; max-height: 200px; display: none;"></center>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7 col-md-6 col-sm-12 pt-2 ml-8">
                                    <div class="d-flex info">
                                        @if(isset($imagePath))
                                            <h2>Preview Image:</h2>
                                            <img src="{{ $imagePath }}" alt="Category Image">
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                        </div>

                        <div class="modal-footer">
                            <div class="row no-gutters w-100">
                                <div class="col-6">
                                    <button type="reset" class="btn Cencel" data-dismiss="modal">Cancel</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" class="btn">Add Category</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <!-- Add Category Modal End  -->

    <!-- Require Javascript Start -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!-- Require Javascript End -->
    <script src="{{ asset('js/jquery.datetimepicker.full.js')}}"></script>
    {{--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
          integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    {{--    <script src="https://code.jquery.com/jquery-3.7.1.js"--}}
    {{--            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="--}}
    {{--            crossorigin="anonymous"></script>--}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
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
