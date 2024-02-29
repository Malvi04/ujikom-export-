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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h4 class="card-title text-dark">Data Siswa</h4>
                                    <div class="table-responsive">
                                        <a href="/export/{{$kelas_id}}"><button class="btn btn-primary">Export</button></a>
                                        <table class="table text-dark">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>NIS</th>
                                                    <th>Nama Lengkap</th>
                                                    <th>Kelas</th>
                                                    <th>Jenis Kelamin</th>
                                                    <th>Jurusan</th>
                                                    <th>Tanggal</th>
                                                    <th>Kehadiran</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataSiswa as $siswa)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $siswa->nis }}</td>
                                                        <td>{{ $siswa->name }}</td>
                                                        <td>{{ $siswa->kelas }}</td>
                                                        <td>
                                                            @if ($siswa->jenkel == 'P')
                                                                {{ 'Perempuan' }}
                                                            @else
                                                                {{ 'Laki-laki' }}
                                                            @endif
                                                        </td>
                                                        <td>{{ $siswa->nama_jurusan }}</td>
                                                        <td>{{ $siswa->created_at }}</td>
                                                        <td>
                                                            @if ($siswa->status_kehadiran == 1)
                                                                <span class="badge badge-success">Hadir</span>
                                                            @elseif($siswa->status_kehadiran == 2)
                                                                <span class="badge badge-primary">Izin</span>
                                                            @elseif($siswa->status_kehadiran == 3)
                                                                <span class="badge badge-danger">Alfa</span>
                                                            @else
                                                                <span class="badge badge-warning">Sakit</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                            </tbody>
                                            @endforeach
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