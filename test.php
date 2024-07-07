@include('admin.includes.header')
@include('admin.includes.nav')

<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('admin.includes.sidebar')

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

            <div class="row">
                <div class="col-12">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>Unit Name</th>
                            <th>Users</th>
                            <th>Students</th>
                            <th>Final Year Students</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($units as $unit)
                        <tr>
                            <td>{{ $unit->unit_name }}</td>
                            <td>{{ $unit->users_count }}</td>
                            <td>{{ $unit->students_count }}</td>
                            <td>{{ $unit->final_year_students_count }}</td>
                            <td>
                                <button class="btn btn-primary">View</button>
                                <button class="btn btn-secondary">Edit</button>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>Unit Name</th>
                            <th>Users</th>
                            <th>Students</th>
                            <th>Final Year Students</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.includes.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="/assets/css/styles.css">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    {{--    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--}}
    {{--    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>--}}
    <style>
        .unit-progress {
            text-align: center;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .total-users-left {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .total-users-left h4 {
            margin: 0 10px;
        }
    </style>
</head>
<body>
