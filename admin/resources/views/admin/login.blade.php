<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="{{ asset('public/admin/img/logo/logo1.png') }}" rel="icon">
  <title>4med - Dashboard</title>
  <link href="{{ asset('public/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public/admin/css/ruang-admin.min.css') }}" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     
     <link rel="stylesheet" href="sweetalert2.min.css">
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}">  </script> 
</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form  action="{{ route('admin.login') }}" class="user" method="post">
                       @csrf  
                    <div class="form-group">
                      <input id="email" type="email" placeholder = "Enter Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')

                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                      <input id="password" type="password" placeholder = "Enter Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck">Remember
                          Me</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-info btn-block">Sign In</button>
                    </div>
                    <hr>
                    <!--<a href="index.html" class="btn btn-google btn-block">-->
                    <!--  <i class="fab fa-google fa-fw"></i> Login with Google-->
                    <!--</a>-->
                    <!--<a href="index.html" class="btn btn-facebook btn-block">-->
                    <!--  <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook-->
                    <!--</a>-->
                  </form>
                  <hr>
                  <!--<div class="text-center">-->
                  <!--  <a class="font-weight-bold small" href="register.html">Create an Account!</a>-->
                  <!--</div>-->
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  <script src="{{ asset('public/admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('public/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('apublic/dmin/js/ruang-admin.min.js') }}"></script>
  <script src="{{ asset('public/admin/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('public/admin/js/demo/chart-area-demo.js') }}"></script>
   </script>  
   

          <script>  
           $(document).on("click", "#delete", function(e){
               e.preventDefault();
               var link = $(this).attr("href");
                  swal({
                    title: "Are you Want to Delete This Data?",
                    text: "Once Delete, Data Will Be Removed From Here!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                         window.location.href = link;
                    } else {
                      swal("Safe Data!");
                    }
                  });
              });
    </script> 
</body>

</html>