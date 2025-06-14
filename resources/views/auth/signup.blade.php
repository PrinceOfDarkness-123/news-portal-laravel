@extends('layouts.auth')
@section('title', 'Create An Account')
@section('content')
    <div class="row">
    <div class="col-sm-12">
        <div class="card rounded-0" style="transform:scale(0.867,0.867)">
            <div class="row h-100 g-0">
                {{-- Right Side: Image --}}
                <div class="col-md-6 background-color d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/login screen/news_portal_image_login@3x.png') }}"
                         alt="Login Banner"
                         style="max-height: 90%; max-width: 90%; object-fit: contain;">
                </div>
                {{-- Left Side: Login Form --}}
                <div class="col-md-6 container-size d-flex flex-column justify-content-center p-4">
                    <div style="text-align:center">
                        <h4 style="text-align: left" class="mb-3">Create An Account</h4>
                        <p style="text-align: left" class="fw-light">Join a community of writers—create an account and let your words make an impact.</p>
                        <form method="POST" action="#">
                            @csrf
                            <div class="mb-3">
                                <h6 style="text-align: left"><label for="username" class="form-label">User Name</label></h6>
                                <input type="text" placeholder="Enter your User Name" name="username" class="form-control rounded-0" required autofocus>
                            </div>
                            <div class="mb-3">
                                <h6 style="text-align: left"><label for="email" class="form-label">Email Address</label></h6>
                                <input type="email" placeholder="Enter your Email Address" name="email" class="form-control rounded-0" required autofocus>
                            </div>
                            <h6 style="text-align: left"><label for="password" class="form-label">Password</label></h6>
                            <div class="custom-input-group mb-3">
                              <input type="password" placeholder="Enter your Password" id="passwordInput" class="form-control rounded-0" aria-label="Password">
                              <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                <i class="bi bi-eye-slash-fill" id="eyeIcon"></i>
                              </span>
                            </div>
                            <h6 style="text-align: left"><label for="password" class="form-label">Confirm Password</label></h6>
                            <div class="custom-input-group mb-3">
                              <input type="password" placeholder="Enter your Password again" id="passwordInput" class="form-control rounded-0" aria-label="Password">
                              <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                <i class="bi bi-eye-slash-fill" id="eyeIcon"></i>
                              </span>
                            </div>
                            <div style="text-align: left" class="mb-3 form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                <label class="form-check-label text-muted" for="remember">By creating an account, you agree to our Terms & Conditions and Privacy Policy. You also acknowledge that all content submitted complies with our editorial guidelines.</label>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 w-100">Get Started</button>
                            <p class="text-center mt-4 mb-0">
                              Already have an Account?
                              <a href="{{ route('auth.login') }}" class="register-link">
                                Sign In Here
                              </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection