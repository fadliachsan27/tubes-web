@extends('layouts.app')

@section('title', 'Data Penggajian')

@section('content')
<h4 class="mb-4">Penggajian</h4>

{{-- FILTER --}}
<div class="card mb-3">
    <div class="card-body">
        <div class="row g-3 justify-content-center align-items-end">

            <div class="col-md-4">
                <label class="form-label">Nama Karyawan</label>
                <select class="form-select">
                    <option value="">Choose</option>
                    <option>John Doe</option>
                    <option>Jane Smith</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Tanggal</label>
                <input type="date" class="form-control">
            </div>

        </div>
    </div>
</div>

{{-- ACTION BUTTON --}}
<div class="mb-3">
    <button
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#modalTambahPenggajian"
    >
        <i class="fa-solid fa-plus me-1"></i> Tambah Penggajian
    </button>
</div>

{{-- TABLE --}}
<div class="card">
    <div class="card-header fw-semibold">
        Tabel Data Penggajian
    </div>

    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal</th>
                    <th>Gaji Pokok</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>PG001</td>
                    <td>John Doe</td>
                    <td>2025-10-25</td>
                    <td>Rp 5.000.000</td>
                    <td>
                        <div class="d-flex gap-1">
                            <button
                                class="btn btn-warning btn-sm text-white"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditPenggajian"
                            >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <button
                                class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#modalDeletePenggajian"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
</div>

{{-- INCLUDE MODAL --}}
@include('penggajian.modal')

@endsection
