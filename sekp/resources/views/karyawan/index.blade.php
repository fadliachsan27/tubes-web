@extends('layouts.app')

@section('title', 'Data Karyawan')

@section('content')

    <form method="GET" action="{{ route('karyawan.index') }}">
        <div class="card mb-3">
            <div class="card-body">
                <div class="row g-3 justify-content-center align-items-end">

                    <div class="col-md-4">
                        <label class="form-label">Nama</label>
                        <select name="nama" class="form-select">
                            <option value="">Semua</option>
                            @foreach ($karyawans as $item)
                                <option value="{{ $item->nama }}" {{ request('nama') == $item->nama ? 'selected' : '' }}>
                                    {{ $item->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Role</label>
                        <select name="role" class="form-select">
                            <option value="">Semua</option>
                            <option value="Karyawan" {{ request('role') == 'Karyawan' ? 'selected' : '' }}>
                                Karyawan
                            </option>
                            <option value="Admin" {{ request('role') == 'Admin' ? 'selected' : '' }}>
                                Admin
                            </option>
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary w-50">
                            Cari
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </form>


    <div class="mb-3">
        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambahKaryawan">
            <i class="fa-solid fa-plus me-1"></i> Tambah
        </button>
    </div>

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
                        <th width="120">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($karyawans as $karyawan)
                        <tr>
                            <td>{{ $karyawan->kode }}</td>
                            <td>{{ $karyawan->nama }}</td>
                            <td>{{ $karyawan->email }}</td>
                            <td>{{ $karyawan->telepon }}</td>
                            <td>{{ $karyawan->role }}</td>
                            <td>
                                <span class="badge bg-{{ $karyawan->status == 'Aktif' ? 'success' : 'secondary' }}">
                                    {{ $karyawan->status }}
                                </span>

                            </td>
                            <td>
                                <button class="btn btn-warning btn-sm text-white edit-btn" data-bs-toggle="modal"
                                    data-bs-target="#modalEditKaryawan" data-id="{{ $karyawan->id }}"
                                    data-nama="{{ $karyawan->nama }}" data-email="{{ $karyawan->email }}"
                                    data-telepon="{{ $karyawan->telepon }}" data-role="{{ $karyawan->role }}"
                                    data-status="{{ $karyawan->status }}">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>

                                <button class="btn btn-danger btn-sm delete-btn" data-bs-toggle="modal"
                                    data-bs-target="#modalDeleteKaryawan" data-id="{{ $karyawan->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    @include('karyawan.modal')

@endsection

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modalDelete = document.getElementById('modalDeleteKaryawan');
        const formDelete = document.getElementById('formDeleteKaryawan');

        modalDelete.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const id = button.getAttribute('data-id');

            formDelete.action = `/karyawan/${id}`;
        });
    });
    document.addEventListener('DOMContentLoaded', function () {

        // EDIT
        const modalEdit = document.getElementById('modalEditKaryawan');
        const formEdit = document.getElementById('formEditKaryawan');

        modalEdit.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;

            const id = button.getAttribute('data-id');
            const nama = button.getAttribute('data-nama');
            const email = button.getAttribute('data-email');
            const telepon = button.getAttribute('data-telepon');
            const role = button.getAttribute('data-role');
            const status = button.getAttribute('data-status');

            formEdit.action = `/karyawan/${id}`;

            document.getElementById('editNama').value = nama;
            document.getElementById('editEmail').value = email;
            document.getElementById('editTelepon').value = telepon;
            document.getElementById('editRole').value = role;
            document.getElementById('editStatus').value = status;
        });

    });
</script>