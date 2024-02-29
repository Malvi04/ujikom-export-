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
                                <h4 class="card-title text-dark">Pilih Jurusan</h4>
                                <div class="container-fluid mt-8">
                                    <div class="row">
                                        @foreach ($jurusanData as $jurusan)
                                        <div class="col-6">
                                            <a href="/absen-kelas/{{$jurusan->id}}">
                                              <button class="w-100" style="background-color : #091527">
                                                <div class="card" style="background-color : #091527">
                                                  <div class="card-body p-5">
                                                    <h5 class="card-title fs-3 text-light text-center m-1">{{$jurusan->nama_jurusan}}</h5>
                                                  </div>
                                                </div>
                                              </button>
                                            </a>
                                        </div>
                                        @endforeach
                                    </div>
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
