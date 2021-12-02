<!DOCTYPE html>
<html lang="en">

<head><meta charset="gb18030">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!--<meta http-equiv="Content-Security-Policy" content="block-all-mixed-content">-->
  <!--<meta name="SKYPE_TOOLBAR" content="SKYPE_TOOLBAR_PARSER_COMPATIBLE" />-->
  <link href="{{ asset('public/admin/img/logo/logo1.png') }}" rel="icon">
  <title>4Meds - Dashboard</title>
  <link href="{{ asset('public/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public/admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
  <link href="{{ asset('public/admin/css/ruang-admin.min.css') }}" rel="stylesheet">
  <link href="{{ asset('public/admin/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
 
  
  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
   


  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  


	<link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
     
     <link rel="stylesheet" href="sweetalert2.min.css">
    <!-- include summernote css/js -->
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://use.fontawesome.com/15c09a5021.js"></script>
	
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}">  </script>
         
</head>

<body id="page-top">
    
    @guest
    
    @else
    
  <div id="wrapper">
    <!-- Sidebar -->
   <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon">
          <!--<img src="{{  asset('public/admin/img/logo/logo1.png') }}" style = "height:56px; width:123px;">-->
          4Med Admin Panel
        </div>
        <!--<div class="sidebar-brand-text mx-3">Geetanjali</div>-->
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <!-- <li class="nav-item">-->
      <!--  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap"-->
      <!--    aria-expanded="true" aria-controls="collapseBootstrap">-->
      <!--    <i class="far fa-fw fa-window-maximize"></i>-->
      <!--    <span>Bootstrap UI</span>-->
      <!--  </a>-->
      <!--  <div id="collapseBootstrap" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">-->
      <!--    <div class="bg-white py-2 collapse-inner rounded">-->
      <!--      <h6 class="collapse-header">Bootstrap UI</h6>-->
      <!--      <a class="collapse-item" href="alerts.html">Alerts</a>-->
      <!--      <a class="collapse-item" href="buttons.html">Buttons</a>-->
      <!--      <a class="collapse-item" href="dropdowns.html">Dropdowns</a>-->
      <!--      <a class="collapse-item" href="modals.html">Modals</a>-->
      <!--      <a class="collapse-item" href="popovers.html">Popovers</a>-->
      <!--      <a class="collapse-item" href="progress-bar.html">Progress Bars</a>-->
      <!--    </div>-->
      <!--  </div>-->
      <!--</li> -->
      @if(Auth::user()->category == 1)
       <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.category') }}">
          <i class="fa fa-bars"></i>
          <span>Category</span>
        </a>
      </li>
      @else
      @endif
      
      @if(Auth::user()->users == 1)
       <li class="nav-item">
        <a class="nav-link" href="{{ route('admin.users') }}">
          <i class="fa fa-users"></i>
          <span>Users</span>
        </a>
      </li>
      @else
      @endif
      
       @if(Auth::user()->products == 1)
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fa fa-product-hunt"></i>
          <span>Products</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Products</h6>
            <a class="collapse-item" href="{{ route('add.product') }}">Add Products</a>
            <a class="collapse-item" href="{{ route('list.product') }}">List Products</a>
          </div>
        </div>
      </li>
       @else
       @endif
       
       @if(Auth::user()->banners == 1)
        <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap2"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-camera"></i>
          <span>Banners</span>
        </a>
        <div id="collapseBootstrap2" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href = "{{ route('add.banner') }}">Add Banner</a>
            <a class="collapse-item" href="{{ route('list.banner') }}">List Banner</a>
          </div>
        </div>
      </li>
       @else
       @endif
       
       
      @if(Auth::user()->orders == 1)
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap3"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-book"></i>
          <span>Orders</span>
        </a>
        <div id="collapseBootstrap3" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href = "{{ route('admin.pending.order') }}">New Orders</a>
            <a class="collapse-item" href="{{ route('admin.accept.order') }}">Accept Payment</a>
            <a class="collapse-item" href="{{ route('admin.cancel.order') }}">Cancel Order</a>
            <a class="collapse-item" href="{{ route('admin.process.order') }}">Process Delivery</a>
            <a class="collapse-item" href="{{ route('admin.deleivered.order') }}">Delivery Success</a>
          </div>
        </div>
      </li>
      @else
      @endif
     
      @if(Auth::user()->reports == 1)
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap4"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-bar-chart"></i>
          <span>Reports</span>
        </a>
        <div id="collapseBootstrap4" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href = "{{ route('admin.today.report') }}">Today Orders</a>
            <a class="collapse-item" href="{{ route('admin.delivery.report') }}">Today Delivery</a>
            <a class="collapse-item" href="{{ route('admin.month.report') }}">This Month</a>
            <a class="collapse-item" href="{{ route('admin.search.report') }}">Search Report</a>
          </div>
        </div>
      </li>
      @else
      @endif
      
      @if(Auth::user()->roles == 1)
       <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap5"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-user-plus"></i>
          <span>Admin Roles</span>
        </a>
        <div id="collapseBootstrap5" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href = "{{ route('admin.users.add') }}">Create Users</a>
            <a class="collapse-item" href="{{ route('admin.user.all') }}">All Users</a>
          </div>
        </div>
      </li>
      @else
      @endif
      
      
      @if(Auth::user()->return_orders == 1)
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap6"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-reply-all"></i>
          <span>Return Orders</span>
        </a>
        <div id="collapseBootstrap6" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href = "{{ route('admin.return.requests') }}">Return Requests</a>
            <a class="collapse-item" href="{{ route('admin.request.all') }}">All Requests</a>
          </div>
        </div>
      </li>
      @else
      @endif
      
     
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBootstrap7"
          aria-expanded="true" aria-controls="collapseBootstrap">
          <i class="fa fa-envelope-open"></i>
          <span>Prescription Uploaded</span>
        </a>
        <div id="collapseBootstrap7" class="collapse" aria-labelledby="headingBootstrap" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href = "{{ route('admin.prescription.request') }}">Prescription Requests</a>
            <a class="collapse-item" href="{{ route('admin.prescription.accept') }}">Prescription Accepted</a>
           <!-- <a class="collapse-item" href="{{ route('admin.prescription.process.deleivery') }}">Shipped Order</a>-->
           <!--  <a class="collapse-item" href="{{ route('admin.prescription.final.deleivery') }}">Process Delivery</a>-->
           <!--  <a class="collapse-item" href="{{ route('admin.prescription.success.deleivery') }}">Delivery Success</a>-->
           <!--<a class="collapse-item" href="{{ route('admin.prescription.cancel.order') }}">Cancel Order</a>-->
          </div>
        </div>
      </li>
     
      
       
      
      
      
      <!--<hr class="sidebar-divider">-->
      <!--<div class="sidebar-heading">-->
      <!--  Examples-->
      <!--</div>-->
      <!--<li class="nav-item">-->
      <!--  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"-->
      <!--    aria-controls="collapsePage">-->
      <!--    <i class="fas fa-fw fa-columns"></i>-->
      <!--    <span>Pages</span>-->
      <!--  </a>-->
      <!--  <div id="collapsePage" class="collapse" aria-labelledby="headingPage" data-parent="#accordionSidebar">-->
      <!--    <div class="bg-white py-2 collapse-inner rounded">-->
      <!--      <h6 class="collapse-header">Example Pages</h6>-->
      <!--      <a class="collapse-item" href="">Login</a>-->
      <!--      <a class="collapse-item" href="">Register</a>-->
      <!--       <a class="collapse-item" href="404.html">404 Page</a>-->
      <!--      <a class="collapse-item" href="blank.html">Blank Page</a> -->
      <!--    </div>-->
      <!--  </div>-->
      <!--</li>-->
      
     
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <!--<li class="nav-item dropdown no-arrow">-->
            <!--  <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown"-->
            <!--    aria-haspopup="true" aria-expanded="false">-->
            <!--    <i class="fas fa-search fa-fw"></i>-->
            <!--  </a>-->
            <!--  <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"-->
            <!--    aria-labelledby="searchDropdown">-->
            <!--    <form class="navbar-search">-->
            <!--      <div class="input-group">-->
            <!--        <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?"-->
            <!--          aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">-->
            <!--        <div class="input-group-append">-->
            <!--          <button class="btn btn-primary" type="button">-->
            <!--            <i class="fas fa-search fa-sm"></i>-->
            <!--          </button>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </form>-->
            <!--  </div>-->
            <!--</li>-->
            <!--<li class="nav-item dropdown no-arrow mx-1">-->
            <!--  <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"-->
            <!--    aria-haspopup="true" aria-expanded="false">-->
            <!--    <i class="fas fa-bell fa-fw"></i>-->
            <!--    <span class="badge badge-danger badge-counter">3+</span>-->
            <!--  </a>-->
            <!--  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"-->
            <!--    aria-labelledby="alertsDropdown">-->
            <!--    <h6 class="dropdown-header">-->
            <!--      Alerts Center-->
            <!--    </h6>-->
            <!--    <a class="dropdown-item d-flex align-items-center" href="#">-->
            <!--      <div class="mr-3">-->
            <!--        <div class="icon-circle bg-primary">-->
            <!--          <i class="fas fa-file-alt text-white"></i>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div>-->
            <!--        <div class="small text-gray-500">December 12, 2019</div>-->
            <!--        <span class="font-weight-bold">A new monthly report is ready to download!</span>-->
            <!--      </div>-->
            <!--    </a>-->
            <!--    <a class="dropdown-item d-flex align-items-center" href="#">-->
            <!--      <div class="mr-3">-->
            <!--        <div class="icon-circle bg-success">-->
            <!--          <i class="fas fa-donate text-white"></i>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div>-->
            <!--        <div class="small text-gray-500">December 7, 2019</div>-->
            <!--        $290.29 has been deposited into your account!-->
            <!--      </div>-->
            <!--    </a>-->
            <!--    <a class="dropdown-item d-flex align-items-center" href="#">-->
            <!--      <div class="mr-3">-->
            <!--        <div class="icon-circle bg-warning">-->
            <!--          <i class="fas fa-exclamation-triangle text-white"></i>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--      <div>-->
            <!--        <div class="small text-gray-500">December 2, 2019</div>-->
            <!--        Spending Alert: We've noticed unusually high spending for your account.-->
            <!--      </div>-->
            <!--    </a>-->
            <!--    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>-->
            <!--  </div>-->
            <!--</li>-->
            <!--<li class="nav-item dropdown no-arrow mx-1">-->
            <!--  <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"-->
            <!--    aria-haspopup="true" aria-expanded="false">-->
            <!--    <i class="fas fa-envelope fa-fw"></i>-->
            <!--    <span class="badge badge-warning badge-counter">2</span>-->
            <!--  </a>-->
            <!--  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"-->
            <!--    aria-labelledby="messagesDropdown">-->
            <!--    <h6 class="dropdown-header">-->
            <!--      Message Center-->
            <!--    </h6>-->
            <!--    <a class="dropdown-item d-flex align-items-center" href="#">-->
            <!--      <div class="dropdown-list-image mr-3">-->
            <!--        <img class="rounded-circle" src="img/man.png" style="max-width: 60px" alt="">-->
            <!--        <div class="status-indicator bg-success"></div>-->
            <!--      </div>-->
            <!--      <div class="font-weight-bold">-->
            <!--        <div class="text-truncate">Hi there! I am wondering if you can help me with a problem I've been-->
            <!--          having.</div>-->
            <!--        <div class="small text-gray-500">Udin Cilok 路 58m</div>-->
            <!--      </div>-->
            <!--    </a>-->
            <!--    <a class="dropdown-item d-flex align-items-center" href="#">-->
            <!--      <div class="dropdown-list-image mr-3">-->
            <!--        <img class="rounded-circle" src="img/girl.png" style="max-width: 60px" alt="">-->
            <!--        <div class="status-indicator bg-default"></div>-->
            <!--      </div>-->
            <!--      <div>-->
            <!--        <div class="text-truncate">Am I a good boy? The reason I ask is because someone told me that people-->
            <!--          say this to all dogs, even if they aren't good...</div>-->
            <!--        <div class="small text-gray-500">Jaenab 路 2w</div>-->
            <!--      </div>-->
            <!--    </a>-->
            <!--    <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>-->
            <!--  </div>-->
            <!--</li>-->
            <!--<li class="nav-item dropdown no-arrow mx-1">-->
            <!--  <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown"-->
            <!--    aria-haspopup="true" aria-expanded="false">-->
            <!--    <i class="fas fa-tasks fa-fw"></i>-->
            <!--    <span class="badge badge-success badge-counter">3</span>-->
            <!--  </a>-->
            <!--  <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"-->
            <!--    aria-labelledby="messagesDropdown">-->
            <!--    <h6 class="dropdown-header">-->
            <!--      Task-->
            <!--    </h6>-->
            <!--    <a class="dropdown-item align-items-center" href="#">-->
            <!--      <div class="mb-3">-->
            <!--        <div class="small text-gray-500">Design Button-->
            <!--          <div class="small float-right"><b>50%</b></div>-->
            <!--        </div>-->
            <!--        <div class="progress" style="height: 12px;">-->
            <!--          <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50"-->
            <!--            aria-valuemin="0" aria-valuemax="100"></div>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </a>-->
            <!--    <a class="dropdown-item align-items-center" href="#">-->
            <!--      <div class="mb-3">-->
            <!--        <div class="small text-gray-500">Make Beautiful Transitions-->
            <!--          <div class="small float-right"><b>30%</b></div>-->
            <!--        </div>-->
            <!--        <div class="progress" style="height: 12px;">-->
            <!--          <div class="progress-bar bg-warning" role="progressbar" style="width: 30%" aria-valuenow="30"-->
            <!--            aria-valuemin="0" aria-valuemax="100"></div>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </a>-->
            <!--    <a class="dropdown-item align-items-center" href="#">-->
            <!--      <div class="mb-3">-->
            <!--        <div class="small text-gray-500">Create Pie Chart-->
            <!--          <div class="small float-right"><b>75%</b></div>-->
            <!--        </div>-->
            <!--        <div class="progress" style="height: 12px;">-->
            <!--          <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75"-->
            <!--            aria-valuemin="0" aria-valuemax="100"></div>-->
            <!--        </div>-->
            <!--      </div>-->
            <!--    </a>-->
            <!--    <a class="dropdown-item text-center small text-gray-500" href="#">View All Taks</a>-->
            <!--  </div>-->
            <!--</li>-->
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <!--<img class="img-profile rounded-circle" src="{{ asset('admin/img/boy.png') }}" style="max-width: 60px">-->
                <span class="ml-2 d-none d-lg-inline text-white small">{{ Auth::User()->name }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('admin.profile') }}">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="{{ route('change.password') }}">
                  <i class="fa fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                  Change Password
                </a>
                <!--<a class="dropdown-item" href="#">-->
                <!--  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>-->
                <!--  Settings-->
                <!--</a>-->
                <!--<a class="dropdown-item" href="#">-->
                <!--  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>-->
                <!--  Activity Log-->
                <!--</a>-->
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.logout') }}">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->
        
         @endguest
        
        @yield('admin_contents')
        
        
          </div>
      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://korawanindiaitsolution.com/" target="_blank">Korawan India IT Solution</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
  
  <script src="{{ asset('public/admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('public/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('public/admin/js/ruang-admin.min.js') }}"></script>
  <script src="{{ asset('public/admin/vendor/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('public/admin/js/demo/chart-area-demo.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
   <script src = "https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/min/dropzone.min.css"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
 <script>
    
    $(document).ready(function() {
  $('#summernote').summernote();
});
 
 
 </script>


  <!-- Page level plugins -->
  <script src="{{ asset('public/admin/vendor/datatables/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('public/admin/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

  <!-- Page level custom scripts -->
  <script>
    $(document).ready(function () {
      $('#dataTable').DataTable(); // ID From dataTable 
      $('#dataTableHover').DataTable(); // ID From dataTable with Hover
    });
  </script>
  
  
  
    <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
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