<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class GuruController extends Controller
{
    public function index()
    {
        return view('dashboard.guru.tambah', [
            'title' => 'Dashboard | Guru'
        ]);
    }

    public function insert(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users', // supaya username tidak sama
            'jabatan' => 'required',
            'password' => 'required|min:7'
        ]);

        if ($validator->fails()) {
            return redirect()->route('tambahguru')->withErrors($validator);
        } else {
            DB::table('users')->insert([
                'name' => $request->name,
                'username' => $request->username,
                'jabatan' => $request->jabatan,
                'password' => Hash::make($request->password),
                'created_at' => now()
            ]);
            return redirect()->route('dataguru');
        }
    }

    public function data()
    {
        $guru = DB::table('users')
            ->orderBy('name')
            // ->paginate(5);
            // ->appends(request()->query());
            ->get();
        return view('dashboard.guru.data', [
            'guru' => $guru,
        ]);
    }

    public function edit($id)
    {
        $guru = DB::table('users')->where('id', $id)->get();
        return view('dashboard.guru.edit', [
            'guru' => $guru
        ]);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => [
                'required',
                Rule::unique('users')->ignore($request->id), //fungsi ini untuk mengupdate nilai yang unique supaya bisa ke update dari fungsi ignore melalui id dan id ini mengambil dari form edit yang di hidden
            ],
            'jabatan' => 'required',
            'password' => 'required|min:7'
        ]);

        if ($validator->fails()) {
            return redirect()->route('editguru', ['id' => $request->id])->withErrors($validator); //[] fungsi nya untuk mengembalikan data ketika error
        } else {
            DB::table('users')->where('id', $request->id)->update([
                'name' => $request->name,
                'username' => $request->username,
                'jabatan' => $request->jabatan,
                'password' => Hash::make($request->password),
                'created_at' => now()
            ]);
            return redirect()->route('dataguru');
        }
    }

    public function hapus($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect()->route('dataguru');
    }
}
