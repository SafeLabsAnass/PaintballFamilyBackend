<header class="container-fluid">
    <nav class="navbar navbar-expand-xl navbar-light align-items-center">
        <div class="nav-item">
            <a class="navbar-brand nav-link px-2" href="{{route('home')}}">
                <img src="{{ asset('images/logo.png')}}" class="img-fluid" alt="">
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
                    <a class="nav-link" id="categories" href="{{route('categories')}}"><i class="zmdi zmdi-cutlery"></i> Categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('peoples')}}"><i class="zmdi zmdi-accounts-alt"></i> Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('sales')}}"><i class="zmdi zmdi-shopping-cart"></i> Sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('payments')}}"><i class="zmdi zmdi-paypal-alt"></i> Payments</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('settings')}}"><i class="zmdi zmdi-settings"></i> Settings</a>
                </li>
                <li class="nav-item profile_img">
                    @if(Auth::check())
                        <a href="{{route('logout')}}" class="nav-link">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                                 class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                      d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                                <path fill-rule="evenodd"
                                      d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                            </svg>&nbsp; Logout
                        </a>
                    @endif
                </li>
            </ul>
        </div>
    </nav>
</header>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        document.getElementById('categories').addEventListener('onclick', function(event) {
            event.preventDefault(); // Prevent the default form submission
                document.cookie = "tabProductOpened="
            });
    });
</script>
<div class="header_spacer"></div>
