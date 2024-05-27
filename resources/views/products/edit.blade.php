@extends('layout.main')

@section('container')
    @include('layout.navbaruser')
    @include('layout.navbar2')

    <div class="container">
        <form method="post" action="{{ url('product_update',$product->id) }}">
            @csrf
            <div class="container mt-5">
                <div class="row mt-4">
                    <div class="col lg-6">
                        <!-- Nama -->
                        <label for="inputNama" class="form-label" style="color: #002147"> Author </label>
                        <div class="row">
                            <!-- Nama Depan -->
                            <div class="col">
                                <input type="text" class="form-control mb-3" placeholder="First Name" id="authorFirstName" name="authorFirstName" value="{{ $product->user->firstName }}" readonly>
                            </div>
                            <!-- Nama Belakang -->
                            <div class="col">
                                <input type="text" class="form-control mb-3" placeholder="Last Name" id="authorLastName" name="authorLastName" value="{{ $product->user->lastName }}" readonly>
                            </div>
                        </div>

                        <!-- Judul -->
                        <label for="inputJudul" class="form-label fw-bold" style="color: #002147"> Title </label>
                        <input type="text" class="form-control mb-3 @error('title') is-invalid @enderror" id="title" name="title" value="{{ $product->title }}">
                        @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror

                        <!-- Hidden Slug -->
                        <div class="mb-3" hidden>
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ $product->slug }}">
                        </div>

                        <!-- Tanggal Terbit -->
                        <label for="inputTanggal" class="form-label fw-bold" style="color: #002147"> Date of Issue </label>
                        <input type="date" class="form-control mb-3" id="published_at" name="published_at" placeholder="Tanggal Penelitian Terbit" value="{{ $product->published_at }}">

                        <!-- Abstrak -->
                        <label for="inputAbstrak" class="form-label fw-bold" style="color: #002147"> Abstract </label>
                        <textarea class="form-control mb-3" id="abstract" rows="8" name="abstract">{{ $product->abstract }}</textarea>
                    </div>

                    <div class="col lg-6">

                        <!-- Nama Dospem -->
                        <label for="inputDospem" class="form-label fw-bold" style="color: #002147"> Advisors </label>
                        <div class="row">
                            <!-- Nama Depan -->
                            <div class="col">
                                <input type="text" class="form-control mb-3" id="dosenFirstName" name="dosenFirstName" placeholder="First Name" value="{{ $product->dosenFirstName }}">
                            </div>
                            <!-- Nama Belakang -->
                            <div class="col">
                                <input type="text" class="form-control mb-3" id="dosenLastName" name="dosenLastName" placeholder="Last Name" value="{{ $product->dosenLastName }}">
                            </div>
                        </div>

                        <!-- Lab Keilmuan -->
                        <label for="inputLab" class="form-label fw-bold" style="color: #002147"> Research Division </label>
                        <div style="color: #002147">
                            @foreach ($labs as $lab)
                                <div class="form-check form-check-inline mb-3 mt-2">
                                    <input class="form-check-input" type="radio" name="lab_id" id="lab" value="{{ $lab->id }}" {{ $product->lab_id == $lab->id ? 'checked' : '' }}>
                                    <label class="form-check-label" for="lab">{{ $lab->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Jenjang -->
                        <label for="inputJenjang" class="form-label fw-bold" style="color: #002147"> Educational Level </label>
                        <div style="color: #002147">
                            @foreach ($jenjangs as $jenjang)
                                <div class="form-check form-check-inline mb-3 mt-2">
                                    <input class="form-check-input" type="radio" name="jenjang_id" id="jenjang_id" value="{{ $jenjang->id }}" {{ $product->jenjang_id == $jenjang->id ? 'checked' : '' }}>
                                    <label class="form-check-label" for="jenjang">{{ $jenjang->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Link Produk -->
                        <label for="url" class="form-label fw-bold" style="color: #002147"> Product URL</label>
                        <input type="text" class="form-control mb-3" id="url" name="url" value="{{ $product->url }}">

                        <!-- Poster -->
                        <div>
                            <label for="poster" class="form-label fw-bold @error('poster') is-invalid @enderror" style="color: #002147">Poster</label>
                            <div class="upload-btn-wrapper mb-3 d-flex align-items-center">
                                <button class="btn upload-file font-weight-500">
                                    <span class="upload-btn fw-bold">
                                        Choose Photo
                                    </span>
                                    <span class="upload-select-button" id="blankImage" style="color: #777777">
                                        Supports JPG, PNG, JPEG max 5MB
                                    </span>
                                </button>
                                <input type="file" id="poster" name="poster">
                            </div>
                            @error('poster')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- File Skripsi -->
                        <div>
                            <label for="pdf" class="form-label fw-bold @error('pdf') is-invalid @enderror" style="color: #002147">Thesis/Dissertation File</label>
                            <div class="upload-btn-wrapper mb-5 d-flex align-items-center">
                                <button class="btn upload-file font-weight-500">
                                    <span class="upload-btn fw-bold">
                                        Choose File
                                    </span>
                                    <span class="upload-select-button" id="blankFile" style="color: #777777">
                                        Supports PDF
                                    </span>
                                </button>
                                <input type="file" id="pdf" name="pdf">
                            </div>
                            @error('pdf')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                    </div>
                </div>


                <div class="align-items-center text-end mb-5">
                    <!-- Cancel Button -->
                    <button type="button" class="btn btn-outline-danger rounded me-2">
                        <a class="nav-link" href="{{route('products')}}"> <b> Cancel </b> </a>
                    </button>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary rounded" style="background-color: #1481FF;">
                        <b> Update </b>
                    </button>
                </div>
            </div>

        </form>
    </div>

    @include('layout.footer')

    <!-- Auto Slug -->
    <script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
    </script>

@endsection
