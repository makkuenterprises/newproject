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
                    <h1 class="h4 text-gray-900 mb-4">Edit Product</h1>
                  </div>

      <form action = "{{ url('update/product/'.$product->id) }}" method = "post" class="user"  enctype="multipart/form-data">
         @csrf
        <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Product Name<code>*</code></label>
         <input type="text" class="form-control @error('product_name') is-invalid @enderror"  value="{{ $product->product_name }}" id="exampleInputFirstName" placeholder="Enter Your Product Name" name = "product_name">
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
  <select class="form-control @error('category_id') is-invalid @enderror"  name = "category_id">
      <option label="Choose Category"></option>
             @foreach($category as $row)
          
                     <option value="{{ $row->id }}" <?php if($row->id == $product->category_id) echo 'selected'; ?>> {{ $row->category_name }} </option>
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
         <input type="text" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}" id="exampleInputFirstName" placeholder="Enter Your Product Price" name = "price">
         @error('price')
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
              <label for="exampleFormControlSelect1">Product Discount(%)</label>
         <input type="text" class="form-control"  id="exampleInputFirstName" value = "{{ $product->discount_price }}" placeholder="Enter Your Product Discount In Percentage" name = "discount_price">
        
            </div>

            
          </div>
        </div>
        
        
 <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Product Size<code>*</code></label>
         <input type="text" class="form-control @error('product_size') is-invalid @enderror" value="{{ $product->product_size }}" id="exampleInputFirstName" placeholder="Enter Your Product Size" name = "product_size">
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
                 <label for="exampleFormControlSelect1">Is Prescription Required?<code>*</code></label>
         <input type="checkbox" name = "prescription_required" value = "1" <?php if($product->prescription_required == 1) echo 'checked'; ?>>
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
              <label for="exampleInputEmail1">Product Image</label>
              <img src="{{ URL::to($product->product_thumbnail) }}" width = "70px" height="80px">
              <input type="hidden" name="old_logo" value = "{{ $product->product_thumbnail }}">
             
            </div>
        
        
        
        
        
        <div class="form-group">

          <div class="form-row">
            <div class="col-md-12">
              <label for="exampleFormControlSelect1">Product Description<code>*</code></label>
              <textarea id="summernote" class = "form-control @error('product_description') is-invalid @enderror" value="{{ old('product_description') }}"  name = "product_description">
                  {!!  $product->product_description !!}
              </textarea>
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