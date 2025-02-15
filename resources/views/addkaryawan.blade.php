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
                    <h5 class="card-header">Data Karyawan</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <form id="formAccountSettings" method="POST" action="savekaryawan" enctype="multipart/form-data">
                        @csrf
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                          <img
                            src="{{asset('img/profiles/profileicon.jpg')}}"
                            alt="user-avatar"
                            class="d-block rounded"
                            height="100"
                            width="100"
                            id="uploadedAvatar"
                          />
                          <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                              <span class="d-none d-sm-block">Upload foto</span>
                              <i class="bx bx-upload d-block d-sm-none"></i>
                              <input
                                type="file"
                                id="upload"
                                name="foto"
                                class="account-file-input"
                                hidden
                                accept="image/png, image/jpeg"
                              />
                            </label>
                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                              <i class="bx bx-reset d-block d-sm-none"></i>
                              <span class="d-none d-sm-block">Reset</span>
                            </button>
                            @error('foto')
                            <br><span class="form-text text-danger">{{ $message }}</span>
                            @endif

                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                          </div>
                        </div><br>
                        <hr class="my-0" />
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="name" class="form-label">name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="name"
                              name="name"
                              placeholder="Masukkan name"
                              autofocus
                            />
                            @error('name')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @endif
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="Masukkan email"/>
                            @error('email')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @endif
                          </div>
                          <div class="mb-3 col-md-6">
                            <label class="form-label" for="phoneNumber">Nomor Telepon</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                id="phoneNumber"
                                name="notelp"
                                class="form-control"
                                placeholder="Masukkan nomor telepon"
                              />
                            </div>
                            @error('notelp')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @endif
                          </div>
                          <div class="mb-3 col-md-6 form-password-toggle">
                            <label class="form-label" for="password">Password</label>
                            <div class="input-group input-group-merge">
                              <input
                                type="password"
                                id="password"
                                class="form-control"
                                name="password"
                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                aria-describedby="password"
                              />
                              <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>  
                            </div>
                            @error('password')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @endif
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Role</label>
                            <select class="form-control" name="role" aria-label="Default select example">
                              <option selected>--Pilih Role--</option>
                              @foreach($role as $r)
                              <option value="{{$r->namarole}}">{{$r->namarole}}</option>
                              @endforeach
                            </select>
                            @error('role')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @endif
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="state" class="form-label">Jabatan</label>
                            <input class="form-control" type="text" id="state" name="jabatan" placeholder="Masukkan divisi" />
                            @error('jabatan')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @endif
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="zipCode" class="form-label">Projek</label>
                            <select class="form-control" name="projek" aria-label="Default select example">
                              <option selected>--Pilih Projek--</option>
                              @foreach($projek as $p)
                              <option value="{{$p->namaprojek}}">{{$p->namaprojek}}</option>
                              @endforeach
                            </select>
                            @error('projek')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @endif
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="address" class="form-label">Alamat</label>
                            <textarea class="form-control" id="address" name="alamat" placeholder="Isi keterangan kehadiran"></textarea>
                            @error('alamat')
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
