@extends('admin.admin_layout')

@section('admin_contents')




        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">User Roles</h1>
            <ol class="breadcrumb">
               <a href = "{{ route('admin.users.add') }}" class = "btn btn-primary" style = "float: right;"> Add Users </a>
            </ol>
          </div>

          <div class="row">
           
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">All User Roles</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Sr No</th>
                        <th>Name</th>
                         <th>Phone</th>
                         <th>Access</th>
                         <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                         <th>Sr No</th>
                        <th>Name</th>
                         <th>Phone</th>
                         <th>Access</th>
                         <th>Action</th>
                        
                      </tr>
                    </tfoot>
                    <tbody>
                    @php $i = 1; @endphp
                      @foreach($user as $row)
                      <tr>
                        <td> {{ $i++ }} </td>
                        <td> 
                       {{ $row->name }}
                       
                        </td>
                        <td> {{ $row->phone }} </td>
                        <td> 
                        
                     @if($row->category == 1)
                    <span class="badge badge-info"> Category </span>
                    @else
                    @endif

                    @if($row->users == 1)
                    <span class="badge badge-warning"> User </span>
                    @else
                    @endif
                    
                     @if($row->products == 1)
                    <span class="badge badge-danger"> Products </span>
                    @else
                    @endif

                    @if($row->banners == 1)
                    <span class="badge badge-secondary"> Banners </span>
                    @else
                    @endif

                    @if($row->orders == 1)
                    <span class="badge badge-primary"> Orders </span>
                    @else
                    @endif

                     @if($row->reports == 1)
                    <span class="badge badge-success"> Reports </span>
                    @else
                    @endif

                     @if($row->roles == 1)
                    <span class="badge badge-danger"> Roles </span>
                    @else
                    @endif
                    
                     @if($row->return_orders == 1)
                    <span class="badge badge-info"> Return Orders </span>
                    @else
                    @endif

                    
                        
                        
                        </td>
                        <td>
                        <a href = "{{ url('edit/admin/'.$row->id) }}" class = "btn btn-success"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                      	<a href = "{{ url('remove/admin/'.$row->id) }}" class = "btn btn-danger" id = "delete"> <i class="fa fa-trash" aria-hidden="true"></i> </a>
                          
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
     