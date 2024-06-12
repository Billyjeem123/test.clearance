<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .form-section, .units-section {
            margin-top: 20px;
        }
        .form-section .form-control, .form-section .btn {
            margin-bottom: 15px;
        }
        .form-section .btn {
            width: 100%;
        }
        .units-section {
            margin-top: 40px;
        }
        .units-section h4 {
            margin-bottom: 20px;
        }
        .units-section table {
            width: 100%;
            overflow-x: auto;
        }
        .units-section table th, .units-section table td {
            white-space: nowrap;
        }
    </style>
</head>
<body>

@include('student.includes.nav')

<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('student.includes.sidebar')

        <div class="col-md-9">
            <div class="form-section">
                <form action="{{ route('create_staff') }}" method="post" class="p-4 border rounded shadow-sm bg-white">
                    @csrf
                    <h4 class="mb-4 text-center">Upload {{$unit->unit_name}} Verifcation Docs</h4>
                    <div class="mb-3">
                        <label for="document_names" class="form-label">Document Names</label>
                        <input type="text" class="form-control" name="document_names" id="document_names" aria-describedby="document_names" placeholder="Enter document names, separated by commas" required>
                    </div>
                    <div class="mb-3">
                        <label for="staff_email" class="form-label">Staff Email</label>
                        <input type="file" class="form-control" name="documents" id="staff_email" aria-describedby="staff_email" placeholder="Enter Email" required>
                    </div>
                    <button type="submit" class="btn login-btn">Upload Docs</button>
                </form>
            </div>

            <div class="units-section">
                <h4 class="text-center">Units List</h4>
                <table id="units-table" class="display table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Unit Name</th>
                        <th>Actions</th>
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
