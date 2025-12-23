<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Repositories\PenggajianRepository;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    protected $repo;

    public function __construct(PenggajianRepository $repo)
    {
        $this->repo = $repo;
    }

    // TAMPILAN
    public function index()
    {
        return view('penggajian.index', [
            'penggajians' => $this->repo->all(),
            'karyawans' => Karyawan::all()
        ]);
    }

    // SIMPAN
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal' => 'required|date',
            'gaji_pokok' => 'required|numeric'
        ]);

        $this->repo->create($request->all());

        return redirect()->back()->with('success', 'Penggajian berhasil ditambahkan');
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal' => 'required|date',
            'gaji_pokok' => 'required|numeric'
        ]);

        $this->repo->update($id, $request->all());

        return redirect()->back()->with('success', 'Penggajian berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        $this->repo->delete($id);

        return redirect()->back()->with('success', 'Penggajian berhasil dihapus');
    }
}
