@extends('layouts.app')

@section('title', 'Data Karyawan')

@section('content')

{{-- FILTER --}}
<div class="card mb-3">
    <div class="card-body">
        <div class="row g-3 justify-content-center align-items-end">

            <div class="col-md-4">
                <label class="form-label">Nama</label>
                <select class="form-select">
                    <option value="">Choose</option>
                    <option>John Doe</option>
                    <option>Jane Smith</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Role</label>
                <select class="form-select">
                    <option value="">Choose</option>
                    <option>Karyawan</option>
                    <option>Admin</option>
                </select>
            </div>

        </div>
    </div>
</div>

{{-- ACTION BUTTON: Tambah --}}
<div class="mb-3">
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalKaryawan">
        <i class="fa-solid fa-plus me-1"></i> Tambah
    </button>
</div>

{{-- TABLE --}}
<div class="card">
    <div class="card-header fw-semibold">
        Tabel Data Karyawan
    </div>

    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Role</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <tr>
                    <td>001</td>
                    <td>John Doe</td>
                    <td>john@example.com</td>
                    <td>08123456789</td>
                    <td>Karyawan</td>
                    <td><span class="badge bg-success">Aktif</span></td>
                    <td>
                        <div class="d-flex gap-1">
                            <button class="btn btn-warning btn-sm text-white edit-btn" data-bs-toggle="modal" data-bs-target="#modalKaryawan">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-danger btn-sm delete-btn">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>002</td>
                    <td>Jane Smith</td>
                    <td>jane@example.com</td>
                    <td>08234567890</td>
                    <td>Admin</td>
                    <td><span class="badge bg-secondary">Nonaktif</span></td>
                    <td>
                        <div class="d-flex gap-1">
                            <button class="btn btn-warning btn-sm text-white edit-btn" data-bs-toggle="modal" data-bs-target="#modalKaryawan">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-danger btn-sm delete-btn">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

{{-- Include Modal --}}
@include('karyawan.modal')

@endsection

@push('scripts')
<script src="{{ asset('js/karyawan.js') }}"></script>
@endpush
