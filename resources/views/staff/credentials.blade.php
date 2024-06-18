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

@include('staff.includes.nav')


<div class="container-fluid">
    <div class="row flex-nowrap">

        @include('staff.includes.sidebar')

        <div class="col-md-9">




            <div class="col-md-12">
                <h4 class="text-center mt-5">Student Clearance Info</h4>

                <br>

                <table id="units-table" class="display table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Unit Name</th>
                        <th>Actions</th>
                        <th>Clearance  Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($units as $unit)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $unit->unit_name }}</td>
                            <td>
                                <form action="{{ route('destroy_unit', $unit->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this unit?')">Delete</button>
                                </form>
                            </td>
                            <td><a href="">View Status</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
