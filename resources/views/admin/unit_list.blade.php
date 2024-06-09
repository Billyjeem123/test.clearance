@include('admin.includes.header')

@include('admin.includes.nav')

<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('admin.includes.sidebar')

        <div class="col-md-9">
            <h4>Create Institutional Unit</h4><br><br>
            <form action="{{ route('create_unit') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="unit_name" class="form-label">Unit Name</label>
                    <input type="text" class="form-control" name="unit_name" id="unit_name" aria-describedby="unit_name" placeholder="Enter Name">
                </div>
                <button type="submit" class="btn login-btn">Create Unit</button>
            </form>
            <br><br>
            <h4>Units List</h4>
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

<!-- DataTables JS -->

@include('admin.includes.footer')
