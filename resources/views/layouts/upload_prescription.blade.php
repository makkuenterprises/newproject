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

<style>

    .upload-file-prescription > input {
  visibility:hidden;
  width:0;
  height:0
}


</style>

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
                        <li class="active">Upload Prescription</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- Prescription Upload -->
        <div class="order-tracking-area pt-110 pb-120">
            <div class="container">
                <div class="checkout-wrap pt-30">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="billing-info-wrap mr-50">
                                <h3>Guide for a valid prescription</h3>
                                <div class="row">
                                    
                                    <img src="assets/images/product/pre.png" alt="Product Style">
                                    
                                    
                                </div>
                                <p>Government regulations require a valid prescription</p>
                                
                              
                                
                                
                               
                            </div>
                        </div>
                        
                        
                        <div class="col-lg-5">
                            <div class="your-order-area">
                                <h3>Upload Prescription</h3>
                              
                                <div class="your-order-wrap gray-bg-4">
                                    <div class="your-order-info-wrap">
                                        
                 
                                        
                                        
                                        <div class="col-lg-12 col-md-12">
                                            <div class="upload-file-prescription text-center mb-50 mt-50">
                                                <form method="POST" action="{{ route('prescription') }}" enctype="multipart/form-data">
                                                @csrf
                                                <input type="hidden" name="address_id" value="{{ $useraddress[0]->id }}">
                            
                            <input type = "hidden" name = "addresss" value = "{{ $useraddress[0]->fullname }},
                                                                             {{ $useraddress[0]->full_address }}, {{ $useraddress[0]->city }}, {{ $useraddress[0]->state }},
                                                                             {{ $useraddress[0]->pin_code }},
                                                                             {{ $useraddress[0]->alternate_phone }}">
                                                  <div class="mb-20">
                    <div class="billing-info-wrap">
                        <h3>Select Address</h3>
                        
                           
                            @if(count($useraddress) > 0 )
                             @foreach ($useraddress as $item)                           
                             
                                 <label class="labl">
                                <input type="radio" name="addressid" id="addressid" value="{{ $item->id }}" @if ($loop->first) {{ "checked" }} @endif}}/>
                                
                                 <div class="mb-20 your-order-area col-lg-12 col-md-12" id="addr" >
                                     <h5>{{ $item->fullname }}</h5>
                                     <h5>{{ $item->full_address }}, {{ $item->city }}, {{ $item->state }}</h5>
                                     <h5>{{ $item->pin_code }}</h5>
                                     <h5>{{ $item->alternate_phone }}</h5>
                                            
                                 </div>
                                 
                                 </label>
                            
                             @endforeach
                             
                            @else
                                <p class="ml-20">No Saved Address Found</p>		
                            @endif
                       
                    </div>
                    
                    
                   
                </div> <br>
                                                    <label name = "image" class="custom-file-upload">
                                                    <img class="animated" src="assets/images/prescription/file_upload.svg" alt="" width="40px"><h4>
                                                      Upload File
                                                      <input type="file" id="imageUpload" name="image"> 
                                                     
                                                        
                                                        
                                                        
                                                        
                                                        </h4> 
                                                        
                                                    </label>
                                                    
                                                     
                                                      @error('image')

                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                                    
                                                    <!--<div class="Place-order">-->
                                                    <!--    <a href="#">Proceed</a>-->
                                                        <input type="submit" class="btn btn-danger">
                                                    <!--</div>-->
                                                    
    						    	        
    						    	               
                                                  </form>
                                                  
                                            </div>
                                            
                                            <ul class="ul-with-circle-bullets mb-4">
                                    <h4>Why upload a prescription</h4>
                                    <li>Is your prescription hard to understand? We will help you in placing your order.</li>
                                    <li>Details from your prescription are not shared with any third party.</li>
                                    <li>Goverment regulations require a prescription for ordering some medicines.</li>
                                    <li>Include details of doctor and patient + clinic visit date.</li><br>
                                   
                                    <h4>Notice:</h4>
                                    <li>Don’t crop out any part of the image.</li>
                                    <li>Avoid blurred images.</li>
                                    <li>Medicines will be dispensed as per prescription.</li>
                                    <li>Supported file types: jpeg, jpg, png.</li>
                                    <li>Maximum allowed file size: 5MB</li>
                                </ul>
                                            
                                        </div>
                                       
                                    </div>
                                   
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-5 col-md-6 col-12 col-sm-12">
                                <div class="tab-content quickview-big-img">
                                    <div id="pro-1" class="tab-pane fade show active">
                                        <img src="assets/images/product/product-1.jpg" alt="">
                                    </div>
                                    <div id="pro-2" class="tab-pane fade">
                                        <img src="assets/images/product/product-3.jpg" alt="">
                                    </div>
                                    <div id="pro-3" class="tab-pane fade">
                                        <img src="assets/images/product/product-6.jpg" alt="">
                                    </div>
                                    <div id="pro-4" class="tab-pane fade">
                                        <img src="assets/images/product/product-3.jpg" alt="">
                                    </div>
                                </div>
                                <div class="quickview-wrap mt-15">
                                    <div class="quickview-slide-active nav-style-6">
                                        <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/images/product/quickview-s1.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#pro-2"><img src="assets/images/product/quickview-s2.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#pro-3"><img src="assets/images/product/quickview-s3.jpg" alt=""></a>
                                        <a data-toggle="tab" href="#pro-4"><img src="assets/images/product/quickview-s2.jpg" alt=""></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-6 col-12 col-sm-12">
                                <div class="product-details-content quickview-content">
                                    <h2>Simple Black T-Shirt</h2>
                                    <div class="product-ratting-review-wrap">
                                        <div class="product-ratting-digit-wrap">
                                            <div class="product-ratting">
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                                <i class="icon_star"></i>
                                            </div>
                                            <div class="product-digit">
                                                <span>5.0</span>
                                            </div>
                                        </div>
                                        <div class="product-review-order">
                                            <span>62 Reviews</span>
                                            <span>242 orders</span>
                                        </div>
                                    </div>
                                    <p>Seamlessly predominate enterprise metrics without performance based process improvements.</p>
                                    <div class="pro-details-price">
                                        <span class="new-price">$75.72</span>
                                        <span class="old-price">$95.72</span>
                                    </div>
                                    <div class="pro-details-color-wrap">
                                        <span>Color:</span>
                                        <div class="pro-details-color-content">
                                            <ul>
                                                <li><a class="dolly" href="#">dolly</a></li>
                                                <li><a class="white" href="#">white</a></li>
                                                <li><a class="azalea" href="#">azalea</a></li>
                                                <li><a class="peach-orange" href="#">Orange</a></li>
                                                <li><a class="mona-lisa active" href="#">lisa</a></li>
                                                <li><a class="cupid" href="#">cupid</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pro-details-size">
                                        <span>Size:</span>
                                        <div class="pro-details-size-content">
                                            <ul>
                                                <li><a href="#">XS</a></li>
                                                <li><a href="#">S</a></li>
                                                <li><a href="#">M</a></li>
                                                <li><a href="#">L</a></li>
                                                <li><a href="#">XL</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="pro-details-quality">
                                        <span>Quantity:</span>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                        </div>
                                    </div>
                                    <div class="product-details-meta">
                                        <ul>
                                            <li><span>Categories:</span> <a href="#">Woman,</a> <a href="#">Dress,</a> <a href="#">T-Shirt</a></li>
                                            <li><span>Tag: </span> <a href="#">Fashion,</a> <a href="#">Mentone</a> , <a href="#">Texas</a></li>
                                        </ul>
                                    </div>
                                    <div class="pro-details-action-wrap">
                                        <div class="pro-details-add-to-cart">
                                            <a title="Add to Cart" href="#">Add To Cart </a>
                                        </div>
                                        <div class="pro-details-action">
                                            <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
                                            <a title="Add to Compare" href="#"><i class="icon-refresh"></i></a>
                                            <a class="social" title="Social" href="#"><i class="icon-share"></i></a>
                                            <div class="product-dec-social">
                                                <a class="facebook" title="Facebook" href="#"><i class="icon-social-facebook"></i></a>
                                                <a class="twitter" title="Twitter" href="#"><i class="icon-social-twitter"></i></a>
                                                <a class="instagram" title="Instagram" href="#"><i class="icon-social-instagram"></i></a>
                                                <a class="pinterest" title="Pinterest" href="#"><i class="icon-social-pinterest"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
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

</body>

</html>