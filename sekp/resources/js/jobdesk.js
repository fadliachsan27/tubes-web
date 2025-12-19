document.addEventListener('DOMContentLoaded', () => {

    const modalJobdesk = document.getElementById('modalJobdesk');
    const modalJobdeskKaryawan = document.getElementById('modalJobdeskKaryawan');

    const btnAddJobdesk = document.getElementById('btnAddJobdesk');
    const btnAddJobdeskKaryawan = document.getElementById('btnAddJobdeskKaryawan');

    // OPEN MODAL
    btnAddJobdesk.addEventListener('click', () => {
        modalJobdesk.style.display = 'flex';
    });

    btnAddJobdeskKaryawan.addEventListener('click', () => {
        modalJobdeskKaryawan.style.display = 'flex';
    });

    // CLOSE MODAL
    document.querySelectorAll('[data-close]').forEach(btn => {
        btn.addEventListener('click', () => {
            modalJobdesk.style.display = 'none';
            modalJobdeskKaryawan.style.display = 'none';
        });
    });

    // CLICK OVERLAY TO CLOSE
    [modalJobdesk, modalJobdeskKaryawan].forEach(modal => {
        modal.addEventListener('click', e => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    });

});
