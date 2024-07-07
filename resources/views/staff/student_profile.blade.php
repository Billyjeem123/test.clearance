@include('staff.includes.header')
@include('staff.includes.nav')

<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('staff.includes.sidebar')

        <div class="col-md-9">
            <div class="col-md-6 offset-md-3">
                <div class="profile-card">
                    <div class="card-img">
                        <img src="{{ $student->student->student_passport ?? asset('/placeholder.jpeg') }}" alt="Profile Image">
                    </div>
                    <h4>{{ $student->student->student_name }} {{ $student->student->middlename }} {{ $student->student->lastname }}</h4>
                    <hr>
                    <div class="profile-content">
                        <span>Matric No: </span>
                        <span>{{ $student->matric_number }}</span>
                    </div>
                    <div class="profile-content">
                        <span>Level: </span>
                        <span>{{ $student->student->student_level }}L</span>
                    </div>
                    <div class="profile-content">
                        <span>Department: </span>
                        <span>{{ $student->student->student_dept }}</span>
                    </div>
                    <div class="profile-content">
                        <span>College: </span>
                        <span>{{ $student->student->college_name }}</span>
                    </div>
                    <div class="profile-content">
                        <span>Clinic Card No: </span>
                        <span>{{ $student->student->student_clinic_card }}</span>
                    </div>
                    <div class="profile-content">
                        <span>Email: </span>
                        <span>{{ $student->email }}</span>
                    </div>
                    <div class="profile-content">
                        <span>Origin: </span>
                        <span>{{ $student->student->student_origin }}</span>
                    </div>
                    <div class="profile-content">
                        <span>Address: </span>
                        <span>{{ $student->student->student_address }}</span>
                    </div>
                    <div class="profile-content">
                        <span>Date of Birth: </span>
                        <span>{{ $student->student->student_dob }}</span>
                    </div>
                    <div class="profile-content">
                        <span>Hostel: </span>
                        <span>{{ $student->student->student_hostel }}</span>
                    </div>
                    <div class="profile-content">
                        <span>Room Number: </span>
                        <span>{{ $student->student->student_room_num }}</span>
                    </div>
                    <div class="profile-content">
                        <span>Title: </span>
                        <span>{{ $student->student->student_title }}</span>
                    </div>
                    <div class="profile-content">
                        <span>Marital Status: </span>
                        <span>{{ $student->student->student_marital_status }}</span>
                    </div>
                    <hr>
                </div>
            </div>



        </div>
    </div>
</div>

@include('staff.includes.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
