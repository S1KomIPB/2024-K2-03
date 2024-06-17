@extends('layout.main')

@section('container')
    @include('layout.navbaruser')
    @include('layout.navbar2')

    <form method="post" action="/store" enctype="multipart/form-data" id="upload-form">
    @csrf

    <div class="container mt-5">
        <div class="row mt-4">
            <div class="col lg-6">
                <!-- Nama -->
                <label for="inputNama" class="form-label fw-bold" style="color: #002147"> Author </label>
                <div class="row">
                    <!-- Nama Depan -->
                    <div class="col">
                        <input type="text" class="form-control mb-3" placeholder="First Name" id="authorFirstName" name="authorFirstName" value="{{ auth()->user()->firstName }}" readonly>
                    </div>
                    <!-- Nama Belakang -->
                    <div class="col">
                        <input type="text" class="form-control mb-3" placeholder="Last Name" id="authorLastName" name="authorLastName" value="{{ auth()->user()->lastName }}" readonly>
                    </div>
                </div>

                <!-- Judul -->
                <label for="inputJudul" class="form-label fw-bold" style="color: #002147"> Title </label>
                <input type="text" class="form-control mb-3 @error('title') is-invalid @enderror" id="title" name="title" placeholder="Research Title">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror

                <!-- Hidden Slug -->
                <div class="mb-3" hidden>
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug') }}">
                </div>

                <!-- Tanggal Terbit -->
                <label for="inputTanggal" class="form-label fw-bold" style="color: #002147"> Date of Issue </label>
                <input type="date" class="form-control mb-3" id="published_at" name="published_at" placeholder="Tanggal Penelitian Terbit" value="{{ old('published_at') }}">

                <!-- Abstrak -->
                <label for="inputAbstrak" class="form-label fw-bold" style="color: #002147"> Abstract </label>
                <textarea class="form-control mb-3" id="abstract" rows="13" name="abstract" value="{{ old('abstract') }}"></textarea>
            </div>

            <div class="col lg-6">

            <label for="inputDospem" class="form-label fw-bold" style="color: #002147">Advisors</label>

                <!-- TODO: old nya ga work untuk semua, catatan revert : hapus @php & @for, ganti .$i jadi 1 -->
                <div id="advisorInputs">
                    @php
                    $advisorCount = old('dosenFirstName') ? count(old('dosenFirstName')) : 1; // Default to 1 if no old input
                    @endphp

                    @for ($i = 0; $i < $advisorCount; $i++)
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control mb-3" id="dosenFirstName1" name="dosenFirstName[]" placeholder="First Name" value="{{ old('dosenFirstName.$i') }}">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control mb-3" id="dosenLastName1" name="dosenLastName[]" placeholder="Last Name" value="{{ old('dosenLastName.$1') }}">
                        </div>
                    </div>
                    @endfor
                </div>
                <button type="button" class="btn btn-primary" id="addAdvisorButton">Add Another Advisor</button>

                <!-- Lab Keilmuan -->
                </br>
                </br>
                <label for="inputLab" class="form-label fw-bold" style="color: #002147"> Research Division </label>
                <div style="color: #002147">
                    @foreach ($labs as $lab)
                    <div class="form-check form-check-inline mb-3 mt-2">
                        <input class="form-check-input" type="radio" name="lab_id" id="lab_id" value="{{ $lab->id }}">
                        <label class="form-check-label" for="lab_id">{{ $lab->name }}</label>
                    </div>
                    @endforeach
                </div>

                <!-- Jenjang -->
                <label for="inputJenjang" class="form-label fw-bold" style="color: #002147"> Educational Level </label>
                <div style="color: #002147">
                    @foreach ($jenjangs as $jenjang)
                    <div class="form-check form-check-inline mb-3 mt-2">
                        <input class="form-check-input" type="radio" name="jenjang_id" id="jenjang_id" value="{{ $jenjang->id }}">
                        <label class="form-check-label" for="jenjang_id">{{ $jenjang->name }}</label>
                    </div>
                    @endforeach
                </div>

                <!-- Link Produk -->
                <label for="url" class="form-label fw-bold" style="color: #002147"> Product URL</label>
                <input type="text" class="form-control mb-3" placeholder="Research Product URL" id="url" name="url">

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
                <a class="nav-link" href="#" id="cancel"> <b> Cancel </b> </a>
            </button>

            <!-- Submit Button -->
            <button type="button" class="btn btn-primary rounded" style="background-color: #1481FF;" id="uploadButton">
                <span class="nav-link" id="uploadButton"><b> Upload </b></span>
            </button>
        </div>
    </div>

    </form>

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

    document.getElementById('addAdvisorButton').addEventListener('click', function() {
    var totalAdvisors = document.querySelectorAll('.advisor-row').length;
    if (totalAdvisors < 2) {
        var newAdvisorNumber = totalAdvisors + 1;
        var newAdvisorHTML = `
            <div class="row advisor-row">
                <div class="col">
                    <input type="text" class="form-control mb-3" id="dosenFirstName` + newAdvisorNumber + `" name="dosenFirstName[]" placeholder="First Name">
                </div>
                <div class="col">
                    <input type="text" class="form-control mb-3" id="dosenLastName` + newAdvisorNumber + `" name="dosenLastName[]" placeholder="Last Name">
                </div>
            </div>`;
        document.getElementById('advisorInputs').insertAdjacentHTML('beforeend', newAdvisorHTML);
        }
    });



    </script>

@endsection
