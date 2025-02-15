<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="{{asset('')}}"
  data-template="vertical-menu-template-free"
>
  <head>
    @include('includes.head')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        @include('includes.menu')

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          @include('includes.navbar')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-7">
                        <div class="card-body">
                          <h4>Selamat Datang <b>{{Auth::user()->name}}</b>, Anda Login sebagai <b>{{Auth::user()->jabatan}}</b>.</h4>
                          <p class="mb-4">
                            Semangat memulai hari. Jangan lupa melakukan absensi!
                          </p>

                          <a href="/absen" class="btn btn-sm btn-outline-primary">Lakukan Absen</a>
                        </div>
                      </div>
                      <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                          <img
                            src="{{asset('img/illustrations/man-with-laptop-light.png')}}"
                            height="140"
                            alt="View Badge User"
                            data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png"
                          />
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Total Revenue -->
              </div>

              <div class="row">
                <!-- Ketidakhadiran -->
                <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
                  <div class="card h-40">
                    <div class="card-body">
                      <p class="mb-4">
                        Klik untuk mengisi data form ketidakhadiran.
                      </p>
                      <a href="/ketidakhadiran" class="btn btn-sm btn-primary">Form Ketidakhadiran</a>
                    </div>
                  </div>
                </div>
                <!--/ Ketidakhadiran -->

                <!-- Expense Overview -->
                <div class="col-md-6 col-lg-4 order-1 mb-4">
                  <div class="card h-40">
                    <div class="card-body">
                      <p class="mb-4">
                        Klik untuk melihat atau mengubah detail profil.
                      </p>
                      <a href="/profile" class="btn btn-sm btn-primary">Lihat Profil</a>
                    </div>
                  </div>
                </div>
                <!--/ Expense Overview -->

                <!-- Transactions -->
                <div class="col-md-6 col-lg-4 order-2 mb-4">
                  <div class="card h-40">
                    <div class="card-body">
                      <p class="mb-4">
                        Klik untuk melihat atau mencetak histori kehadiran.
                      </p>
                      <a href="/laporan" class="btn btn-sm btn-primary">Lihat Laporan</a>
                    </div>
                  </div>
                </div>
                <!--/ Transactions -->
              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('includes.footer')
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    @include('includes.bottom')
  </body>
</html>
