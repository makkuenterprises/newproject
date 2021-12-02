@extends('admin.admin_layout')

@section('admin_contents')




        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <!--<div class="d-sm-flex align-items-center justify-content-between mb-4">-->
          <!--  <h1 class="h3 mb-0 text-gray-800">PRODUCTS</h1>-->
          <!--  <ol class="breadcrumb">-->
          <!--     <a href = "{{ route('list.product') }}" class = "btn btn-primary" style = "float: right;"> Back To Product List </a>-->
          <!--  </ol>-->
          <!--</div>-->

          <div class="row">
              
          
            <div class="col-lg-6" style = "margin-top:68px;">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between text-center">
                  <h6 class="m-0 font-weight-bold text-primary text-center"><u>Customer Details</u></h6>
                </div>
                <div class = "container">
                <div class = "row">
                    <div class = "col-lg-12">
                        <label> <strong> Customer Name :  </strong> <span class="badge badge-success"> {{ $test->name }} </span> </label>
                     </div>
                      <div class = "col-lg-12 mt-3">
                          <label> <strong> Email : </strong> <span class="badge badge-warning"> {{ $test->email }}  </span> </label>
                     </div> 
                     <div class = "col-lg-12 mt-3">
                        <label> <strong> Contact No : </strong> <span class="badge badge-primary"> {{ $test->phone }} </span> </label>
                     </div>
                      <div class = "col-lg-12 mt-3">
                        
                          
                     </div>
                      <div class = "col-lg-12 mt-3">
                        <label> <strong> Total Amount (Refunded) : </strong> <b> Rs. {{ $test->amount }} </b>   </label>
                     </div>
                      <div class = "col-lg-12 mt-3">
                        <label> <strong> Shipping Charge : </strong> {{ $test->shipping_charge }}   </label>
                     </div>
                     
                </div>
                </div>
              </div>
            </div>
            
             <div class="col-lg-6" style = "margin-top:68px;">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between text-center">
                  <h6 class="m-0 font-weight-bold text-primary text-center"><u>Bank Details</u></h6>
                </div>
                <div class = "container">
                <div class = "row">
                    <div class = "col-lg-12">
                        <label> <strong> Account Holder Name :  </strong> {{ $test->accn_holder_name }}  </label>
                     </div>
                      <div class = "col-lg-12 mt-3">
                          <label> <strong> Bank Name : </strong> {{ $test->bank_name }}  </label>
                     </div> 
                     <div class = "col-lg-12 mt-3">
                        <label> <strong> IFSC Code : </strong>  {{ $test->ifsc_code }}  </label>
                     </div>
                      <div class = "col-lg-12 mt-3">
                        
                          
                     </div>
                      <div class = "col-lg-12 mt-3">
                        <label> <strong> Account Number : </strong> <b> {{ $test->account_no }} </b>   </label>
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
     