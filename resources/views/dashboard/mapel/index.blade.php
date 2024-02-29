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
                    {{-- DATA MAPEL  --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h4 class="card-title text-dark">Data Mapel</h4>
                                    <a href="{{url('mapel/tam')}}" class="btn btn-primary">Create</a>
                                    <div class="table-responsive">
                                        <table class="table text-dark">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kode Mapel</th>
                                                    <th>Nama Mapel</th>
                                                    <th>Guru Pengajar</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($dataMapel as $mpl)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $mpl->kode_mapel }}</td>
                                                        <td>{{ $mpl->nama_mapel }}</td>
                                                        <td>{{ $mpl->name }}</td>
                                                        <td>
                                                            <a href="/mapel/edit/{{ $mpl->id }}"
                                                                class="badge badge-warning">Edit</a>
                                                            <a href="/mapel/delete/{{ $mpl->id }}"
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
