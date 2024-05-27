@extends('layout.main')

@section('container')
    @include('layout.navbaruser')
    @include('layout.navbar2')

    <!-- HEADER -->
    <header>
        <div class="p-5 bg-image" style="background-image: url('img/gedungmask.svg'); height: 400px;">
            <div class="row" style="padding-left: 2rem;">
                <div class="col">
                    <div class="d-flex align-items-center h-100 align-middle">
                        <div class="text-white">
                            <h2 class="mb-3 mt-5 fw-bold">SHOWCASE</h2>
                            <p class="mb-3" style="padding-right: 30%">Showcase Ilmu Komputer IPB menampilkan karya-karya produk maupun
                                hasil penelitian mahasiswa Ilmu Komputer dari berbagai jenjang pendidikan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </header>
    <!-- HEADER -->

    <!-- FILTER BUTTON-->
    <form method="post" action="{{ route('filterPost') }}">
    
        @csrf
        <div class="container align-items-center text-end mb-3 mt-3 dropdown">
            <button class="btn dropdown-toggle hidden-arrow" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: #1481FF">
                <i class="bi bi-funnel-fill me-2"></i>Filter
            </button>

            <ul class="dropdown-menu">
                <li class="fw-bold ms-3">Lab Keilmuan</li>
                <li>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="checkbox" value="2" name="lab[]" id="labCIO">
                        <label class="form-check-label" for="labCIO">
                            CIO
                        </label>
                    </div>
                </li>
                <li>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="checkbox" value="3" name="lab[]" id="labCSN">
                        <label class="form-check-label" for="labCSN">
                            CSN
                        </label>
                    </div>
                </li>
                <li>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="checkbox" value="1" name="lab[]" id="labSEIS">
                        <label class="form-check-label" for="labSEIS">
                            SEIS
                        </label>
                    </div>
                </li>

                <li class="fw-bold ms-3 mt-3">Jenjang</li>
                <li>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="checkbox" value="1" name="jenjang[]" id="jenjangS1">
                        <label class="form-check-label" for="jenjangS1">
                            S1
                        </label>
                    </div>
                </li>
                <li>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="checkbox" value="2" name="jenjang[]" id="jenjangS2">
                        <label class="form-check-label" for="jenjangS2">
                            S2
                        </label>
                    </div>
                </li>
                <li>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="checkbox" value="3" name="jenjang[]" id="jenjangS3">
                        <label class="form-check-label" for="jenjangS3">
                            S3
                        </label>
                    </div>
                </li>

                <div class="text-end me-3 mt-3">
                    <button type="submit" class="btn btn-primary rounded" style="background-color: #1481FF;">
                        <b> Pilih </b>
                    </button>
                </div>
            </ul>


        </div>
    </form>

    @if(isset($searchMessage) && $searchMessage)
        <h5 class="text-center mt-3 mb-5">{{ $searchMessage }}</h5>
    @else

    <!--LIST SHOWCASE-->
    <div class="container">
        <h3 class=" ms-5 p-3"><b>{{ $title }}</b></h3>

        <div class="row row-cols-1 row-cols-md-3 g-4 ms-5 me-5 mb-4" >

        @foreach ($products as $product)

            <div class="col">
                <div class="card h-100 shadow bg-white rounded">
                    {{-- <a href="/{{ $product->slug }}" style="text-decoration: none;"> --}}
                    <a href="/post/{{ $product->slug }}" style="text-decoration: none;">
                        <!--Foto Poster-->
                        <div class="bg-image">
                            <img src="{{ asset('storage/' . $product->poster) }}" class="card-img-top" style="object-fit: cover; height: 300px; object-position: 0 0;" alt="poster">
                            <div class="mask" style="background-color: rgba(0, 33, 71, 0.4); "></div>
                        </div>
                        <div class="card-body">
                            <!-- Author-->
                            <p class="card-text" style="color: #002147">{{ $product->user->firstName }} {{ $product->user->lastName }}</p>
                            <!--Judul-->
                            <h6 class="card-title fw-bold" style="color: #002147">{{ $product->title }}</h6>
                        </div>
                    </a>
                </div>
            </div>

            @endforeach
            @endif
        </div>
    </div>

    {{-- <div class="d-flex justify-content-center">
        {{ $products->appends(['search' => request('search')])->links() }}
    </div> --}}
    <div class="d-flex justify-content-center">
        {{ $products->appends(request()->all())->links() }}
    </div>

    @include('layout.footer')
@endsection
