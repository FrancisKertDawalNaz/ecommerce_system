<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Loading...</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100 bg-white">
        <div class="text-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;"></div>
            <h5 class="mt-3">Loading, please wait...</h5>
        </div>
    </div>

    <script>
        setTimeout(function () {
            window.location.href = "{{ route('login') }}";
        }, 2000);
    </script>
</body>
</html>
