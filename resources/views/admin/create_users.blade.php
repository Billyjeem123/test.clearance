@include('admin.includes.header');


@include('admin.includes.nav');


<div class="container-fluid">
    <div class="row flex-nowrap">

        @include('admin.includes.sidebar');
        <div class="col-md-9">
            <form action="{{ route('create_staff') }}" method="post" class="p-4 border rounded shadow-sm bg-white">
                @csrf
                <h4 class="mb-4 text-center">Create Staff</h4>
                <div class="mb-3">
                    <label for="staff_name" class="form-label">Staff Name</label>
                    <input type="text" class="form-control" name="staff_name" id="staff_name" aria-describedby="staff_name" placeholder="Enter Name" required>
                </div>
                <div class="mb-3">
                    <label for="staff_email" class="form-label">Staff Email</label>
                    <input type="email" class="form-control" name="staff_email" id="staff_email" aria-describedby="staff_email" placeholder="Enter Email" required>
                </div>
                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn login-btn">Create Staff</button>
                </div>
            </form>
        </div>

    </div>
</div>

@include('admin.includes.footer');
