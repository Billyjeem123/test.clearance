@include('admin.includes.header')

@include('admin.includes.nav')

<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('admin.includes.sidebar')

        <div class="col-md-9">
            <h4>Units List</h4>

            <br>

            <table id="example" class="display table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Unit Name</th>
                    <th>Requirements</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($units as $unit)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $unit->unit_name }}</td>
                        <td>
                            <ul>
                                @foreach($unit->requirements as $requirement)
                                    <li>{{ $requirement->requirement }}</li>
                                @endforeach
                            </ul>
                        </td>
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

<!-- DataTables JS -->

@include('admin.includes.footer')

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

