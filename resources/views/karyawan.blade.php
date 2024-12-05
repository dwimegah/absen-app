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
              <h4 class="fw-bold py-3 mb-4">
                Data Karyawan
              </h4>
              <!-- Basic Bootstrap Table -->
              <div class="card">
                <!-- <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="fw-bold py-3 mb-0">Data Karyawan</h5>
                </div> -->
                <div class="col" style="padding:15px;padding-top:25px;">
                  <a type="button" class="btn btn-primary" href="addkaryawan">Tambah (+)</a>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table" id="example">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Project</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach($datas as $d)
                      <tr>
                        <td>
                          {{$d->name}}
                        </td>
                        <td>{{$d->jabatan}}</td>
                        <td>Microservice SAKTI</td>
                        <td>
                          <div class="dropdown">
                              <a href="{{ route('editkaryawan', ['id'=>$d->id]) }}"
                                ><i class="bx bx-edit-alt me-2 text-warning"></i></a
                              >
                              <!-- <a  class="btn btn-danger px-5  radius-30" onclick="return confirm('Are you sure you want to Unassign this agent?')" href="{{ route('karyawan', 1) }}" >Unassign</a> -->
                              <a href="javascript:void(0);"
                                data-bs-toggle="modal"
                                data-bs-target="#basicModal"
                                ><i data-delid="{{$d->id}}" class="bx bx-trash me-2 text-danger delete"></i> </a
                              >
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <!--/ Basic Bootstrap Table -->

              <!-- Modal -->
              <div class="modal fade" id="basicModal" data-link="dashboard" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel1">Konfirmasi</h5>
                      <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                      ></button>
                    </div>
                    <form action="{{ route('deletekaryawan') }}" method="post">
                      <div class="modal-body">
                          @csrf
                          @method('DELETE')
                          <input id="id" name="id" hidden>
                          <span>Apakah anda yakin untuk menghapus data?</span>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                          Batal
                        </button>
                        <button type="submit" id="btnYes" class="btn btn-primary">
                          <a></a>Ya</button>
                      </div>
                    </form>
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
<script>
  $(document).on('click','.delete',function(){
    event.preventDefault();
    let id = $(this).data('delid');
    $('#id').val(id);
  });
</script>
<script>
  new DataTable('#example');
</script>