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
                		<td> {{ $orders->name }}  </td>
                	</tr>
                	<tr>
                		<th> Phone: </th>
                		<td> {{ $orders->phone }}  </td>
                	</tr>
                	<tr>
                		<th> Payment Type: </th>
                		@if($orders->payment_type == 'cashon')
                		    <td> <span class = "badge badge-info"> Cash Mode </span>  </td>
                		@else
                		   <td> <span class = "badge badge-success"> Online Mode </span>  </td>
                		@endif
                	
                	</tr>
                	<tr>
                		<th> Payment ID: </th>
                		@if($orders->transaction_id == NULL)
                		  <td>  <span class = "badge badge-warning"> Null </span> </td>
                		@else
                		<td> {{ $orders->transaction_id }}  </td>
                		@endif
                	    
                	</tr>
                	<tr>
                		<th> Total: </th>
                		<td> &#x20b9; {{ $orders->amount }}  </td>
                	</tr>
                	<tr>
                		<th> Month: </th>
                		<td> {{ $orders->month }}  </td>
                	</tr>
                	<tr>
                		<th> Order Date: </th>
                		<td> {{ $orders->date }}  </td>
                	</tr>
                	@if($orders->delivery_date == NULL)
                	
                	@else
                	    <tr>
                		<th> Delivery Date: </th>
                		
                	<td>	{{ date("d-m-Y", strtotime($orders->delivery_date)) }}  </td>
                	</tr>
                	@endif
                	
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
                		<td> {{ $user_info->name }}  </td>
                	</tr>
                	<tr>
                		<th> Phone: </th>
                		<td> {{ $user_info->phone }}  </td>
                	</tr>
                	<tr>
                		<th> Email: </th>
                		<td> {{ $user_info->email }}  </td>
                	</tr>
                	<tr>
                		<th> Status: </th>
                		@if($orders->status == 0)
                		 <td> <span class = "badge badge-warning"> Pending  </span> </td>
                			@elseif($orders->status == 1)
                		 <td>	<span class = "badge badge-info"> Payment Accept </span> </td>
                			@elseif($orders->status == 2)
                		 <td>	<span class = "badge badge-warning"> Progress </span> </td>
                			@elseif($orders->status == 3)
                		 <td>	<span class = "badge badge-success"> Delivered </span> </td>
                			@else
                		<td>	<span class = "badge badge-danger"> Cancel </span> </td>
                			@endif
                	</tr>
                	<tr>
                		<th> Address: </th>
                		<th class = "text-success">
                		
                		    {{ $user_info->full_address }}
                		    
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
                  @php $i = 1; @endphp
              @foreach($order_details as $row)
                <tr>
                	
                  <td> {{ $i++ }}  </td>
                  <td> {{ $row->product_name }}  </td>
                   <td><img src = "{{ $row->product_thumbnail }}" height = "70px" width = "60px"></td>
                  
                  <td> {{ $row->product_size }}  </td>
                 
                  <td> {{ $row->quantity }} </td>
                 
                  <td> &#x20b9; {{ $row->singleprice }}  </td>
                  <td>  &#x20b9; {{ $row->totalprice }}  </td>
                  
                </tr>
              @endforeach
                
              </tbody>
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->


    </div>
    
    <br>
    
    
    @if($orders->status == 0)
    <a href = "{{ url('payment/accept/'.$orders->id) }}" class = "btn btn-info btn-block"> Payment Accept </a>
    <a href = "{{ url('payment/cancel/'.$orders->id) }}" class = "btn btn-danger btn-block"> Order Cancel </a>
    @elseif($orders->status == 1)
    <a href = "{{ url('process/delivery/'.$orders->id) }}" class = "btn btn-info btn-block"> Process Delivery </a>
    @elseif($orders->status == 2)
     <a href = "{{ url('product/delivered/'.$orders->id) }}" class = "btn btn-success btn-block"> Delivered </a>
    @elseif($orders->status == 4)
    <div class = "text-center">
     <strong class = "badge badge-success text-center" style = "font-size:20px;"> Product Cancelled!! </strong>
    </div>
    @else
    <div class = "text-center">
     <strong class = "badge badge-success text-center" style = "font-size:20px;"> Product Deleivered!! </strong>
    </div>
    @endif
   
   
   

          
        </div>
        <!---Container Fluid-->
        
        
         
        
        
        @endsection
     