<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Alert</title>
    <!-- Include SweetAlert2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
</head>
<body>
    <!-- Include SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Simulate a success message
        window.addEventListener('load', function() {
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Registration successful!',
                showConfirmButton: false,
                timer: 1500
            });
        });
    </script>
</body>
</html>
