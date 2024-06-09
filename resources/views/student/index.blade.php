<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>student-dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="/assets/images/full-logo-removebg-preview.png" alt="" class="brand-logo"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent" >
            <ul class="navbar-nav me-right mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="student-dashboard.html">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="help.html">Help</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Clearance</a>
                </li>
                <div class="btn">
                    <a class="btn getstarted-btn" href="#" role="button" data-bs-toggle="" aria-expanded="false">
                        Log Out
                        <img src="/assets/images/logout-icon.png" alt="logout icon">
                    </a>
                </div>
            </ul>

        </div>
    </div>
</nav>


<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class=" sidemenu col-auto col-md-3 col-lg-3 min-vh-100">
            <div class=" p-2">
                <ul class="nav nav-pills flex-column mt-4">
                    <li class="nav-item py-2 py-sm-0">
                        <a href="#" class="nav-link text-white " aria-current="page">
                            <img src="/assets/images/dashboard-icon.png" alt="dashboard-icon">
                            <span class="fs-4 ms-3 d-none d-sm-inline"> Dashboard </span>
                        </a>
                    </li>
                    <li class="nav-item py-2 py-sm-0">
                        <a href="#" class="nav-link text-white" >
                            <img src="/assets/images/document-icon.png" alt="document-icon">
                            <span class="fs-4 ms-3 d-none d-sm-inline"> Document </span>
                        </a>
                    </li>
                    <li class="nav-item py-2 py-sm-0">
                        <a href="#" class="nav-link text-white" >
                            <img src="/assets/images/clearance-icon.png" alt="clearance-icon">
                            <span class="fs-4 ms-3 d-none d-sm-inline"> Final Year Clearance </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-md-9">
            <div class="col-md-6 offset-md-3 ">
                <div class=" profile-card">
                    <div class="card-img">
                        <img src="/assets/images/profile-imgg.jpg" alt="" >
                    </div>
                    <h4>Shobaloju Moh'd Yasir </h4>
                    <hr>
                    <div class="profile-content">
                        <span>Matric No: </span>
                        <span>FUO/20/0401</span>
                    </div>
                    <div class="profile-content">
                        <span>Level: </span>
                        <span>400L</span>
                    </div>
                    <div class="profile-content">
                        <span>Department: </span>
                        <span>Computer Science</span>
                    </div>
                    <div class="profile-content">
                        <span>College: </span>
                        <span>CONAS</span>
                    </div>
                    <div class="profile-content">
                        <span>Clinic Card No: </span>
                        <span>222/214</span>
                    </div>
                    <hr>
                </div>
            </div>



        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
