<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Staff Dashboard</title>
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


            <div class="row progress-div-update">
                <div class="col-md-3 unit-progress">
                    <h4> Total Student </h4>

                    <img src="/assets/images/tick-mark.png" alt="tick-mark"><span> Cleared</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Faculty Student </h4>

                    <img src="/assets/images/exclamation-mark.png" alt="tick-mark"><span> Not Cleared</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Library </h4>

                    <img src="/assets/images/tick-mark.png" alt="tick-mark"><span> Cleared</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Department </h4>

                    <img src="/assets/images/exclamation-mark.png" alt="tick-mark"><span> Not Cleared</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Library </h4>

                    <img src="/assets/images/tick-mark.png" alt="tick-mark"><span> Cleared</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Department </h4>

                    <img src="/assets/images/exclamation-mark.png" alt="tick-mark"><span> Not Cleared</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Library </h4>

                    <img src="/assets/images/tick-mark.png" alt="tick-mark"><span> Cleared</span>
                </div>
                <div class="col-md-3 unit-progress">
                    <h4> Department </h4>

                    <img src="/assets/images/exclamation-mark.png" alt="tick-mark"><span> Not Cleared</span>
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
                    <table id="units-table" class="display table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Unit Name</th>
                            <th>Document ID</th>
                            <th>Document Name</th>
                            <th>Document Path</th>
                            <th>Uploaded By</th>
                            <th>Actions</th>
                            <th>Clearance Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($clearance)
                            @foreach($clearance->documents as $document)
                                <tr>
                                    <td>{{ $clearance->id }}</td>
                                    <td>{{ $clearance->unit_name }}</td>
                                    <td>{{ $document->id }}</td>
                                    <td>{{ $document->names }}</td>
                                    <td><a href="{{ Storage::url($document->file_path) }}" target="_blank">View Document</a></td>
                                    <td>{{ $document->user->name }} ({{ $document->user->email }})</td>
                                    <td><a href="{{ route('document.approvalForm', $document->id) }}" class="btn btn-primary">View</a></td>
                                    <td><a href="">View Status</a></td>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function() {
            // Show the modal when the 'View' button is clicked
            $('.view-document').on('click', function() {
                var documentId = $(this).data('document-id');
                $('#document_id').val(documentId);
                $('#approvalModal').modal('show');
            });

            // Handle form submission
            $('#approvalForm').on('submit', function(e) {
                e.preventDefault();
                var action = $(this).find('button[type=submit]:focus').val();
                var comment = $('#comment').val();
                var documentId = $('#document_id').val();

                $.ajax({
                    url: '{{ route("document.approval") }}',
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        action: action,
                        comment: comment,
                        document_id: documentId
                    },
                    success: function(response) {
                        alert('Document has been ' + action + 'd.');
                        $('#approvalModal').modal('hide');
                    },
                    error: function(response) {
                        alert('An error occurred.');
                    }
                });
            });
        });
    </script>


{{--    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>--}}
</body>
</html>
