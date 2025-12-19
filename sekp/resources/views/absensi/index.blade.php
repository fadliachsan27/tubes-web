@extends('layouts.app')

@section('title', 'Absensi')

@section('content')
<h4 class="mb-4">Absensi</h4>

{{-- Button kiri --}}
<div class="mb-3 d-flex gap-2">
    <button class="btn btn-success">
        <i class="fa-solid fa-right-to-bracket me-1"></i>
        Masuk Kerja
    </button>

    <button class="btn btn-danger">
        <i class="fa-solid fa-right-from-bracket me-1"></i>
        Selesai Kerja
    </button>
</div>

<div class="card">
    <div class="card-header fw-semibold">
        Absensi Table
    </div>
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal & Waktu</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>John Doe</td>
                    <td>john@example.com</td>
                    <td>2023-10-20 08:30</td>
                    <td><span class="badge bg-success">Masuk</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
