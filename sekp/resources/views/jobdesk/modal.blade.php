<div class="modal fade" id="modalTambahJobdesk" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" 
              method="POST" 
              action="{{ route('jobdesk.store') }}">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Tambah Jobdesk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Nama Jobdesk</label>
                    <input type="text" 
                           name="nama_jobdesk"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tugas Utama</label>
                    <textarea name="tugas_utama"
                              class="form-control"
                              rows="3"
                              required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Karyawan</label>
                    <select name="karyawan_id"
                            class="form-select"
                            required>
                        <option value="">Pilih Karyawan</option>
                        @foreach($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">
                                {{ $karyawan->nama }}
                            </option>
                        @endforeach
                    </select>
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


<div class="modal fade" id="modalEditJobdesk" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content" 
              method="POST" 
              id="formEditJobdesk">
            @csrf
            @method('PUT')

            <div class="modal-header">
                <h5 class="modal-title">Edit Jobdesk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Nama Jobdesk</label>
                    <input type="text" 
                           name="nama_jobdesk"
                           id="editNamaJobdesk"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tugas Utama</label>
                    <textarea name="tugas_utama"
                              id="editTugasUtama"
                              class="form-control"
                              rows="3"
                              required></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Karyawan</label>
                    <select name="karyawan_id"
                            id="editKaryawan"
                            class="form-select"
                            required>
                        <option value="">Pilih Karyawan</option>
                        @foreach($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">
                                {{ $karyawan->nama }}
                            </option>
                        @endforeach
                    </select>
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


<div class="modal fade" id="modalDeleteJobdesk" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content"
              method="POST"
              id="formDeleteJobdesk">
            @csrf
            @method('DELETE')

            <div class="modal-header">
                <h5 class="modal-title">Hapus Jobdesk</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <p>Yakin ingin menghapus jobdesk ini?</p>
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


<div class="modal fade" id="modalJobdeskKaryawan" tabindex="-1">
    <div class="modal-dialog">
        <form class="modal-content"
              method="POST"
              action="{{ route('jobdesk.store') }}">
            @csrf

            <div class="modal-header">
                <h5 class="modal-title">Tambah Jobdesk Karyawan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                <div class="mb-3">
                    <label class="form-label">Jobdesk</label>
                    <select name="nama_jobdesk"
                            class="form-select"
                            required>
                        <option value="">Pilih Jobdesk</option>
                        @foreach($jobdesks as $jobdesk)
                            <option value="{{ $jobdesk->nama_jobdesk }}">
                                {{ $jobdesk->nama_jobdesk }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Karyawan</label>
                    <select name="karyawan_id"
                            class="form-select"
                            required>
                        <option value="">Pilih Karyawan</option>
                        @foreach($karyawans as $karyawan)
                            <option value="{{ $karyawan->id }}">
                                {{ $karyawan->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-success w-100">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>
