@include('admin.includes.header')

@include('admin.includes.nav')

<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('admin.includes.sidebar')

        <div class="col-md-9">
            <h4>Staffs List</h4>

            <br>

            <table id="users-table" class="display table table-striped table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Units (Roles)</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @if($user->user->units->isEmpty())
                                <p>No units assigned</p>
                            @else
                                @foreach($user->user->units as $unit)
                                    <p>{{ $unit->unit_name }}</p>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('destroy_user', $user->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this user?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('admin.includes.footer')

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#users-table').DataTable();
    });
</script>
