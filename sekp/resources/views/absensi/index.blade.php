@extends('layouts.app')

@section('title', 'Absensi')

@section('content')
<h4 class="mb-4">Absensi</h4>

<div class="mb-3 d-flex gap-2">
    <button class="btn btn-success" id="btnMasuk" onclick="masukKerja()">
        <i class="fa-solid fa-right-to-bracket me-1"></i>
        Masuk Kerja
    </button>

    <button class="btn btn-danger" id="btnKeluar" onclick="selesaiKerja()" disabled>
        <i class="fa-solid fa-right-from-bracket me-1"></i>
        Selesai Kerja
    </button>
</div>

<div class="card">
    <div class="card-header fw-semibold">
        Absensi Hari Ini
    </div>
    <div class="card-body p-0">
        <table class="table table-striped mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="absensiTable">
                <tr>
                    <td colspan="6" class="text-center text-muted">Loading...</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script>
function masukKerja() {
    fetch('/api/absensi/masuk', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        }
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
        }
    })
    .then(res => res.json())
    .then(res => {
        alert(res.message);
        loadAbsensi();
    });
}

function loadAbsensi() {
    fetch('/api/absensi/hari-ini')
    .then(res => res.json())
    .then(a => {
        let html = '';

        if (!a) {
            html = `
                <tr>
                    <td colspan="6" class="text-center text-muted">
                        Belum absensi hari ini
                    </td>
                </tr>`;
            document.getElementById('btnMasuk').disabled = false;
            document.getElementById('btnKeluar').disabled = true;
        } else {
            html = `
                <tr>
                    <td>${a.karyawan.nama}</td>
                    <td>${a.karyawan.email}</td>
                    <td>${a.tanggal}</td>
                    <td>${a.jam_masuk ?? '-'}</td>
                    <td>${a.jam_keluar ?? '-'}</td>
                    <td>
                        <span class="badge bg-${a.status === 'Selesai' ? 'secondary' : 'success'}">
                            ${a.status}
                        </span>
                    </td>
                </tr>`;

            // kontrol tombol
            document.getElementById('btnMasuk').disabled = !!a.jam_masuk;
            document.getElementById('btnKeluar').disabled = !a.jam_masuk || !!a.jam_keluar;
        }

        document.getElementById('absensiTable').innerHTML = html;
    });
}

loadAbsensi();
</script>
@endsection
