@extends('layout.main')

@section('container')
    @include('layout.navbaruser')
    @include('layout.navbar2')

    <div class="container mb-3">
        <a href="/" style="text-decoration: none; color: #1481FF">
            <i class="bi bi-arrow-left-short"></i> Back
        </a>

        <h3 class="fw-bold mt-4 mb-4">Student Profile</h3>

        <!-- Nama -->
        <label for="nama" class="form-label fw-bold" style="color: #002147"> Name </label>
        <input type="text" class="form-control mb-4" value="{{ auth()->user()->firstName }} {{ auth()->user()->lastName }}" disabled>

        <!-- NIM -->
        <label for="nim" class="form-label fw-bold" style="color: #002147"> NIM </label>
        <input type="text" class="form-control mb-4" value="{{ auth()->user()->nim }}" disabled>

        <!-- Email -->
        <label for="email" class="form-label fw-bold" style="color: #002147"> Email </label>
        <input type="text" class="form-control mb-4" value="{{ auth()->user()->email }}" disabled>

        <!-- No. Telp -->
        <label for="notelp" class="form-label fw-bold" style="color: #002147"> Phone Number </label>
        <input type="text" class="form-control mb-4" value="{{ auth()->user()->noTelp }}" disabled>

        <!-- Jenjang -->
        <label for="jenjang" class="form-label fw-bold" style="color: #002147"> Educational Level </label>
        <input type="text" class="form-control mb-5" value="{{ auth()->user()->jenjang->name }}" disabled>

    </div>
    
    @include('layout.footer')
@endsection