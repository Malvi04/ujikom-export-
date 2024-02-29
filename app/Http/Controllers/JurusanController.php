<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusanData = DB::table('jurusans')->orderBy('nama_jurusan')->get();
        return view('dashboard.jurusan.tambah', [
            'jurusanData' => $jurusanData,
            'title' =>     'Dashboard | Jurusan'
        ]);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_jurusan' => 'required|unique:jurusans'
        ]);

        if ($validator->fails()) {
            return redirect()->route('jurusan')->withErrors($validator);
        } else {
            DB::table('jurusans')->insert([
                'nama_jurusan' => $request->nama_jurusan,
                'created_at' => now()
            ]);

            return redirect()->route('jurusan');
        }
    }

    public function data()
    {
        $jurusanData = DB::table('jurusans')->orderBy('nama_jurusan')->get();
        return view('dashboard.jurusan.data', [
            'jurusanData' => $jurusanData,
        ]);
    }

    public function edit($id)
    {
        $jurusanData = DB::table('jurusans')->orderBy('nama_jurusan')->get();
        $jurusan = DB::table('jurusans')->where('id', $id)->get();
        return view('dashboard.jurusan.edit', [
            'jurusan' => $jurusan,
            'jurusanData' => $jurusanData,
            'title' => 'Dashboard | Jurusan'
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_jurusan' => 'required|unique:jurusans' //kenapa ga pake ignore? karena data nya cuman ada satu, ignore di gunakan ketika data nya lebih dari satu dan ada nilai yang unique nya
        ]);

        if ($validator->fails()) {
            return redirect()->route('editjurusan', ['id' => $request->id])->withErrors($validator);
        } else {
            DB::table('jurusans')->where('id', $request->id)->update([
                'nama_jurusan' => $request->nama_jurusan,
                'created_at' => now()
            ]);

            return redirect()->route('jurusan');
        }
    }

    public function delete($id)
    {
        DB::table('jurusans')->where('id', $id)->delete();
        return redirect()->route('jurusan');
    }
}
