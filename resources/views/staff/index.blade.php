@include('staff.includes.header')
@include('staff.includes.nav')

<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('staff.includes.sidebar')

        <div class="col-md-9">
            <div class="row progress-div-update">
                <div class="col-md-3 unit-progress">
                    <h4>Total Users</h4>
                    <img src="/assets/images/tick-mark.png" alt="tick-mark">
                    <div class="total-users-left">
                        <h4>{{ $users_count }}</h4>
                    </div>
                </div>

                <div class="col-md-3 unit-progress">
                    <h4>Total Students</h4>
                    <img src="/assets/images/tick-mark.png" alt="tick-mark">
                    <div class="total-users-left">
                        <h4>{{ $student_count }}</h4>
                    </div>
                </div>

                <div class="col-md-3 unit-progress">
                    <h4>Final Year Students</h4>
                    <img src="/assets/images/tick-mark.png" alt="tick-mark">
                    <div class="total-users-left">
                        <h4>{{ $final_year }}</h4>
                    </div>
                </div>

                <div class="col-md-3 unit-progress">
                    <h4>Total Units</h4>
                    <img src="/assets/images/tick-mark.png" alt="tick-mark">
                    <div class="total-users-left">
                        <h4>{{ $unit_count }}</h4>
                    </div>
                </div>
            </div>

            <h1 class="text-center">Student List</h1>

            <div class="row">
                <div class="col-12">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Matric Number</th>
                            <th>Student Level</th>
                            <th>College Name</th>
                            <th>Student DOB</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($all_student as $student)
                            <tr>
                                <td>{{ $student['name'] }}</td>
                                <td>{{ $student['email'] }}</td>
                                <td>{{ $student['matric_number'] }}</td>
                                <td>{{ $student['student']['student_level'] }}</td>
                                <td>{{ $student['student']['college_name'] }}</td>
                                <td>{{ $student['student']['student_dob'] }}</td>
                                <td>
                                    <a href="{{route('profile', $student['id'])}}">
                                        <button class="btn btn-primary">View</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Matric Number</th>
                            <th>Student Level</th>
                            <th>College Name</th>
                            <th>Student DOB</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
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
