<?php

namespace App\Repositories;

use App\Models\Karyawan;
use Illuminate\Support\Facades\Hash;

class KaryawanRepository
{
    public function getAll()
    {
        return Karyawan::all();
    }

    public function create(array $data)
{
    return Karyawan::create([
        'kode' => 'KRY-' . time(),
        'nama' => $data['nama'],
        'email' => $data['email'],
        'telepon' => $data['telepon'],
        'role' => $data['role'],
        'status' => $data['status'],
        'password' => Hash::make('123456') // 🔥 WAJIB
    ]);
}

    public function findById($id)
    {
        return Karyawan::findOrFail($id);
    }

    public function update($id, array $data)
    {
        $karyawan = $this->findById($id);
        return $karyawan->update($data);
    }

    public function delete($id)
    {
        $karyawan = $this->findById($id);
        return $karyawan->delete();
    }
}
