<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Repositories\JobdeskRepository;
use Illuminate\Http\Request;

class JobdeskController extends Controller
{
    protected $jobdeskRepo;

    public function __construct(JobdeskRepository $jobdeskRepo)
    {
        $this->jobdeskRepo = $jobdeskRepo;
    }

    public function index()
    {
        return view('jobdesk.index', [
            'jobdesks'  => $this->jobdeskRepo->all(),
            'karyawans' => Karyawan::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jobdesk' => 'required',
            'tugas_utama'  => 'required',
            'karyawan_id'  => 'required|exists:karyawans,id'
        ]);

        $this->jobdeskRepo->create($request->all());

        return redirect()->back()->with('success', 'Jobdesk berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $this->jobdeskRepo->update($id, $request->all());

        return redirect()->back()->with('success', 'Jobdesk berhasil diperbarui');
    }

    public function destroy($id)
    {
        $this->jobdeskRepo->delete($id);

        return redirect()->back()->with('success', 'Jobdesk berhasil dihapus');
    }
}

