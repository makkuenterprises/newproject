@extends('admin.admin_layout')

@section('admin_contents')

<div class = "container">

 <div class="row">
  <a href="{{ route('list.banner') }}" class="btn btn-primary">All Banners </a>
   
 </div>



    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Banner</h1>
                  </div>

      <form action = "{{ route('store.banner') }}" method = "post" class="user"  enctype="multipart/form-data">
         @csrf
        <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Banner Image<code>*</code></label>
         <input type="file" class="form-control @error('thumbnail') is-invalid @enderror @error('thumbnail.*') is-invalid @enderror" name = "thumbnail[]" multiple="" id="exampleInputFirstName">
              @error('thumbnail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                 @error('thumbnail.*')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


          
            
          </div>
         
        </div>
        
 
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
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