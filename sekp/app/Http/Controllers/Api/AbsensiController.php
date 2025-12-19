<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    // Masuk Kerja
    public function masuk(Request $request)
    {
        $tanggal = Carbon::today();

        $cek = Absensi::where('karyawan_id', $request->karyawan_id)
            ->where('tanggal', $tanggal)
            ->first();

        if ($cek) {
            return response()->json([
                'message' => 'Sudah absen masuk hari ini'
            ], 400);
        }

        $absen = Absensi::create([
            'karyawan_id' => $request->karyawan_id,
            'tanggal' => $tanggal,
            'jam_masuk' => Carbon::now()->format('H:i:s'),
            'status' => 'Masuk'
        ]);

        return response()->json([
            'message' => 'Absen masuk berhasil',
            'data' => $absen
        ]);
    }

    // Selesai Kerja
    public function keluar(Request $request)
    {
        $absen = Absensi::where('karyawan_id', $request->karyawan_id)
            ->where('tanggal', Carbon::today())
            ->first();

        if (!$absen) {
            return response()->json([
                'message' => 'Belum absen masuk'
            ], 400);
        }

        $absen->update([
            'jam_keluar' => Carbon::now()->format('H:i:s'),
            'status' => 'Pulang'
        ]);

        return response()->json([
            'message' => 'Absen keluar berhasil',
            'data' => $absen
        ]);
    }

    // Tampilkan tabel absensi
    public function index()
    {
        $data = Absensi::with('karyawan')->latest()->get();

        return response()->json($data);
    }
}
