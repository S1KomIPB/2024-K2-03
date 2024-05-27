@extends('layout.main')

@section('container')
    @include('layout.navbaruser')
    @include('layout.navbar2')
    <div class="container">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Products</h1>
        <p class="mb-4">Showcase Ilmu Komputer IPB menampilkan karya-karya produk maupun
            hasil penelitian mahasiswa Ilmu Komputer dari berbagai jenjang pendidikan</p>
        <div class="mb-4">
            <a class="btn btn-info" style="background-color: #1481FF; color: white;" href="{{route('add.product')}}">Tambah Data</a>
        </div>

        <div class="card shadow mb-4 ">
            <div class="card-header py-3 d-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary mb-2">Data Paper</h6>

                <!-- Search Bar -->
                <form class="d-flex input-group w-auto " method="POST" action="{{ route('searchPostsAdmin') }}">
                    @csrf
                    <input type="search" class="form-control rounded me-3" placeholder="Search Database Paper"
                            aria-label="Search" aria-describedby="search-addon" name="searchadmin" value="{{ request('searchadmin') }}"/>
                </form>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable" width="100%"
                           cellspacing="0">
                        <thead>
                        <tr>
                            <th>Product Title</th>
                            <th>Author</th>
                            <th>Research Division</th>
                            <th>Educational Level</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $p)
                            <tr>
                                <td><a href="/post/{{ $p->slug }}" style="text-decoration: none;">{{$p->title}}</a></td>
                                <td>{{$p->user->lastName}}, {{$p->user->firstName}}</td>
                                <td>{{$p->lab->name}}</td>
                                <td>{{$p->jenjang->name}}</td>
                                <td>
                                    <div class="d-flex d-inline">
                                        <a href="{{url('/product/edit',$p->id)}}"><i class="bi-pencil-square m-2"></i></a>
                                        <a href="{{url('/product/delete', $p->id)}}"><i class="bi-trash m-2" style="color: red"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>

    {{-- <div class="d-flex justify-content-center">
        {{ $products->appends(['searchadmin' => request('searchadmin')])->links() }}
    </div> --}}

    @include('layout.footer')
@endsection
@push('scripts')
    <!-- Page level plugins -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.4.1/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#dataTable").DataTable();
            responsive: true;
        });
    </script>
@endpush
@push('head')
    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.4.1/css/responsive.bootstrap4.min.css" rel="stylesheet">
@endpush
