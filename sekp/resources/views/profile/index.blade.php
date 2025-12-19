@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<h4 class="mb-4">Profile</h4>

<div class="container mt-4">

    <div class="card">
        <div class="card-body">

            {{-- HEADER --}}
            <div class="d-flex align-items-center gap-4 mb-4">
                <img
                    src="{{ asset('asset/img/akbar.png') }}"
                    class="rounded-circle"
                    width="120"
                    height="120"
                    style="object-fit: cover; cursor:pointer;"
                    id="profilePhoto"
                    data-bs-toggle="modal"
                    data-bs-target="#modalEditPhoto"
                >

                <div>
                    <h4 class="mb-0">Profile</h4>
                    <small class="text-muted">
                        Klik foto untuk mengganti
                    </small>
                </div>
            </div>

            {{-- FORM PROFILE --}}
            <form id="profileForm">

                <div class="mb-3">
                    <label class="form-label">ID</label>
                    <input type="text" class="form-control" value="USR-00123" disabled>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control editable" value="Muhammad Akbar Alfarizi" disabled>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control editable" value="akbaralfarizi@email.com" disabled>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Telepon</label>
                        <input type="text" class="form-control editable" value="+62 812-3456-7890" disabled>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Role</label>
                        <input type="text" class="form-control" value="Karyawan" disabled>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <input type="text" class="form-control" value="Aktif" disabled>
                </div>

                {{-- BUTTON AREA --}}
                <div class="d-flex gap-2">

                    <button
                        type="button"
                        class="btn btn-primary"
                        id="btnEdit"
                    >
                        <i class="fa-solid fa-pen me-1"></i> Edit Profile
                    </button>

                    <button
                        type="button"
                        class="btn btn-secondary d-none"
                        id="btnCancel"
                    >
                        Cancel
                    </button>

                    <button
                        type="submit"
                        class="btn btn-success d-none"
                        id="btnSave"
                    >
                        Save
                    </button>

                </div>

            </form>

        </div>
    </div>

</div>

{{-- MODAL GANTI FOTO --}}

@include('profile.modal')

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    const btnEdit = document.getElementById('btnEdit');
    const btnCancel = document.getElementById('btnCancel');
    const btnSave = document.getElementById('btnSave');
    const editableInputs = document.querySelectorAll('.editable');

    if (!btnEdit) return;

    btnEdit.addEventListener('click', () => {
        editableInputs.forEach(input => input.disabled = false);
        btnEdit.classList.add('d-none');
        btnCancel.classList.remove('d-none');
        btnSave.classList.remove('d-none');
    });

    btnCancel.addEventListener('click', () => {
        editableInputs.forEach(input => input.disabled = true);
        btnEdit.classList.remove('d-none');
        btnCancel.classList.add('d-none');
        btnSave.classList.add('d-none');
    });

});
</script>
@endpush

