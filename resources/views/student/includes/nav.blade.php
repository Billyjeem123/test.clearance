<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="/assets/images/full-logo-removebg-preview.png" alt="" class="brand-logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav me-right mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('student_dashboard')}}">Dashboard</a>
                </li>

                <div class="btn">
                    <a class="btn getstarted-btn" href="{{route('logout')}}" role="button" data-bs-toggle="" aria-expanded="false">
                        Log Out
                        <img src="/assets/images/logout-icon.png" alt="logout icon">
                    </a>
                </div>
            </ul>

        </div>
    </div>
</nav>
