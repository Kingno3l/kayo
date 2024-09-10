<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Callback</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.lordicon.com/lusqsztk.js"></script>
</head>
<body>

@if (isset($paymentSuccess) && $paymentSuccess)
    <script>
        let timerInterval;
        Swal.fire({
            title: '<lord-icon src="https://cdn.lordicon.com/lupuorrc.json" trigger="loop" colors="primary:#0ab39c,secondary:#405189" style="width:120px;height:120px"></lord-icon><br><h3>Payment Successful!</h3>',
            html: `
                <h4>Annual Due Paid !</h4>
                <div class="mt-4 pt-2 fs-15"><p class="text-muted mx-4 mb-0">Aww yeah, you successfully paid your annual due.</p></div>
            `,
            timer: 5000, // 5 seconds before auto close
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                const timer = Swal.getHtmlContainer().querySelector('b');
                timerInterval = setInterval(() => {
                    timer.textContent = Swal.getTimerLeft();
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            },
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
                // Redirect to home or any other route after timer
                window.location.href = "{{ route('dashboard') }}";
            }
        });
    </script>
@endif

</body>
</html>
