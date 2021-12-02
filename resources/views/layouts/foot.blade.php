            <!-- All JS is here
============================================ -->

    <script src="{{asset('assets/js/vendor/modernizr-3.6.0.min.js')}}"></script>
    <!--<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>-->
    <!--<script src="{{asset('assets/js/vendor/jquery-3.5.1.min.js')}}"></script>-->
<!--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<!--<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>-->
    <script src="{{asset('assets/js/vendor/jquery-migrate-3.3.0.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/slick.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.syotimer.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.instagramfeed.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('assets/js/plugins/wow.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-ui-touch-punch.js')}}"></script>
    <script src="{{asset('assets/js/plugins/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/js/plugins/magnific-popup.js')}}"></script>
    <script src="{{asset('assets/js/plugins/sticky-sidebar.js')}}"></script>
    <script src="{{asset('assets/js/plugins/easyzoom.js')}}"></script>
    <script src="{{asset('assets/js/plugins/scrollup.js')}}"></script>
    <!--<script src="{{asset('assets/js/plugins/ajax-mail.js')}}"></script>-->
    
    <script src="{{asset('assets/js/dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/js/dataTables/dataTables.bootstrap.js')}}"></script>
    
<!--  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>-->
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>-->
<!--<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.23/af-2.3.5/b-1.6.5/b-colvis-1.6.5/b-flash-1.6.5/b-html5-1.6.5/b-print-1.6.5/cr-1.5.3/fc-3.3.2/fh-3.1.7/kt-2.5.3/r-2.2.7/rg-1.1.2/rr-1.2.7/sc-2.0.3/sb-1.0.1/sp-1.2.2/sl-1.3.1/datatables.min.js"></script>-->



    <!-- Use the minified version files listed below for better performance and remove the files listed above  
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>  -->

  
    <!-- Main JS -->
    <script src="{{asset('assets/js/main.js')}}"></script>
    
   
     

    
  
    
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
                    title: "Are you Want to Logout?",
                    text: "Once Logout, You Will Be Redirected To Home Page!",
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
    
     <script>  
           $(document).on("click", "#return", function(e){
               e.preventDefault();
               //var link = $(this).attr("href");
                  swal({
                    title: "Are you Want to Return This Product?",
                    text: "Once Return, Return Process Initiated!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                        $t = $(this).serialize();
                        $(this).submit();
                         //window.location.href = link;
                    } else {
                      swal("Return Not Accepted!");
                    }
                  });
              });
    </script> 
    
    <script>  
           $(document).on("click", "#cancel", function(e){
               e.preventDefault();
               var link = $(this).attr("href");
                  swal({
                    title: "Are you Want to Cancel This Product?",
                    text: "Once Cancel, Cancel Process Initiated!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                         window.location.href = link;
                    } else {
                      swal("Cancel Not Accepted!");
                    }
                  });
              });
    </script> 
     