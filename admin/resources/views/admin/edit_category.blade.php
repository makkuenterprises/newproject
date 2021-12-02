@extends('admin.admin_layout')

@section('admin_contents')




        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">CATEGORY</h1>
            
          </div>

          <div class="row">
            <div class="col-lg-12">
              
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Edit Category</h6>
                </div>
                <div class="card-body">
                 <form method="post" action = "{{ url('update/category/'.$category->id) }}" enctype="multipart/form-data">
                     @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category Name</label>
                      <input type="category_name" class="form-control @error('category_name') is-invalid @enderror" name = "category_name" value = "{{ $category->category_name }}" id="exampleInputEmail1" aria-describedby="emailHelp"
                        placeholder="Enter Category Name">
                         @error('category_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Tag Name</label>
                      <input type="text" class="form-control @error('category_alt') is-invalid @enderror" name = "category_alt" value = "{{ $category->category_alt }}" id="exampleInputPassword1" placeholder="Tag Name">
                        @error('category_alt')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                    </div>
                    <div class="form-group">
                      <div class="custom-file">
                        <input type="file" name = "category_thumbnail" class="custom-file-input  @error('category_thumbnail') is-invalid @enderror" id="customFile">
                         @error('category_thumbnail')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <label class="custom-file-label" for="customFile">Choose file</label>
                      </div>
                    </div>
                    
                     <div class="form-group">
                      <label for="exampleInputEmail1">Category Image</label>
                      <img src="{{ URL::to($category->category_thumbnail) }}" width = "70px" height="80px">
                      <input type="hidden" name="old_logo" value = "{{ $category->category_thumbnail }}">
                    </div>
                   
                    <button type="submit" class="btn btn-primary">Update</button>
                  </form>
                </div>
              </div>

             
              
            </div>

            
          </div>
          <!--Row-->

          <!-- Documentation Link -->
          <div class="row">
            <div class="col-lg-12 text-center">
              <p>For more documentations you can visit<a href="https://getbootstrap.com/docs/4.3/components/forms/"
                  target="_blank">
                  bootstrap forms documentations.</a> and <a
                  href="https://getbootstrap.com/docs/4.3/components/input-group/" target="_blank">bootstrap input
                  groups documentations</a></p>
            </div>
          </div>

        </div>
        <!---Container Fluid-->
        
        
         <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold text-center">Add Category</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
<!--              @if ($errors->any())-->
<!--    <div class="alert alert-danger">-->
<!--        <ul>-->
<!--            @foreach ($errors->all() as $error)-->
<!--                <li>{{ $error }}</li>-->
<!--            @endforeach-->
<!--        </ul>-->
<!--    </div>-->
<!--@endif-->
              <form method="post" action = "{{ route('category.store') }}" enctype = "multipart/form-data">
              	@csrf
              <div class="modal-body pd-20">
               
              		
					  <div class="form-group">
					    <label for="exampleInputEmail1">Category Name</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "category_name" placeholder="Enter Category Name">
					   
					  </div>
					  
					   <div class="form-group">
					    <label for="exampleInputEmail1">Tag Name</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "category_alt" placeholder="Enter Category Name">
					   
					  </div>
					  
					  <div class="form-group">
					    <label for="exampleInputEmail1">Image</label>
					    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "category_thumbnail">
					   
					  </div>
					 
					 
					


              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <!--<button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>-->
              </div>
          </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
        
        
        @endsection
     