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
                    <h1 class="h4 text-gray-900 mb-4">Edit Profile</h1>
                  </div>

      <form action = "{{ route('update.profile') }}" method = "post" class="user">
         @csrf
        <div class="form-group">
            
            <input type = "hidden" value = "{{ Auth::User()->id }}" name = "user_id">

          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Name<code>*</code></label>
         <input type="text" class="form-control" id="exampleInputFirstName" value = "{{ Auth::User()->name }}" name = "user_name" required>
             
            </div>


          
            
          </div>
         
        </div>
        
        
        <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Email<code>*</code></label>
         <input type="email" class="form-control" id="exampleInputFirstName" value = "{{ Auth::User()->email }}" name = "user_email" required>
             
            </div>


          
            
          </div>
         
        </div>
        
        
        <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Contact Number<code>*</code></label>
         <input type="text" class="form-control" id="exampleInputFirstName" value = "{{ Auth::User()->phone }}" name = "user_phone" required>
             
            </div>


          
            
          </div>
         
        </div>
        
       
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Update Profile</button>
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