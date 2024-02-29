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
                                    <h4 class="card-title text-dark">Edit Guru</h4>
                                    @foreach ($guru as $g)
                                        <form class="forms-sample" action="/guru/edit" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $g->id }}">
                                            <div class="form-group">
                                                <label class="text-dark">Nama Lengkap</label>
                                                <input type="text"
                                                    class="form-control bg-light text-dark @error('name') is-invalid @enderror" name="name"
                                                    placeholder="Nama Lengkap" value="{{ $g->name }}">
                                                @error('name')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark">Username</label>
                                                <input type="text"
                                                    class="form-control bg-light text-dark @error('username') is-invalid @enderror"
                                                    name="username" placeholder="Username" value="{{ $g->username }}">
                                                @error('username')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark">Password</label>
                                                <input type="password"
                                                    class="form-control bg-light text-dark @error('password') is-invalid @enderror"
                                                    name="password" placeholder="Password">
                                                @error('password')
                                                    <small class="text-danger">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="text-dark">Jabatan</label>
                                                <select name="jabatan" class="form-control bg-light text-dark">
                                                    @if ($g->jabatan == 0)
                                                        <option>- Pilih Jabatan -</option>
                                                        <option value="walas">Walas</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="guru">Guru</option>
                                                        <option value="kesiswaan">Kesiswaan</option>
                                                        <option value="bk">Bk</option>
                                                    @elseif($g->jabatan == 'walas')
                                                        <option value="walas" selected>Walas</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="guru">Guru</option>
                                                        <option value="kesiswaan">Kesiswaan</option>
                                                        <option value="bk">Bk</option>
                                                    @elseif($g->jabatan == 'admin')
                                                        <option value="walas">Walas</option>
                                                        <option value="admin" selected>Admin</option>
                                                        <option value="guru">Guru</option>
                                                        <option value="kesiswaan">Kesiswaan</option>
                                                        <option value="bk">Bk</option>
                                                    @elseif($g->jabatan == 'guru')
                                                        <option value="walas">Walas</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="guru" selected>Guru</option>
                                                        <option value="kesiswaan">Kesiswaan</option>
                                                        <option value="bk">Bk</option>
                                                    @elseif($g->jabatan == 'kesiswaan')
                                                        <option value="walas">Walas</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="guru">Guru</option>
                                                        <option value="kesiswaan" selected>Kesiswaan</option>
                                                        <option value="bk">Bk</option>
                                                    @else
                                                        <option value="walas">Walas</option>
                                                        <option value="admin">Admin</option>
                                                        <option value="guru">Guru</option>
                                                        <option value="kesiswaan">Kesiswaan</option>
                                                        <option value="bk" selected>Bk</option>
                                                    @endif
                                                </select>
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


