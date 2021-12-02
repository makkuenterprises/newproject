@extends('admin.admin_layout')

@section('admin_contents')

<div class = "container">

 <div class="row">
  <a href="{{ route('admin.category') }}" class="btn btn-primary">All Category </a>
   
 </div>



    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Category</h1>
                  </div>
                        
                        <form method="post" action = "{{ route('category.store') }}" enctype = "multipart/form-data">
              	@csrf
              <div class="modal-body pd-20">
               
              		
					  <div class="form-group">
					    <label for="exampleInputEmail1">Category Name</label>
					    <input type="text" class="form-control @error('category_name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name = "category_name" placeholder="Enter Category Name">
					    @error('category_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
					  </div>
					  
					   <div class="form-group">
					    <label for="exampleInputEmail1">Tag Name</label>
					    <input type="text" class="form-control @error('category_alt') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name = "category_alt" placeholder="Enter Tag Name">
					    @error('category_alt')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
					  </div>
					  
					  <div class="form-group">
					    <label for="exampleInputEmail1">Image</label>
					    <input type="file" class="form-control @error('category_thumbnail') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name = "category_thumbnail">
					    @error('category_thumbnail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        
					  </div>
					 
					 
					


              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
               
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