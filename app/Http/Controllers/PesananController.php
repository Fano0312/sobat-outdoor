<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PesananController extends Controller
{
    public function index()
    {
        return view('pages.pesan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'            => 'required|string|max:255',
            'telepon'         => 'required|string|max:20',
            'alamat'          => 'required|string',
            'tgl_mulai'       => 'required|date',
            'tgl_selesai'     => 'required|date|after_or_equal:tgl_mulai',
            'lokasi'          => 'required|string|max:255',
            'paket'           => 'required|in:A,B,C,D,E',
            'jumlah_hari'     => 'required|integer|min:1|max:30',
            'foto_ktp_base64' => 'required|string',
        ]);

        $hargaPaket = [
            'A' => 180000, 'B' => 165000,
            'C' => 80000,  'D' => 50000, 'E' => 115000,
        ];

        $hargaSatuan = $hargaPaket[$request->paket];
        $total = $hargaSatuan * $request->jumlah_hari;
        $fotoPath = $this->simpanFotoKTP($request->foto_ktp_base64);
        $noPesanan = 'SO-' . date('Ymd') . '-' . strtoupper(Str::random(5));

        DB::table('pesanan')->insert([
            'no_pesanan'   => $noPesanan,
            'nama'         => $request->nama,
            'telepon'      => $request->telepon,
            'alamat'       => $request->alamat,
            'tgl_mulai'    => $request->tgl_mulai,
            'tgl_selesai'  => $request->tgl_selesai,
            'lokasi'       => $request->lokasi,
            'paket'        => $request->paket,
            'jumlah_hari'  => $request->jumlah_hari,
            'harga_satuan' => $hargaSatuan,
            'total'        => $total,
            'foto_ktp'     => $fotoPath,
            'catatan'      => $request->catatan,
            'status'       => 'pending',
            'created_at'   => now(),
            'updated_at'   => now(),
        ]);

        return redirect()->route('pesan.sukses')
            ->with('success', 'Pesanan berhasil dikirim!')
            ->with('no_pesanan', $noPesanan)
            ->with('total', $total);
    }

    private function simpanFotoKTP($base64)
    {
        $base64Data = preg_replace('#^data:image/\w+;base64,#i', '', $base64);
        $imageData  = base64_decode($base64Data);
        $namaFile   = 'ktp_' . time() . '_' . Str::random(8) . '.jpg';
        $path       = storage_path('app/public/ktp/' . $namaFile);

        if (!file_exists(dirname($path))) {
            mkdir(dirname($path), 0755, true);
        }

        file_put_contents($path, $imageData);
        return 'ktp/' . $namaFile;
    }

    public function sukses()
    {
        return view('pages.sukses');
    }
}
