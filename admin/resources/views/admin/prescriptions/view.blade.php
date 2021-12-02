@extends('admin.admin_layout')

@section('admin_contents')


 @php 
    $test =  "https://4med.in/uploads/prescription/{{ $view_prescriptions->image }}"
 @endphp

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Prescriptions</h1>
             <!--<ol class="breadcrumb">-->-->
             <!-- <a href = "{{ route('add.product') }}" class = "btn btn-primary" style = "float: right;"> Click Here To Make Status As Prescription Reviewed  </a>-->
             <!--</ol>-->
            
          </div>

          <div class="row">
              
            <div class = "col-lg-4 mt-5">
                <label> <strong> Prescription Image : </strong> </label> <br>
                <img src = "https://4med.in/uploads/prescription/{{ $view_prescriptions->image }}" width = "250px" height = "250px">
               
                
                     <a href = "{{ URL::to('download/image/'.$view_prescriptions->id) }}" class = "btn btn-danger mt-3"> Download Image </a>
               
               
            </div>  
           
            <div class="col-lg-8" style = "margin-top:68px;">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between text-center">
                  <h6 class="m-0 font-weight-bold text-primary text-center"><u>User Details</u></h6>
                </div>
                <div class = "container">
                <div class = "row">
                    <div class = "col-lg-12">
                        <label> <strong> User Name :  </strong> <span class="badge badge-success"> {{ $view_prescriptions->name }} </span> </label>
                     </div>
                      <div class = "col-lg-12 mt-3">
                          <label> <strong> Email : </strong> <span class="badge badge-warning"> {{ $view_prescriptions->email }} </span> </label>
                     </div> 
                     <div class = "col-lg-12 mt-3">
                        <label> <strong> Contact No : </strong> <span class="badge badge-primary">  {{ $view_prescriptions->phone }} </span> </label>
                     </div>
                     <div class = "col-lg-12 mt-3">
                        <label> <strong> City : </strong> <span class="badge badge-dark">  {{ $view_prescriptions->city }} </span> </label>
                     </div>
                     <div class = "col-lg-12 mt-3">
                        <label> <strong> State : </strong> <span class="badge badge-danger">  {{ $view_prescriptions->state }} </span> </label>
                     </div>
                     <div class = "col-lg-12 mt-3">
                        <label> <strong> Pin Code : </strong> <span class="badge badge-info">  {{ $view_prescriptions->pin_code }} </span> </label>
                     </div>
                     <div class = "col-lg-12 mt-3">
                        <label> <strong> Full Address : </strong>  {{ $view_prescriptions->full_address }}  </label>
                     </div>
                      
    
                     
                </div>
                </div>
              </div>
            </div>
          </div>
          <!--Row-->
          <div class = "mt-5">
             @if($view_prescriptions->verified == 0)
          <a href = "{{ URL::to('prescription/review/'.$view_prescriptions->id) }}" class = "btn btn-info btn-block"> Prescription On Review </a>
         <a href = "{{ URL::to('prescription/cancel/'.$view_prescriptions->id) }}" class = "btn btn-danger btn-block"> Prescription Cancel </a>
            @elseif($view_prescriptions->verified == 1)
            <a href = "" class = "btn btn-danger btn-block">  Cancel Prescription </a>
            @else
            @endif
        </div>
          
        </div>
        <!---Container Fluid-->
        
        
         
        
        
        @endsection
     