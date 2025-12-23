<?php

namespace App\Repositories;

use App\Models\Penggajian;

class PenggajianRepository
{
    public function all()
    {
        return Penggajian::with('karyawan')->latest()->get();
    }

    public function create(array $data)
    {
        return Penggajian::create($data);
    }

    public function find($id)
    {
        return Penggajian::findOrFail($id);
    }

    public function update($id, array $data)
    {
        return Penggajian::where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return Penggajian::destroy($id);
    }
}
