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
                            <div class="card">
                                <div class="card-body bg-light">
                                    <h4 class="card-title text-dark">Edit Siswa</h4>
                                    @foreach ($dataSiswa as $siswa)
                                        <form class="forms-sample" action="/siswa/update" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $siswa->id }}">
                                            <div class="form-group">
                                                <label class="text-dark">NIS</label>
                                                <input type="text" class="form-control bg-light text-dark" name="nis"
                                                    placeholder="NIS" value="{{ $siswa->nis }}">
                                                @error('nis')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark">Nama Lengkap</label>
                                                <input type="text" class="form-control bg-light text-dark" name="name"
                                                    placeholder="Nama Lengkap" value="{{ $siswa->name }}">
                                                @error('name')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark">Kelas</label>
                                                <select name="kelas" class="form-control bg-light text-dark border">

                                                    @if ($siswa->kelas_id == '')
                                                        <option value="">- Pilih Kelas -</option>
                                                    @endif

                                                    @foreach ($dataKelas as $kelas)
                                                        <option value="{{ $kelas->id }}">{{ $kelas->kelas }}</option>
                                                    @endforeach
                                                </select>
                                                @error('kelas')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark">Jenis Kelamin</label>
                                                @if ($siswa->jenkel == 'P')
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="jenkel"
                                                                value="L"> Laki-laki </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="jenkel"
                                                                value="P" checked> Perempuan </label>
                                                    </div>
                                                @else
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="jenkel"
                                                                value="L"> Laki-laki </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input type="radio" class="form-check-input" name="jenkel"
                                                                value="P" checked> Perempuan </label>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark">Jurusan</label>
                                                <select name="jurusan" class="form-control bg-light text-dark border">
                                                    @if ($siswa->jurusan_id == '')
                                                        <option value="">- Pilih Jurusan -</option>
                                                    @endif

                                                    @foreach ($dataJurusan as $jurusan)
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
