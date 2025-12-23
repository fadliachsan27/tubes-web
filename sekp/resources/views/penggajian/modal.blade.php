{{-- ================= MODAL TAMBAH ================= --}}
<div class="modal fade" id="modalTambahPenggajian" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" action="/penggajian" class="modal-content">
        @csrf
            <div class="modal-header">
                <h5 class="modal-title">Tambah Penggajian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Karyawan</label>
                    <select name="karyawan_id" class="form-select" required>
                        <option value="">Pilih Karyawan</option>
                        @foreach($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" class="form-control" required>
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-primary w-100">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL EDIT ================= --}}
<div class="modal fade" id="modalEditPenggajian" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" id="formEditPenggajian" class="modal-content">
        @csrf
        @method('PUT')
            <div class="modal-header">
                <h5 class="modal-title">Edit Penggajian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Nama Karyawan</label>
                    <select name="karyawan_id" id="edit_karyawan" class="form-select">
                        @foreach($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" id="edit_tanggal" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" id="edit_gaji" class="form-control">
                </div>
            </div>

            <div class="modal-footer">
                <button class="btn btn-warning w-100 text-white">Update</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= MODAL DELETE ================= --}}
<div class="modal fade" id="modalDeletePenggajian" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" id="formDeletePenggajian" class="modal-content">
        @csrf
        @method('DELETE')
            <div class="modal-header">
                <h5 class="modal-title">Hapus Penggajian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p>Yakin ingin menghapus data penggajian ini?</p>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button class="btn btn-danger">Hapus</button>
            </div>
        </form>
    </div>
</div>

{{-- ================= SCRIPT ================= --}}
<script>
document.addEventListener('DOMContentLoaded', function () {

    document.getElementById('modalEditPenggajian')
    .addEventListener('show.bs.modal', function (event) {
        let btn = event.relatedTarget;

        document.getElementById('formEditPenggajian').action =
            `/penggajian/${btn.dataset.id}`;

        document.getElementById('edit_karyawan').value = btn.dataset.karyawan;
        document.getElementById('edit_tanggal').value = btn.dataset.tanggal;
        document.getElementById('edit_gaji').value = btn.dataset.gaji;
    });

    document.getElementById('modalDeletePenggajian')
    .addEventListener('show.bs.modal', function (event) {
        let btn = event.relatedTarget;
        document.getElementById('formDeletePenggajian').action =
            `/penggajian/${btn.dataset.id}`;
    });

});
</script>