@extends('admin.admin_layout')

@section('admin_contents')




        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> View Orders </h1>
           
          </div>

          <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header"><strong>Orders</strong> Details</div>
                <div class = "card-body">
                <table class = "table">
                	<tr>
                		<th> Name: </th>
                		<td>   </td>
                	</tr>
                	<tr>
                		<th> Phone: </th>
                		<td>   </td>
                	</tr>
                	<tr>
                		<th> Payment Type: </th>
                	
                		    <td> <span class = "badge badge-info"> Cash Mode </span>  </td>
                		
                	
                	</tr>
                	<tr>
                		<th> Payment ID: </th>
                	
                		  <td>  <span class = "badge badge-warning"> Null </span> </td>
                		
                	    
                	</tr>
                	<tr>
                		<th> Total: </th>
                		<td> &#x20b9;   </td>
                	</tr>
                	<tr>
                		<th> Month: </th>
                		<td>  </td>
                	</tr>
                	<tr>
                		<th> Date: </th>
                		<td>  </td>
                	</tr>
                </table>
            </div>
            </div>
        </div>

       <div class="col-md-6 mt-4">
            <div class="card">
                <div class="card-header"><strong>Shipping</strong> Details</div>
                <div class = "card-body">
                <table class = "table">
                	<tr>
                		<th> Name: </th>
                		<td>  </td>
                	</tr>
                	<tr>
                		<th> Phone: </th>
                		<td>   </td>
                	</tr>
                	<tr>
                		<th> Email: </th>
                		<td>  </td>
                	</tr>
                	<tr>
                		<th> Status: </th>
                	
                		 <td> <span class = "badge badge-warning"> Pending  </span> </td>
                		
                	</tr>
                	<tr>
                		<th> Address: </th>
                		<th class = "text-success">
                		
                		    
                		    
                		</th>
                	</tr>
                	
                </table>
            </div>
            </div>
        </div>

    </div>

          <!--Row-->
          
          
           <div class = "row mt-4">

    	<div class="card pd-20 pd-sm-40 col-sm-12">
         

          <div class="table-wrapper">
            <table  class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">Sr No</th>
                  <th class="wd-15p">Product Name</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-15p">Product Size</th>  
                  <th class="wd-20p">Quantity</th>
                  <th class="wd-20p">Unit Price</th>
                  <th class="wd-20p">Total</th>
                </tr>
              </thead>
              <tbody>
                 
                <tr>
                	
                  <td>  </td>
                  <td>   </td>
                   <td><img src = "" height = "70px" width = "60px"></td>
                  
                  <td>   </td>
                 
                  <td>  </td>
                 
                  <td> &#x20b9;   </td>
                  <td>  &#x20b9;  </td>
                  
                </tr>
             
                
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->


    </div>
    
    <br>
    
    
    
   
   

          
        </div>
        <!---Container Fluid-->
        
        
         
        
        
        @endsection
     