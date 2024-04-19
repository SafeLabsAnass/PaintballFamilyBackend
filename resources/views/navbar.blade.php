<header class="container-fluid">
    <nav class="navbar navbar-expand-xl navbar-light align-items-center">
        <div class="nav-item">
            <a class="navbar-brand nav-link px-2" href="dashboard.html">
                <img src="{{ asset('images/logo.png')}}" class="img-fluid">
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <i class="zmdi zmdi-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <ul class="navbar-nav mr-0 ml-auto d-flex align-items-center">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}"><i class="zmdi zmdi-assignment"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('categories')}}"><i class="zmdi zmdi-cutlery"></i> Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('peoples')}}"><i class="zmdi zmdi-accounts-alt"></i> Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('sales')}}"><i class="zmdi zmdi-collection-text"></i> Sales</a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="{{route('settings')}}"><i class="zmdi zmdi-settings"></i> Settings</a>--}}
{{--                </li>--}}
                <li class="nav-item profile_img">
                    <a href="{{route('login')}}" class="img_box center_img">
                        <img src="images/profile.png" class="crop_img">
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<div class="header_spacer"></div>
