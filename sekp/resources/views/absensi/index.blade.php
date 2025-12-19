@extends('layouts.app')

@section('title', 'Absensi')

@section('content')
<h4 class="mb-4">Absensi</h4>

{{-- Button kiri --}}
<div class="mb-3 d-flex gap-2">
    <button class="btn btn-success" onclick="masukKerja()">
        <i class="fa-solid fa-right-to-bracket me-1"></i>
        Masuk Kerja
    </button>

    <button class="btn btn-danger" onclick="selesaiKerja()">
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
            <tbody id="absensiTable">
                {{-- data dari API --}}
            </tbody>
        </table>
    </div>
</div>

<script>
    // sementara hardcode (nanti bisa dari auth)
    const karyawan_id = 1;

    function masukKerja() {
        fetch('/api/absensi/masuk', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                karyawan_id: karyawan_id
            })
        })
        .then(res => res.json())
        .then(res => {
            alert(res.message);
            loadAbsensi();
        });
    }

    function selesaiKerja() {
        fetch('/api/absensi/keluar', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({
                karyawan_id: karyawan_id
            })
        })
        .then(res => res.json())
        .then(res => {
            alert(res.message);
            loadAbsensi();
        });
    }

    function loadAbsensi() {
        fetch('/api/absensi')
        .then(res => res.json())
        .then(data => {
            let html = '';

            data.forEach(a => {
                html += `
                <tr>
                    <td>${a.id}</td>
                    <td>${a.karyawan.nama}</td>
                    <td>${a.karyawan.email}</td>
                    <td>
                        ${a.tanggal}
                        ${a.jam_masuk ?? ''}
                        ${a.jam_keluar ? ' - ' + a.jam_keluar : ''}
                    </td>
                    <td>
                        <span class="badge bg-${a.status === 'Masuk' ? 'success' : 'secondary'}">
                            ${a.status}
                        </span>
                    </td>
                </tr>`;
            });

            document.getElementById('absensiTable').innerHTML = html;
        });
    }

    // load saat halaman dibuka
    loadAbsensi();
</script>
@endsection
