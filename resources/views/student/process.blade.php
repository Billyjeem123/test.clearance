<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.2/css/fontawesome.min.css">
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
        .form-section, .units-section {
            margin-top: 20px;
        }
        .form-section .form-control, .form-section .btn {
            margin-bottom: 15px;
        }
        .form-section .btn {
            width: 100%;
        }
        .units-section {
            margin-top: 40px;
        }
        .units-section h4 {
            margin-bottom: 20px;
        }
        .units-section table {
            width: 100%;
            overflow-x: auto;
        }
        .units-section table th, .units-section table td {
            white-space: nowrap;
        }
    </style>
</head>
<body>

@include('student.includes.nav')


<div class="container-fluid">
    <div class="row flex-nowrap">
        @include('student.includes.sidebar')

        <div class="col-md-9">
            <div class="row">
                <!-- Requirements Column -->
                <div class="col-md-6">
                    <span>Steps it takes to be cleared</span>
                    <div class="steps">
                        <div class="alert alert-info" role="alert">
                            <h4 class="alert-heading">Important Note</h4>
                            <p>All documents must be attached as a single PDF file for verification. Please ensure each section is appropriately named.</p>
                        </div>

                        <h4 class="mb-3">Steps to be Cleared:</h4>
                        <ul class="list-group">
                            @foreach($unit->requirements as $requirement)
                                <li class="list-group-item d-flex align-items-center">
                                    <img src="{{ asset('assets/images/empty.jpeg') }}" alt="Requirement Icon" class="me-2" style="width: 20px;">
                                    {{ $requirement->requirement }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <!-- Form Column -->
                <div class="col-md-6">
                    <div class="form-section">
                        <form action="{{ route('save_documents') }}" method="post" class="p-4 border rounded shadow-sm bg-white" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="unit_id" value="{{ $unit->id }}">
                            <h4 class="mb-4 text-center">Upload {{ $unit->unit_name }} Verification Docs</h4>

                            <div id="document-uploads">
                                <div class="document-upload mb-3">
                                    <label for="document_names" class="form-label">Document Name</label>
                                    <input type="text" class="form-control" name="document_names[]" placeholder="Enter document name" required>

                                    <label for="documents" class="form-label">Document File</label>
                                    <input type="file" class="form-control" name="documents[]" required>
                                </div>
                            </div>

                            <button type="button" class="btn btn-secondary" onclick="addDocumentField()">Add Another Document</button>
                            <button type="submit" class="btn btn-primary">Upload Docs</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.includes.footer')

<script>
    function addDocumentField() {
        const uploadContainer = document.getElementById('document-uploads');
        const newUpload = document.createElement('div');
        newUpload.classList.add('document-upload', 'mb-3');
        newUpload.innerHTML = `
            <label for="document_names" class="form-label">Document Name</label>
            <input type="text" class="form-control" name="document_names[]" placeholder="Enter document name" required>

            <label for="documents" class="form-label">Document File</label>
            <input type="file" class="form-control" name="documents[]" required>
        `;
        uploadContainer.appendChild(newUpload);
    }
</script>

<style>
    .steps {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .steps p {
        display: flex;
        align-items: center;
    }
    .steps p img {
        margin-right: 10px;
    }
</style>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js">

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+PmAzLB4v5BT8aHUXElmKUHitfK3I" crossorigin="anonymous"></script>

<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif

    @if(Session::has('error'))
    toastr.error("{{ Session::get('error') }}");
    @endif

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
