<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    NebllzCoffee Cashier | Register
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="/assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-gray-200">
  <div class="container position-sticky z-index-sticky top-0">
    <div class="row">
      <div class="col-12">
        <!-- Navbar -->

        <!-- End Navbar -->
      </div>
    </div>
  </div>
  <main class="main-content  mt-0" style="color:black;">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('/assets/img/bg2.jpg');">
      <span class="mask opacity-6"></span>
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-4 col-md-8 col-12 mx-auto">
            <div class="card z-index-0 fadeIn3 fadeInBottom" style="background-color: rgba(255, 255, 255, 0.8)">
              <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-danger shadow-primary border-radius-lg py-3 pe-1">
                  <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Register</h4>

                </div>
              </div>

              <div class="d-flex justify-content-center mt-4">
                <img src="/assets/img/logo.png" alt="NebllzCoffee Logo" class="navbar-brand-img rounded-circle" style="width: 150px; height: auto;">
              </div> 

              <div class="card-body">
                <form role="form" class="text-start" method="post" action="/actionregister" autocomplete="off">
                  @csrf
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label ">Nama</label>
                    <input type="text" name="name" class="form-control">
                  </div>
                  <div class="input-group input-group-outline my-3">
                    <label class="form-label ">Email</label>
                    <input type="email" name="email" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                  </div>
                  <div class="input-group input-group-outline mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" name="Cpassword" class="form-control">
                  </div>
                  <div class="text-center">
                    <button type="submit" class="btn bg-gradient-danger w-100 my-4 mb-2">Sign up</button>
                  </div>
                </form>
                  <p class="mt-3 text-sm text-center">
                    Already have an account?
                    <a href="/" class="text-primary text-gradient font-weight-bold">Sign in</a>
                  </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <!--   Core JS Files   -->
  <script src="/assets/js/core/popper.min.js"></script>
  <script src="/assets/js/core/bootstrap.min.js"></script>
  <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="/assets/js/material-dashboard.min.js?v=3.1.0"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</form>
</main>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    </body>
</html>

@if (session('succes'))

<script>
  Swal.fire({
  title: "Berhasil!",
  text: "{{ session('succes') }}",
  icon: "success"
});
</script>
@elseif (session('gagal'))
<script>
      Swal.fire({
        title: "Terjadi Masalah!",
        text: "{{session('gagal')}}",
        icon: "error"
        });
</script>
@endif