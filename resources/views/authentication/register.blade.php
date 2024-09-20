<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg"
    data-sidebar-image="none" data-preloader="disable">

<head>

    <meta charset="utf-8" />
    <title>Sign Up | YIPS Africa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="YIPS Africa" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Layout config Js -->
    <script src="{{ asset('assets/js/layout.js') }}"></script>

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- App Css -->
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Custom Css -->
    <link href="{{ asset('assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />




</head>

<body>

    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="index.html" class="d-inline-block auth-logo">
                                    <img src="assets/images/logo-light.png" alt="" height="20">
                                </a>
                            </div>
                            <p class="mt-3 fs-15 fw-medium"> Yips Auth</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Create New Account</h5>
                                    <p class="text-muted">Get your free velzon account now</p>
                                </div>
                                <div class="p-2 mt-4">
                                   <form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Enter name" required>
        <div class="invalid-feedback">Please enter name</div>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Enter email address" required>
        <div class="invalid-feedback">Please enter email</div>
    </div>

    <!-- Password Requirements Display -->
    <div id="password-requirements" class="p-3 bg-light mb-3 rounded">
        <h5 class="fs-13 fw-semibold">Password must contain:</h5>
        <p id="pass-length" class="fs-12 mb-2 text-danger">- At least 8 characters</p>
        <p id="pass-lower" class="fs-12 mb-2 text-danger">- At least one lowercase letter (a-z)</p>
        <p id="pass-upper" class="fs-12 mb-2 text-danger">- At least one uppercase letter (A-Z)</p>
        <p id="pass-number" class="fs-12 mb-2 text-danger">- At least one number (0-9)</p>
        <p id="pass-match" class="fs-12 mb-0 text-danger">- Password and confirmation must match</p>
    </div>

    <div class="mb-3">
        <label class="form-label" for="password">Password</label>
        <div class="position-relative auth-pass-inputgroup">
            <input type="password" name="password" id="password" class="form-control pe-5 password-input" onpaste="return false" placeholder="Enter password" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
            <div class="invalid-feedback">Please enter a valid password</div>
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label" for="password_confirmation">Confirm Password</label>
        <div class="position-relative auth-pass-inputgroup">
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control pe-5 password-input" onpaste="return false" placeholder="Confirm password" aria-describedby="passwordInput" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
            <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon" type="button" id="password-confirmation-addon"><i class="ri-eye-fill align-middle"></i></button>
            <div class="invalid-feedback">Please confirm password</div>
        </div>
    </div>

    <!-- Terms of Use Agreement with Checkbox -->
    <div class="mb-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="terms-agreement" name="terms" required>
            <label class="form-check-label" for="terms-agreement">
                I agree to the Velzon <a href="#" class="text-primary text-decoration-underline fst-normal fw-medium">Terms of Use</a> <span class="text-danger">*</span>
            </label>
            <div class="invalid-feedback">You must agree to the terms of use before registering</div>
        </div>
    </div>

    <div class="mt-4">
        <button class="btn btn-success w-100" type="submit" id="signup-button" disabled>Sign Up</button>
    </div>

   
</form>
                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                        <div class="mt-4 text-center">
                            <p class="mb-0">Already have an account ? <a href="{{ route('login') }}"
                                    class="fw-semibold text-primary text-decoration-underline"> Signin </a> </p>
                        </div>

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script> Yips Africa.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
    <!-- end auth-page-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <!-- particles js -->
    <script src="{{ asset('assets/libs/particles.js/particles.js') }}"></script>

    <!-- particles app js -->
    <script src="{{ asset('assets/js/pages/particles.app.js') }}"></script>

    <!-- validation init -->
    <script src="{{ asset('assets/js/pages/form-validation.init.js') }}"></script>

    <!-- password create init -->
    <script src="{{ asset('assets/js/pages/passowrd-create.init.js') }}"></script>

    <!-- JavaScript to Validate Password Requirements -->
    <!-- JavaScript to Validate Password Requirements -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('password_confirmation');
        const signupButton = document.getElementById('signup-button');
        const passLength = document.getElementById('pass-length');
        const passLower = document.getElementById('pass-lower');
        const passUpper = document.getElementById('pass-upper');
        const passNumber = document.getElementById('pass-number');
        const passMatch = document.getElementById('pass-match');

        function validatePassword() {
            const password = passwordInput.value;
            const confirmPassword = confirmPasswordInput.value;

            // Check if password meets length requirement
            const lengthCheck = password.length >= 8;
            passLength.classList.toggle('text-success', lengthCheck);
            passLength.classList.toggle('text-danger', !lengthCheck);

            // Check if password contains a lowercase letter
            const lowerCheck = /[a-z]/.test(password);
            passLower.classList.toggle('text-success', lowerCheck);
            passLower.classList.toggle('text-danger', !lowerCheck);

            // Check if password contains an uppercase letter
            const upperCheck = /[A-Z]/.test(password);
            passUpper.classList.toggle('text-success', upperCheck);
            passUpper.classList.toggle('text-danger', !upperCheck);

            // Check if password contains a number
            const numberCheck = /\d/.test(password);
            passNumber.classList.toggle('text-success', numberCheck);
            passNumber.classList.toggle('text-danger', !numberCheck);

            // Check if passwords match
            const matchCheck = password === confirmPassword && password.length > 0;
            passMatch.classList.toggle('text-success', matchCheck);
            passMatch.classList.toggle('text-danger', !matchCheck);

            // Enable signup button only if all checks are true
            const allValid = lengthCheck && lowerCheck && upperCheck && numberCheck && matchCheck;
            signupButton.disabled = !allValid;
            signupButton.classList.toggle('btn-success', allValid);
            signupButton.classList.toggle('btn-secondary', !allValid);
        }

        passwordInput.addEventListener('input', validatePassword);
        confirmPasswordInput.addEventListener('input', validatePassword);
    });
</script>





</body>

</html>
