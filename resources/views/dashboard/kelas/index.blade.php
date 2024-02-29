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
                                    <h4 class="card-title text-dark">Input Kelas</h4>
                                    <form class="forms-sample" action="/kelas/tambah" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Kelas</label>
                                            <input type="text" class="form-control bg-light" name="kelas" placeholder="Sertakan index kelas nya">
                                            @error('kelas')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Jurusan</label>
                                            <select name="jurusan" class="form-control bg-light">
                                                <option value="">- Pilih Jurusan -</option>
                                                @foreach ($jurusanData as $jurusan)
                                                    <option value="{{ $jurusan->id }}">{{ $jurusan->nama_jurusan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('jurusan')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Walas</label>
                                            <select name="walas" class="form-control bg-light">
                                                <option value="">- Pilih Walas -</option>
                                                @foreach ($walasData as $wls)
                                                    <option value="{{ $wls->id }}">{{ $wls->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('walas')
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
                                    <h4 class="card-title text-dark">Data Kelas</h4>
                                    <div class="table-responsive">
                                        <table class="table text-dark">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kelas</th>
                                                    <th>Jurusan</th>
                                                    <th>Walas</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($kelasData as $kelas)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $kelas->kelas }}</td>
                                                        <td>{{ $kelas->nama_jurusan }}</td>
                                                        <td>{{ $kelas->name }}</td>
                                                        <td>
                                                            <a href="/kelas/edit/{{ $kelas->id }}"
                                                                class="badge badge-warning">Edit</a>
                                                            <a href="/kelas/hapus/{{ $kelas->id }}"
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
