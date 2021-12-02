@extends('admin.admin_layout')

@section('admin_contents')


<div class = "container">




    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Change Password</h1>
                  </div>

      <form action = "{{ route('update.password') }}" method = "post" class="user">
         @csrf
        <div class="form-group">
            
           
          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Old Password<code>*</code></label>
         <input type="password" class="form-control" id="exampleInputFirstName"  name = "oldpass" required>
             
            </div>


          
            
          </div>
         
        </div>
        
        
        <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">New Password<code>*</code></label>
         <input type="password" class="form-control" id="exampleInputFirstName" name = "password" required>
             
            </div>


          
            
          </div>
         
        </div>
        
        
        <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Confirm Password<code>*</code></label>
         <input type="password" class="form-control" id="exampleInputFirstName"  name = "confirm_password" required>
             
            </div>


          
            
          </div>
         
        </div>
        
       
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Update Password</button>
        </div>
        
      </form>
                  <hr>
                  <div class="text-center">
  
  
                  </div>
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
  
  
  
  
  
  <script>
  
  $(document).ready(function() {
  $('#summernote').summernote();
});
  
  </script>
  
  @endsection