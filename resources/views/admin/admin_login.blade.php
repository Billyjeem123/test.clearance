@include('home.includes.header')


@include('home.includes.nav')


<div class="container-fluid login-div " id="login-div">
    <div class="row">
        <div class="col-md-6 admin-img">
            <img src="/assets/images/ADMINVCc.JPG" alt="admin-img" class="admin-img">
        </div>
        <div class="col-md-6">
            <div class="admin-heading">
                <h1>Admin Login</h1>
            </div>

            <form class="login" method="post" action="{{ route('admin_login_dash') }}">
                <h4>Enter your login credentials</h4>

                <div class="mb-3">
                    <input type="text" class="form-control" name="uname" id="staffid" aria-describedby="matric" placeholder="Input Email">
                </div>
                <div class="mb-3">
                    <input type="password" class="form-control" name="pass" id="loginpass" placeholder="Input Password">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="check-remember">
                    <label class="form-check-label" for="check-remember">Remember Me</label>
                </div>
                <button type="submit" class="btn btn-secondary login-btn">Log In</button>
                @csrf
            </form>



        </div>

    </div>
</div>


<!-- Footer -->
<div class="container-fluid footer-content">
    <div class="row">
        <div class="col-md-6 footer-note">
            <img src="/assets/images/fuo logo.png" alt="" class="brand-logo" >

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
                <li><a href="{{route('register_student')}}">Registration</a></li>
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

@include('home.includes.footer');
