@extends('layouts.app')

@section('title', 'Data Jobdesk')

@section('content')
<h4 class="mb-4">Jobdesk</h4>

{{-- FILTER --}}
<div class="card mb-3">
    <div class="card-body">
        <div class="row g-3 justify-content-center align-items-end">

            <div class="col-md-4">
                <label class="form-label">Nama Jobdesk</label>
                <select class="form-select">
                    <option value="">Choose</option>
                    <option>Front-End Dev</option>
                    <option>Back-End Dev</option>
                </select>
            </div>

            <div class="col-md-4">
                <label class="form-label">Nama Karyawan</label>
                <select class="form-select">
                    <option value="">Choose</option>
                    <option>John Doe</option>
                    <option>Jane Smith</option>
                </select>
            </div>

        </div>
    </div>
</div>

{{-- ACTION BUTTON --}}
<div class="mb-3 d-flex gap-2">
    <!-- Tambah Jobdesk -->
    <button
        class="btn btn-primary"
        data-bs-toggle="modal"
        data-bs-target="#modalTambahJobdesk"
    >
        <i class="fa-solid fa-plus me-1"></i> Tambah Jobdesk
    </button>

    <!-- Tambah Jobdesk Karyawan -->
    <!-- <button
        class="btn btn-success"
        data-bs-toggle="modal"
        data-bs-target="#modalJobdeskKaryawan"
    >
        <i class="fa-solid fa-user-plus me-1"></i> Jobdesk Karyawan
    </button> -->
</div>

{{-- TABLE --}}
<div class="card">
    <div class="card-header fw-semibold">
        Tabel Data Jobdesk
    </div>

    <div class="card-body p-0">
        <table class="table table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Jobdesk</th>
            <th>Tugas</th>
            <th>Nama Karyawan</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($jobdesks as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_jobdesk }}</td>
            <td>{{ $item->tugas_utama }}</td>
            <td>{{ $item->karyawan->nama }}</td>
            <td>
                <button class="btn btn-warning btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#modalEdit"
                    data-id="{{ $item->id }}"
                    data-nama="{{ $item->nama_jobdesk }}"
                    data-tugas="{{ $item->tugas_utama }}"
                    data-karyawan="{{ $item->karyawan_id }}">
                    Edit
                </button>

                <button class="btn btn-danger btn-sm"
                    data-bs-toggle="modal"
                    data-bs-target="#modalDelete"
                    data-id="{{ $item->id }}">
                    Hapus
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
</div>

{{-- INCLUDE MODAL --}}
@include('jobdesk.modal')

@endsection
