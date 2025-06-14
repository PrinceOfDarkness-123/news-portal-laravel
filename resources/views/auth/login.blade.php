@extends('layouts.auth')
@section('title', 'Login')
@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card rounded-0" style="transform:scale(0.9,0.9)">
            <div class="row h-100 g-0">
                {{-- Left Side: Login Form --}}
                <div class="col-md-6 container-size d-flex flex-column justify-content-center p-4">
                    <div style="text-align:center">
                        <h4 style="text-align: left" class="mb-3">Sign In</h4>
                        <p style="text-align: left" class="fw-light">Keep the news flowing—log in to manage the portal.</p>
                        <form method="POST" action="#">
                            @csrf
                            <div class="mb-3">
                                <h5 style="text-align: left"><label for="email" class="form-label">Email Address</label></h5>
                                <input type="email" placeholder="Enter your Email Address" name="email" class="form-control rounded-0" required autofocus>
                            </div>
                            <h5 style="text-align: left"><label for="password" class="form-label">Password</label></h5>
                            <div class="custom-input-group mb-3">
                              <input type="password" placeholder="Enter your Password" id="passwordInput" class="form-control rounded-0" aria-label="Password">
                              <span class="input-group-text" id="togglePassword" style="cursor: pointer;">
                                <i class="bi bi-eye-slash-fill" id="eyeIcon"></i>
                              </span>
                            </div>
                            <div style="text-align: left" class="mb-3 form-check">
                                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                                <label class="form-check-label" for="remember">Remember Me</label>
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 w-100">Login</button>
                            <div class="w-100 d-flex align-items-center my-3">
                              <hr class="flex-grow-1">
                              <span class="px-2 text-muted">Or Sign In with</span>
                              <hr class="flex-grow-1">
                            </div>
                            <div class="d-flex justify-content-evenly gap-4 mt-3">
                              <a href="#" class="social-icon facebook d-flex align-items-center justify-content-center">
                                <i class="bi bi-facebook"></i>
                              </a>
                              <a href="#" class="social-icon google d-flex align-items-center justify-content-center">
                                <div class="google-icon default-icon">
                                   <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 48 48"><path fill="#FFC107" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                <path fill="#FF3D00" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                                <path fill="#4CAF50" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                                <path fill="#1976D2" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                </svg>
                                </div>
                                <div class="google-icon hover-icon">
                                   <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="30" height="30" viewBox="0 0 48 48"><path fill="#fff" d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12c0-6.627,5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24c0,11.045,8.955,20,20,20c11.045,0,20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                <path fill="#fff" d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z"></path>
                                <path fill="#fff" d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z"></path>
                                <path fill="#fff" d="M43.611,20.083H42V20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z"></path>
                                </svg>
                                </div>
                              </a>
                              <a href="#" class="social-icon linkedin d-flex align-items-center justify-content-center">
                                <i class="bi bi-linkedin"></i>
                              </a>
                            </div>
                            <p class="text-center mt-4 mb-0">
                              Don't have an account?
                              <a href="#" class="register-link">
                                Register here
                              </a>
                            </p>
                        </form>
                    </div>
                </div>
                {{-- Right Side: Image --}}
                <div class="col-md-6 background-color d-flex align-items-center justify-content-center">
                    <img src="{{ asset('images/login screen/news_portal_image_login@3x.png') }}"
                         alt="Login Banner"
                         style="max-height: 90%; max-width: 90%; object-fit: contain;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection