<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student-dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
</head>
<body>

@include('student.includes.nav')


<div class="container-fluid">
    <div class="row flex-nowrap">

        @include('student.includes.sidebar')
        <div class="col-md-9">
            <div class="col-md-9">
                <div class="row progress-div">
                    <h2>Clearance Progress</h2>
                    <div class="progress col-md-9">
                        <div class="progress-bar" role="progressbar" style="width: {{ $progressPercentage }}%;" aria-valuenow="{{ $progressPercentage }}" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                    <div class="col-md-3">
                        <img src="/assets/images/on-progress.png" alt="on-progress" class="on-progress">
                    </div>
                    <span>{{ $progressPercentage }}% Complete</span>
                </div>
            </div>


            <div class="col-md-12">
                <h4 class="text-center mt-5">Clearance List</h4>
                <br>
                <table id="units-table" class="display table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Unit Name</th>
                        <th>Document Name</th>
                        <th>Reuploaded status</th>
                        <th>Document Path</th>
                        <th>Clearance Status</th>
                        <th>Clearance Comment</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse ($data as $item)
                        @foreach ($item['documents'] as $document)
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['unit_name'] }} Unit</td>
                                <td>{{ $document['names'] }}</td>
                                <td>{{$document->is_reuploaded}}</td>
                                <td><a href="{{ $document['file_path'] }}" target="_blank">View Document</a></td>
                                <td><a href="">{{ $document['status'] }}</a></td>
                                <td><a href="">{{ $document['comment'] ? $document['comment'] : 'pending' }}</a></td>
                                <td><a href="{{ route('process_verification', $document['id']) }}" class="btn btn-primary">View</a></td>
                            </tr>
                        @endforeach
                    @empty
                        <tr>
                            <td colspan="7">No documents found</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>


    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
