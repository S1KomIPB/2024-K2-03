@extends('layout.main')

@section('container')

@if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"  ></button>
    </div>
@endif

    <div class="container-fluid h-100 ">
        <div class="row">
            <div class="col-md-8 col-lg-7 col-xl-6 col-sm-5 d-flex align-items-center justify-content-center" style="background-color: #002147; height: 100vh;">
                <div class="text-center">
                    <img src="img/logoilkom.svg" class="img-fluid" height="150" alt="Logo" loading="lazy"/>
                </div>
            </div>

            <div class="col-md-7 col-lg-5 col-xl-5 col-sm-7 form-section d-flex align-items-center justify-content-center"  style="height: 100vh; color:#002147">
                <div>
                    <h3 class="login-title fw-bold mb-4">Sign In Showcase Ilmu Komputer</h3>
                    <form action="/sign-in" method="post" id="signin-form">
                        @csrf

                        <!-- Username -->
                        <div class="form-group mb-3">
                            <label for="Username" class="sr-only fw-bold" style="color:#002147">Username</label>
                            <input type="username" placeholder="Username" name="username" class="form-control @error('username') is-invalid @enderror" id="username" autofocus required value="{{ old('username') }}">
                            @error('username')   
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-3">
                            <label for="password" class="sr-only fw-bold" style="color:#002147">Password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                        </div>
                
                        <!-- Remember me -->
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox"/>
                            <label class="form-check-label" style="color:#777777"> Remember me </label>
                        </div>
              
                        <!-- Sign In Button -->
                        <div class="d-grid mx-auto align-items-center mb-5">
                            <button type="submit" class="btn btn-primary" style="background-color: #1481FF; color: white; border-radius: 10px;">
                                Sign In
                            </button>
                        </div>

                    </form>           
                </div>
            </div>
        </div>
    </div>

@endsection