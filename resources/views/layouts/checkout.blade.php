<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>4med</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
     @include('layouts.head')

</head>

<body>

    <div class="main-wrapper">
       <header class="header-area">
            
            @include('layouts.headerall')
                
        </header>
        
        <!-- mini cart start -->
        @include('layouts.sidebar_cart')
        
        <!-- mobile header start -->
        @include('layouts.headermobile')
        
        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li class="active">Checkout </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="checkout-main-area pt-120 pb-120">
            <div class="container">
                <!--<div class="customer-zone mb-20">-->
                <!--    <p class="cart-page-title">Returning customer? <a class="checkout-click1" href="#">Click here to login</a></p>-->
                <!--    <div class="checkout-login-info">-->
                <!--        <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping section.</p>-->
                <!--        <form action="#">-->
                <!--            <div class="row">-->
                <!--                <div class="col-lg-6 col-md-6">-->
                <!--                    <div class="sin-checkout-login">-->
                <!--                        <label>Username or email address <span>*</span></label>-->
                <!--                        <input type="text" name="user-name">-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                <div class="col-lg-6 col-md-6">-->
                <!--                    <div class="sin-checkout-login">-->
                <!--                        <label>Passwords <span>*</span></label>-->
                <!--                        <input type="password" name="user-password">-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--            <div class="button-remember-wrap">-->
                <!--                <button class="button" type="submit">Login</button>-->
                <!--                <div class="checkout-login-toggle-btn">-->
                <!--                    <input type="checkbox">-->
                <!--                    <label>Remember me</label>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--            <div class="lost-password">-->
                <!--                <a href="#">Lost your password?</a>-->
                <!--            </div>-->
                <!--        </form>-->
                <!--        <div class="checkout-login-social">-->
                <!--            <span>Login with:</span>-->
                <!--            <ul>-->
                <!--                <li><a href="#">Facebook</a></li>-->
                <!--                <li><a href="#">Twitter</a></li>-->
                <!--                <li><a href="#">Google</a></li>-->
                <!--            </ul>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="customer-zone mb-20">-->
                <!--    <p class="cart-page-title">Have a coupon? <a class="checkout-click3" href="#">Click here to enter your code</a></p>-->
                <!--    <div class="checkout-login-info3">-->
                <!--        <form action="#">-->
                <!--            <input type="text" placeholder="Coupon code">-->
                <!--            <input type="submit" value="Apply Coupon">-->
                <!--        </form>-->
                <!--    </div>-->
                <!--</div>-->
                
                
                <div class="customer-zone mb-20">
                    <div class="billing-info-wrap">
                        <h3>Select Address</h3>
                        <div class="row">
                           
                            @if(count($useraddress) > 0 )
                             @foreach ($useraddress as $item)                           
                             <div class="col-lg-4 col-md-4">
                                 <label class="labl">
                                <input type="radio" name="addressid" id="addressid" value="{{ $item->id }}" @if ($loop->first) {{ "checked" }} @endif}}/>
                                
                                 <div class="mb-20 your-order-area col-lg-12 col-md-12" id="addr" >
                                     <h5>{{ $item->fullname }}</h5>
                                     <h5>{{ $item->full_address }}, {{ $item->city }}, {{ $item->state }}</h5>
                                     <h5>{{ $item->pin_code }}</h5>
                                     <h5>{{ $item->alternate_phone }}</h5>
                                            
                                 </div>
                                 
                                 </label>
                             </div>
                             @endforeach
                             
                            @else
                                <p class="ml-20">No Saved Address Found</p>		
                            @endif
                        </div>
                    </div>
                    
                    
                    <!--<div class="checkout-login-info">-->
                    <!--    <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer, please proceed to the Billing & Shipping section.</p>-->
                    <!--    <form action="#">-->
                    <!--        <div class="row">-->
                    <!--            <div class="col-lg-6 col-md-6">-->
                    <!--                <div class="sin-checkout-login">-->
                    <!--                    <label>Username or email address <span>*</span></label>-->
                    <!--                    <input type="text" name="user-name">-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="col-lg-6 col-md-6">-->
                    <!--                <div class="sin-checkout-login">-->
                    <!--                    <label>Passwords <span>*</span></label>-->
                    <!--                    <input type="password" name="user-password">-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="button-remember-wrap">-->
                    <!--            <button class="button" type="submit">Login</button>-->
                    <!--            <div class="checkout-login-toggle-btn">-->
                    <!--                <input type="checkbox">-->
                    <!--                <label>Remember me</label>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="lost-password">-->
                    <!--            <a href="#">Lost your password?</a>-->
                    <!--        </div>-->
                    <!--    </form>-->
                    <!--    <div class="checkout-login-social">-->
                    <!--        <span>Login with:</span>-->
                    <!--        <ul>-->
                    <!--            <li><a href="#">Facebook</a></li>-->
                    <!--            <li><a href="#">Twitter</a></li>-->
                    <!--            <li><a href="#">Google</a></li>-->
                    <!--        </ul>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                
                
                <div class="checkout-wrap pt-30">
                    <div class="row">
                        <div class="col-lg-7">
                            <form action="{{ url('/add_new_address') }}" method = "post" enctype="multipart/form-data">
                            @csrf
                            <div class="billing-info-wrap mr-50">
                                <h3>Add New Address</h3>
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20">
                                            <label>Full Name <abbr class="required" title="required" value = "">*</abbr></label>
                                            <input type="text" name = "name" required>
                                            
                                        </div>
                                    </div>
                    
                                    <!--<div class="col-lg-12 col-md-12">-->
                                    <!--    <div class="billing-info mb-20">-->
                                    <!--        <label>Email Address <abbr class="required" title="required">*</abbr></label>-->
                                    <!--        <input type="email" name = "email" value = "" required>-->
                                            
                                    <!--    </div>-->
                                    <!--</div>-->
            
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label>Street Address <abbr class="required" title="required">*</abbr></label>
                                            <input class="billing-address" name = "address" placeholder="House number and street name" type="text" value = "" required>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20">
                                            <label>Town / City <abbr class="required" title="required">*</abbr></label>
                                            <input type="text" name = "city" required>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20">
                                            <label>State <abbr class="required" title="required">*</abbr></label>
                                            <input type="text" name = "state" required>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20">
                                            <label>Postcode / ZIP <abbr class="required" title="required">*</abbr></label>
                                            <input type="text" name = "pin_code" value = "" required>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20">
                                            <label>Phone  <abbr class="required" title="required">*</abbr></label>
                                            <input type="phone" name = "altphone" value = "" required>
                                           
                                        </div>
                                    </div>
                                    
                                </div>
                                
                                <div class="Place-order text-center">
                                    <button type = "submit" class = "btn btn-danger">Add New Address</button>
                                </div>
                                <!--<div class="checkout-account mb-25">-->
                                <!--    <input class="checkout-toggle2" type="checkbox">-->
                                <!--    <span>Create an account?</span>-->
                                <!--</div>-->
                                <!--<div class="checkout-account-toggle open-toggle2 mb-30">-->
                                <!--    <label>Email Address</label>-->
                                <!--    <input placeholder="Password" type="password">-->
                                <!--</div>-->
                                <!--<div class="checkout-account mt-25">-->
                                <!--    <input class="checkout-toggle" type="checkbox">-->
                                <!--    <span>Ship to a different address?</span>-->
                                <!--</div>-->
                                <!--<div class="different-address open-toggle mt-30">-->
                                <!--    <div class="row">-->
                                <!--        <div class="col-lg-6 col-md-6">-->
                                <!--            <div class="billing-info mb-20">-->
                                <!--                <label>First Name</label>-->
                                <!--                <input type="text">-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--        <div class="col-lg-6 col-md-6">-->
                                <!--            <div class="billing-info mb-20">-->
                                <!--                <label>Last Name</label>-->
                                <!--                <input type="text">-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--        <div class="col-lg-12">-->
                                <!--            <div class="billing-info mb-20">-->
                                <!--                <label>Company Name</label>-->
                                <!--                <input type="text">-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--        <div class="col-lg-12">-->
                                <!--            <div class="billing-select mb-20">-->
                                <!--                <label>Country</label>-->
                                <!--                <select>-->
                                <!--                    <option>Select a country</option>-->
                                <!--                    <option>Azerbaijan</option>-->
                                <!--                    <option>Bahamas</option>-->
                                <!--                    <option>Bahrain</option>-->
                                <!--                    <option>Bangladesh</option>-->
                                <!--                    <option>Barbados</option>-->
                                <!--                </select>-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--        <div class="col-lg-12">-->
                                <!--            <div class="billing-info mb-20">-->
                                <!--                <label>Street Address</label>-->
                                <!--                <input class="billing-address" placeholder="House number and street name" type="text">-->
                                <!--                <input placeholder="Apartment, suite, unit etc." type="text">-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--        <div class="col-lg-12">-->
                                <!--            <div class="billing-info mb-20">-->
                                <!--                <label>Town / City</label>-->
                                <!--                <input type="text">-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--        <div class="col-lg-6 col-md-6">-->
                                <!--            <div class="billing-info mb-20">-->
                                <!--                <label>State / County</label>-->
                                <!--                <input type="text">-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--        <div class="col-lg-6 col-md-6">-->
                                <!--            <div class="billing-info mb-20">-->
                                <!--                <label>Postcode / ZIP</label>-->
                                <!--                <input type="text">-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--        <div class="col-lg-6 col-md-6">-->
                                <!--            <div class="billing-info mb-20">-->
                                <!--                <label>Phone</label>-->
                                <!--                <input type="text">-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--        <div class="col-lg-6 col-md-6">-->
                                <!--            <div class="billing-info mb-20">-->
                                <!--                <label>Email Address</label>-->
                                <!--                <input type="text">-->
                                <!--            </div>-->
                                <!--        </div>-->
                                <!--    </div>-->
                                <!--</div>-->
                                <!--<div class="additional-info-wrap">-->
                                <!--    <label>Order notes</label>-->
                                <!--    <textarea name = "order_notes" placeholder="Notes about your order, e.g. special notes for delivery. "></textarea>-->
                                    
                                <!--</div>-->
                            </div>
                            </form>
                        </div>
                        
                        
                        <div class="col-lg-5">
                            <form action="{{ route('book.order') }}" method = "post" enctype="multipart/form-data" id="bookorderform">
                            @csrf
                            <input type="hidden" name="address_id" value="{{ $useraddress[0]->id }}">
                            <input type ="hidden" name="payment_id" value="">
                            <input type = "hidden" name = "addresss" value = "{{ $useraddress[0]->fullname }},
                                                                             {{ $useraddress[0]->full_address }}, {{ $useraddress[0]->city }}, {{ $useraddress[0]->state }},
                                                                             {{ $useraddress[0]->pin_code }},
                                                                             {{ $useraddress[0]->alternate_phone }}">
                            <div class="your-order-area">
                                <h3>Your order</h3>
                                <div class="your-order-wrap gray-bg-4">
                                    <div class="your-order-info-wrap">
                                        <div class="your-order-info">
                                            <ul>
                                                <li>Product <span>Total</span></li>
                                            </ul>
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
                                                <p>Make your payment By Cash On Delvery.</p>
                                            </div>
                                        </div>
                                        <div class="pay-top sin-payment sin-payment-3">
                                            
                                            
    
                                            <input id="payment-method-4" class="input-radio" type="radio" name = "payment" value="online" name="payment_method">
                                            <label for="payment-method-4"> Online Payment <img alt="" src="assets/images/icon-img/payment.png"></label>
                                            <div class="payment-box payment_method_bacs">
                                                <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference.</p>
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
                </div>
            </div>
        </div>
        
    </div>

    @include('layouts.footer')
    
    @include('layouts.foot')
    

    <script>

      $(function(){
         $("input[name='addressid']").click(function(){
             var $this = $(this);
             if($(this).prop("checked"))
              { 
                  var addr = $this.parent().find('#addr').text().trim();
                   // var valu = $(this).val(); // retrieve the value
                   //var aa = $(addr)
                //alert(addr);
                  $("input[name='addresss']").val(addr);
                  $("input[name='address_id']").val( $this.val());
                 
              }

          });
      });
    </script>
    
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script>
    
   

    var options = {
        "key": "{{ env('RAZOR_KEY') }}",
        "amount": "{{ $grandprice * 100 }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
        "currency": "INR",
        "name": "4med.in",
        "description": "Geetanjali Medical Pvt Ltd.",
        "image": "{{ asset('assets/images/favicon.png') }}",
        "handler": function (response){
            //alert(response.razorpay_payment_id);
            $("input[name='payment_id']").val(response.razorpay_payment_id);
            $("#bookorderform").submit();
            //alert(response.razorpay_payment_id);
            
        },
        "theme": {
            "color": "#3399cc"
        }
    };
    var rzp1 = new Razorpay(options);
    rzp1.on('payment.failed', function (response){
            alert(response.error.code);
            alert(response.error.description);
            alert(response.error.source);
            alert(response.error.step);
            alert(response.error.reason);
            alert(response.error.metadata.order_id);
            alert(response.error.metadata.payment_id);
    });
    
    //  $('#rzp-button1').click(function (e) {
        
    //     if ($('.cash').prop("checked") === true)       {
    //         $('#rzp-button1').submit();	
    //     } 
    //     else {
    //     //      rzp1.open();
    //      e.preventDefault();
        
    //     document.frm1.submit()
    //     }
    // });
   
    </script>
 
       <!--<script src="https://checkout.razorpay.com/v1/checkout.js"-->
       <!--                                     data-key="{{ env('RAZOR_KEY') }}"-->
       <!--                                     data-amount="1000"-->
       <!--                                     data-buttontext="Pay 1 INR"-->
       <!--                                     data-name="NiceSnippets"-->
       <!--                                     data-description="Rozerpay"-->
       <!--                                     data-image="{{ asset('/image/nice.png') }}"-->
       <!--                                     data-prefill.name="name"-->
       <!--                                     data-prefill.email="email"-->
       <!--                                     data-theme.color="#ff7529">-->
       <!--                             </script>-->
 
    
</body>

</html>