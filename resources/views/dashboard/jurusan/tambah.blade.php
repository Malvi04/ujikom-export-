@extends('template.index')
    @section('gurutambah')
        <div class="container-scroller">
            <!-- partial:partials/_sidebar.html -->
            @include('layout.sidebar')
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <!-- partial:partials/_navbar.html -->
                @include('layout.nav')
                <!-- partial -->
                <div class="main-panel">
                    <div class="content-wrapper">
                        {{-- INPUT MAPEL --}}
                        <div class="row mb-5">
                            <div class="col-md-12">
                                <div class="card bg-light text-dark">
                                    <div class="card-body">
                                        <h4 class="card-title text-dark">Input Jurusan</h4>
                                        <form class="forms-sample" action="/jurusan/tambah" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Nama Jurusan</label>
                                                <input type="text" class="form-control bg-light text-dark" name="nama_jurusan" placeholder="Sertakan index kelas">
                                                @error('nama_jurusan')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- DATA MAPEL  --}}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card bg-light text-dark">
                                    <div class="card-body">
                                        <h4 class="card-title text-dark">Data Jurusan</h4>
                                        <div class="table-responsive">
                                            <table class="table text-dark">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama Jurusan</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($jurusanData as $jrs)
                                                        <tr>
                                                            <td>{{ $loop->iteration }}</td>
                                                            <td>{{ $jrs->nama_jurusan }}</td>
                                                            <td>
                                                                <a href="/jurusan/edit/{{ $jrs->id }}"
                                                                    class="badge badge-warning">Edit</a>
                                                                <a href="/jurusan/hapus/{{ $jrs->id }}"
                                                                    class="badge badge-danger">Hapus</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include('layout.footer')
                </div>
                <!-- main-panel ends -->
            </div>
            <!-- page-body-wrapper ends -->
        </div>
@endsection






{{-- @extends('template.index')
    @section('gurutambah')
        <form action="/jurusan/tambah" method="post">
            @csrf

            <label for="">Nama Jurusan :</label>
            <input type="text" name="nama_jurusan">
            <br><br>
            <button type="submit">Simpan</button>
        </form>
    @endsection --}}

