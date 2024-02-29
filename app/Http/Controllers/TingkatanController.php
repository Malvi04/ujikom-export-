<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class TingkatanController extends Controller
{
    public function index()
    {
        $dataKelas = DB::table('kelas')
            ->get();
        return view('dashboard.absen.kelas', [
            'title' => 'Kelas',
            'kelas' => $dataKelas
        ]);
    }
}
