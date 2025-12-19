<div class="modal fade" id="modalTambahKaryawan" tabindex="-1">
    <div class="modal-dialog">
        <form
            action="{{ route('karyawan.store') }}"
            method="POST"
            class="modal-content"
        >
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Tambah Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Telepon</label>
                    <input type="text" name="telepon" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Role</label>
                    <select name="role" class="form-select" required>
                        <option value="Karyawan">Karyawan</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-select" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary w-100">
                    Simpan 
                </button>
            </div>

        </form>
    </div>
</div>


<div class="modal fade" id="modalEditKaryawan" tabindex="-1">
    <div class="modal-dialog">
        <form method="POST" id="formEditKaryawan" class="modal-content">
            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5 class="modal-title">Edit Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" id="editNama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" id="editEmail" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Telepon</label>
                    <input type="text" name="telepon" id="editTelepon" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Role</label>
                    <select name="role" id="editRole" class="form-select" required>
                        <option value="Karyawan">Karyawan</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" id="editStatus" class="form-select" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Nonaktif">Nonaktif</option>
                    </select>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-warning w-100 text-white">
                    Update
                </button>
            </div>

        </form>
    </div>
</div>


<div class="modal fade" id="modalDeleteKaryawan" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" id="formDeleteKaryawan" class="modal-content">
            @csrf
            @method('DELETE')

            <div class="modal-header">
                <h5 class="modal-title">Hapus Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p>Apakah yakin ingin menghapus karyawan ini?</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="submit" class="btn btn-danger">
                    Hapus
                </button>
            </div>

        </form>
    </div>
</div>

