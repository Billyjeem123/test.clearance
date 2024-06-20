<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="/assets/images/full-logo-removebg-preview.png" alt="" class="brand-logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav me-right mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/register/student">Registration</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Clearance</a>
                </li>
                <div class="dropdown">
                    @if(Auth::check())
                        <a class="btn dropdown-toggle getstarted-btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dashboard
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="">Student Dashboard</a></li>
                            <li><a class="dropdown-item" href="">Admin Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{route('logout')}}">Logout</a></li>
                        </ul>
                    @else
                        <a class="btn dropdown-toggle getstarted-btn" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sign Up
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Student Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('register_student') }}">Student Register</a></li>
                            <li><a class="dropdown-item" href="{{ route('staff_login') }}">Staff Login</a></li>
                        </ul>
                    @endif
                </div>

            </ul>

        </div>
    </div>
</nav>
