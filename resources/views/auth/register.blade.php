@extends('auth.layouts.master')

@section('content')
    <div class="mx-auto" style="max-width: 30rem;">
        <!-- Card -->
        <div class="card card-lg mb-5">
            <div class="card-body">
                <!-- Form -->
                <form class="js-validate needs-validation" method="POST" action="{{ route('register') }}" novalidate>
                    @csrf
                    <div class="text-center">
                        <div class="mb-5">
                            <h1 class="display-5">Create your account</h1>
                            <p>Already have an account? <a class="link" href="{{ route('login') }}">Sign in
                                    here</a></p>
                        </div>
                    </div>

                    <label class="form-label" for="fullNameSrEmail">Nama</label>

                    <!-- Form -->
                    <div class="mb-4">
                        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror"
                            name="name" id="fullNameSrEmail" placeholder="Mark" aria-label="Mark" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="mb-4">
                        <label class="form-label" for="signupSrEmail">Your email</label>
                        <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                            name="email" id="signupSrEmail" placeholder="Markwilliams@site.com"
                            aria-label="Markwilliams@site.com" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="mb-4">
                        <label class="form-label" for="signupSrPassword">Password</label>

                        <div class="input-group input-group-merge" data-hs-validation-validate-class>
                            <input type="password"
                                class="js-toggle-password form-control form-control-lg @error('password') is-invalid @enderror"
                                name="password" id="signupSrPassword" placeholder="8+ characters required"
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

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- End Form -->

                    <!-- Form -->
                    <div class="mb-4">
                        <label class="form-label" for="signupSrConfirmPassword">Confirm password</label>

                        <div class="input-group input-group-merge" data-hs-validation-validate-class>
                            <input type="password" class="js-toggle-password form-control form-control-lg"
                                name="password_confirmation" id="signupSrConfirmPassword"
                                placeholder="8+ characters required" aria-label="8+ characters required" required
                                minlength="8"
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
                    </div>
                    <!-- End Form -->

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Create an account</button>
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
                new HSTogglePassword('.js-toggle-password')
            }
        })()
    </script>
@endpush
