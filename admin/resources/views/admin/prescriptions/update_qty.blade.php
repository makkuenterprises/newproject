@extends('admin.admin_layout')

@section('admin_contents')




        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <!--<div class="d-sm-flex align-items-center justify-content-between mb-4">-->
          <!--  <h1 class="h3 mb-0 text-gray-800">PRODUCTS</h1>-->
          <!--  <ol class="breadcrumb">-->
          <!--     <a href = "{{ route('add.product') }}" class = "btn btn-primary" style = "float: right;"> Add Product </a>-->
          <!--  </ol>-->
          <!--</div>-->

          <div class="row">
           
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Update Quantity</h6>
                </div>
               <form method="post" action="{{ url('update/cart/'.$carts->product_id) }}">
                @csrf
                 <input type = "number" name = "qty" value = "{{ $carts->qty }}" class = "form-control">
                 <button type = "submit" class = "btn btn-success"> Submit </button>
               </form>
            </div>
          </div>
    

          
        </div>
        <!---Container Fluid-->
        
        
         
        
        
        @endsection
     