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
                    @foreach($karyawans as $karyawan)
                        <option>{{ $karyawan->nama }}</option>
                    @endforeach
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
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahPenggajian">
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
                @foreach($penggajians as $item)
                <tr>
                    <td>PG{{ str_pad($item->id,3,'0',STR_PAD_LEFT) }}</td>
                    <td>{{ $item->karyawan->nama }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>Rp {{ number_format($item->gaji_pokok,0,',','.') }}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <button
                                class="btn btn-warning btn-sm text-white"
                                data-bs-toggle="modal"
                                data-bs-target="#modalEditPenggajian"
                                data-id="{{ $item->id }}"
                                data-karyawan="{{ $item->karyawan_id }}"
                                data-tanggal="{{ $item->tanggal }}"
                                data-gaji="{{ $item->gaji_pokok }}"
                            >
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>

                            <button
                                class="btn btn-danger btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#modalDeletePenggajian"
                                data-id="{{ $item->id }}"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>
</div>

@include('penggajian.modal')
@endsection
