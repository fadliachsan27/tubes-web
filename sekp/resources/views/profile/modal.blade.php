<div class="modal fade" id="modalEditPhoto" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <form class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Ganti Foto Profil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">

                <img
                    id="previewImage"
                    src="{{ asset('asset/img/akbar.png') }}"
                    class="rounded-circle mb-3"
                    width="160"
                    height="160"
                    style="object-fit: cover;"
                >

                <input
                    type="file"
                    class="form-control"
                    accept="image/*"
                    id="fileInput"
                >

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Batal
                </button>
                <button type="button" class="btn btn-primary" id="btnSavePhoto" data-bs-dismiss="modal">
                    Simpan
                </button>
            </div>

        </form>
    </div>
</div>