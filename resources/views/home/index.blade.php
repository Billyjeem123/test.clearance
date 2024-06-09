<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>
<body>

@include('home.includes.nav')

<!-- hero landing  -->
<div class="container hero-section">
    <div class="row hero-row">
        <div class="col-md-6 hero-text">
            <h1 style="color: #3d6226;">From Freshers to Final Year.</h1>
            <h1 style="color: #3d6226;">Manage your University <br> Journey with Ease.</h1>
            <p style="color: black;">Tailored features for every stage, helping you excel academically.</p>
            <button type="submit" class="btn  hero-btn" onclick=""><a href="{{route('register')}}"> Get Started</a></button>
        </div>
        <div class="col-md-6">
            <img src="/assets/images/studentss.png" class="hero-img" alt="hero-img" style="width: 100%; margin-top: 1rem; height:100%;">
        </div>
    </div>
</div>
<!-- End of hero landing -->

<!-- About Illustration -->
<div class="container about-illustration">
    <div class="row">
        <div class="col-md-4 ">
            <div class="grid-img about-grid">
                <img src="/assets/images/report_note.png" alt="">
                <h4>Clearance Progress Notification</h4>
            </div>
        </div>
        <div class="col-md-4 ">
            <div class="grid-img about-grid">
                <img src="/assets/images/dashboard_note.png" alt="">
                <h4>Clearance Progress Notification</h4>
            </div>
        </div>
        <div class="col-md-4">
            <div class="  grid-img  about-grid">
                <img src="/assets/images/email_note.png" alt="">
                <h4>Clearance Progress Notification</h4>
            </div>
        </div>
    </div>
</div>
<!-- End of About Illustration -->

<!-- About Section -->
<div class="container-fluid about-section">
    <div class="row">
        <div class="col-md-6">
            ;<img src="/assets/images/hero-img2.png" alt="" style="width: 100%; margin-top: 2rem;">
        </div>

        <div class="col-md-6">
            <h4>WELCOME TO FUO CLEARANCE SYSTEM</h4>
            <h1>Building a functional <br> student  management system.</h1>
            <p>Fountain University Clearance System serves as a more reliable <br>
                and effective means of undertaking students clearance. Hence,<br>
                providing borderless access to ensure prompt clearance, <br>
                alleviating the problems and stress of travelling and queuing up  <br>
                of students during clearance. </p>
            <b><p>This application's primary focus is aimed at <br>
                    making clearance for graduating sytents stressfree</p></b>
            <div class="get-started">
                <button type="button" class="btn btn-1 btn-md">Get Started</button>
                <button type="button" class="btn btn-2 btn-secondary btn-md">Steps To Follow</button>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid login-div " id="login-div">
    <div class="row">
        <div class="col-md-6">
            <form class="login" method="post" action="">
                <h4>
                    Login as Student
                </h4>
                <div class="mb-3">
                    <label for="matricnumber" class="form-label">Matric No.</label>
                    <input type="text"
                           class="form-control"
                           name="uname"
                           id="matricnumber" aria-describedby="matric"
                           placeholder="Enter Matric Number">
                    <!-- <div id="matricno" class="form-text">We'll never share your matric num with anyone else.</div> -->
                </div>
                <div class="mb-3">
                    <label for="loginpass" class="form-label">Password</label>
                    <input type="password" class="form-control"
                           name="pass"  id="loginpass"
                           placeholder="Input Password">
                    <div id="pass-text" class="form-text">Ps: Middlename as password (lower case)</div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="check-remember">
                    <label class="form-check-label" for="check-remember">Remember Me</label>
                </div>
                <button type="submit" class="btn  login-btn">Sign In</button>
            </form>
        </div>
        <div class="col-md-6">

        </div>
    </div>
</div>


<!-- Footer -->
<div class="container-fluid footer-content">
    <div class="row">
        <div class="col-md-6 footer-note">
            <img src="images/fuo logo.png" alt="" class="brand-logo" >

            <p>
                Fountain University is a prestigious private university located
                in Osogbo, Osun State, Nigeria. Established with a  vision to provide
                quality education grounded in Islamic principles,the university has
                rapidly grown into a center of academic excellence
            </p>
        </div>
        <div class="col-md-3">
            <b><h2>Useful Links</h2></b>
            <ul>
                <li><a href="">Clearance</a></li>
                <li><a href="{{route('register')}}">Registration</a></li>
                <li><a href="">Contact Us</a></li>
                <li><a href="">Help</a></li>
            </ul>
        </div>
        <div class="col-md-3">
            <i class="fa-solid fa-location-dot"></i>
            <b><h2>Address Location</h2></b>
            <div>

                <p> <img src="/assets/images/location-dot-solid.svg" alt="" class="icon"> Opp. Olomola Hospital, Along Agric Settlement Road, Oke-Osun, Osogbo</p>
            </div>
            <div>
                <p><img src="/assets/images/location-dot-solid.svg" alt="" class="icon"> <a href="https://portal.fuo.edu.ng">Fountain University's portal</a></p>
            </div>
            <div>
                <p><img src="/assets/images/envelope-solid.svg" alt="" class="icon">  mailsupport@fuo.edu.ng</p>
            </div>
        </div>
    </div>
</div>
<!-- End of Footer -->






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
