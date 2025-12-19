<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    // tampilkan data
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('karyawan.index', compact('karyawans'));
    }

    // form tambah data
    public function create()
    {
        return view('karyawan.create');
    }

    // simpan ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:karyawans,email',
            'telepon' => 'required',
            'role' => 'required',
            'status' => 'required',
        ]);

        Karyawan::create([
            'kode' => 'KRY-' . time(), // ✅ ISI DI SINI
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'role' => $request->role,
            'status' => $request->status,
        ]);

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
        ]);

        $karyawan = Karyawan::findOrFail($id);

        $karyawan->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'telepon' => $request->telepon,
            'role' => $request->role,
            'status' => $request->status,
        ]);

        return redirect()->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil diperbarui');
    }



    public function destroy($id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();

        return redirect()->route('karyawan.index')
            ->with('success', 'Data karyawan berhasil dihapus');
    }
    

}
