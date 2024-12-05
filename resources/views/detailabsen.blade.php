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
                    <h5 class="card-header">Detail Absen</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" action="/updatekaryawan" enctype="multipart/form-data">
                        @csrf
                        <input id="id" name="id"value="{{$datas[0]->id}}" hidden>
                        <div class="row">
                          <div class="mb-3 col-md-6" style="display:{{$datas[0]->kehadiran == 'Hadir' ? 'show' : 'none'}}">
                            <label class="form-label">Absen Masuk</label><br>
                            <img src="{{ $datas[0]->absenmasuk }}" alt class="w-px-150 h-auto" />
                          </div>
                          <div class="mb-3 col-md-6" style="display:{{$datas[0]->kehadiran == 'Hadir' ? 'show' : 'none'}}">
                            <label class="form-label">Absen Pulang</label><br>
                            <img src="{{ $datas[0]->absenpulang }}" alt class="w-px-150 h-auto" />
                          </div>
                          <div class="mb-3 col-md-6" style="display:{{$datas[0]->kehadiran == 'Hadir' ? 'none' : 'show'}}">
                            <label class="form-label">Media</label><br>
                            <a href="{{ asset('file/ketidakhadiran/'. $datas[0]->media) }}">Lihat media!</a>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="name"
                              name="name"
                              value="{{$datas[0]->name}}"
                              placeholder="Masukkan name"
                              autofocus
                              disabled
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Kehadiran</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                id="phoneNumber"
                                name="kehadiran"
                                class="form-control"
                                value="{{$datas[0]->kehadiran}}"
                                disabled
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6 form-password-toggle">
                            <label class="form-label" for="password">Tanggal</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                id="password"
                                class="form-control"
                                name="tgl"
                                value="{{$datas[0]->tgl}}"
                                disabled
                              />
                            </div>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Jabatan</label>
                            <input class="form-control" type="text" id="state" name="jabatan" value="{{$datas[0]->jabatan}}" disabled />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="zipCode" class="form-label">Projek</label>
                            <input
                              type="text"
                              class="form-control"
                              id="zipCode"
                              name="projek"
                              value="{{$datas[0]->projek}}"
                              placeholder="Masukkan name project"
                              disabled
                            />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="address" name="keterangan" disabled>{{$datas[0]->keterangan}}</textarea>
                          </div>
                        </div>
                        <!-- <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Simpan</button>
                          <button type="reset" class="btn btn-outline-secondary">Batal</button>
                        </div> -->
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
