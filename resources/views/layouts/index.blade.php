<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Geetanjali Medicine</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
     @include('layouts.head')

</head>

<body>

    <div class="main-wrapper">
        <header class="header-area">
            
            @include('layouts.headerhome')
             
        </header>
        
        <!-- mini cart start -->
        @include('layouts.sidebar_cart')
        
        <!-- mobile header start -->
        @include('layouts.headermobile')
        
          
        
        <div class="slider-banner-area">
            <!--<div class="container">-->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        
                        @if(count($banner) > 0 ) 
                        <div class="slider-area bg-white mb-30">
                            <div class="hero-slider-active-3 dot-style-2 dot-style-2-position-4 dot-style-2-active-purple animated">
                                
                                @foreach ($banner as $item)
                                <div class="single-hero-slider single-animation-wrap">
                                    <div class="row">
                                        <!--<div class="col-lg-6 col-md-6 col-sm-6">-->
                                            <!--<div class="hero-slider-content-1 slider-animated-1 hero-slider-content-1-padding1">-->
                                            <!--    <h1 class="animated font-dec">Dedicated to bring the best<br>Hygiene Range</h1>-->
                                            <!--    <p class="animated width-inc">Explore our products, campaigns, social interactions, 4med’s world of content, latest news.</p>-->
                                               
                                            <!--</div>-->
                                        <!--</div>-->
                                        <div class="col-lg-12 col-md-12">
                                            <div class="hm6-hero-slider-img slider-animated-1">
                                                <img src="{{ $item->thumbnail }}" alt="{{ $item->alt }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach 
                                
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            <!--</div>-->
        </div>
        <br><br>
        
          
    
        <div class="service-area pb-115">
            <div class="container">
                <div class="section-title-btn-wrap border-bottom-3 mb-50 pb-20">
                    <div class="section-title-deal-wrap">
                        <div class="section-title-3">
                            <h2>Quick Order</h2>
                        </div>
                    </div>
                </div>
                <div class="service-wrap-border service-wrap-padding-3">
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 service-border-1">
                            
                            <div class="single-service-wrap-2 mb-30">
                                <div class="service-icon-2 icon-purple">
                                    <img src="assets/images/prescription/prescription.svg" alt="4med" width ="34px">
                                </div>
                                <div class="service-content-2">
                                    
                                    <h3>Upload Prescription</h3>
                                   <p>   <a href = "{{ route('upload.prescription') }}"> Click here to upload </a>  </p> 
                                   
                                </div>
                            </div>
                           
                            
                           
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12 service-border-1 service-border-1-none-md">
                            <div class="single-service-wrap-2 mb-30">
                                <div class="service-icon-2 icon-purple">
                                    <img src="assets/images/prescription/prescription_verified.svg" alt="4med" width ="34px">
                                </div>
                                <div class="service-content-2">
                                    <h3>Verification</h3>
                                    <p>Verified By Experts</p>
                                </div>
                            </div>
                        </div>
                        <!--<div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1">-->
                        <!--    <div class="single-service-wrap-2 mb-30">-->
                        <!--        <div class="service-icon-2 icon-purple">-->
                        <!--            <i class="icon-credit-card "></i>-->
                        <!--        </div>-->
                        <!--        <div class="service-content-2">-->
                        <!--            <h3>Secure Payment</h3>-->
                        <!--            <p>100% Guarantee</p>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="single-service-wrap-2 mb-30">
                                <div class="service-icon-2 icon-purple">
                                    <img src="assets/images/prescription/box.svg" alt="4med" width ="34px">
                                </div>
                                <div class="service-content-2">
                                    <h3>Order</h3>
                                    <p>Place your order</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="product-categories-area pb-115">
            <div class="container">
                <div class="section-title-btn-wrap border-bottom-3 mb-50 pb-20">
                    <div class="section-title-3">
                        <h2>Popular Categories</h2>
                    </div>
                    <div class="btn-style-7">
                        <a href="categories">All Categories</a>
                    </div>
                </div>
                <div class="product-categories-slider-1 nav-style-3">
                    
                    @foreach ($categories as $catitem)
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-border mb-20">
                                <a href="{{ url('/category/'.$catitem->id) }}">
                                    <img src="{{ $catitem->category_thumbnail }}" alt="{{ $catitem->category_name }}" height="155px" width="200px">
                                </a>
                            </div>
                            <div class="product-content-categories-2 text-center">
                                <h5><a href="{{ url('/category/'.$catitem->id) }}">{{ $catitem->category_name }}</a></h5>
                            </div>
                        </div>
                    </div>
                    @endforeach 
                    
                </div>
            </div>
        </div>
        
        @if(count($topproducts) > 0 ) 
        <div class="product-area pb-110">
            <div class="container">
                <div class="section-title-btn-wrap border-bottom-3 mb-50 pb-20">
                    <div class="section-title-deal-wrap">
                        <div class="section-title-3">
                            <h2>Top Products</h2>
                        </div>
                        <!--<div class="timer-wrap-2">-->
                        <!--    <h4><i class="icon-speedometer"></i> Expires in:</h4>-->
                        <!--    <div class="timer-style-2" id="timer-2-active"></div>-->
                        <!--</div>-->
                    </div>
                    <!--<div class="btn-style-7">-->
                    <!--    <a href="shop.html">All Product</a>-->
                    <!--</div>-->
                </div>
                <div class="product-slider-active-3 nav-style-3">
                    
                    @foreach ($topproducts as $item)
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="{{ url('product_details/'.$item->id) }}">
                                    @if (empty($item->product_thumbnail))
                                        <img src="{{ asset('assets/images/product/default.jpg') }}" alt="{{ $item->product_name }}" height="220px">
                                    @else
                                        <img src="{{ $item->product_thumbnail }}" alt="{{ $item->product_name }}" height="220px">
                                    @endif
                                </a>
                                @if($item->discount_price == NULL)
                                
                                @else
                                
                                @php 
                                
                                
                                //$actual = ($item->discount_price / 100) * $item->price;
                              
                                
                                   
                                    
                                
                                @endphp
                                
                                <span class="pro-badge left bg-red">{{  $item->discount_price }}%</span>
                                
                                @endif
                                
                                <div class="product-action-2 tooltip-style-2">
                                  <form action="/add_to_wishlist" method="POST">
                                                           @csrf
                                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                            <button title="Wishlist"><i class="icon-heart"></i></button>
                                                       </form>

                                </div>
                            </div>
                            <div class="product-content-wrap-3">
                                <div class="product-content-categories">
                                    <a class="purple" href="{{ url('category/'.$item->category_id) }}">{{ $item->category_name }}</a>
                                </div>
                                <h3><a class="purple" href="{{ url('product_details/'.$item->id) }}">{{ $item->product_name }}</a></h3>
                                <!--<div class="product-rating-wrap-2">-->
                                <!--    <div class="product-rating-4">-->
                                <!--        <i class="icon_star"></i>-->
                                <!--        <i class="icon_star"></i>-->
                                <!--        <i class="icon_star"></i>-->
                                <!--        <i class="icon_star"></i>-->
                                <!--        <i class="icon_star"></i>-->
                                <!--    </div>-->
                                <!--    <span>(4)</span>-->
                                <!--</div>-->
                                <div class="product-price-4">
                                    
                                    @if($item->discount_price == NULL)
                                    
                                    <span class="new-price">&#8377;{{ number_format($item->price,2) }}</span>
                                    
                                    @else
                                    
                                      @php  $price = ($item->price/100) * $item->discount_price;
                                      
                                      
                                      @endphp
                                        
                                        <span class="new-price">&#8377;{{ number_format($item->price - $price,2) }}</span>
                                        <span class="old-price">&#8377;{{ number_format($item->price,2) }}</span>
                                    
                                    @endif
                                    
                                    
                                </div>
                            </div>
                            <div class="product-content-wrap-3 product-content-position-2">
                                <div class="product-content-categories">
                                    <a class="purple" href="{{ url('category/'.$item->category_id) }}">{{ $item->category_name }}</a>
                                </div>
                                <h3><a class="purple" href="{{ url('product_details/'.$item->id) }}">{{ $item->product_name }}</a></h3>
                                <!--<div class="product-rating-wrap-2">-->
                                <!--    <div class="product-rating-4">-->
                                <!--        <i class="icon_star"></i>-->
                                <!--        <i class="icon_star"></i>-->
                                <!--        <i class="icon_star"></i>-->
                                <!--        <i class="icon_star"></i>-->
                                <!--        <i class="icon_star"></i>-->
                                <!--    </div>-->
                                <!--    <span>(4)</span>-->
                                <!--</div>-->
                                <div class="product-price-4">
                                    @if($item->discount_price == NULL)
                                    <span class="new-price">&#8377;{{ number_format($item->price,2) }}</span>
                                    <!--<span class="old-price">&#8377;42.85</span>-->
                                    @else
                                    
                                     <span class="new-price">&#8377;{{ number_format($item->price - $price,2) }}</span>
                                        <span class="old-price">&#8377;{{ number_format($item->price,2) }}</span>
                                    
                                    @endif
                                </div>
                                <div class="pro-add-to-cart-2">
                                    <form action="/add_to_cart" method="POST" style="display: inline-block;">
                                        @csrf
                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                        <button title="Add to Cart">Add To Cart</button>
                                    </form>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                    
                </div>
            </div>
        </div>
        @endif
        
        <div class="banner-area pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="banner-wrap mb-30">
                            <div class="banner-img banner-img-zoom">
                                <a href="products"><img src="assets/images/banner/slow7.jpg" alt=""></a>
                            </div>
                            <!--<div class="banner-content-11 banner-content-11-modify">-->
                            <!--    <h2><span></span><br></h2>-->
                            <!--    <p></p>-->
                            <!--    <div class="btn-style-4 pl-40">-->
                            <!--        <a class="hover-red" href="products">Shop now <i class="icon-arrow-right"></i></a>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <div class="banner-wrap mb-30">
                            <div class="banner-img banner-img-zoom">
                                <a href="products"><img src="assets/images/banner/slow6.jpg" alt=""></a>
                            </div>
                            <!--<div class="banner-content-11 banner-content-11-modify">-->
                            <!--    <h2><span></span> <br></h2>-->
                            <!--    <p></p>-->
                            <!--    <div class="btn-style-4 pt-130 ">-->
                            <!--        <a class="hover-red" href="product-details.html">Shop now <i class="icon-arrow-right"></i></a>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        @if(count($personalcareproducts) > 0 ) 
        <div class="product-area pb-85">
            <div class="container">
                <div class="d-flex justify-content-between w-100 section-title-5 section-title-5-bg-1 mb-40">
                    <!--<i class="far fa-child"></i>-->
                    <h5 class="red">Personal Care</h5>
                    <a href="{{ url('category/2') }}">All Products </a>
                    <!--<a href="{{ url('category/2') }}" class="text-right">All Products </a>-->
                </div>
                <div class="flex-row-reverse">
                   
                        
                        <div class="tab-content tab-hm6-categories-slider tab-content-mrg-top jump">
                            <div id="product-9" class="tab-pane active">
                                <div class="row">
                                    
                                   @foreach ($personalcareproducts->slice(0, 6) as $item)
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-6 product-plr-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="{{ url('product_details/'.$item->id) }}">
                                                    @if (empty($item->product_thumbnail))
                                                        <img src="{{ asset('assets/images/product/default.jpg') }}" alt="{{ $item->product_name }}" height="160px">
                                                    @else
                                                        <img src="{{ $item->product_thumbnail }}" alt="{{ $item->product_name }}" height="160px">
                                                    @endif
                                                </a>
                                                @if($item->discount_price == NULL)
                                
                                                 @else
                                
                                                @php
                                                
                                                
                                                //$actual = ($item->discount_price / 100) * $item->price;
                                                
                                                
                                                @endphp
                                                
                                                <span class="pro-badge left bg-red">{{  $item->discount_price }}%</span>
                                                
                                                @endif
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="{{ url('product_details/'.$item->id) }}">{{ $item->product_name }}</a></h3>
                                                <div class="product-price-2">
                                                    @if($item->discount_price == NULL)
                                                    <span class="new-price">&#8377;{{ number_format($item->price,2) }} </span>
                                                    @else
                                                     @php  $price = ($item->price/100) * $item->discount_price; @endphp
                                                    <span class="new-price">&#8377;{{ number_format($item->price - $price,2) }}</span>
                                                    <span class="old-price">&#8377;{{ number_format($item->price,2) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="{{ url('product_details/'.$item->id) }}">{{ $item->product_name }}</a></h3>
                                                <div class="product-price-2">
                                                     @if($item->discount_price == NULL)
                                                    <span class="new-price">&#8377;{{ number_format($item->price,2) }} </span>
                                                    @else
                                                     @php  $price = ($item->price/100) * $item->discount_price; @endphp
                                                    <span class="new-price">&#8377;{{ number_format($item->price - $price,2) }}</span>
                                                    <span class="old-price">&#8377;{{ number_format($item->price,2) }}</span>
                                                    @endif
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <form action="/add_to_cart" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                        <button title="Add to Cart">Add To Cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    <div class="w-100"></div>
                                    <br><br>
                                    
                                    @foreach ($personalcareproducts->slice(6, 12) as $item)
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-6 product-plr-1 p-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="{{ url('product_details/'.$item->id) }}">
                                                    @if (empty($item->product_thumbnail))
                                                        <img src="{{ asset('assets/images/product/default.jpg') }}" alt="{{ $item->product_name }}" height="160px">
                                                    @else
                                                        <img src="{{ $item->product_thumbnail }}" alt="{{ $item->product_name }}" height="160px">
                                                    @endif
                                                </a>
                                                 @if($item->discount_price == NULL)
                                
                                                 @else
                                
                                                @php 
                                                
                                                
                                                //$actual = ($item->discount_price / 100) * $item->price;
                                              
                                                
                                                   
                                                    
                                                
                                                @endphp
                                                
                                                <span class="pro-badge left bg-red">{{  $item->discount_price }}%</span>
                                                
                                                @endif
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="{{ url('product_details/'.$item->id) }}">{{ $item->product_name }}</a></h3>
                                                <div class="product-price-2">
                                                   @if($item->discount_price == NULL)
                                                    <span class="new-price">&#8377;{{ number_format($item->price,2) }} </span>
                                                    @else
                                                     @php  $price = ($item->price/100) * $item->discount_price; @endphp
                                                    <span class="new-price">&#8377;{{ number_format($item->price - $price,2) }}</span>
                                                    <span class="old-price">&#8377;{{ number_format($item->price,2) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="{{ url('product_details/'.$item->id) }}">{{ $item->product_name }}</a></h3>
                                                <div class="product-price-2">
                                                     @if($item->discount_price == NULL)
                                                    <span class="new-price">&#8377;{{ number_format($item->price,2) }} </span>
                                                    @else
                                                     @php  $price = ($item->price/100) * $item->discount_price; @endphp
                                                    <span class="new-price">&#8377;{{ number_format($item->price - $price,2) }}</span>
                                                    <span class="old-price">&#8377;{{ number_format($item->price,2) }}</span>
                                                    @endif
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <form action="/add_to_cart" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                        <button title="Add to Cart">Add To Cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
        @endif
       
        @if(count($babycareproducts) > 0 ) 
        <div class="product-area pb-85">
            <div class="container">
                <div class="d-flex justify-content-between w-100 section-title-5 section-title-5-bg-1 mb-10">
                    <h5 class="red">Baby Care</h5>
                     <a href="{{ url('category/3') }}">All Products </a>
                </div>
                <div class="row flex-row-reverse">
                    <div class="col-lg-12">
                        <div class="tab-style-7 tab-hm6-categories nav">
                            <!--<a href="{{ url('category/3') }}">All Products </a>-->
                            <!--<a href="#product-10" data-toggle="tab"> Best Seller </a>-->
                            <!--<a href="#product-11" data-toggle="tab">Sale </a>-->
                        </div>
                        <div class="tab-content tab-hm6-categories-slider tab-content-mrg-top jump">
                            <div id="product-9" class="tab-pane active">
                                <div class="row">
                                    
                                   @foreach ($babycareproducts->slice(0, 6) as $item)
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-6 product-plr-1 p-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="{{ url('product_details/'.$item->id) }}">
                                                    @if (empty($item->product_thumbnail))
                                                        <img src="{{ asset('assets/images/product/default.jpg') }}" alt="{{ $item->product_name }}" height="160px">
                                                    @else
                                                        <img src="{{ $item->product_thumbnail }}" alt="{{ $item->product_name }}" height="160px">
                                                    @endif
                                                </a>
                                                 @if($item->discount_price == NULL)
                                
                                                 @else
                                
                                                @php 
                                                
                                                
                                                //$actual = ($item->discount_price / 100) * $item->price;
                                              
                                                
                                                   
                                                    
                                                
                                                @endphp
                                                
                                                <span class="pro-badge left bg-red">{{  $item->discount_price }}%</span>
                                                
                                                @endif
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="{{ url('product_details/'.$item->id) }}">{{ $item->product_name }}</a></h3>
                                                <div class="product-price-2">
                                                    @if($item->discount_price == NULL)
                                                    <span class="new-price">&#8377;{{ number_format($item->price,2) }} </span>
                                                    @else
                                                     @php  $price = ($item->price/100) * $item->discount_price; @endphp
                                                    <span class="new-price">&#8377;{{ number_format($item->price - $price,2) }}</span>
                                                    <span class="old-price">&#8377;{{ number_format($item->price,2) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="{{ url('product_details/'.$item->id) }}">{{ $item->product_name }}</a></h3>
                                                <div class="product-price-2">
                                                    @if($item->discount_price == NULL)
                                                    <span class="new-price">&#8377;{{ number_format($item->price,2) }} </span>
                                                    @else
                                                     @php  $price = ($item->price/100) * $item->discount_price; @endphp
                                                    <span class="new-price">&#8377;{{ number_format($item->price - $price,2) }}</span>
                                                    <span class="old-price">&#8377;{{ number_format($item->price,2) }}</span>
                                                    @endif
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <form action="/add_to_cart" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                        <button title="Add to Cart">Add To Cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    <div class="w-100"></div>
                                    <br><br>
                                    
                                    @foreach ($babycareproducts->slice(6, 12) as $item)
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-6 product-plr-1 p-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="{{ url('product_details/'.$item->id) }}">
                                                    @if (empty($item->product_thumbnail))
                                                        <img src="{{ asset('assets/images/product/default.jpg') }}" alt="{{ $item->product_name }}" height="160px">
                                                    @else
                                                        <img src="{{ $item->product_thumbnail }}" alt="{{ $item->product_name }}" height="160px">
                                                    @endif
                                                </a>
                                                 @if($item->discount_price == NULL)
                                
                                                 @else
                                
                                                @php 
                                                
                                                
                                                //$actual = ($item->discount_price / 100) * $item->price;
                                              
                                                
                                                   
                                                    
                                                
                                                @endphp
                                                
                                                <span class="pro-badge left bg-red">{{  $item->discount_price }}%</span>
                                                
                                                @endif
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="{{ url('product_details/'.$item->id) }}">{{ $item->product_name }}</a></h3>
                                                <div class="product-price-2">
                                                    @if($item->discount_price == NULL)
                                                    <span class="new-price">&#8377;{{ number_format($item->price,2) }} </span>
                                                    @else
                                                     @php  $price = ($item->price/100) * $item->discount_price; @endphp
                                                    <span class="new-price">&#8377;{{ number_format($item->price - $price,2) }}</span>
                                                    <span class="old-price">&#8377;{{ number_format($item->price,2) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="{{ url('product_details/'.$item->id) }}">{{ $item->product_name }}</a></h3>
                                                <div class="product-price-2">
                                                    @if($item->discount_price == NULL)
                                                    <span class="new-price">&#8377;{{ number_format($item->price,2) }} </span>
                                                    @else
                                                     @php  $price = ($item->price/100) * $item->discount_price; @endphp
                                                    <span class="new-price">&#8377;{{ number_format($item->price - $price,2) }}</span>
                                                    <span class="old-price">&#8377;{{ number_format($item->price,2) }}</span>
                                                    @endif
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <form action="/add_to_cart" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                        <button title="Add to Cart">Add To Cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        
        @if(count($nutritionandfitness) > 0 ) 
        <div class="product-area pb-85">
            <div class="container">
                <div class="d-flex justify-content-between w-100  section-title-5 section-title-5-bg-1 mb-10">
                    <h5 class="red">Nutrition</h5>
                    <a href="{{ url('category/7') }}">All Products </a>
                </div>
                <div class="row flex-row-reverse">
                    <div class="col-lg-12">
                        <div class="tab-style-7 tab-hm6-categories nav">
                            
                            <!--<a href="#product-10" data-toggle="tab"> Best Seller </a>-->
                            <!--<a href="#product-11" data-toggle="tab">Sale </a>-->
                        </div>
                        <div class="tab-content tab-hm6-categories-slider tab-content-mrg-top jump">
                            <div id="product-9" class="tab-pane active">
                                <div class="row">
                                    
                                   @foreach ($nutritionandfitness->slice(0, 6) as $item)
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-6 product-plr-1 p-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="{{ url('product_details/'.$item->id) }}">
                                                    @if (empty($item->product_thumbnail))
                                                        <img src="{{ asset('assets/images/product/default.jpg') }}" alt="{{ $item->product_name }}" height="160px">
                                                    @else
                                                        <img src="{{ $item->product_thumbnail }}" alt="{{ $item->product_name }}" height="160px">
                                                    @endif
                                                </a>
                                                 @if($item->discount_price == NULL)
                                
                                                 @else
                                
                                                @php 
                                                
                                                
                                                //$actual = ($item->discount_price / 100) * $item->price;
                                              
                                                
                                                   
                                                    
                                                
                                                @endphp
                                                
                                                <span class="pro-badge left bg-red">{{  $item->discount_price }}%</span>
                                                
                                                @endif
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="{{ url('product_details/'.$item->id) }}">{{ $item->product_name }}</a></h3>
                                                <div class="product-price-2">
                                                    @if($item->discount_price == NULL)
                                                    <span class="new-price">&#8377;{{ number_format($item->price,2) }} </span>
                                                    @else
                                                     @php  $price = ($item->price/100) * $item->discount_price; @endphp
                                                    <span class="new-price">&#8377;{{ number_format($item->price - $price,2) }}</span>
                                                    <span class="old-price">&#8377;{{ number_format($item->price,2) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="{{ url('product_details/'.$item->id) }}">{{ $item->product_name }}</a></h3>
                                                <div class="product-price-2">
                                                    @if($item->discount_price == NULL)
                                                    <span class="new-price">&#8377;{{ number_format($item->price,2) }} </span>
                                                    @else
                                                     @php  $price = ($item->price/100) * $item->discount_price; @endphp
                                                    <span class="new-price">&#8377;{{ number_format($item->price - $price,2) }}</span>
                                                    <span class="old-price">&#8377;{{ number_format($item->price,2) }}</span>
                                                    @endif
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <form action="/add_to_cart" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                        <button title="Add to Cart">Add To Cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    <div class="w-100"></div>
                                    <br><br>
                                    
                                    @foreach ($nutritionandfitness->slice(6, 12) as $item)
                                    <div class="col-lg-2 col-md-2 col-sm-6 col-6 product-plr-1 p-1">
                                        <div class="single-product-wrap">
                                            <div class="product-img product-img-zoom mb-15">
                                                <a href="{{ url('product_details/'.$item->id) }}">
                                                    @if (empty($item->product_thumbnail))
                                                        <img src="{{ asset('assets/images/product/default.jpg') }}" alt="{{ $item->product_name }}" height="160px">
                                                    @else
                                                        <img src="{{ $item->product_thumbnail }}" alt="{{ $item->product_name }}" height="160px">
                                                    @endif
                                                </a>
                                                  @if($item->discount_price == NULL)
                                
                                                 @else
                                
                                                @php 
                                                
                                                
                                                //$actual = ($item->discount_price / 100) * $item->price;
                                              
                                                
                                                   
                                                    
                                                
                                                @endphp
                                                
                                                <span class="pro-badge left bg-red">{{  $item->discount_price }}%</span>
                                                
                                                @endif
                                            </div>
                                            <div class="product-content-wrap-2 text-center">
                                                <h3><a href="{{ url('product_details/'.$item->id) }}">{{ $item->product_name }}</a></h3>
                                                <div class="product-price-2">
                                                   @if($item->discount_price == NULL)
                                                    <span class="new-price">&#8377;{{ number_format($item->price,2) }} </span>
                                                    @else
                                                     @php  $price = ($item->price/100) * $item->discount_price; @endphp
                                                    <span class="new-price">&#8377;{{ number_format($item->price - $price,2) }}</span>
                                                    <span class="old-price">&#8377;{{ number_format($item->price,2) }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="product-content-wrap-2 product-content-wrap-2-modify product-content-position text-center">
                                                <h3><a href="{{ url('product_details/'.$item->id) }}">{{ $item->product_name }}</a></h3>
                                                <div class="product-price-2">
                                                    @if($item->discount_price == NULL)
                                                    <span class="new-price">&#8377;{{ number_format($item->price,2) }} </span>
                                                    @else
                                                     @php  $price = ($item->price/100) * $item->discount_price; @endphp
                                                    <span class="new-price">&#8377;{{ number_format($item->price - $price,2) }}</span>
                                                    <span class="old-price">&#8377;{{ number_format($item->price,2) }}</span>
                                                    @endif
                                                </div>
                                                <div class="pro-add-to-cart">
                                                    <form action="/add_to_cart" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                        <button title="Add to Cart">Add To Cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
        
        <div class="about-us-area pb-115">
            <div class="container">
                <div class="about-us-content-2">
                    <div class="about-us-content-2-title">
                        <h4>"Dedicated to the health & well being of every household"</h4>
                    </div>
                    <p> We, at The Geetanjali store, have always believed in bringing safe, efficacious, and affordable products to our customers. This is to reemphasize and clarify that we have not increased the rates of our PureHands Hand Sanitizers or Pure Hands Hand Washes.our prices are irresistible. We're sure you'll find yourself picking up more than what you had in mind.</p>
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
                                        <img src="assets/images/banner/fast13.jpg" alt="Product">
                                    </div>
                                    <!--<div id="pro-2" class="tab-pane fade">-->
                                    <!--    <img src="assets/images/product/product-3.jpg" alt="">-->
                                    <!--</div>-->
                                    <!--<div id="pro-3" class="tab-pane fade">-->
                                    <!--    <img src="assets/images/product/product-6.jpg" alt="">-->
                                    <!--</div>-->
                                    <!--<div id="pro-4" class="tab-pane fade">-->
                                    <!--    <img src="assets/images/product/product-3.jpg" alt="">-->
                                    <!--</div>-->
                                </div>
                                <!--<div class="quickview-wrap mt-15">-->
                                <!--    <div class="quickview-slide-active nav-style-6">-->
                                <!--        <a class="active" data-toggle="tab" href="#pro-1"><img src="assets/images/product/quickview-s1.jpg" alt=""></a>-->
                                <!--        <a data-toggle="tab" href="#pro-2"><img src="assets/images/product/quickview-s2.jpg" alt=""></a>-->
                                <!--        <a data-toggle="tab" href="#pro-3"><img src="assets/images/product/quickview-s3.jpg" alt=""></a>-->
                                <!--        <a data-toggle="tab" href="#pro-4"><img src="assets/images/product/quickview-s2.jpg" alt=""></a>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                            <div class="col-lg-7 col-md-6 col-12 col-sm-12">
                                <div class="product-details-content quickview-content">
                                    <h2>Nutrition</h2>
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
                                            <!--<span>62 Reviews</span>-->
                                            <span>242 orders</span>
                                        </div>
                                    </div>
                                    <p>Horlicks Health and Nutrition Drink Refill Pack is a blend of protein products minerals, and vitamins. It helps in making bones stronger and minds sharper. It is useful in increasing lean tissue in the body.</p>
                                    <div class="pro-details-price">
                                        <span class="new-price">&#8377;38.50</span>
                                        <span class="old-price">&#8377;42.85</span>
                                    </div>
                                    
                                    
                                    <div class="pro-details-quality">
                                        <span>Quantity:</span>
                                        <div class="cart-plus-minus">
                                            <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">
                                        </div>
                                    </div>
                                    <div class="product-details-meta">
                                        <ul>
                                            <li><span>Categories:</span> <a href="categories?categories=fitness">Fitness & nutrition</a></li>
                                        </ul>
                                    </div>
                                    <div class="pro-details-action-wrap">
                                        <div class="pro-details-add-to-cart">
                                            <a title="Add to Cart" href="#">Add To Cart </a>
                                        </div>
                                        <div class="pro-details-action">
                                            <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
                                            <!--<a class="social" title="Social" href="#"><i class="icon-share"></i></a>-->
                                            <!--<div class="product-dec-social">-->
                                            <!--    <a class="facebook" title="Facebook" href="#"><i class="icon-social-facebook"></i></a>-->
                                            <!--    <a class="twitter" title="Twitter" href="#"><i class="icon-social-twitter"></i></a>-->
                                            <!--    <a class="instagram" title="Instagram" href="#"><i class="icon-social-instagram"></i></a>-->
                                            <!--    <a class="pinterest" title="Pinterest" href="#"><i class="icon-social-pinterest"></i></a>-->
                                            <!--</div>-->
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
     $('.nice-select').each(function() {
        $(this).on('change',function(e){
            console.log(e);
            var cat_id =  e.target.value;
            $('input[name="catid"]').val(cat_id);
        });

    });
</script>



</body>

</html>