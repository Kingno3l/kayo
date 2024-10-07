@extends('emails.home')
@section('user_auth')
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5">
            <div class="card mt-4">


                <div class="card-body p-4">
                    <div class="text-center mt-2">
                        <h5 class="text-primary">Create New Account</h5>
                        <p class="text-muted">Get your free YIPS account now</p>
                    </div>
                    <div class="p-2 mt-4">


                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Enter name" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Enter email address" required>
                            </div>

                            {{-- <div class="mt-4">
                                <button class="btn btn-success w-100" type="submit">Register</button>
                            </div> --}}

                            <div class="mt-4">
    <button id="register-button" class="btn btn-success w-100" type="button">
        <span id="button-text">Register</span>
        <span id="spinner" class="spinner-border spinner-border-sm" role="status" aria-hidden="true" style="display: none;"></span>
    </button>
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

    <script>
      document.addEventListener('DOMContentLoaded', function() {
    const registerButton = document.getElementById('register-button');
    const spinner = document.getElementById('spinner');
    const buttonText = document.getElementById('button-text');

    registerButton.addEventListener('click', function() {
        // Show the spinner and hide button text
        spinner.style.display = 'inline-block';
        buttonText.style.display = 'none';

        // Disable the button to prevent multiple clicks
        registerButton.disabled = true;

        // Submit the form
        const form = registerButton.closest('form'); // Get the closest form
        if (form) {
            form.submit(); // Submit the form
        }
    });
});

    </script>
@endsection
