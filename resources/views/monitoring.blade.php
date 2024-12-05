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
                  <h5 class="fw-bold">Tabel Monitoring</h5>
                </div>
                <form>
                  <div style="padding-left:25px" class="col-xl-12">
                    <div class="mb-3 row">
                      <label style="padding-right:10px" class="col-sm-2 col-form-label">Tanggal</label>
                      <div class="col-sm-2">
                        <input name="tgl" class="form-control tgl" type="date"
                        value="<?php echo date('Y-m-d',strtotime($date)) ?>"/>
                      </div>
                    </div>
                  </div>
                </form>
                <div class="table-responsive text-nowrap">
                  <table class="table" id="tblmonitoring">
                    <thead>
                      <tr>
                        <th>Nama</th>
                        <th>Kehadiran</th>
                        <th>Tanggal</th>
                        <th>Jabatan</th>
                        <th>Project</th>
                        <!-- <th>Keterangan</th> -->
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                      @foreach($datas as $d)
                      <tr>
                        <td>{{$d->name}}</td>
                        @if($d->kehadiran == 'Hadir')
                          <td><span class="badge bg-label-success me-1">Hadir</span></td>
                        @else
                          <td><span class="badge bg-label-danger me-1">Tidak Hadir</span></td>
                        @endif
                        <td>{{$d->tgl}}</td>
                        <td>{{$d->jabatan}}</td>
                        <td>{{$d->projek}}</td>
                        <!-- <td>{{$d->keterangan}}</td> -->
                        <td>
                          <a href="{{ route('detailabsen', ['id'=>$d->id]) }}"
                            ><i class="bx bx-show-alt me-2 text-warning"></i></a
                          >
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
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
  new DataTable('#tblmonitoring');

  $('.tgl').change(function(){
    var thisDate = $(this).val();
    $.ajax({
      url: '/monitoring',
      type: 'GET',
      data: {tgl: thisDate},
      success: function(data)
      {
          console.log(data);
      },
          error: function(data)
      {
          console.log(data);
      }
    });
  });
</script>