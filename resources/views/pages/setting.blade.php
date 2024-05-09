<!doctype html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Datetimepicker CSS -->
    <link href="{{ asset('css/jquery.datetimepicker.min.css')}}" type="text/css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/widgEditor.css')}}" />

    <!-- Responsive CSS -->
    <link href="{{ asset('css/responsive.css')}}" type="text/css" rel="stylesheet">

    <!-- Font CSS -->
    <link href="{{ asset('css/gogle_sans_font.css')}}" type="text/css" rel="stylesheet">

    <!--  For icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <!-- Custom CSS -->
    <link href="{{ asset('css/style.css')}}" type="text/css" rel="stylesheet">
    <!-- Page Title -->
    <title></title>

    <style>
        #noiseWidgToolbarSelectBlock{
            display: none;
        }
    </style>


</head>

<body id="page_items">
<!-- Header Start -->
@include('navbar')
<!-- Header End -->

<!-- Body Wrapper Start -->
<div class="body_wrapper container-fluid">
    <div class="row no-gutters">
        <div class="col ml-1" style="max-width: 45%;">
            <div class="bg-second p-4">
                <h3 class="mt-0 mb-4 text-white">Setting</h3>
                <form method="post" action="@if(\App\Models\Company::all()->count()==0) {{route('settings.store')}} @else {{route('settings.edit',$items[0]->id)}} @endif" enctype="multipart/form-data">
                    @csrf
                    <div class="row" style="max-width: 600px">
                        <div class="upload-box mt-1 mr-4 mb-3 mx-auto">
                            <label for="img" class="img m-0 active">
                                <i class="zmdi zmdi-image-alt"></i>
                                <input id="img" type="file" name="image">
                                <span>Upload product image</span>
                            </label>
                        </div>
                        <div class="upload-box mt-1 ml-4 mb-3  mx-auto">
                            <center><img id="preview" src="@if(\App\Models\Company::all()->count()!=0) {{ asset('storage/' . $items[0]->logo) }} @endif" alt="Image Preview" style="max-width: 200px; max-height: 200px; @if(\App\Models\Company::all()->count()==0) display: none; @endif"></center>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                            <label>Company Name</label>
                            <input type="text" class="form-control col-lg-12" name="name" value="@isset($items[0]->name) {{$items[0]->name}} @endif" >
                        </div>
                        <div class="col-lg-4">
                        <label>Company Phone Num</label>
                        <input type="text" class="form-control col-lg-12" name="phone" value="@isset($items[0]->phone) {{$items[0]->phone}} @endif">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Company Address </label>
                        <input type="text" class="form-control col-lg-8"  name="address" value="@isset($items[0]->address) {{$items[0]->address}} @endif">
                    </div>
                    <div class="form-group row">
                        <div class="col-lg-4">
                        <label>Company Email </label>
                        <input type="email" class="form-control col-lg-12"  name="email" value="@isset($items[0]->email) {{$items[0]->email}} @endif">
                        </div>
                        <div class="col-lg-4">
                            <label>WebSite</label>
                        <input type="text" class="form-control col-lg-12" name="site" value="@isset($items[0]->site) {{$items[0]->site}} @endif">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>VAT Number</label>
                        <input type="text" class="form-control col-lg-8" name="vat_number" value="@isset($items[0]->vat_number) {{$items[0]->vat_number}} @endif">
                    </div>
                    <button type="submit" class="btn py-3" style="max-width: 200px">Submit</button>
                </form>
            </div>
        </div>
        <div class="col ml-2">

            <div class="bg-second p-4">
                <h3 class="mt-0 mb-5 text-white">Invoice Setting</h3>

                <form class="mb-4" action="@if(\App\Models\InvoiceSetting::all()->count()==0) {{route('invoice.store')}} @else {{route('invoice.edit',\App\Models\InvoiceSetting::all()->first()->id)}} @endif" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Prefix ID</label>
                        <input type="text" class="form-control col-lg-3" name="prefix_id" value="@isset($items[1]->prefix_id) {{$items[1]->prefix_id}} @endif">
                    </div>
                    <div class="form-group">
                        <label>Initial Count</label>
                <input type="number" class="form-control col-lg-2" name="initial_count" id="initial_count">
                    </div>
                    <div class="form-group">
                        <label>thank you message :</label>
                            <fieldset class="bg-white">
                                <textarea id="noise" name="noise" class="widgEditor nothing"></textarea>
                            </fieldset>
                    </div>
                    <center><button type="submit" class="btn py-3 mb-3" style="max-width: 200px">Submit</button></center>
                </form>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script src="js/widgEditor.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script src="js/jquery.datetimepicker.full.js"></script>
<script>
    $("#datetime").datetimepicker();
</script>
<script type="text/javascript">
    document.getElementById("initial_count").value = @isset($items[1]->initial_count) {{$items[1]->initial_count}} @else '' @endif
</script>
<script src="https://cdn.jsdelivr.net/npm/he@1.2.0/he.js"></script>
<script type="text/javascript">
var thanksMessage = "Your actual thanks message here";
var encodedContent = "@isset($items[1]->thanks_message) {{$items[1]->thanks_message}} @else '' @endif"
var decodedContent  = he.decode(encodedContent);
plainText = String(decodedContent);
        document.getElementById("noise").innerHTML = plainText
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
