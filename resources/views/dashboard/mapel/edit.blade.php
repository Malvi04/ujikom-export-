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
                            <div class="card bg-light">
                                <div class="card-body">
                                    <h4 class="card-title text-dark">Edit Mapel</h4>
                                    @foreach ($editMapel as $maped)
                                        <form class="forms-sample" action="{{ url('mapel/update') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $maped->id }}">
                                            <div class="form-group text-dark">
                                                <label>Kode Mapel</label>
                                                <input type="text"
                                                    class="form-control bg-light text-dark @error('kode_mapel') is-invalid @enderror"
                                                    name="kode_mapel" value="{{ $maped->kode_mapel }}">
                                                @error('kode_mapel')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group text-dark">
                                                <label>Nama Mapel</label>
                                                <input type="text"
                                                    class="form-control bg-light text-dark @error('nama_mapel') is-invalid @enderror"
                                                    name="nama_mapel" value="{{ $maped->nama_mapel }}">
                                                @error('nama_mapel')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group text-dark">
                                                <label>Guru</label>
                                                <select name="guru"
                                                    class="form-control bg-light text-dark border @error('guru') is-invalid @enderror">
                                                    <option value="">- Pilih Guru -</option>

                                                    @if ($maped->user_id == '')
                                                        <option value="">- Pilih Walas -</option>
                                                    @endif
                                                    @foreach ($dataGuru as $guru)
                                                        @if ($maped->user_id == $guru->id)
                                                            <option value="{{ $guru->id }}" selected>
                                                                {{ $guru->name }}</option>
                                                        @else
                                                            <option value="{{ $guru->id }}">
                                                                {{ $guru->name }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('guru')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                        </form>
                                    @endforeach
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
