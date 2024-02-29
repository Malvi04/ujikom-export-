<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index()
    {
        $kelasData = DB::table('kelas')
            ->join('jurusans', 'kelas.jurusan_id', '=', 'jurusans.id')
            ->join('users', 'kelas.user_id', '=', 'users.id')
            ->orderBy('kelas')
            ->select('kelas.id', 'kelas.kelas', 'jurusans.nama_jurusan', 'users.name')
            ->get();
        $jurusanData = DB::table('jurusans')->orderBy('nama_jurusan')->get();
        $walasData = DB::table('users')->where('jabatan', 'walas')->get();
        return view('dashboard.kelas.index', [
            'jurusanData' => $jurusanData,
            'walasData' => $walasData,
            'kelasData' => $kelasData,
            'title' => 'Dashboard | Kelas'
        ]);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kelas' => 'required',
            'walas' => 'required',
            'jurusan' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('kelastambah');
        } else {
            DB::table('kelas')->insert([
                'kelas' => $request->kelas,
                'jurusan_id' => $request->jurusan,
                'user_id' => $request->walas,
                'created_at' => now()
            ]);

            return redirect()->route('kelastambah');
        }
    }

    public function edit($id)
    {
        $kelasEdit =
            DB::table('kelas')
            ->where('kelas.id', $id)
            ->join('jurusans', 'kelas.jurusan_id', '=', 'jurusans.id')
            ->join('users', 'kelas.user_id', '=', 'users.id')
            ->select('kelas.*', 'jurusans.nama_jurusan', 'users.name')
            ->get();

        $dataKelas = DB::table('kelas')
            ->join('jurusans', 'kelas.jurusan_id', '=', 'jurusans.id')
            ->join('users', 'kelas.user_id', '=', 'users.id')
            ->get();

        $dataJurusan = DB::table('jurusans')->orderBy('nama_jurusan')
            ->get();

        $dataWalas = DB::table('users')->where('jabatan', 'walas')
            ->get();

        return view('dashboard.kelas.edit', [
            'dataJurusan' => $dataJurusan,
            'dataWalas' => $dataWalas,
            'dataKelas' => $dataKelas,
            'kelasEdit' => $kelasEdit,
            'title' => 'Dashboard | Kelas'
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kelas' => 'required',
            'walas' => 'required',
            'jurusan' => [
                'required',
                // Rule::unique('jurusans')->ignore($request->id),
            ]
        ]);

        if ($validator->fails()) {
            return redirect()->route('kelasEdit', ['id' => $request->id])->withErrors($validator);
        } else {

            DB::table('kelas')
                ->where('id', $request->id)
                ->update([
                    'kelas' => $request->kelas,
                    'jurusan_id' => $request->jurusan,
                    'user_id' => $request->walas,
                    'updated_at' => now()
                ]);

            return redirect()->route('kelastambah')->with('message', 'Data Berhasil Diupdate!');
        }
    }

    public function delete($id)
    {
        DB::table('kelas')
            ->where('id', $id)
            ->delete();
        return redirect()->route('kelastambah')->with('message', 'Data Berhasil Dihapus!');
    }
}
