@extends('admin.admin_layout')

@section('admin_contents')


 <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>-->
 
 
 
 <script>
        var base_url = '{{ url('/') }}';
        </script>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">PRODUCTS</h1>
           
          </div>

          <div class="row">
           
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  
                  
                  <form method = "post" action = "{{ route('create.orders.med') }}">
                      @csrf
                      <input type = "hidden" name = "order_id" value = "{{ $user_info->id }}">
                       <input type = "hidden" name = "user_id" value = "{{ $user_info->user_id }}">
                    <input type = "text" name = "search" class = "form-control autocomplete" placeholder = "Enter Product Name">
                    <input type = "submit" value = "submit">
                    
                     
                </form>
                  
                </div>
                
                
                
               <table>
               </table>
                
      
          
                
              </div>
            </div>
            
                @foreach($user_med as $row)
                
                    @if($row->order_id == NULL)
                    
                    @endif
                    
                 @endforeach
                    
                    
                    
                        <div class = "col-lg-12">
                     <form method = "post" action = "{{ route('make.orders.med') }}">
                      @csrf
                    <table class="table">
              
                        
                        <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Image</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Product Description</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($user_med as $test)
                         
                        <tr>
                          <th scope="row">1</th>
                          <td><img src = "{{ $test->product_thumbnail }}" width = "150px" height = "150px"></td>
                          <td>{{ $test->product_name }}</td>
                          <!--<td><input type = "number" name = "qty[]" class = "form-control" min = "1" required></td>-->
                           <td>{!! $test->product_description !!}</td>
                         <td>  <a href="{{ URL::to('delete/medicine/'.$test->id) }}" class="btn btn-sm btn-danger" title="delete" id="delete"><i class="fa fa-trash"> </td>
                        </tr>
                        
                        <input type = "hidden" name = "product_id" value = "{{ $test->product_id }}">
                        <input type = "hidden" name = "user_id" value = "{{ $test->user_id }}">
                       
                        @endforeach
                        
                        
                      </tbody>
                       
                       
                   
                      
                </table>
               @php
                    $med = DB::table('add_medicines')->first();
                    
               @endphp 
                    @if($med == NULL)
                    
                    @else
                        <input type = "submit" value = "submit" class = "btn btn-warning btn-block">     
                    @endif
               
                
                 
                   </form>     
                    
            </div>
            
            
                
                    
                    
                    
                
              
                 
                
         
           
            
          </div>
          <!--Row-->

          
        </div>
        <!---Container Fluid-->
        
         <script type="text/javascript">
            
            $(function () {
                $(".autocomplete").autocomplete({
                    source: base_url + "/searchCities", 
                    minLength: 2,
                    select: function (event, ui) {
                        
            //            console.log(ui.item.value);
                    }


                });
});

        </script>
        
        
        

   
         
        <script>
            $(document).ready( function () {
                $('#productTable').DataTable();
                
            } );
        </script>
        
        @endsection
     