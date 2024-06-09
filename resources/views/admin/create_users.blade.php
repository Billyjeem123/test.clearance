@include('admin.includes.header');


@include('admin.includes.nav');


<div class="container-fluid">
    <div class="row flex-nowrap">

        @include('admin.includes.sidebar');

        <div class="col-md-9">
            <form action="{{ route('create_staff') }}" method="post">
                @csrf
                <h4>Create Staff</h4><br><br>
                <div class="mb-3">
                    <label for="staff_name" class="form-label">Staff Name</label>
                    <input type="text" class="form-control" name="staff_name" id="staff_name" aria-describedby="staff_name" placeholder="Enter Name">
                </div>
                <div class="mb-3">
                    <label for="staff_email" class="form-label">Staff Email</label>
                    <input type="email" class="form-control" name="staff_email" id="staff_email" aria-describedby="staff_email" placeholder="Enter Email">
                </div>
                <button type="submit" class="btn login-btn">Create Staff</button>
            </form>
        </div>




    </div>
</div>

@include('admin.includes.footer');
