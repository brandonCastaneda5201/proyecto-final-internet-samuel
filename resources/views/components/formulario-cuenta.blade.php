<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $titulo }}</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset("purpleAdmin/vendors/mdi/css/materialdesignicons.min.css") }}">
    <link rel="stylesheet" href="{{ asset("purpleAdmin/vendors/ti-icons/css/themify-icons.css") }}">
    <link rel="stylesheet" href="{{ asset("purpleAdmin/vendors/css/vendor.bundle.base.css") }}">
    <link rel="stylesheet" href="{{ asset("purpleAdmin/vendors/font-awesome/css/font-awesome.min.css") }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset("purpleAdmin/css/style.css") }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset("images/favicon.png") }}" />
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                {{ $slot }}
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset("purpleAdmin/vendors/js/vendor.bundle.base.js") }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset("purpleAdmin/js/off-canvas.js") }}"></script>
    <script src="{{asset("purpleAdmin/js/misc.js") }}"></script>
    <script src="{{asset("purpleAdmin/js/settings.js") }}"></script>
    <script src="{{asset("purpleAdmin/js/todolist.js") }} "></script>
    <script src="{{asset("purpleAdmin/js/jquery.cookie.js") }} "></script>
    <!-- endinject -->
  </body>
</html>