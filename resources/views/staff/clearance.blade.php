<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Dashboard</title>

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


@include('staff.includes.nav')


<div class="container-fluid">
    <div class="row flex-nowrap">

        @include('staff.includes.sidebar')

        <div class="col-md-9">


            <div class="row progress-div-update">
                <div class="col-md-3 unit-progress">
                    <h4> Total Records </h4>

                    <img src="/assets/images/tick-mark.png" alt="tick-mark"><span> {{$totalCount}}</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Pending  Records </h4>

                    <img src="/assets/images/exclamation-mark.png" alt="tick-mark"><span> {{$pendingCount}}</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Approved Records </h4>

                    <img src="/assets/images/tick-mark.png" alt="tick-mark"><span> {{$approvedCount}}</span>
                </div>



            </div>


            <div class="col-md-12">
                <h4 class="text-center mt-5">Clearance  List</h4>

                <br>


                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Staff Dashboard</title>
                    <!-- Bootstrap CSS -->
                    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                </head>
                <body>
                <div class="container mt-5">
                    <table id="example" class="display" style="width:100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Unit Name</th>
                            <th>Document Name</th>
                            <th>Document Path
                            <th>Uploaded status</th>
                            <th>Uploaded By</th>
                            <th>Clearance Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($clearance)
                            @foreach($clearance->documents as $document)
                                <tr>
                                    <td>{{ $clearance->id }}</td>
                                    <td>{{ $clearance->unit_name }}</td>
                                    <td>{{ $document->names }}</td>

                                    <td><a href="{{ Storage::url($document->file_path) }}" target="_blank">View Document</a></td>
                                    <td>{{$document->is_reuploaded}}</td>
                                    <td>{{ $document->user->name }} ({{ $document->user->email }})</td>
                                    <td><a href="">{{$document->status}}</a></td>
                                    <td><a href="{{ route('document.approvalForm', $document->id) }}" class="btn btn-primary">View</a></td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="8">No documents found</td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                </div>

                <!-- Bootstrap JS -->
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
                </body>
                </html>




            </div>

        </div>


    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+PmAzLB4v5BT8aHUXElmKUHitfK3I" crossorigin="anonymous"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif

        @if(Session::has('error'))
        toastr.error("{{ Session::get('error') }}");
        @endif


    </script>


</body>
</html>
