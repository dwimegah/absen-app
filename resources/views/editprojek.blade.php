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

              <div class="row">
                <div class="col-md-12">
                  <div class="card mb-4">
                    <h5 class="card-header">Data Projek</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" action="/updateprojek" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <input id="id" name="id" value="{{$datas[0]->id}}" hidden>
                          <div class="mb-3 col-md-12">
                            <label for="nama" class="form-label">nama</label>
                            <input
                              class="form-control"
                              type="text"
                              id="nama"
                              name="nama"
                              value="{{$datas[0]->namaprojek}}"
                              placeholder="Masukkan nama"
                              autofocus
                            />
                            @error('nama')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @endif
                          </div>
                          <div class="mb-3 col-md-12">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Isi deskripsi">{{$datas[0]->deskripsi}}</textarea>
                            @error('deskripsi')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Simpan</button>
                          <button type="reset" class="btn btn-outline-secondary">Batal</button>
                        </div>
                      </form>
                    </div>
                    <!-- /Account -->
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
