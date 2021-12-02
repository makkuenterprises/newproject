<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>4med | Wishlist</title>
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
        
         <!--mini cart start -->
        @include('layouts.sidebar_cart')
        
         <!--mobile header start -->
        @include('layouts.headermobile')
        
        <div class="breadcrumb-area bg-gray">
            <div class="container">
                <div class="breadcrumb-content text-center">
                    <ul>
                        <li>
                            <a href="{{ url('/') }}">Home</a>
                        </li>
                        <li class="active">Wishlist </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="cart-main-area pt-115 pb-120">
            <div class="container">
                <h3 class="cart-page-title">Your wishlist items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive cart-table-content">
                                <table>
                                     @if(count($wishlistproducts) > 0 )
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Product Name</th>
                                                <th>Until Price</th>
                                                <!--<th>Qty</th>-->
                                                <!--<th>Subtotal</th>-->
                                                <th>action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($wishlistproducts as $item)
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
                                                    <td class="product-price-cart"><span class="amount">&#8377; {{ number_format($item->price,2) }}</span></td>
                                                    <!--<td class="product-quantity pro-details-quality">-->
                                                    <!--    <div class="cart-plus-minus">-->
                                                    <!--        <div class="dec qtybutton" data-id= "{{ $item->id }}">-</div>-->
                                                    <!--        <input class="cart-plus-minus-box" type="text" name="qtybutton" data-id= "{{ $item->id }}" id="qtybutton" value="{{ $item->qty }}" readonly>-->
                                                    <!--        <div class="inc qtybutton" data-id= "{{ $item->id }}">+</div>-->
                                                    <!--    </div>-->
                                                    <!--</td>-->
                                                    <!--<td class="product-subtotal">&#8377; {{ number_format($item->price * $item->qty,2) }}</td>-->
                                                    <td class="product-wishlist-cart">
                                                       
                                                        <form></form>
                                                       
                                                       <form action="move_wishlist_to_cart" method="POST">
                                                           @csrf
                                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                            <input type="hidden" name="qty" value="{{ $item->qty }}">
                                                            <button class="btn-wishlist-to-cart">add to cart</button><br><br>
                                                       </form>
                                                       
                                                       <form action="remove_from_wishlist" method="POST">
                                                           @csrf
                                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                            <button class="btn-remove-from-wishlist">&emsp;Remove&emsp;</button><br><br>
                                                       </form>
                                                       
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                    @else
                                	   <p class="text-center">No wishlist items found</p>		
                                    @endif
                                </table>
                            </div>
                        </form>
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
                    
                    
                   
                    
                    var url = "{{ URL('/updatewishlistqty')}}";
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
                         if(dataResult.statusCode)
                         {
                            //window.location = "/userData";
                         }
                         else{
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