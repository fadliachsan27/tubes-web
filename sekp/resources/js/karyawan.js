document.addEventListener('DOMContentLoaded', function () {

    const tableBody = document.querySelector('#tableKaryawan tbody');
    const btnAddKaryawan = document.getElementById('btnAddKaryawan');
    const popupContainer = document.getElementById('popupContainer');
    let nextId = tableBody.children.length + 1;
    let editingRow = null;

    // Load modal dynamically
    async function loadModal() {
        const response = await fetch('/karyawan/formAddEditKaryawan'); // route ke modal
        const html = await response.text();
        popupContainer.innerHTML = html;
        const modalEl = document.getElementById('modalKaryawan');
        const modal = new bootstrap.Modal(modalEl);
        modal.show();

        const form = modalEl.querySelector('#formKaryawan');
        const idInput = modalEl.querySelector('#idKaryawan');
        const submitBtn = modalEl.querySelector('#submitKaryawan');

        // Jika tambah, generate ID
        if (!editingRow) {
            idInput.value = 'K' + String(nextId).padStart(3, '0');
        } else {
            idInput.value = editingRow.children[0].textContent;
            modalEl.querySelector('#namaKaryawan').value = editingRow.children[1].textContent;
            modalEl.querySelector('#emailKaryawan').value = editingRow.children[2].textContent;
            modalEl.querySelector('#teleponKaryawan').value = editingRow.children[3].textContent;
            modalEl.querySelector('#roleKaryawan').value = editingRow.children[4].textContent;
            modalEl.querySelector('#statusKaryawan').value = editingRow.children[5].textContent.includes('Aktif') ? 'Aktif' : 'Nonaktif';
        }

        // Submit form
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const nama = modalEl.querySelector('#namaKaryawan').value;
            const email = modalEl.querySelector('#emailKaryawan').value;
            const telepon = modalEl.querySelector('#teleponKaryawan').value;
            const role = modalEl.querySelector('#roleKaryawan').value;
            const status = modalEl.querySelector('#statusKaryawan').value;

            if (editingRow) {
                editingRow.children[1].textContent = nama;
                editingRow.children[2].textContent = email;
                editingRow.children[3].textContent = telepon;
                editingRow.children[4].textContent = role;
                editingRow.children[5].innerHTML = status === 'Aktif' ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-secondary">Nonaktif</span>';
            } else {
                const tr = document.createElement('tr');
                tr.innerHTML = `
                    <td>${idInput.value}</td>
                    <td>${nama}</td>
                    <td>${email}</td>
                    <td>${telepon}</td>
                    <td>${role}</td>
                    <td>${status === 'Aktif' ? '<span class="badge bg-success">Aktif</span>' : '<span class="badge bg-secondary">Nonaktif</span>'}</td>
                    <td>
                        <div class="d-flex gap-1">
                            <button class="btn btn-warning btn-sm text-white edit-btn" data-bs-toggle="modal" data-bs-target="#modalKaryawan">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </button>
                            <button class="btn btn-danger btn-sm delete-btn">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </div>
                    </td>
                `;
                tableBody.appendChild(tr);
                nextId++;
            }

            bootstrap.Modal.getInstance(modalEl).hide();
            editingRow = null;
            attachRowEvents();
        });

        attachRowEvents();
    }

    btnAddKaryawan.addEventListener('click', function () {
        editingRow = null;
        loadModal();
    });

    // Attach Edit/Delete events
    function attachRowEvents() {
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.onclick = function () {
                editingRow = this.closest('tr');
                loadModal();
            };
        });
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.onclick = function () {
                if (confirm('Apakah anda yakin ingin menghapus data ini?')) {
                    this.closest('tr').remove();
                }
            };
        });
    }

    attachRowEvents();
});
