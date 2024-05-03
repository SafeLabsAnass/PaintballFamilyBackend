<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{csrf_token()}}">

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

<body id="page_items">
    <!-- Header Start -->
    @include('navbar')
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
                            <h3 class="mt-0 mb-5 text-white">Update a product</h3>
                            <form action="{{route('product.update',$items[1]->id)}}" method="POST" id="editForm" enctype="multipart/form-data">
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
                                        <center><img id="preview" src="{{ config('app.url') }}/storage/{{$items[1]->image}}" alt="Image Preview" style="max-width: 200px; max-height: 200px;"></center>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input id="imageTest" type="text" name="imageTest" value="{{$items[1]->image}}" style="display: none;">
                                            <input type="text" class="form-control" placeholder="" required="" name="name" value="{{$items[1]->name}}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Price (In $)</label>
                                            <input type="number" step="0.01" class="form-control" placeholder="" required=""  name="price" value="{{$items[1]->price}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Choose Product Category</label>
                                    <select name="category" class="form-control" style="background: var(--bg-color)! important;">
                                        @foreach($items[0] as $category)
                                            @if($category->name==DB::table('categories')->where('id',$items[1]->category_id)->first()->name)
                                        <option>{{$category->name}}</option>
                                                @break
                                            @endif
                                            @endforeach
                                                @foreach($items[0] as $category)
                                                    @if($category->name!=DB::table('categories')->where('id',$items[1]->category_id)->first()->name)
                                                <option>{{$category->name}}</option>
                                            @endif
                                                @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Item description</label>
                                    <textarea name="description" class="form-control" style="min-height: 100px;max-height: 100px;">
                                        {{$items[1]->description}}
                                    </textarea>

                                </div>
                                <button type="submit" class="btn btn-outline-primary btn-lg rounded-pill">Update Product</button>

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
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"
          integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="{{ asset('js/jquery.datetimepicker.full.js')}}"></script>
    <script>
        document.getElementById('img').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const reader = new FileReader();
            document.getElementById('imageTest').value = file.name
            reader.onload = function(e) {
                // document.getElementById('preview').style.display = 'block';
                document.getElementById('preview').src = e.target.result;
                // You can access the image data here via e.target.result
            };

            reader.readAsDataURL(file);
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            document.getElementById('editForm').addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent the default form submission

                // Serialize the form data
                const formData = new FormData(this);

                // Make a POST request to your Laravel route
                fetch('/product/update/' + {{$items[1]->id}}, {
                    method: 'POST',
                    body: formData
                })
                    .then(response => response.json()) // Parse the JSON response
                    .then(data => {
                        // Handle the JSON response
                        // Example: Update UI based on the response
                        if (data.status === 'success') {
                            Swal.fire({
                                position: 'center',
                                icon: 'success',
                                title: 'Vous êtes redirigé vers le tableau de categories',
                                showConfirmButton: false,
                                timer: 3000,
                                didOpen: () => {
                                    Swal.showLoading();
                                },
                                didClose: () => {
                                    document.cookie = "tabProductOpened=product";
                                    window.location = data.redirect + encodeURIComponent(document.cookie);
                                }
                            });
                            window.location = data.redirect;
                        } else {
                            Swal.fire({
                                position: 'center',
                                icon: 'error',
                                title: 'Les donnees entrants sont similaire avec les anciennes !',
                                showConfirmButton: false,
                                timer: 3000,
                                didOpen: () => {
                                    Swal.showLoading()
                                },
                                didClose: () => {
                                    document.cookie = "tabProductOpened=product";
                                    window.location = data.redirect + encodeURIComponent(document.cookie);
                                }

                            });

                        }
                    })
                    .catch(error => {
                        console.error('Error:', error); // Log any errors
                    });
            });
        });
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
