@extends('auth.layouts.master')

@section('content')
    <div class="mx-auto" style="max-width: 30rem;">
        <!-- Card -->
        <div class="card card-lg mb-5">
            <div class="card-body">
                <!-- Form -->
                <form class="js-validate needs-validation" novalidate>
                    <div class="text-center">
                        <div class="mb-5">
                            <h1 class="display-5">Create your account</h1>
                            <p>Already have an account? <a class="link" href="authentication-login-basic.html">Sign in
                                    here</a></p>
                        </div>
                    </div>

                    <label class="form-label" for="fullNameSrEmail">Full name</label>

                    <!-- Form -->
                    <div class="mb-4">
                        <input type="text" class="form-control form-control-lg" name="fullName" id="fullNameSrEmail"
                            placeholder="Mark" aria-label="Mark" required>
                        <span class="invalid-feedback">Please enter your first name.</span>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="mb-4">
                        <label class="form-label" for="signupSrEmail">Your email</label>
                        <input type="email" class="form-control form-control-lg" name="email" id="signupSrEmail"
                            placeholder="Markwilliams@site.com" aria-label="Markwilliams@site.com" required>
                        <span class="invalid-feedback">Please enter a valid email address.</span>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="mb-4">
                        <label class="form-label" for="signupSrPassword">Password</label>

                        <div class="input-group input-group-merge" data-hs-validation-validate-class>
                            <input type="password" class="js-toggle-password form-control form-control-lg" name="password"
                                id="signupSrPassword" placeholder="8+ characters required"
                                aria-label="8+ characters required" required minlength="8"
                                data-hs-toggle-password-options='{
                                "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                                "defaultClass": "bi-eye-slash",
                                "showClass": "bi-eye",
                                "classChangeTarget": ".js-toggle-password-show-icon-1"
                                }'>
                            <a class="js-toggle-password-target-1 input-group-append input-group-text" href="javascript:;">
                                <i class="js-toggle-password-show-icon-1 bi-eye"></i>
                            </a>
                        </div>

                        <span class="invalid-feedback">Your password is invalid. Please try again.</span>
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="mb-4">
                        <label class="form-label" for="signupSrConfirmPassword">Confirm password</label>

                        <div class="input-group input-group-merge" data-hs-validation-validate-class>
                            <input type="password" class="js-toggle-password form-control form-control-lg"
                                name="confirmPassword" id="signupSrConfirmPassword" placeholder="8+ characters required"
                                aria-label="8+ characters required" required minlength="8"
                                data-hs-toggle-password-options='{
                                "target": [".js-toggle-password-target-1", ".js-toggle-password-target-2"],
                                "defaultClass": "bi-eye-slash",
                                "showClass": "bi-eye",
                                "classChangeTarget": ".js-toggle-password-show-icon-2"
                                }'>
                            <a class="js-toggle-password-target-2 input-group-append input-group-text" href="javascript:;">
                                <i class="js-toggle-password-show-icon-2 bi-eye"></i>
                            </a>
                        </div>

                        <span class="invalid-feedback">Password does not match the confirm password.</span>
                    </div>
                    <!-- End Form -->

                    <!-- Form Check -->
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" value="" id="termsCheckbox" required>
                        <label class="form-check-label" for="termsCheckbox">
                            I accept the <a href="#">Terms and Conditions</a>
                        </label>
                        <span class="invalid-feedback">Please accept our Terms and Conditions.</span>
                    </div>
                    <!-- End Form Check -->

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Create an account</button>

                        <button type="submit" class="btn btn-link">
                            or Start your 30-day trial <i class="bu-chevron-right"></i>
                        </button>
                    </div>
                </form>
                <!-- End Form -->
            </div>
        </div>
        <!-- End Card -->
    </div>
@endsection

@push('js')
    <script>
        (function() {
            window.onload = function() {
                // INITIALIZATION OF BOOTSTRAP VALIDATION
                // =======================================================
                HSBsValidation.init('.js-validate', {
                    onSubmit: data => {
                        data.event.preventDefault()
                        alert('Submited')
                    }
                })


                // INITIALIZATION OF TOGGLE PASSWORD
                // =======================================================
                new HSTogglePassword('.js-toggle-password')
            }
        })()
    </script>
@endpush
