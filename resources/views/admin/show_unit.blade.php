@include('admin.includes.header');


@include('admin.includes.nav');


<div class="container-fluid">
    <div class="row flex-nowrap">

        @include('admin.includes.sidebar');

        <div class="col-md-9">


            <form action="{{ route('create_unit') }}" method="post" class="p-4 border rounded shadow-sm">
                @csrf
                <h4 class="mb-4 text-center">Create Institutional Unit</h4>
                <div class="mb-3">
                    <label for="unit_name" class="form-label">Unit Name</label>
                    <input type="text" class="form-control" name="unit_name" id="unit_name" aria-describedby="unit_name" placeholder="Enter Name" required>
                </div>
                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn login-btn">Create Unit</button>
                </div>
            </form>






        </div>



    </div>
</div>

@include('admin.includes.footer');
