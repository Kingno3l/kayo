<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ID Card Example</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css">
        <link rel="shortcut icon" href="assets/images/favicon.ico">
</head>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100" id="id-card-id">
        <div class="card"
            style="width: 480px; height: 640px; background: linear-gradient(10deg, rgb(13, 97, 42) 50%, transparent 50%);">
            <div class="card-body text-center">
                <!-- Logo Section -->
                <img src="assets/images/logo-light.png" class="card-img-top" alt="ID Card Logo"
                    style="max-height: 80px; max-width: 160px;">
                <h2 class="card-title mt-2">YIPs Africa</h2>
                <h5 class="card-text">African Association of Young Insurance Professionals</h5>
                <!-- Profile Section -->
                <div class="profile-user position-relative d-inline-block pt-3">
                    <div class="circle-container position-relative mx-auto" style="width: 170px; height: 170px;">
                        <div class="bg-white rounded-circle position-absolute"
                            style="width: 170px; height: 170px; top: 0; left: 0;"></div>
                        <img src="{{ !empty($profileData->photo) ? url('uploads/user_images/' . $profileData->photo) : url('upload/no_image.jpg') }}"
                            class="rounded-circle position-absolute"
                            style="width: 150px; height: 150px; top: 10px; left: 10px;" alt="user-profile-image">
                    </div>
                </div>
                <h5 class="fs-16 mb-1 mt-2 text-white">{{ $profileData->name }}</h5>
                <p class="text-light mb-2">Member</p>
            </div>
            <!-- Additional Information -->
            <div class="px-4 text-center">
                <div class="text-left d-inline-block text-white">
                    <p class="font-weight-bold mb-1 px-5">Registration Number:
                        &nbsp;<span>{{ $profileData->registration_number }}</span></p>
                    <p class="font-weight-bold mb-1 px-5">Country: &nbsp;<span>{{ $profileData->country }}</span></p>
                    <p class="font-weight-bold mb-1 px-5">Valid Until: &nbsp;<span>{{ $validUntil }}</span></p>
                </div>
            </div>
            <!-- Barcode Section -->
            <div class="text-center mb-2">
                <img src="https://barcode.tec-it.com/barcode.ashx?data={{ $profileData->registration_number }}&code=Code128&translate-esc=true"
                    alt="Barcode" style="max-width: 200px;">
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center" style="margin-top: -100px;">
        <button id="dl-pdf" class="btn btn-success mr-2">
            <i class="ri-download-2-fill"></i> Download
        </button>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">
            <i class="ri-arrow-left-circle-fill"></i> Back
        </a>
    </div>

    <script src="{{asset('assets/js/html2pdf.bundle.min.js')}}"></script>
    <script type="text/javascript">
        document.getElementById('dl-pdf').onclick = function() {
            var element = document.getElementById('id-card-id');

            var opt = {
                margin: 1,
                filename: 'yips-membershipd-id-card.pdf',
                image: {
                    type: 'jpeg',
                    quality: 0.98
                },
                html2canvas: {
                    scale: 2
                },
                jsPDF: {
                    unit: 'in',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };

            html2pdf(element, opt);
        };
    </script>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>
