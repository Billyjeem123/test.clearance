
@include('home.includes.header')

@include('home.includes.nav')


<form class="row  reg-row g-3" method="POST" action="{{route('register_user')}}">
@csrf
    <div class="reg-section">
        <h1>Student Registration</h1>
    </div>
    <div class="col-md-4">
        <label for="validationServer01" class="form-label">First name</label>
        <input type="text" class="form-control" id="validationServer01"  name="student_name" required>

    </div>
    <div class="col-md-4">
        <label for="validationServer02" class="form-label">Middle name</label>
        <input type="text" class="form-control" id="validationServer02" name="middlename" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationServer02" class="form-label">Last name</label>
        <input type="text" class="form-control" id="validationServer02" name="lastname" required>
        <div class="valid-feedback">
            Looks good!
        </div>
    </div>


    <div class="col-md-4">
        <label for="validationServer04" class="form-label">College</label>
        <select class="form-select" name="college_name"  id="validationServer04" aria-describedby="validationServer04Feedback" required>
            <option selected disabled value="">Choose...</option>
            <option>College of Art</option>
            <option>College of Natural and Applied Sciences</option>
            <option>College of Management and Social Sciences</option>
            <option>College of Basic Medical and Health Sciences</option>
            <option>College of Law</option>
        </select>
        <div id="validationServer04Feedback" class="invalid-feedback">
            Please select your level.
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationServer04" class="form-label">Department</label>
        <select class="form-select" name="student_dept" id="validationServer04" aria-describedby="validationServer04Feedback" required>
            <option selected disabled value="">Choose...</option>
            <option>Computer and Mathematical Sciences</option>
            <option>Nursing</option>
            <option>Mass Communication</option>
            <option>Public Health</option>
            <option>Medical Laboratory Sciences</option>
            <option>Environmental Health Sciences</option>
            <option>LAW</option>
            <option>Business Administration</option>
            <option>Politcal Sciences</option>
            <option>Economics</option>
            <option>Banking and Finace</option>
            <option>Accounting</option>
            <option>Sociology</option>
            <option>Linguistic</option>
            <option>Arabic</option>
            <option>History and International Studies</option>
            <option>Islamic Studies</option>
            <option>English</option>
            <option>French</option>
        </select>
        <div id="validationServer04Feedback" class="invalid-feedback">
            Please select your Department.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer04" class="form-label">Level</label>
        <select class="form-select"  name="student_level" id="validationServer04" aria-describedby="validationServer04Feedback" required>
            <option selected disabled value="">Choose...</option>
            <option>100</option>
            <option>200</option>
            <option>300</option>
            <option>400</option>
            <option>500</option>
        </select>
        <div id="validationServer04Feedback" class="invalid-feedback">
            Please select your level.
        </div>
    </div>

    <div class="col-md-3">
        <label for="validationServer04" class="form-label">State of Origin</label>
        <select class="form-select" name="student_origin" id="validationServer04" aria-describedby="validationServer04Feedback" required>
            <option selected disabled value="">Choose...</option>
            <option>Abia</option>
            <option>Adamawa</option>
            <option>Akwa Ibom</option>
            <option>Anambra</option>
            <option>Bauchi</option>
            <option>Bayelsa</option>
            <option>Benue</option>
            <option>Borno</option>
            <option>Cross River</option>
            <option>Delta</option>
            <option>Ebonyi</option>
            <option>Edo</option>
            <option>Ekiti</option>
            <option>Enugu</option>
            <option>Gombe</option>
            <option>Imo</option>
            <option>Jigawa</option>
            <option>Kaduna</option>
            <option>Kano</option>
            <option>Kastina</option>
            <option>Kebbi</option>
            <option>Kogi</option>
            <option>Kwara</option>
            <option>Lagos</option>
            <option>Nassarawa</option>
            <option>Niger</option>
            <option>Ogun</option>
            <option>Ondo</option>
            <option>Osun</option>
            <option>Oyo</option>
            <option>Plateau</option>
            <option>Rivers</option>
            <option>Sokoto</option>
            <option>Taraba</option>
            <option>Yobe</option>
            <option>Zamfara</option>
            <option>FCT</option>
        </select>
        <div id="validationServer04Feedback" class="invalid-feedback">
            Please select a valid state.
        </div>
    </div>
    <div class="col-md-6">
        <label for="validationServer03" class="form-label">Home Address</label>
        <input type="text"  name="student_address"  class="form-control" id="validationServer03" aria-describedby="validationServer03Feedback" required>
        <div id="validationServer03Feedback" class="invalid-feedback">
            Fill in your home address.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer05" class="form-label">Email Address</label>
        <input type="email" name="student_email" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" required>
        <div id="validationServer05Feedback" class="invalid-feedback">
            Please provide a valid email.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer05" class="form-label">Date of Birth</label>
        <input type="date" name="student_dob" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" required>
        <div id="validationServer05Feedback" class="invalid-feedback">
            Please provide a valid email.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer04" class="form-label">Hostel</label>
        <select class="form-select" name="student_hostel" id="validationServer04" aria-describedby="validationServer04Feedback" required>
            <option selected disabled value="">Choose...</option>
            <option>Adegunwa</option>
            <option>Jubril Ayinla</option>
            <option>F.K Lawal 1</option>
            <option>F.K Lawal 2</option>
            <option>Nasfat 1</option>
            <option>Nasfat 2</option>
            <option>Yusuf Ali</option>
            <option>Sambisa</option>
            <option>Hostel 2</option>
        </select>
        <div id="validationServer04Feedback" class="invalid-feedback">
            Please select your Hostel.
        </div>
    </div>
    <div class="col-md-3">
        <label for="validationServer05" class="form-label">Room Number</label>
        <input type="text" name="student_room_num" class="form-control" id="validationServer05" aria-describedby="validationServer05Feedback" required>

    </div>
    <div class="col-md-4">
        <label for="validationServer04" class="form-label">Title</label>
        <select class="form-select" name="student_title" id="validationServer04" aria-describedby="validationServer04Feedback" required>
            <option selected disabled value="">Choose...</option>
            <option>Mr</option>
            <option>Miss</option>
            <option>Mrs</option>

        </select>
        <div id="validationServer04Feedback" class="invalid-feedback">
            Please select your Hostel.
        </div>
    </div><div class="col-md-4">
        <label for="validationServer04" class="form-label">Marital Status</label>
        <select class="form-select"  name="student_marital_status" id="validationServer04" aria-describedby="validationServer04Feedback" required>
            <option selected disabled value="">Choose...</option>
            <option>Single</option>
            <option>Married</option>
            <option>Divorced</option>

        </select>
        <div id="validationServer04Feedback" class="invalid-feedback">
            Please select your Hostel.
        </div>
    </div>
    <div class="col-md-4">
        <label for="validationServer03" class="form-label">Clinic Card Number</label>
        <input type="text" name="student_clinic_card" class="form-control" id="validationServer03" aria-describedby="validationServer03Feedback" required>
    </div>
    <div class="mb-3 col-md-6">
        <label for="formFile" class="form-label">Upload Passport</label>
        <input name="student_passport" class="form-control" type="file" id="formFile">
    </div>
    <div class="mb-3 col-md-6">
        <label for="formFile" class="form-label">Upload signature</label>
        <input name="student_signature" class="form-control" type="file" id="formFile">
    </div>
    <div class="col-12">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck3" aria-describedby="invalidCheck3Feedback" required>
            <label class="form-check-label" for="invalidCheck3">
                Agree to terms and conditions
            </label>
            <div id="invalidCheck3Feedback" class="invalid-feedback">
                You must agree before submitting.
            </div>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-1 btn-primary" type="submit">Submit form</button>
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
