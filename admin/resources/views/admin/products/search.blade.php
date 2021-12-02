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
            <ol class="breadcrumb">
               <a href = "{{ route('add.product') }}" class = "btn btn-primary" style = "float: right;"> Add Product </a>
            </ol>
          </div>

          <div class="row">
           
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
                  
                  <form method = "post" action = "{{ route('product.search') }}">
                      @csrf
                    <input type = "text" name = "search" class = "form-control autocomplete" placeholder = "Enter Product Name">
                    <input type = "submit" value = "submit">
                </form>
                  
                </div>
                
                
                
                <table class="table align-items-center table-flush table-hover">
        <thead>
            <tr>
              
                <th>Image</th>
                <th>Category Name</th>
                <th>Product Name</th>
                <th>View</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
           
            <tr>
                
                <td> @if($products->product_thumbnail == NULL)
                         <img src = "{{ asset('public/admin/img/noimage.jpg') }}" width = "100px" height = "100px">
                        @else
                         <img src = "{{ $products->product_thumbnail }}" width = "100px" height = "100px">
                        @endif
                </td>
                <td>{{ $products->category_name }} </td>
                <td>{{ $products->product_name }}</td>
                <td><a href = "{{ URL::to('view/product/'.$products->id) }}" class = "btn btn-warning  btn-sm"> <i class = "fa fa-eye"> </i> </a></td>
                <td>@if($products->status == 1)

                    <a href = "{{ URL::to('unactive/product/'.$products->id) }}" class = "btn btn-danger" > <i class = "fa fa-thumbs-down"> </i> </a>

                    @else

                     <a href = "{{ URL::to('active/product/'.$products->id) }}" class = "btn btn-info" > <i class = "fa fa-thumbs-up"> </i> </a>

                    @endif
                </td>
                <td> <a href = "{{ URL::to('edit/product/'.$products->id) }}" class = "btn btn-success btn-sm"> <i class = "fa fa-edit"> </i> </a></td>
                <td> <a href = "{{ URL::to('remove/product/'.$products->id) }}" class = "btn btn-danger  btn-sm" id = "delete"> <i class = "fa fa-trash"> </i> </a></td>
            </tr>
           
          
        </tbody>
        <tfoot>
            <tr>
              
                <th>Image</th>
                <th>Category Name</th>
                <th>Product Name</th>
                <th>View</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </tfoot>
    </table>
                
     
          
                
              </div>
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
     