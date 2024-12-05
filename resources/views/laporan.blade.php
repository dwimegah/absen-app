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
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    @include('includes.head')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('includes.menu')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
            @include('includes.navbar')
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

              <!-- Basic Bootstrap Table -->
              <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="fw-bold">Data Laporan</h5>
                </div>
                <form method="POST" action="/cetaklaporan">
                  @csrf
                  <div style="padding-left:25px" class="col-xl-12">
                    <div class="mb-3 row">
                      <label  class="col-sm-2 col-form-label">Tanggal Awal</label>
                      <div class="col-sm-2">
                        <input
                          name="tglawal"
                          class="form-control"
                          type="date"
                          value="<?php echo date('Y-m-d',strtotime($date)) ?>"
                        />
                      </div>
                      <label class="col-sm-2 col-form-label">Tanggal Akhir</label>
                      <div class="col-sm-2">
                        <input
                          name="tglakhir"
                          class="form-control"
                          type="date"
                          value="<?php echo date('Y-m-d',strtotime($date)) ?>"
                        />
                      </div>
                      <div class="col-sm-2">
                        <button type="submit" class="btn btn-outline-primary">
                          Download
                          <i class='bx bxs-download'></i>
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!--/ Basic Bootstrap Table -->

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

    <!-- Core JS -->
    @include('includes.bottom')
  </body>
</html>
<script>
  new DataTable('#tbllaporan');
</script>