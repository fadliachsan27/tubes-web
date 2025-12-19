<div class="modal fade" id="modalTambahPenggajian" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Penggajian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Nama Karyawan</label>
                    <select class="form-select">
                        <option value="">Pilih Karyawan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gaji Pokok</label>
                    <input type="number" class="form-control">
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-primary w-100">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalEditPenggajian" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Penggajian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Nama Karyawan</label>
                    <select class="form-select">
                        <option value="">Pilih Karyawan</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" class="form-control">
                </div>

                <div class="mb-3">
                    <label class="form-label">Gaji Pokok</label>
                    <input type="number" class="form-control">
                </div>

            </div>

            <div class="modal-footer">
                <button class="btn btn-warning w-100 text-white">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modalDeletePenggajian" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Hapus Penggajian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p>
                    Yakin ingin menghapus data penggajian ini?
                </p>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <button class="btn btn-danger">
                    Hapus
                </button>
            </div>
        </form>
    </div>
</div>
