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
              <!-- <h4 class="fw-bold py-3 mb-4">Absen Form</h4> -->

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="fw-bold py-3 mb-0">Ketidakhadiran Form</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                      <form method="POST" action="/saveketidakhadiran" enctype="multipart/form-data">
                        @csrf
                        <input name="idkaryawan"value="{{Auth::user()->id}}" hidden>
                        <input name="name"value="{{Auth::user()->name}}" hidden>
                        <div class="mb-3 row">
                          <label class="col-md-2 col-form-label">Tanggal Awal</label>
                          <div class="col-md-3">
                            <input
                              name="tglawal"
                              class="form-control"
                              type="date"
                            />
                            @error('tglawal')
                              <span class="form-text text-danger">{{ $message }}</span>
                            @endif
                          </div>
                          <label class="col-md-2 col-form-label">Tanggal Akhir</label>
                          <div class="col-md-3">
                            <input
                              class="form-control"
                              name="tglakhir"
                              type="date"
                            />
                            @error('tglakhir')
                              <span class="form-text text-danger">{{ $message }}</span>
                            @endif
                          </div>
                        </div>
                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Keterangan</label>
                          <div class="col-sm-10">
                            <textarea
                              class="form-control"
                              name="keterangan"
                              placeholder="Isi keterangan kehadiran"
                              rows="4"
                            ></textarea>
                            @error('keterangan')
                              <span class="form-text text-danger">{{ $message }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Upload Media</label>
                          <div class="col-sm-10">
                            <input type="file" class="form-control" name="media"/>
                            @error('media')
                              <span class="form-text text-danger">{{ $message }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
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

    <!-- Core JS -->
    @include('includes.bottom')
  </body>
</html>
