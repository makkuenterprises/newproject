@extends('admin.admin_layout')

@section('admin_contents')

<div class = "container">

 <div class="row">
  <a href="{{ route('list.product') }}" class="btn btn-primary">All Product </a>
   
 </div>



    <div class="row justify-content-center">
      <div class="col-xl-12 col-lg-12 col-md-12">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Add Product</h1>
                  </div>

      <form method = "post" action = "{{ route('insert.product') }}"  class="user"  enctype="multipart/form-data">
         @csrf
        <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Product Name<code>*</code></label>
         <input type="text" class="form-control @error('product_name') is-invalid @enderror"  value="{{ old('product_name') }}" id="exampleInputFirstName" placeholder="Enter Your Product Name" name = "product_name">
              @error('product_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


          
            
          </div>
         
        </div>
        
       
        
         <div class="form-group">

          <div class="form-row">
          


     <div class="col-md-12">
      <label for="exampleFormControlSelect1">Product Category<code>*</code></label>
  <select class="form-control @error('category_id') is-invalid @enderror"  id="exampleFormControlSelect1" name = "category_id">
      <option label="Choose Category"></option>
    @foreach($categories as $row)
                    <option value="{{ $row->id }}">{{ $row->category_name }}</option>
                    @endforeach
                       
                      </select>   
                        @error('category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
        
            </div> 
            
          </div>
        </div>

       


 <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Product Price<code>*</code></label>
         <input type="text" class="form-control"  id="exampleInputFirstName" placeholder="Enter Your Product Price" name = "price">
         
            </div>

            
          </div>
        </div>
        
        <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Product Discount(%)</label>
         <input type="text" class="form-control  @error('discount_price') is-invalid @enderror"  id="exampleInputFirstName" placeholder="Enter Your Product Discount In Percentage" value="{{ old('discount_price') }}" name = "discount_price">
         @error('discount_price')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            
          </div>
        </div>
        
        
 <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Product Size<code>*</code></label>
         <input type="text" class="form-control @error('product_size') is-invalid @enderror" value="{{ old('product_size') }}" id="exampleInputFirstName" placeholder="Enter Your Product Size" name = "product_size">
         @error('product_size')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            
          </div>
        </div>



         <div class="form-group">

          <div class="form-row">
            <div class="col-md-6">
                 <label for="exampleFormControlSelect1">Is Prescription Required?</label>
         <input type="checkbox" class="" value = "1"  id="exampleInputFirstName"  name = "prescription_required">
          </div>
        </div>
        </div>
        
          <div class="form-group">

          <div class="form-row">
            <div class="col-md-6">
                <label for="exampleInputEmail1">Image</label>
   <input type="file" class="form-control @error('product_thumbnail') is-invalid @enderror"  name = "product_thumbnail">
    
                @error('product_thumbnail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            
           


       
            
          </div>
        </div>
        
        
        
        
        
        <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Product Description<code>*</code></label>
              <textarea id="" class = "form-control @error('product_description') is-invalid @enderror" value="{{ old('product_description') }}" rows = "5" name = "product_description"> </textarea>
          @error('product_description')
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