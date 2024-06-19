<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document Approval</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: 600;
        }
        .btn {
            width: 100px;
        }
        .btn + .btn {
            margin-left: 10px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center">Approve or Reject Document</h1>
    <form id="approvalForm" method="POST" action="{{ route('document.approval') }}">
        @csrf
        <input type="hidden" name="document_id" value="{{ $document->id }}">
        <div class="form-group">
            <label for="comment">Comment</label>
            <textarea name="comment" id="comment" class="form-control" rows="4" required></textarea>
        </div>
        <div class="form-group text-center">
            <button type="submit" name="action" value="approve" class="btn btn-success">Approve</button>
            <button type="submit" name="action" value="reject" class="btn btn-danger">Reject</button>
        </div>
    </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
