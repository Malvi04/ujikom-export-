<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class AbsenExport implements FromView
{
    public function __construct(
        public int $kelas_id
    ) {
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $dataSiswa = DB::table('absens')
            ->join('kelas', 'absens.kelas_id', '=', 'kelas.id')
            ->join('siswas', 'absens.siswa_id', '=', 'siswas.id')
            ->join('jurusans', 'siswas.jurusan_id', '=', 'jurusans.id')
            ->select('siswas.id', 'jurusans.nama_jurusan', 'kelas.kelas', 'siswas.nis', 'siswas.name', 'siswas.jenkel', 'absens.status_kehadiran', 'absens.created_at')
            ->where('absens.kelas_id', $this->kelas_id)
            ->where('absens.user_id', Auth::user()->id)
            ->get();
        $kelas = DB::table('kelas')->get();
        return view('dashboard.laporan.export', [
            'title' => 'Dashboard | Data Absen',
            'kelas' => $kelas,
            'dataSiswa' => $dataSiswa
        ]);
    }
}
