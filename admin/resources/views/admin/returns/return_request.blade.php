@extends('admin.admin_layout')

@section('admin_contents')




        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Return Requests</h1>
           
          </div>

          <div class="row">
           
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Return Requests List</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        
                        <th>Sr No.</th>
                         <th>Payment Type</th>
                         <th>Transaction ID</th>
                         <th>Total</th>
                         <th>Date</th>
                         <th>Return</th>
                         <th>Actions</th>

                        
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                         <th>Sr No.</th>
                        <th>Payment Type</th>
                         <th>Transaction ID</th>
                         <th>Total</th>
                         <th>Date</th>
                         <th>Return</th>
                         <th>Actions</th>
                        
                      </tr>
                    </tfoot>
                    <tbody>
                        @php $i = 1; @endphp
                     @foreach($orders as $order) 
                      <tr>
                        
                       <td> {{ $i++ }}  </td>
                        <td> {{ $order->payment_type }}  </td>
                         
                        @if($order->payment_type == NULL)
                       <td> No Transaction Id </td>
                        @else
                        <td> {{ $order->transaction_id }} </td>
                        @endif
                        
                        <td> 
                            
                          &#x20b9;{{ $order->amount }}
                            
                        </td>
                         <td>  {{ $order->date }} </td> 
                        <td>
                           @if($order->return_order == 1)
                          <span class = "badge badge-warning"> Pending  </span>
                          @elseif($order->return_order == 2)
                          <span class = "badge badge-success"> Success </span>
                          @else
                          <span class = "badge badge-danger"> Cancel </span>
                          @endif
                            
                        </td>
                        
                       <td> 
                        <a href = "{{ URL::to('approve/request/'.$order->id) }}" class = "btn btn-info btn-sm"> Approve </a>
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
     