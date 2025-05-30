<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="{{url('CSS/index.css')}}">
    <link rel="stylesheet" href="{{url('CSS/style.css')}}">
    <link rel="stylesheet" href="{{url('CSS/aboutus.css')}}">
    <link rel="shortcut icon" href="{{url('images/train.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{url('CSS/support.css')}}">
    <link rel="stylesheet" href="{{url('CSS/s_register.css')}}">


    <title>@yield("title")</title>
</head>
<body>
    <section class="header" >  
    <header>
        <nav class="navbar">
            <a href="{{route("show.index")}}"><img src="{{url('images/logo.png')}}" class="logo" alt="Logo"></a>
            
            <!-- Navigation Links (Visible on Desktop) -->
            <ul class="nav-links">
                <li><a href="{{route("show.index")}}">Home</a></li>
                <li><a href="{{route("show.aboutus")}}">About Us</a></li>
                <li><a href="{{route("show.support")}}">Support</a></li>
                @if (session()->has("role"))
                 @if (in_array(session("role"), ['applicant', 'passenger']))
                    <li><a href="{{route('show.passenger.dashboard')}}">User Dashboard</a></li>
                    @elseif (session("role")== "admin")
                    <li><a href="{{route('show.admin-portal')}}">Admin Dashboard</a></li>
                    @endif
                @else
                <li><a href="{{route("show.login")}}" class="login">Login</a></li>
                @endif
            </ul>

            <!-- Hamburger Menu Icon (Only on Mobile) -->
            <div class="menu-icon" onclick="toggleMenu()">☰</div>
        </nav>


        <div class="text-box" id="heroSection">

        </div>
    </header>
</section>
    <!-- Fullscreen Mobile Menu (Hidden by Default) -->
    <div class="mobile-menu">
        <!-- Close Button -->
        <div class="close-icon" onclick="toggleMenu()">✖</div>
        <ul class="nav-links-mobile">
            <li><a href="{{route("show.index")}}" onclick="toggleMenu()">Home</a></li>
            <li><a href="{{route("show.aboutus")}}" onclick="toggleMenu()">About Us</a></li>
            <li><a href="{{route("show.support")}}" onclick="toggleMenu()">Support</a></li>
            {{-- <li><a href="{{route()}}" class="login" onclick="toggleMenu()">Login</a></li> --}}
            @if (session()->has("role"))
            @if (in_array(session("role"), ['applicant', 'passenger']))
               <li><a href="{{route('show.passenger.dashboard')}}" class="login" onclick="toggleMenu()">User Dashboard</a></li>
               @elseif (session("role")== "admin")
               <li><a href="{{route('show.admin-portal')}}" class="login" onclick="toggleMenu()">Admin Dashboard</a></li>
               @endif
           @else
           <li><a href="{{route("show.login")}}" class="login" onclick="toggleMenu()">Login</a></li>
           @endif
        </ul>
    </div>
</body>

<script>
    function toggleMenu() {
        const mobileMenu = document.querySelector(".mobile-menu");
        mobileMenu.classList.toggle("active");
    }
    </script>
    {{-- <style>
.header {
    min-height: 100vh ;
    width: 100%;
    background-image:  linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 34, 24, 0.897)), url('@yield('bg_image')');
    background-position: center;
    background-size: cover;
    position: relative;
    
}

    </style> --}}
    <style>
    @if (!trim($__env->yieldContent('disable_header')))
    .header {
        min-height: 100vh;
        width: 100%;
        background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 34, 24, 0.897)), url('@yield('bg_image')');
        background-position: center;
        background-size: cover;
        position: relative;
    }
    @endif
    </style>



