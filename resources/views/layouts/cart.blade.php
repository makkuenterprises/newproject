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
                        <li class="active">Cart</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="cart-main-area pt-115 pb-120">
            <div class="container">
                <h3 class="cart-page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                    @if(count($cartproducts) > 0 )
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Product Name</th>
                                            <th>Until Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                                    @endif
                                    <tbody>
                                        @if(count($cartproducts) > 0 )
                                        @foreach($cartproducts as $item)
                                        <tr>
                                            <td class="product-thumbnail">
                                                <a href="{{ url('product_details/'.$item->id) }}">
                                                    @if (empty($item->product_thumbnail))
                                                        <img src="{{ asset('assets/images/product/default.jpg') }}" alt="{{ $item->product_name }}" width="200px" height="200px">
                                                    @else
                                                        <img src="{{ $item->product_thumbnail }}" alt="{{ $item->product_name }}" width="200px" height="200px">
                                                    @endif
                                                </a>
                                            </td>
                                             <td class="product-name"><a href="{{ url('product_details/'.$item->id) }}">{{ $item->product_name }}</a></td>
                                              @if($item->discount_price == NULL)
                    
                                                <td class="product-price-cart"><span class="amount">&#8377; {{ number_format($item->price,2) }}</span></td>
                                    
                                             @else
                                             
                                              @php  $price = ($item->price/100) * $item->discount_price;
                                      
                                      
                                            @endphp
                                            <td class="product-price-cart"><span class="amount">&#8377; {{ number_format($item->price - $price,2) }}</span></td>
                                        
                                             
                                             @endif
                                                   
                                             <td class="product-quantity pro-details-quality">
                                                 <div class="cart-plus-minus">
                                                    <div class="dec qtybutton" data-id= "{{ $item->id }}">-</div>
                                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" data-id= "{{ $item->id }}" id="qtybutton" value="{{ $item->qty }}" readonly>
                                                    <div class="inc qtybutton" data-id= "{{ $item->id }}">+</div>
                                                 </div>
                                            </td>
                                            
                                             @if($item->discount_price == NULL)
                                             
                                             @php  $test1 = number_format($item->price * $item->qty,2)  @endphp
                    
                                                <td class="product-subtotal">&#8377; {{ $test1 }}</td>
                                    
                                             @else
                                             
                                               @php  $price = ($item->price/100) * $item->discount_price;
                                      
                                      
                                            @endphp
                                            
                                             
                                            
                                            <td class="product-subtotal"><span class="amount">&#8377; {{ number_format(($item->price - $price) * $item->qty,2)  }}</span></td>
                                             
                                             @endif
                                            
                                              
                                            <td class="product-remove">
                                                <form></form>
                                                <form action="remove_from_cart" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                    <button class="btn-remove-from-cart"><i class="icon_close"></button><br><br>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                       
                                        @endforeach
                                        @else
                                	   <p class="text-center">No items found</p>		
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            
                            @if(count($cartproducts) > 0 )
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="cart-shiping-update-wrapper">
                                            <div class="cart-shiping-update">
                                                <a href="{{ url('/products') }}">Continue Shopping</a>
                                            </div>
                                            <div class="cart-clear">
                                                <!--<Button class="updartcart">Update Cart</Button>-->
                                                <a href="{{ url('/remove_all_from_cart') }}">Clear Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                       
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                            <!--    <div class="cart-tax">-->
                            <!--        <div class="title-wrap">-->
                            <!--            <h4 class="cart-bottom-title section-bg-gray">Estimate Shipping And Tax</h4>-->
                            <!--        </div>-->
                            <!--        <div class="tax-wrapper">-->
                            <!--            <p>Enter your destination to get a shipping estimate.</p>-->
                            <!--            <div class="tax-select-wrapper">-->
                            <!--                <div class="tax-select">-->
                            <!--                    <label>-->
                            <!--                        * Country-->
                            <!--                    </label>-->
                            <!--                    <select class="email s-email s-wid">-->
                            <!--                        <option>India</option></option>-->
                                                   <!-- <option>Albania</option>
                            <!--                        <option>Åland Islands</option>-->
                            <!--                        <option>Afghanistan</option>-->
                            <!--                        <option>Belgium</option>-->
                            <!--                    </select>-->
                            <!--                </div>-->
                            <!--                <div class="tax-select">-->
                            <!--                    <label>-->
                            <!--                        * Region / State-->
                            <!--                    </label>-->
                            <!--                    <select class="email s-email s-wid">-->
                            <!--                        <option>patna</option>-->
                            <!--                        <option>Bihar</option>-->
                            <!--                        <option>jharkhand</option>-->
                                                    
                            <!--                    </select>-->
                            <!--                </div>-->
                            <!--                <div class="tax-select">-->
                            <!--                    <label>-->
                            <!--                        * Zip/Postal Code-->
                            <!--                    </label>-->
                            <!--                    <input type="text">-->
                            <!--                </div>-->
                            <!--                <button class="cart-btn-2" type="submit">Get A Quote</button>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <!--<div class="discount-code-wrapper">-->
                                <!--    <div class="title-wrap">-->
                                <!--        <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>-->
                                <!--    </div>-->
                                <!--    <div class="discount-code">-->
                                <!--        <p>Enter your coupon code if you have one.</p>-->
                                <!--        <form>-->
                                <!--            <input type="text" required="" name="name">-->
                                <!--            <button class="cart-btn-2" type="submit">Apply Coupon</button>-->
                                <!--        </form>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                            @if(count($cartproducts) > 0 )
                            
                            <div class="col-lg-4 col-md-12">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                    </div>
                                    <h5>Total products <span class="h5totalprice">&#8377;{{ number_format($totalprice,2) }}
                                    
                                    </span></h5>
                                    <div class="total-shipping">
                                        <ul>
                                            <li>Total shipping <span>&#8377;{{ $deliverycharge }}</span></li>
                                        </ul>
                                    
                                        <!--<ul>-->
                                        <!--    <li><input type="checkbox"> Standard <span>&#8377;20.00</span></li>-->
                                        <!--    <li><input type="checkbox"> Express <span>&#8377;30.00</span></li>-->
                                        <!--</ul>-->
                                    </div>         
                                    <h4 class="grand-totall-title">Grand Total <span class="finalprice">&#8377;{{ number_format($grandprice,2) }}</span></h4>
                                    
                                    <a href="{{ url('/checkout') }}">Proceed to Checkout</a>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    @include('layouts.footer')
    
    @include('layouts.foot')
    
    <script>
          
            $('.qtybutton').each(function() {
                $(this).click(function(){
                    var $this = $(this);
                    var productid = $this.data('id');
                    var qtyvalue = $this.parent().find(':input').val();
                    var originalprice = $this.parent().parent().parent().find('.amount').text();
                    var originalpricewithoutsymbol = originalprice.replace(/[\u20B9]/g,'');
                    
                    var intqtyvalue = parseInt(qtyvalue);
                    var floatoriginalpricewithoutsymbol = parseFloat(originalpricewithoutsymbol);
                    
                    var withcommasfloatoriginalpricewithoutsymbol = floatoriginalpricewithoutsymbol.toFixed(2);
                    
                    var finalprice = floatoriginalpricewithoutsymbol * intqtyvalue;
                    $this.parent().parent().parent().find('.product-subtotal').text('\u20B9 '+finalprice.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ','));
                    
                    
                   
                    
                    var url = "{{ URL('/updatecartqty')}}";
                    var id= 
            		$.ajax({
            			url: url,
            			type: "GET",
            			cache: false,
            			data:{
                            _token:'{{ csrf_token() }}',
            				product_id: productid,
            				value: qtyvalue
            			},
            			success: function(dataResult){
                            dataResult = JSON.parse(dataResult);
                            //alert(dataResult.totalprice);
                         if(dataResult.statusCode)
                         {
                            //window.location = "/userData";
                            //location.reload();
                            $(".h5totalprice").empty();
                            $(".h5totalprice").append("&#8377;"+parseFloat(dataResult.totalprice).toFixed(2));
                            
                            $(".total-shipping").empty();
                            $(".total-shipping").append("<ul><li>Total shipping <span>&#8377;"+(dataResult.deliverycharge)+"</span></li></ul>");
                            $(".finalprice").empty();
                            $(".finalprice").append("&#8377;"+parseFloat(dataResult.grandprice).toFixed(2));
                                
                         }
                         else
                         {
                             alert("Internal Server Error");
                         }
            				
            			}
            		});
                    
                    
                    //alert(qtyvalue + " " + originalpricewithoutsymbol);
                
                    
                });
               
            });
        
        </script>
        
        

</body>

</html>