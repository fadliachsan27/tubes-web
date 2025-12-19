<div class="modal fade" id="modalKaryawan" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalKaryawanLabel">Edit Data Karyawan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="formKaryawan">
          <div class="mb-3">
            <label for="idKaryawan" class="form-label">ID Karyawan</label>
            <input type="text" class="form-control" id="idKaryawan" disabled>
          </div>
          <div class="mb-3">
            <label for="namaKaryawan" class="form-label">Nama</label>
            <input type="text" class="form-control" id="namaKaryawan" required>
          </div>
          <div class="mb-3">
            <label for="emailKaryawan" class="form-label">Email</label>
            <input type="email" class="form-control" id="emailKaryawan" required>
          </div>
          <div class="mb-3">
            <label for="teleponKaryawan" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="teleponKaryawan" required>
          </div>
          <div class="mb-3">
            <label for="roleKaryawan" class="form-label">Role</label>
            <select id="roleKaryawan" class="form-select" required>
              <option value="">Pilih Role</option>
              <option value="Karyawan">Karyawan</option>
              <option value="Admin">Admin</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="statusKaryawan" class="form-label">Status</label>
            <select id="statusKaryawan" class="form-select" required>
              <option value="Aktif">Aktif</option>
              <option value="Nonaktif">Nonaktif</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary w-100" id="submitKaryawan">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>
