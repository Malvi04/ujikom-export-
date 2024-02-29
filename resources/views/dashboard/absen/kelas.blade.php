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
                        <div class="card bg-light text-dark">
                            <div class="card-body">
                                <h4 class="card-title text-dark">Pilih Index</h4>
                                <div class="container-fluid mt-4">
                                    <div class="row">
                                        @foreach ($kelas as $kls)
                                        <div class="col-4">
                                            <a href="/absen-murid/{{ $kls->id }}">
                                              <button class="w-100" style="background-color : #091527">
                                                <div class="card" style="background-color : #091527">
                                                  <div class="card-body p-5">
                                                    <h5 class="card-title fs-3 text-light text-center m-1">{{$kls->kelas}}</h5>
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
