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
                        @if ($errors->any())
                            <div class="info-alert" id="infoAlert">
                                <div class="warningAlert">
                                    <div class="alert-content">
                                        <span class="alert-icon">
                                            <i class="bi bi-exclamation-triangle" style="font-size: 1.3rem;"></i>
                                        </span>
                                        <div class="alert-text">
                                            <strong>Can't Register your Account</strong><br>
                                            <span class="alert-description">
                                                Please review the form and correct the highlighted errors below.
                                            </span>
                                        </div>
                                        <button class="alert-close" onclick="dismissAlert()">&times;</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="info-alert" id="infoAlert">
                                <div class="successAlert">
                                    <div class="alert-content">
                                        <span class="alert-icon">
                                            <i class="bi bi-envelope-check"></i>
                                        </span>
                                        <div class="alert-text">
                                            <strong>{!!session('success')!!}</strong><br>
                                            <span class="alert-description">
                                                Please check your inbox and click on the link to verify your account
                                            </span>
                                        </div>
                                        <button class="alert-close" onclick="dismissAlert()">&times;</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="info-alert" id="infoAlert">
                                <div class="errorAlert">
                                    <div class="alert-content">
                                        <span class="alert-icon">
                                            <i class="bi bi-x-circle"></i>
                                        </span>
                                        <div class="alert-text">
                                            <strong>{!!session('error')!!}</strong><br>
                                            <span class="alert-description">
                                                An unexpected error occurred. Try again later or refresh the page.
                                            </span>
                                        </div>
                                        <button class="alert-close" onclick="dismissAlert()">&times;</button>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <h4 style="text-align: left" class="mb-3">Create An Account</h4>
                        <p style="text-align: left" class="fw-light">Join a community of writers—create an account and let your words make an impact.</p>
                        <form method="POST" action="{{ route('auth.editor.create') }}">
                            @csrf
                            <div class="mb-3">
                                <h6 style="text-align: left"><label for="username" class="form-label">User Name</label></h6>
                                <input type="text" placeholder="Enter your User Name" name="username" class="form-control rounded-0 @error('username') is-invalid @elseif(old('username')) is-valid @enderror" value="{{old('username')}}" autocomplete="off">
                                @if ($errors->has('username'))
                                  @error('username')
                                    <div style="text-align: right" id="validationServerUsernameFeedback" class="invalid-feedback">
                                      <b>{{$message}}</b>
                                    </div>
                                  @enderror
                                  @else
                                    <div style="text-align: right" id="validationServerUsernameFeedback" class="valid-feedback">
                                      <b>Looks Good!</b>
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <h6 style="text-align: left"><label for="email" class="form-label">Email Address</label></h6>
                                <input type="text" placeholder="Enter your Email Address" name="email" class="form-control rounded-0 @error('email') is-invalid @elseif(old('email')) is-valid @enderror" value="{{old('email')}}" autocomplete="off">
                                @if ($errors->has('email'))
                                  @error('email')
                                    <div style="text-align: right" id="validationServerUsernameFeedback" class="invalid-feedback">
                                      <b>{{$message}}</b>
                                    </div>
                                  @enderror
                                  @else
                                    <div style="text-align: right" id="validationServerUsernameFeedback" class="valid-feedback">
                                      <b>Looks Good!</b>
                                    </div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <h6 style="text-align: left"><label for="password" class="form-label">Password</label></h6>
                                <div class="position-relative">
                                    <input type="password"
                                        name="password"
                                        placeholder="Enter your Password"
                                        id="passwordInput"
                                        class="form-control rounded-0 @error('password') is-invalid @elseif(old('password')) is-valid @enderror"
                                        style="padding-right: 4rem;" autocomplete="off">
                                    <span class="position-absolute top-50 translate-middle-y" style="right: 0.75rem; cursor: pointer;" id="togglePassword">
                                        <i class="bi bi-eye-slash-fill" id="eyeIcon"></i>
                                    </span>
                                </div>
                                @error('password')
                                    <div class="invalid-feedback d-block text-end">
                                        <b>{{$message}}</b>
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <h6 style="text-align: left"><label for="password" class="form-label">Confirm Password</label></h6>
                                <div class="position-relative">
                                    <input type="password"
                                        name="confirm_password"
                                        placeholder="Enter your Password Again"
                                        id="passwordInputForConfirm"
                                        class="form-control rounded-0 
                                        @error('confirm_password') is-invalid @enderror"
                                        style="padding-right: 4rem;" autocomplete="off">
                                    <!-- Eye Icon (👁) -->
                                    <span class="position-absolute top-50 translate-middle-y" style="right: 0.75rem; cursor: pointer;" id="togglePasswordForConfirm">
                                        <i class="bi bi-eye-slash-fill" id="eyeIconForConfirm"></i>
                                    </span>
                                </div>
                                @if ($errors->has('confirm_password'))
                                  @error('confirm_password')
                                      <div class="invalid-feedback d-block text-end">
                                          <b>{{$message}}</b>
                                      </div>
                                  @enderror
                                @endif
                            </div>
                            <div style="text-align: left" class="mb-3 form-check">
                                <input type="checkbox" name="agreement" class="form-check-input" id="agreement">
                                <label class="form-check-label text-muted" for="remember">By creating an account, you agree to our Terms & Conditions and Privacy Policy. You also acknowledge that all content submitted complies with our editorial guidelines.</label>
                                @if ($errors->has('agreement'))
                                  @error('agreement')
                                      <div class="invalid-feedback d-block text-end">
                                         <b>{{$message}}</b>
                                      </div>
                                  @enderror
                                @endif
                            </div>
                            <button type="submit" class="btn btn-primary rounded-0 w-100">Get Started</button>
                            <p class="text-center mt-4 mb-0">
                              Already have an Account?
                              <a href="{{ route('auth.editor.loginform') }}" class="register-link">
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