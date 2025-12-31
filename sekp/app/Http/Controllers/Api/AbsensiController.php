<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\AbsensiRepository;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    protected $repo;

    public function __construct(AbsensiRepository $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        return response()->json($this->repo->all());
    }

    public function masuk(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id'
        ]);

        $this->repo->masuk($request->karyawan_id);

        return response()->json([
            'message' => 'Berhasil absen masuk'
        ]);
    }

    public function keluar(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id'
        ]);

        $absen = $this->repo->keluar($request->karyawan_id);

        if (!$absen) {
            return response()->json([
                'message' => 'Belum absen masuk'
            ], 400);
        }

        return response()->json([
            'message' => 'Berhasil absen keluar'
        ]);
    }
}
