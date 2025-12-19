<?php

namespace App\Repositories;

use App\Models\Karyawan;

class KaryawanRepository
{
    public function getAll()
    {
        return Karyawan::all();
    }

    public function create(array $data)
    {
        $data['kode'] = 'KRY-' . time();
        return Karyawan::create($data);
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
