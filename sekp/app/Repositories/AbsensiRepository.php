<?php

namespace App\Repositories;

use App\Models\Absensi;
use Carbon\Carbon;

class AbsensiRepository
{
    public function all()
    {
        return Absensi::with('karyawan')
            ->orderBy('tanggal', 'desc')
            ->orderBy('jam_masuk', 'desc')
            ->get();
    }

    public function masuk($karyawan_id)
    {
        return Absensi::create([
            'karyawan_id' => $karyawan_id,
            'tanggal'     => Carbon::now()->toDateString(),
            'jam_masuk'   => Carbon::now()->toTimeString(),
            'status'      => 'Masuk'
        ]);
    }

    public function keluar($karyawan_id)
    {
        $today = Carbon::now()->toDateString();

        $absen = Absensi::where('karyawan_id', $karyawan_id)
            ->where('tanggal', $today)
            ->whereNull('jam_keluar')
            ->latest()
            ->first();

        if (!$absen) return null;

        $absen->update([
            'jam_keluar' => Carbon::now()->toTimeString(),
            'status'     => 'Keluar'
        ]);

        return $absen;
    }
}
