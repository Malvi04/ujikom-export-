<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use App\Exports\AbsenExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AbsenController extends Controller
{
    public function index()
    {
        $jurusanData = DB::table('jurusans')
            ->orderBy('nama_jurusan')
            ->get();
        return view('dashboard.absen.jurusan', [
            'title' => 'Dashboard | Absensi',
            'jurusanData' => $jurusanData
        ]);
    }


    public function kelas($id)
    {
        $kelas = DB::table('kelas')
            ->orderBy('kelas')
            ->where('kelas.jurusan_id', $id)
            ->get();
        return view('dashboard.absen.kelas', [
            'title' => 'Dashboard | Data Kelas',
            'kelas' => $kelas
        ]);
    }

    public function datasiswa($id)
    {
        $dataSiswa = DB::table('siswas')
            ->where('kelas_id', $id)
            ->join('kelas', 'siswas.kelas_id', '=', 'kelas.id')
            ->join('jurusans', 'siswas.jurusan_id', '=', 'jurusans.id')
            ->select('siswas.id', 'jurusans.nama_jurusan', 'kelas.kelas', 'siswas.nis', 'siswas.name', 'siswas.jenkel')
            ->get();
        return view('dashboard.absen.absen', [
            'title' => 'Dashboard | Data Murid',
            'dataSiswa' => $dataSiswa,
        ]);
    }

    public function lap_jurusan()
    {
        $jurusanData = DB::table('jurusans')
            ->orderBy('nama_jurusan')
            ->get();
        return view('dashboard.laporan.jurusan', [
            'title' => 'Dashboard | Absensi',
            'jurusanData' => $jurusanData
        ]);
    }

    public function lap_kelas($id)
    {
        $kelas = DB::table('kelas')
            ->orderBy('kelas')
            ->where('kelas.jurusan_id', $id)
            ->get();
        return view('dashboard.laporan.kelas', [
            'title' => 'Dashboard | Data Absen',
            'kelas' => $kelas
        ]);
    }

    public function dataabsen($id)
    {
        $dataSiswa = DB::table('absens')
            ->join('kelas', 'absens.kelas_id', '=', 'kelas.id')
            ->join('siswas', 'absens.siswa_id', '=', 'siswas.id')
            ->join('jurusans', 'siswas.jurusan_id', '=', 'jurusans.id')
            ->select('siswas.id', 'jurusans.nama_jurusan', 'kelas.kelas', 'siswas.nis', 'siswas.name', 'siswas.jenkel', 'absens.status_kehadiran', 'absens.created_at')
            ->where('absens.kelas_id', $id)
            ->where('absens.user_id', Auth::user()->id)
            ->get();
        $kelas = DB::table('kelas')->get();
        // $created_at = DB::table('absens')->get();
        return view('dashboard.laporan.laporan', [
            'title' => 'Dashboard | Data Absen',
            'kelas' => $kelas,
            'kelas_id' => $id,
            // 'created_at' => $created_at,
            'dataSiswa' => $dataSiswa
        ]);
    }

    public function export_excel(Kelas $kelas)
    {
        // dd($kelas);
        // exit;
        return Excel::download(new AbsenExport ($kelas->id), 'laporan_absen.xlsx');
    }

    public function absenhadir($id)
    {
        $data = DB::table('siswas')
            ->where('id', $id)
            ->get();
        foreach ($data as $key) {
            DB::table('absens')->insert([
                'siswa_id' => $key->id,
                'user_id' => Auth::user()->id,
                'status_kehadiran' => 1,
                'kelas_id' => $key->kelas_id,
                'created_at' => now()
            ]);
            return redirect()->route('dataabsen', ['id' => $key->kelas_id])->with('message', 'Siswa Hadir!');
        }
    }

    public function absenizin($id)
    {
        $data = DB::table('siswas')
            ->where('id', $id)
            ->get();
        foreach ($data as $key) {
            DB::table('absens')->insert([
                'siswa_id' => $key->id,
                'user_id' => Auth::user()->id,
                'status_kehadiran' => 2,
                'kelas_id' => $key->kelas_id,
                'created_at' => now()
            ]);
            return redirect()->route('dataabsen', ['id' => $key->kelas_id])->with('message', 'Siswa Izin!');
        }
    }

    public function absenalfa($id)
    {
        $data = DB::table('siswas')
            ->where('id', $id)
            ->get();
        foreach ($data as $key) {
            DB::table('absens')->insert([
                'siswa_id' => $key->id,
                'user_id' => Auth::user()->id,
                'status_kehadiran' => 3,
                'kelas_id' => $key->kelas_id,
                'created_at' => now()
            ]);
            return redirect()->route('dataabsen', ['id' => $key->kelas_id])->with('message', 'Siswa Alfa!');
        }
    }

    public function absensakit($id)
    {
        $data = DB::table('siswas')
            ->where('id', $id)
            ->get();
        foreach ($data as $key) {
            DB::table('absens')->insert([
                'siswa_id' => $key->id,
                'user_id' => Auth::user()->id,
                'status_kehadiran' => 4,
                'kelas_id' => $key->kelas_id,
                'created_at' => now()
            ]);
            return redirect()->route('dataabsen', ['id' => $key->kelas_id])->with('message', 'Siswa Sakit!');
        }
    }
}
