@extends('admin.admin_layout')

@section('admin_contents')




        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Orders</h1>
           
          </div>

          <div class="row">
           
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Orders List</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Payment Type</th>
                        
                        <th>Transaction ID</th>
                        <th>Sub Total</th>
                        <th>Order Date</th>
                        
                        <th>Status Code</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                        
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Payment Type</th>
                        
                        <th>Transaction ID</th>
                        <th>Sub Total</th>
                        <th>Order Date</th>
                       
                         <th>Status Code</th>
                        <th>Status</th>
                        <th>Action</th>
                        
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach($order as $row)
                      <tr>
                         @if($row->payment_type == 'cashon')
                            <td>  By Cash Mode  </td>
                         @else
                         <td>  By Online Mode   </td>
                         @endif
                         
                          @if($row->transaction_id == NULL)
                            <td>  Null  </td>
                         @else
                         <td>  {{ $row->transaction_id }}   </td>
                         @endif
                        
                        
                        <td> &#x20B9; {{ $row->amount }}  </td>
                       
                        <td> {{ $row->date }} </td>
                         <td>  {{ $row->status_code }}  </td>
                        <td> 
                            
                             @if($row->status == 0)
                              <span class = "badge badge-warning"> Pending  </span>
                              @elseif($row->status == 1)
                              <span class = "badge badge-info"> Payment Accept </span>
                              @elseif($row->status == 2)
                              <span class = "badge badge-warning"> Progress </span>
                              @elseif($row->status == 3)
                              <span class = "badge badge-success"> Delivered </span>
                              @else
                              <span class = "badge badge-danger"> Cancel </span>
                             @endif
                            
                        </td>
                            
                        <td>
                           
                            <a href = "{{ URL::to('view/order/'.$row->id) }}" class = "btn btn-info  btn-sm"> View </a>
                        </td>
                        
                       
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->

          
        </div>
        <!---Container Fluid-->
        
        
         
        
        
        @endsection
     