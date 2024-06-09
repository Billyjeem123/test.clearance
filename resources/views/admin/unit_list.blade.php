@include('admin.includes.header')

@include('admin.includes.nav')

<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('admin.includes.sidebar')

        <div class="col-md-9">
            <h4>Units List</h4>

            <br>

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
