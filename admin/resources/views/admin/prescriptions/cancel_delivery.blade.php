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
                  <h6 class="m-0 font-weight-bold text-primary">Cancel Order</h6>
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
                        
                        
                         <th>Download Image</th>
                         <th>Status</th>
                       
                        
                        
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                         <th>Sr No</th>
                         <th>Image</th>
                         <th>User Name</th>
                         <th>Email</th>
                         <th>Contact No.</th>
                        
                          
                         <th>Download Image</th>
                         <th>Status</th>
                        
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
                          
                           <a href = "{{ URL::to('download/image/'.$row->id) }}" class = "btn btn-success  btn-sm"> <i class = "fa fa-download"> </i> </a>
                           
                        </td>
                        <td> 
                        
                        
                        <span class = "badge badge-danger"> Cancel </span>
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
  <!--@foreach($data as $row) -->
  <!--         <div class = "text-center">-->
  <!--  @if($row->verified == 2)-->
  <!--   <a href = "{{ URL::to('prescription/order/shipped/'.$row->id ) }}" class = "btn btn-warning btn-block"> Shipped Order </a>-->
  <!--  @elseif($row->verified == 3)-->
  <!--  <a href = "{{ URL::to('prescription/order/delivered/'.$row->id ) }}" class = "btn btn-success btn-block"> Delivered </a>-->
  <!--   @elseif($row->verified == 4)-->
  <!--  <div class = "text-center">-->
  <!--   <strong class = "badge badge-success text-center" style = "font-size:20px;"> Product Deleivered!! </strong>-->
  <!--  </div>-->
  <!--  @else-->
  <!--  <div class = "text-center">-->
  <!--   <strong class = "badge badge-danger text-center" style = "font-size:20px;"> Product Canelled!! </strong>-->
  <!--  </div>-->
   
  <!--  @endif-->
  <!--  </div>-->
  <!--  @endforeach-->

          
        </div>
        <!---Container Fluid-->
        
        
         
        
        
        @endsection
     