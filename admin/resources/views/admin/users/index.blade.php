@extends('admin.admin_layout')

@section('admin_contents')




        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">USERS</h1>
            
          </div>

          <div class="row">
            <!--<div class="col-lg-4">-->
              <!-- Form Basic -->
            <!--  <div class="card mb-4">-->
            <!--    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">-->
            <!--      <h6 class="m-0 font-weight-bold text-primary">Add Category</h6>-->
            <!--    </div>-->
            <!--    <div class="card-body">-->
            <!--      <form>-->
            <!--        <div class="form-group">-->
            <!--          <label for="exampleInputEmail1">Category Name</label>-->
            <!--          <input type="category_name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"-->
            <!--            placeholder="Enter Category Name">-->
                    
            <!--        </div>-->
            <!--        <div class="form-group">-->
            <!--          <label for="exampleInputPassword1">Tag Name</label>-->
            <!--          <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Tag Name">-->
            <!--        </div>-->
            <!--        <div class="form-group">-->
            <!--          <div class="custom-file">-->
            <!--            <input type="file" class="custom-file-input" id="customFile">-->
            <!--            <label class="custom-file-label" for="customFile">Choose file</label>-->
            <!--          </div>-->
            <!--        </div>-->
                   
            <!--        <button type="submit" class="btn btn-primary">Submit</button>-->
            <!--      </form>-->
            <!--    </div>-->
            <!--  </div>-->

             
              
            <!--</div>-->

            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Users List</h6>
                </div>
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTableHover">
                    <thead class="thead-light">
                      <tr>
                        <th>Sr No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Status</th>
                       
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        
                        <th>Sr No</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No</th>
                        <th>Status</th>
                        
                      </tr>
                    </tfoot>
                    <tbody>
                       @php $i = 1; @endphp
                       @foreach($users as $user)
                      <tr>
                        <td> {{ $i++ }} </td>
                        @if($user->profile_pic == NULL)
                        <td>   <img src="{{ asset('public/admin/img/avatar.png') }}"  width = "100px" height = "100px"> </td>
                        @else
                        <td>   <img src=" {{ 'https://4med.in/uploads/avatar/'.$user->profile_pic }}"  width = "100px" height = "100px"> </td>
                        @endif
                        
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                        {{ $user->phone }}
                        </td>
                       
                        <td>
                            @if($user->status == 1)

                    <a href = "{{ URL::to('unactive/user/'.$user->id) }}" class = "btn btn-danger" > <i class = "fa fa-thumbs-down"> </i> </a>

                    @else

                     <a href = "{{ URL::to('active/user/'.$user->id) }}" class = "btn btn-info" > <i class = "fa fa-thumbs-up"> </i> </a>

                    @endif
                            	
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
        
        
         <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold text-center">Add Category</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
<!--              @if ($errors->any())-->
<!--    <div class="alert alert-danger">-->
<!--        <ul>-->
<!--            @foreach ($errors->all() as $error)-->
<!--                <li>{{ $error }}</li>-->
<!--            @endforeach-->
<!--        </ul>-->
<!--    </div>-->
<!--@endif-->
              <form method="post" action = "{{ route('category.store') }}" enctype = "multipart/form-data">
              	@csrf
              <div class="modal-body pd-20">
               
              		
					  <div class="form-group">
					    <label for="exampleInputEmail1">Category Name</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "category_name" placeholder="Enter Category Name">
					   
					  </div>
					  
					   <div class="form-group">
					    <label for="exampleInputEmail1">Tag Name</label>
					    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "category_alt" placeholder="Enter Category Name">
					   
					  </div>
					  
					  <div class="form-group">
					    <label for="exampleInputEmail1">Image</label>
					    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name = "category_thumbnail">
					   
					  </div>
					 
					 
					


              </div><!-- modal-body -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <!--<button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>-->
              </div>
          </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->
        
        
        @endsection
     