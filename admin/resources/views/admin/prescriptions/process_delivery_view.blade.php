@extends('admin.admin_layout')

@section('admin_contents')




        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> View Orders </h1>
           
          </div>

          <div class="row">
        
       <div class="col-md-12 mt-4">
            <div class="card">
                <div class="card-header text-center"><strong>User</strong> Details</div>
                <div class = "card-body">
                <table class = "table">
                	<tr>
                		<th> Name: </th>
                		<td>  {{ ucwords($orders->name) }}  </td>
                	</tr>
                	<tr>
                		<th> Phone: </th>
                		<td> {{ $orders->phone }}  </td>
                	</tr>
                	<tr>
                		<th> Email: </th>
                		<td> {{ $orders->email }}  </td>
                	</tr>
                	<tr>
                		<th> Status: </th>
                	
                		<td>	<span class = "badge badge-success"> Order Initiate </span> </td>
                		
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
                 
                  <th class="wd-15p">Product Name</th>
                   <th class="wd-15p">Product Price</th>
                  <th class="wd-20p">Total</th>
                </tr>
              </thead>
              <tbody>
              
                <tr>
                	
                 
                  <td>  
                  
                    <?php
                    
                     $total_allowance = 0;
                    
                     $allowances = json_decode($orders->product_name);
                     //dd($allowances);
                     $i=1;
                     foreach ($allowances as $key => $allowance){
                            echo  '<span class = "font-weight-bold">' . $i++ . '</span>' . '&nbsp &nbsp' . '<span style = "font-size:20px;">' .  ucwords($allowance->name). '</span>' . '<br> <br>'; 
                     }
                    ?>
                 
                  </td>
                  <td>
                      
                       <?php
                    
                     $total_allowance = 0;
                    
                     $allowances = json_decode($orders->product_name);
                     //dd($allowances);
                     $i=1;
                     foreach ($allowances as $key => $allowance){
                             echo  '<span class = "font-weight-bold">' . $i++ . '</span>' . '&nbsp &nbsp' . '<span style = "font-size:20px;">' . '&#8377; ' .$allowance->price. '</span>' . '<br> <br>'; 
                     }
                    ?>
                      
                      
                  </td>
                   <td>
                      &#8377; {{ $orders->total }}
                   </td>
                  
                  <td>   </td>
                 
                 
                  
                </tr>
             
                
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->


    </div>
    
    <br>
    
    
   
    <div class = "text-center">
    @if($orders->verified == 2)
     <a href = "{{ URL::to('prescription/order/shipped/'.$orders->prescription_id ) }}" class = "btn btn-warning btn-block"> Shipped Order </a>
    @elseif($orders->verified == 3)
    <a href = "{{ URL::to('prescription/order/delivered/'.$orders->prescription_id ) }}" class = "btn btn-success btn-block"> Delivered </a>
     @else
    <div class = "text-center">
     <strong class = "badge badge-success text-center" style = "font-size:20px;"> Product Deleivered!! </strong>
    </div>
    @endif
   
    </div>
   
   
   
   

          
        </div>
        <!---Container Fluid-->
        
        
         
        
        
        @endsection
     