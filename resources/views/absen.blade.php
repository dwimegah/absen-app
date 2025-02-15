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
                      <h5 class="fw-bold py-3 mb-0">Absen Form</h5>
                      <!-- <small class="text-muted float-end">Default label</small> -->
                    </div>
                    <div class="card-body">
                      <form method="POST" action="/saveabsen" enctype="multipart/form-data">
                        @csrf  
                        <input name="idkaryawan"value="{{Auth::user()->id}}" hidden>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Absen Masuk</label>
                          <div class="col-sm-5" style="display:{{$absen != null ? 'show' : 'none'}}">
                            @if($absen != null)
                            <img style="margin-left:10px;" src="{{$absen->absenmasuk}}" class="absenmasuk w-px-300 h-auto">
                            @endif
                          </div>
                          <div class="col-sm-5" style="display:{{$absen == null ? 'show' : 'none'}}">
                            <div style="border: 0;" class="form-control" id="my_camera">
                              <input class="form-control" type=button value="Absen Masuk" onClick="openCamMasuk()">
                              @error('absenmasuk')
                                <span class="form-text text-danger">{{ $message }}</span>
                              @endif
                            </div>
                          </div>
                          <div class="row mb-3 showAbsenMasuk" style="display:none;">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-5" style="display:{{$absen == null ? 'show' : 'none'}}">
                              <input style="margin-top:10px;margin-left:20px;" class="form-control" type=button value="Ambil Gambar" onClick="take_snapshot()">
                              <input style="margin-top:10px;margin-left:20px;" class="form-control" type=button value="Ulang" onClick="retake()">
                              <input type="text" hidden name="absenmasuk" id="absenmasuk" class="absenmasuk w-px-300 h-auto">
                            </div>
                          </div>
                          <div class="col-md-4">
                            <!-- <div style="border: 0;" class="form-control col-md-4" id="results">Your captured image will appear here...</div> -->
                          </div>
                        </div>

                        @if($absen != null && $pulang != null)
                        <div class="row mb-3" style="display:{{$absen != null ? 'show' : 'none'}}">
                          <input type="text" value="{{$absen->id}}" name="id" hidden>
                          <input type="text" value="{{$absen->absenmasuk}}" name="absenmasuk" hidden>
                          <label class="col-sm-2 col-form-label">Absen Pulang</label>
                          <div class="col-sm-5">
                            <img style="margin-left:10px;" src="{{$absen->absenpulang}}" class="absenmasuk w-px-300 h-auto">
                          </div>
                          <div class="col-md-4">
                            <!-- <div style="border: 0;" class="form-control col-md-4" id="results">Your captured image will appear here...</div> -->
                          </div>
                        </div>
                        @endif
                        
                        @if($absen != null && $pulang == null)
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Absen Pulang</label>
                          <div class="col-sm-5">
                            <input type="text" value="{{$absen->id}}" name="id" hidden>
                            <input type="text" value="{{$absen->absenmasuk}}" name="absenmasuk" hidden>
                            <div style="border: 0;" class="form-control" style="width:300px;height:300px;" id="my_camera2"></div>
                            <input style="margin-left:10px;" class="form-control btnCamPulang" type=button value="Absen Pulang" onClick="openCamPulang()">
                            <input style="margin-top:10px;margin-left:10px;" hidden class="form-control" id="btnTakePulang" type=button value="Ambil Gambar" onClick="take_snapshot2()">
                            <input style="margin-top:10px;margin-left:10px;" hidden class="form-control" id="btnRetakePulang" type=button value="Ulang" onClick="retake2()">
                            <input type="text" hidden name="absenpulang" id="absenpulang" class="absenpulang w-px-300 h-auto">
                          </div>
                          <div class="col-md-4">
                            <!-- <div style="border: 0;" class="form-control col-md-4" id="results">Your captured image will appear here...</div> -->
                          </div>
                        </div>
                        @endif

                        @if($absen != null)
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Keterangan</label>
                          <div class="col-sm-10">
                            <textarea
                              <?php echo $absen->jampulang != null ? 'disabled': ''?>
                              style="margin-left:10px;"
                              class="form-control"
                              name="keterangan"
                              id="keterangan"
                              rows="4"
                            >{{$absen->keterangan}}</textarea>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button style="margin-left:10px;" <?php echo $pulang != null ? 'disabled': ''?> type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                        @endif
                        @if($absen == null)
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Keterangan</label>
                          <div class="col-sm-10">
                            <textarea
                              style="margin-left:10px;"
                              class="form-control"
                              name="keterangan"
                              id="keterangan"
                              rows="4"
                            ></textarea>
                          </div>
                        </div>
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button style="margin-left:10px;" type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                        @endif
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
<script language="JavaScript">
  const absenmasuk = document.getElementById('absenmasuk');
  const absenpulang = document.getElementById('absenpulang'); 
  Webcam.set({
    width: 300,
    height: 220,
    image_format: 'jpeg',
  });

  function openCamMasuk() {
    Webcam.attach( '#my_camera' );
    $(".showAbsenMasuk").show();
  }

  function take_snapshot() {
      Webcam.snap( function(data_uri) {
          $(".absenmasuk").val(data_uri);
          document.getElementById('absenmasuk').value = data_uri;
          document.getElementById('my_camera').innerHTML = '<img src="'+data_uri+'" width="300" height="auto"/>';
      } );
  }
  function retake() {
    Webcam.attach( '#my_camera' );
  }

  function openCamPulang() {
    Webcam.attach( '#my_camera2' );
    $(".btnCamPulang").hide();
    document.getElementById("btnTakePulang").removeAttribute("hidden");
    document.getElementById("btnRetakePulang").removeAttribute("hidden");
  }
  // Webcam.attach( '#my_camera' );
  function take_snapshot2() {
      Webcam.snap( function(data_uri) {
          $(".absenMasuk2").val(data_uri);
          document.getElementById('absenpulang').value = data_uri;
          document.getElementById('my_camera2').innerHTML = '<img src="'+data_uri+'" width="300" height="auto"/>';
          const img = document.querySelector("img");
          img.style.width = "300px"
          img.style.height = "300px"
      } );
  }
  function retake2() {
    Webcam.attach( '#my_camera2' );
  }
</script>