@extends('admin.admin_layout')

@section('admin_contents')




        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">BANNERS</h1>
            <ol class="breadcrumb">
               <a href = "{{ route('add.banner') }}" class = "btn btn-primary" style = "float: right;"> Add Banner </a>
            </ol>
          </div>

          <div class="row">
           
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Sr No</th>
                        <th>Banner Image</th>
                        <th>Delete</th>
                        
                        
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>Sr No</th>
                        <th>Banner Image</th>
                        <th>Delete</th>
                        
                      </tr>
                    </tfoot>
                    <tbody>
                        @php $i = 1; @endphp
                  @foreach($banners as $banner)
                      <tr>
                        <td>{{ $i++ }}</td>
                        <td> 
                      
                         <img src = "{{ $banner->thumbnail }}" width = "100px" height = "100px">
                       
                       
                        </td>
                      
                        
                        <td>
                           
                            <a href = "{{ URL::to('remove/banner/'.$banner->id) }}" class = "btn btn-danger  btn-sm" id = "delete"> <i class = "fa fa-trash"> </i> </a>
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
     