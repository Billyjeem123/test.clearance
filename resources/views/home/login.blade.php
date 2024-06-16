
@include('home.includes.header')

@include('home.includes.nav')


<form class="row reg-row g-3" method="POST" action="{{route('login_user')}}">
    @csrf
    <div class="reg-section">
        <h1>Student Login</h1>
    </div>

    <div class="col-md-6">
        <label for="matric_number" class="form-label">Matric Number</label>
        <input type="text" class="form-control" id="matric_number" name="matric_number" required>
        <div class="invalid-feedback">
            Please provide your matric number.
        </div>
    </div>

    <div class="col-md-6">
        <label for="password" class="form-label">First Name</label>
        <input type="password" class="form-control" id="firstname" name="firstname" required>
        <div class="invalid-feedback">
            Please provide your password.
        </div>
    </div>

    <div class="col-12 d-flex justify-content-start">
        <button class="btn login-btn" type="submit">Login</button>
    </div>
</form>



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
                <li><a href="registration.html">Registration</a></li>
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
