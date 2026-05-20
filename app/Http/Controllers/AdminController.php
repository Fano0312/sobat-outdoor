<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    // Password admin - ganti sesuai keinginan
    private $adminUser = 'admin';
    private $adminPass = 'sobatoutdoor2026';

    public function login()
    {
        if (Session::get('admin_login')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function masuk(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($request->username === $this->adminUser &&
            $request->password === $this->adminPass) {
            Session::put('admin_login', true);
            Session::put('admin_user', $request->username);
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Username atau password salah!');
    }

    public function dashboard(Request $request)
    {
        if (!Session::get('admin_login')) {
            return redirect()->route('admin.login');
        }

        $status = $request->get('status', 'semua');
        $cari   = $request->get('cari', '');

        $query = DB::table('pesanan')->orderBy('created_at', 'desc');

        if ($status !== 'semua') {
            $query->where('status', $status);
        }

        if ($cari) {
            $query->where(function($q) use ($cari) {
                $q->where('nama', 'like', "%$cari%")
                  ->orWhere('telepon', 'like', "%$cari%")
                  ->orWhere('no_pesanan', 'like', "%$cari%");
            });
        }

        $pesanan  = $query->paginate(10);
        $total    = DB::table('pesanan')->count();
        $pending  = DB::table('pesanan')->where('status', 'pending')->count();
        $konfirmasi = DB::table('pesanan')->where('status', 'dikonfirmasi')->count();
        $selesai  = DB::table('pesanan')->where('status', 'selesai')->count();

        return view('admin.dashboard', compact(
            'pesanan', 'total', 'pending', 'konfirmasi', 'selesai', 'status', 'cari'
        ));
    }

    public function detail($id)
    {
        if (!Session::get('admin_login')) {
            return redirect()->route('admin.login');
        }

        $pesanan = DB::table('pesanan')->where('id', $id)->first();

        if (!$pesanan) {
            return redirect()->route('admin.dashboard')->with('error', 'Pesanan tidak ditemukan');
        }

        return view('admin.detail', compact('pesanan'));
    }

    public function updateStatus(Request $request, $id)
    {
        if (!Session::get('admin_login')) {
            return redirect()->route('admin.login');
        }

        DB::table('pesanan')->where('id', $id)->update([
            'status'     => $request->status,
            'updated_at' => now(),
        ]);

        return back()->with('success', 'Status pesanan berhasil diupdate!');
    }

    public function logout()
    {
        Session::forget('admin_login');
        Session::forget('admin_user');
        return redirect()->route('admin.login');
    }
}
