@include('student.includes.header')
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
                <table id="example" class="display table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Unit Name</th>
                        <th>Document Name</th>
                        <th>Uploaded status</th>
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
                                <td><a href="">{{ $document[' tus'] }}</a></td>
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    </body>
    </html>
