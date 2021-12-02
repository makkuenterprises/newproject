@extends('admin.admin_layout')

@section('admin_contents')




        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">PRODUCTS</h1>
            <ol class="breadcrumb">
               <a href = "{{ route('list.product') }}" class = "btn btn-primary" style = "float: right;"> Back To Product List </a>
            </ol>
          </div>

          <div class="row">
              
            <div class = "col-lg-4 mt-5">
                <label> <strong> Product Image : </strong> </label> <br>
                <img src = "{{ $product->product_thumbnail }}" width = "250px" height = "250px">
            </div>  
           
            <div class="col-lg-8" style = "margin-top:68px;">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between text-center">
                  <h6 class="m-0 font-weight-bold text-primary text-center"><u>Product Details</u></h6>
                </div>
                <div class = "container">
                <div class = "row">
                    <div class = "col-lg-12">
                        <label> <strong> Product Name :  </strong> <span class="badge badge-success"> {{ $product->product_name }} </span> </label>
                     </div>
                      <div class = "col-lg-12 mt-3">
                          <label> <strong> Category Name : </strong> <span class="badge badge-warning"> {{ $product->category_name }} </span> </label>
                     </div> 
                     <div class = "col-lg-12 mt-3">
                        <label> <strong> Product Price : </strong> <span class="badge badge-primary"> Rs. {{ $product->price }} </span> </label>
                     </div>
                      <div class = "col-lg-12 mt-3">
                          @if($product->discount_price == NULL)
                          <label> <strong> Product Discount Price : </strong> <span class="badge badge-danger"> No Discount </span> </label>
                          @else
                           <label> <strong> Product Discount Price : </strong> <span class="badge badge-danger"> {{ $product->discount_price }} % </span> </label>
                          @endif
                          
                     </div>
                      <div class = "col-lg-12 mt-3">
                        <label> <strong> Product Size : </strong> <span class="badge badge-secondary"> {{ $product->product_size }} </span>  </label>
                     </div>
                      <div class = "col-lg-12 mt-3">
                        <label> <strong> Product Description : </strong>  {!! $product->product_description !!}   </label>
                     </div>
                     
                </div>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          
        </div>
        <!---Container Fluid-->
        
        
         
        
        
        @endsection
     