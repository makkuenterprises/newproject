@extends('admin.admin_layout')

@section('admin_contents')


 <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>-->
 
 
 
 <script>
        var base_url = '{{ url('/') }}';
        </script>

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">View Carts</h1>
           
          </div>

          <div class="row">
           
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  
                  
                 
                  
                </div>
                
                
                
               <table>
               </table>
                
      
          
                
              </div>
            </div>
            
              
                @foreach($carts as $cart)
                
                    @if($cart->id == NULL)
                    
                    @endif
                    
                 @endforeach
                    
                    
                    
                        <div class = "col-lg-12">
                          
                          <div class = "text-center"> 
                            <a href = "{{ route('clear.cart') }}" class = "btn btn-danger" id="delete"> Clear All Cart </a>
                          </div>
                    <table class="table mt-5">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Image</th>
                          <th scope="col">Product Name</th>
                          <th scope="col">Product Quantity</th>
                          <th scope="col">Update Quantity</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                         @foreach($carts as $car)
                         
                        <tr>
                          <th scope="row">1</th>
                          <td><img src = "{{ $car->product_thumbnail }}" width = "150px" height = "150px"></td>
                          <td>{{ $car->product_name }}</td>
                           <form method = "post" action = "">
                      @csrf
                          <td><input type = "number" name = "qty" value = "{{ $car->qty }}" class = "form-control" min = "1" readonly></td>
                           <td> <a href = "{{ URL::to('update/qty/'.$car->product_id) }}" class = "btn btn-primary"> Update Quantity  </td>
                           <td>  <a href="{{ URL::to('delete/cart/'.$car->id) }}" class="btn btn-sm btn-danger" title="delete" id="delete"><i class="fa fa-trash"> </td>
                        </form>  
                        </tr>
                        
                       
                       
                        @endforeach
                        
                      </tbody>
                </table>
                 
                        
                    
            </div>
            
            <div class="col-lg-12">
                            <form action="{{ route('book.order') }}" method = "post" enctype="multipart/form-data" id="bookorderform">
                            @csrf
                             @foreach($cartproducts as $item)
                            <input type="hidden" name="user_id" value="{{ $item->user_id }}">
                            @endforeach
                            <!--<input type="hidden" name="address_id" value="{{ $useraddress[0]->id }}">-->
                            <!--<input type ="hidden" name="payment_id" value="">-->
                            <!--<input type = "hidden" name = "addresss" value = "{{ $useraddress[0]->fullname }},-->
                            <!--                                                 {{ $useraddress[0]->full_address }}, {{ $useraddress[0]->city }}, {{ $useraddress[0]->state }},-->
                            <!--                                                 {{ $useraddress[0]->pin_code }},-->
                            <!--                                                 {{ $useraddress[0]->alternate_phone }}">-->
                            <div class="your-order-area">
                                <h3>Your order</h3>
                                <div class="your-order-wrap gray-bg-4">
                                    <div class="your-order-info-wrap">
                                        <div class="your-order-info">
                                            
                                        </div>
                                        <div class="your-order-middle">
                                            <ul>
                                                @foreach($cartproducts as $item)
                                                <li> {{ $item->product_name }} <span>&#8377; {{ number_format($item->price * $item->qty,2) }} </span></li>
                                                
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="your-order-info order-subtotal">
                                            <ul>
                                                <li>Subtotal <span>&#8377;{{ number_format($totalprice,2) }} </span></li>
                                            </ul>
                                        </div>
                                        <div class="your-order-info order-shipping">
                                            <ul>
                                                <li>Shipping Charge
                                                @if($totalprice < 500) 
                                                    <span>&#8377; 50.00 </span>
                                                    <input type ="hidden" name="shipping_charge" value="50.00">
                                                @else
                                                    <span>&#8377; 0.00 </span>
                                                    <input type ="hidden" name="shipping_charge" value="0.00">
                                                @endif
                                                
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="your-order-info order-total">
                                            <ul>
                                                <li>Total
                                                    @if($totalprice < 500)
                                                       <span>&#8377; {{ number_format($totalprice + 50.00,2) }} </span>
                                                       <input type = "hidden" name = "total" value = "{{ number_format($totalprice + 50.00,2) }}">
                                                    @else
                                                        <span>&#8377; {{ number_format($totalprice + 00.00,2) }} </span>
                                                        <input type = "hidden" name = "total" value = "{{ number_format($totalprice + 00.00,2) }}">
                                                    @endif
                                                
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="payment-method">
        
                                        <div class="pay-top sin-payment">
                                            <input id="payment-method-3" class="input-radio cash" type="radio" name = "payment" value="cash" name="payment_method" checked>
                                            <label for="payment-method-3">Cash on delivery </label>
                                            <div class="payment-box payment_method_bacs">
                                               
                                            </div>
                                        </div>
                                       
                                    </div>
                                </div>
                                <div class="Place-order text-center">
                                    <button type = "submit" class = "btn btn-danger" id="rzp-button1">Place Order</button>
                                </div>
                            </div>
                            </form>
                            
                            
                            
                            
                          <!--   <form action="https://test.cashfree.com/billpay/checkout/post/submit" name="frm1" method="post">-->
                          <!--    <p>Please wait.......</p>-->
                        
                          <!--    <input type="hidden" name="signature" value='QN09Elp5Sb267qhXFtIa1+6K3Krdva/Ibu4XDuHj6wc='/>-->
                          <!--    <input type="hidden" name="orderNote" value="test"/>-->
                          <!--    <input type="hidden" name="orderCurrency" value="INR"/>-->
                          <!--    <input type="hidden" name="customerName" value="Sugandh"/>-->
                          <!--    <input type="hidden" name="customerEmail" value="sugandhkumar9@gmal.com"/>-->
                          <!--    <input type="hidden" name="customerPhone" value="8271168973"/>-->
                          <!--    <input type="hidden" name="orderAmount" value="130"/>-->
                          <!--    <input type ="hidden" name="notifyUrl" value="https://4med.in/response"/>-->
                          <!--    <input type ="hidden" name="returnUrl" value="https://4med.in/response"/>-->
                          <!--    <input type="hidden" name="appId" value="51308c8eb15e6f966b91473a380315"/>-->
                          <!--    <input type="hidden" name="orderId" value="123555"/>-->
                          <!--</form>-->
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
     