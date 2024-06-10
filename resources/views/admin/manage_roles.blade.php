@include('admin.includes.header');


@include('admin.includes.nav');


<div class="container-fluid">
    <div class="row flex-nowrap">

        @include('admin.includes.sidebar');


        <div class="col-md-9">
            <form action="{{ route('assign_role') }}" method="post" class="p-4 border rounded shadow-sm bg-white">
                @csrf
                <h4 class="mb-4 text-center">Assign Role to Staff</h4>

                <div class="mb-3">
                    <label for="user_id" class="form-label">Select Staff</label>
                    <select class="form-control" name="user_id" id="user_id" required>
                        <option  disabled selected>Select a Staff</option>
                        @foreach($staffs as $staff)
                            <option value="{{ $staff->id }}">{{ $staff->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="unit_id" class="form-label">Select Role</label>
                    <select class="form-control" name="unit_id" id="unit_id" required>
                        <option disabled selected>Select a Role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->unit_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn login-btn">Assign Role</button>
                </div>
            </form>
        </div>




    </div>
</div>

@include('admin.includes.footer');
