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
                  <h6 class="m-0 font-weight-bold text-primary">Prescription Reviewed</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id = "dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Sr No</th>
                         <th>Image</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Contact No.</th>
                         <th>View</th>
                          <th>Make Order</th>
                         <th>Download Image</th>
                        
                       
                        
                        
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                         <th>Sr No</th>
                         <th>Image</th>
                         <th>User Name</th>
                         <th>Email</th>
                         <th>Contact No.</th>
                         <th>View</th>
                          <th>Make Order</th>
                         <th>Download Image</th>
                        
                        
                      </tr>
                    </tfoot>
                    <tbody>
                    @php $i=1;  @endphp
                      @foreach($data as $row) 
                      <tr>
                        <td>{{ $i++ }} </td>
                        <td> 
                         <img src = "https://4med.in/uploads/prescription/{{ $row->image }}" width = "100px" height = "100px">
                        </td>
                        <td> {{ $row->name }}  </td>
                        <td>  {{ $row->email }} </td>
                        <td>
                             
                          {{ $row->phone }}
                        </td>
                        
                        <td>
                          
                           <a href = "{{ URL::to('view/prescriptions/'.$row->id) }}" class = "btn btn-warning  btn-sm"> <i class = "fa fa-eye"> </i> </a>
                           
                        </td>
                        
                        <td>
                         <a href = "{{ URL::to('make/orders/'.$row->id) }}" class = "btn btn-info  btn-sm"> Make Order </a>
                        </td>
                        
                         <td>
                          
                           <a href = "{{ URL::to('download/image/'.$row->id) }}" class = "btn btn-success  btn-sm"> <i class = "fa fa-download"> </i> </a>
                           
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
     