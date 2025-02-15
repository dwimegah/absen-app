        <!-- Menu -->

        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
              <span class="app-brand-logo demo">
              <img src="{{asset('img/favicon/logo-app.jpg')}}" alt class="w-px-40 h-auto rounded-circle" />
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2">Absence</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{$active == 'dashboard' ? 'active' : ''}}">
              <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>
            

            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Pages</span>
            </li>
            @if (Auth::user()->role == 'superuser')
            <li class="menu-item {{$active == 'karyawan' ||  $active == 'role' ||  $active == 'projek'? 'active open' : ''}}">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Data Master">Data Master</div>
              </a>
              <ul class="menu-sub" style="list-style-type:none;">
                <li class="menu-item {{$active == 'role' ? 'active' : ''}}">
                  <a href="/role" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-cog"></i>
                    <div data-i18n="Role">Role</div>
                  </a>
                </li>
              </ul>
              <ul class="menu-sub" style="list-style-type:none;">
                <li class="menu-item {{$active == 'projek' ? 'active' : ''}}">
                  <a href="/projek" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-shopping-bag"></i>
                    <div data-i18n="Projek">Projek</div>
                  </a>
                </li>
              </ul>
              <ul class="menu-sub" style="list-style-type:none;">
                <li class="menu-item {{$active == 'karyawan' ? 'active' : ''}}">
                  <a href="/karyawan" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-user-circle"></i>
                    <div data-i18n="Karyawan">Karyawan</div>
                  </a>
                </li>
              </ul>
            </li>
            @endif
            <!-- Absensi -->
            <li class="menu-item {{$active == 'absensi' ? 'active' : ''}}">
              <a href="/absen" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Presensi</div>
              </a>
            </li>
            <!-- Ketidakhadiran -->
            <li class="menu-item {{$active == 'ketidakhadiran' ? 'active' : ''}}">
              <a href="/ketidakhadiran" class="menu-link">
                <i class="menu-icon tf-icons bx bx-box"></i>
                <div data-i18n="Basic">Ketidakhadiran</div>
              </a>
            </li>
            <!-- Monitoring -->
            <li class="menu-item {{$active == 'monitoring' ? 'active' : ''}}">
              <a href="/monitoring" class="menu-link">
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Basic">Histori</div>
              </a>
            </li>
            <!-- Laporan -->
            @if (Auth::user()->role == 'superuser' || Auth::user()->role == 'manager')
            <li class="menu-item {{$active == 'laporan' ? 'active' : ''}}">
              <a href="/laporan" class="menu-link">
                <i class="menu-icon tf-icons bx bxs-report"></i>
                <div data-i18n="Basic">Laporan</div>
              </a>
            </li>
            @endif
          </ul>
        </aside>
        <!-- / Menu -->