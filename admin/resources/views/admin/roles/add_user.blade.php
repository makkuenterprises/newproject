@extends('admin.admin_layout')

@section('admin_contents')

<div class = "container">

 <div class="row">
  <a href="" class="btn btn-primary">All Users </a>
   
 </div>



    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Users</h1>
                  </div>
                        
                        
          <form method = "post" action = "{{ route('admin.user.store') }}">
            @csrf
          <div class="form-layout">
            <div class="row mg-b-25">
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Name: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="name"  placeholder="Enter Name">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Phone: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="phone"  placeholder="Enter Contact No">
                </div>
              </div><!-- col-4 -->
              <div class="col-lg-6">
                <div class="form-group">
                  <label class="form-control-label">Email: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="email" name="email"  placeholder="Enter Email">
                </div>
              </div><!-- col-4 -->
             
              <div class="col-lg-6">
                <div class="form-group mg-b-10-force">
                  <label class="form-control-label">Password: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="password" name="password"  placeholder="Enter Password">
                </div>
              </div><!-- col-4 -->

              


            </div><!-- row -->

            <hr> <br> <br>

            <div class = "row">
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name = "category" value = "1">
                  <span>Category</span>
                </label>
              </div>

               <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name = "users" value = "1">
                  <span>Users</span>
                </label>
              </div>

               <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name = "products" value = "1">
                  <span>Products</span>
                </label>
              </div>

               <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name = "banners" value = "1">
                  <span>Banners</span>
                </label>
              </div>

               <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name = "orders" value = "1">
                  <span>Orders</span>
                </label>
              </div>

                <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name = "reports" value = "1">
                  <span>Reports</span>
                </label>
              </div>


               <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name = "roles" value = "1">
                  <span>Roles</span>
                </label>
              </div>
              
              <div class="col-lg-4">
                <label class="ckbox">
                  <input type="checkbox" name = "return_orders" value = "1">
                  <span>Return Orders</span>
                </label>
              </div>

            </div> <br> <br>

           
            </div><!-- row -->

            <div class="form-layout-footer">
              <button type = "submit" class="btn btn-info mg-r-5">Submit Form</button>
              
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
        </form>
                        
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!--</div>-->
  
  <script>
  
  $(document).ready(function() {
  $('#summernote').summernote();
});
  
  </script>
  
  @endsection