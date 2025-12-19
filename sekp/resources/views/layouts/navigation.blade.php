<div class="bg-white border-end vh-100 d-flex flex-column p-3" style="width:260px">

    {{-- LOGO --}}
    {{-- LOGO + SEKP (KOTAK SAMA DENGAN TOPBAR) --}}
<div class="p-3 mb-3 text-white"
     style="background-color:#11b3b3">

    <div class="d-flex align-items-center">
        <img src="{{ asset('assets/img/logo.png') }}"
             alt="Logo"
             width="55"
             height="55"
             class="me-2">

        <span class="fw-bold fs-5">SEKP</span>
    </div>
</div>


    {{-- MENU --}}
    <ul class="nav nav-pills flex-column gap-1">

        <li class="nav-item">
            <a href="/dashboard"
               class="nav-link {{ Request::is('dashboard') ? 'active text-white' : 'text-secondary' }}"
               style="{{ Request::is('dashboard') ? 'background-color:#11b3b3' : '' }}">
                <i class="fa-solid fa-house me-2"></i> Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="/absensi"
               class="nav-link {{ Request::is('absensi') ? 'active text-white' : 'text-secondary' }}"
               style="{{ Request::is('absensi') ? 'background-color:#11b3b3' : '' }}">
                <i class="fa-solid fa-calendar-check me-2"></i> Absensi
            </a>
        </li>

        <li class="nav-item">
            <a href="/karyawan"
               class="nav-link {{ Request::is('karyawan') ? 'active text-white' : 'text-secondary' }}"
               style="{{ Request::is('karyawan') ? 'background-color:#11b3b3' : '' }}">
                <i class="fa-solid fa-users me-2"></i> Data Karyawan
            </a>
        </li>

        <li class="nav-item">
            <a href="/jobdesk"
               class="nav-link {{ Request::is('jobdesk') ? 'active text-white' : 'text-secondary' }}"
               style="{{ Request::is('jobdesk') ? 'background-color:#11b3b3' : '' }}">
                <i class="fa-solid fa-list-check me-2"></i> Jobdesk
            </a>
        </li>

        <li class="nav-item">
            <a href="/penggajian"
               class="nav-link {{ Request::is('penggajian') ? 'active text-white' : 'text-secondary' }}"
               style="{{ Request::is('penggajian') ? 'background-color:#11b3b3' : '' }}">
                <i class="fa-solid fa-wallet me-2"></i> Penggajian
            </a>
        </li>

        <small class="text-muted mt-3 ms-2">ACCOUNT</small>

        <li class="nav-item">
            <a href="/profile" class="nav-link text-secondary">
                <i class="fa-solid fa-user me-2"></i> Profile
            </a>
        </li>

        <li class="nav-item mb-3">
            <a href="/logout" class="nav-link text-danger">
                <i class="fa-solid fa-right-from-bracket me-2"></i> Logout
            </a>
        </li>

        {{-- NEED HELP --}}
        <li class="nav-item">
            <div class="p-3 rounded text-white text-center"
                 style="background-color:#11b3b3">
                <i class="fa-solid fa-circle-question fs-3 mb-2"></i>
                <p class="fw-semibold mb-1">Need Help?</p>
                <small class="d-block mb-2">Please check our docs</small>

                <a href="/documentation" class="btn btn-light btn-sm fw-bold w-100">
                    Documentation
                </a>
            </div>
        </li>

    </ul>
</div>
