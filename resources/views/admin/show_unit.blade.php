@include('admin.includes.header')
@include('admin.includes.nav')

<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('admin.includes.sidebar')
        <div class="col-md-9">
            <form action="{{ route('create_unit') }}" method="post" class="p-4 border rounded shadow-sm">
                @csrf
                <h4 class="mb-4 text-center">Create Institutional Unit</h4>
                <div class="mb-3">
                    <label for="unit_name" class="form-label">Unit Name</label>
                    <input type="text" class="form-control" name="unit_name" id="unit_name" aria-describedby="unit_name" placeholder="Enter Name" required>
                </div>

                <div id="requirements-container" class="mb-3">
                    <label for="requirements" class="form-label">Requirements</label>
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" name="requirements[]" placeholder="Enter Requirement" required>
                        <button type="button" class="btn btn-danger remove-requirement">Remove</button>
                    </div>
                </div>
                <button type="button" class="btn btn-secondary mb-3" id="add-requirement">Add Another Requirement</button>

                <div class="d-flex justify-content-start">
                    <button type="submit" class="btn login-btn">Create Unit</button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.includes.footer')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('add-requirement').addEventListener('click', function () {
            const container = document.getElementById('requirements-container');
            const newRequirement = document.createElement('div');
            newRequirement.classList.add('input-group', 'mb-2');
            newRequirement.innerHTML = `
                <input type="text" class="form-control" name="requirements[]" placeholder="Enter Requirement" required>
                <button type="button" class="btn btn-danger remove-requirement">Remove</button>
            `;
            container.appendChild(newRequirement);
        });

        document.getElementById('requirements-container').addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('remove-requirement')) {
                e.target.parentElement.remove();
            }
        });
    });
</script>
