@extends('layout.main')

@section('container')
    @include('layout.navbaruser')
    @include('layout.navbar2')

    <div class="container mb-3">
        <a href="/" style="text-decoration: none; color: #1481FF">
            <i class="bi bi-arrow-left-short"></i> Back
        </a>

        <!-- Judul -->
        <h2 class="fw-bold mt-4 mb-3" style="text-align:justify;">
        {{ $product->title }}
        </h2>
        <div class="row mt-4 justify-content-center">
            <!-- Poster -->
            <div class="col-3">
                <img src="{{ asset('storage/' . $product->poster) }}" class="rounded img-thumbnail">
            </div>

            <!-- Abstrak -->
            <div class="col-9" style="text-align:justify;">
                <p>
                {!! $product->abstract !!}
                </p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-3">
                <!-- File -->
                @auth
                <h6 class="fw-bold">Open/View</h6>
                <i class="bi bi-file-earmark-pdf"></i>
                <a href="{{ asset('storage/' . $product->pdf) }}" style="text-decoration: none; color: #1481FF">fulltext.pdf</a>
                @else

                <h6 class="fw-bold">Open/View</h6>
                <i class="bi bi-file-earmark-lock"></i>
                <a href="{{ route('login.redirect', ['redirect' => url()->current()]) }}" style="text-decoration: none; color: black">fulltext.pdf</a>
                @endauth


                <!-- Author -->
                <h6 class="fw-bold mt-3">Author</h6>
                <p>{{$product->user->lastName}}, {{$product->user->firstName}} <br>
                    @foreach ($product->advisors as $advisor)
                        {{ $advisor->lastName }}, {{ $advisor->firstName }}<br>
                    @endforeach
                </p>

                <!-- Tanggal Terbit -->
                <h6 class="fw-bold">Date of Issue</h6>
                <p>{{ $product->published_at }}</p>

            </div>

            <!-- Link Produk -->
            <div class="col-9" style="text-align:justify;">
                <h6 class="fw-bold">Product URL</h6>
                <a href="{{$product->url}}" style="text-decoration: none; color: #1481FF"> {{$product->url}} </a>
            </div>
        </div>
    </div>


    @include('layout.footer')
@endsection
