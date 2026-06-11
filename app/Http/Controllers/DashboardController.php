<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Menggabungkan nama depan dan belakang user yang sedang login
        $nama_lengkap = Auth::user()->nama_depan . ' ' . Auth::user()->nama_belakang;

        // Mengambil data waktu login dari session
        $waktu_login = session('login_time');

        // Mengarahkan ke file view di folder dashboard/index.blade.php
        return view('dashboard.index', compact('nama_lengkap', 'waktu_login'));
    }
}
