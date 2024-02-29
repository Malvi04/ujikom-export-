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
                                    <h4 class="card-title text-dark">Input Guru Baru</h4>
                                    <form class="forms-sample" action="/guru/tambah" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="text-dark">Nama Lengkap</label>
                                            <input type="text" class="form-control bg-light text-dark @error('name') is-invalid @enderror"name="name" placeholder="Nama Lengkap">
                                            @error('name')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark">Username</label>
                                            <input type="text"
                                                class="form-control bg-light text-dark @error('username') is-invalid @enderror" name="username"
                                                placeholder="Username">
                                            @error('username')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark">Password</label>
                                            <input type="password"
                                                class="form-control bg-light text-dark @error('password') is-invalid @enderror" name="password"
                                                placeholder="Password">
                                            @error('password')
                                                <small class="text-danger">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="text-dark">Jabatan</label>
                                            <select name="jabatan" class="form-control bg-light">
                                                <option>- Pilih Jabatan -</option>
                                                <option value="walas">Walas</option>
                                                <option value="admin">Admin</option>
                                                <option value="guru">Guru</option>
                                                <option value="kesiswaan">Kesiswaan</option>
                                                <option value="bk">Bk</option>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    </form>
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
