<?php

namespace App\Http\Controllers;

use App\Repositories\KaryawanRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KaryawanController extends Controller
{
    protected $karyawanRepo;

    public function __construct(KaryawanRepository $karyawanRepo)
    {
        $this->karyawanRepo = $karyawanRepo;
    }

    public function index()
    {
        $karyawans = $this->karyawanRepo->getAll();
        return view('karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        return view('karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:karyawans,email',
            'telepon' => 'required',
            'role' => 'required',
            'status' => 'required',
            'password' => Hash::make($request->password)
        ]);

        $this->karyawanRepo->create($request->only([
            'nama', 'email', 'telepon', 'role', 'status' ,'password'
        ]));

        return redirect()->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:karyawans,email,' . $id,
            'telepon' => 'required',
            'role' => 'required',
            'status' => 'required',
            'password' => Hash::make($request->password)
        ]);

        $this->karyawanRepo->update($id, $request->only([
            'nama', 'email', 'telepon', 'role', 'status', 'password'
        ]));

        return redirect()->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil diperbarui');
    }

    public function destroy($id)
    {
        $this->karyawanRepo->delete($id);

        return redirect()->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil dihapus');
    }
}
