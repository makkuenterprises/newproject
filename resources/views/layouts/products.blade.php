<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Geetanjali Medicine | Products</title>
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
                        <li class="active">Products</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="shop-area pt-120 pb-120 section-padding-2">
            <div class="container-fluid">
                <div class="row flex-row-reverse">
                    <div class="col-lg-9">
                        <div class="shop-topbar-wrapper">
                            <div class="shop-topbar-left">
                                <div class="view-mode nav">
                                    <a class="active" href="#shop-1" data-toggle="tab"><i class="icon-grid"></i></a>
                                    <a href="#shop-2" data-toggle="tab"><i class="icon-menu"></i></a>
                                </div>
                                <p>Showing 
                                        {{($products->currentpage()-1)*$products->perpage()+1}}  
                                    - 
                                        {{$products->currentpage()*$products->perpage()}} 
                                    of 
                                        {{$products->total()}} results </p>
                            </div>
                            <!--<div class="product-sorting-wrapper">-->
                            <!--    <div class="product-shorting shorting-style">-->
                            <!--        <label>View :</label>-->
                            <!--        <select>-->
                            <!--            <option value=""> 20</option>-->
                            <!--            <option value=""> 23</option>-->
                            <!--            <option value=""> 30</option>-->
                            <!--        </select>-->
                            <!--    </div>-->
                            <!--    <div class="product-show shorting-style">-->
                            <!--        <label>Sort by :</label>-->
                            <!--        <select>-->
                            <!--            <option value="">Default</option>-->
                            <!--            <option value=""> Name</option>-->
                            <!--            <option value=""> price</option>-->
                            <!--        </select>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        <div class="shop-bottom-area">
                            <div class="tab-content jump">
                                <div id="shop-1" class="tab-pane active">
                                    <div class="row">
                                        @if(count($products) > 0 ) 
                                         @foreach ($products as $item)
                        
                                        <div class="col-xl-2 col-lg-4 col-md-6 col-sm-6 col-6">
                                            <div class="single-product-wrap mb-35">
                                                <div class="product-img product-img-zoom mb-15">
                                                    <a href="{{ url('imageUpload/'.$item->id) }}">
                                                        
                                                        @if (empty($item->product_thumbnail))
                                                            <img src="{{ asset('assets/images/product/default.jpg') }}" alt="{{ $item->product_name }}" height="150px">
                                                        @else
                                                            <img src="{{ $item->product_thumbnail }}" alt="{{ $item->product_name }}" height="150px">
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
                                                       
                                                        @if (empty($item->product_thumbnail))
                                                        
                                                        <button title="Quick View" 
                                                            data-toggle="modal" 
                                                            data-target-id="{{ $item->id }}"
                                                            data-target-name="{{ $item->product_name }}"
                                                            data-target-price="{{ number_format($item->price,2) }}"
                                                            data-target-description="{{ $item->product_description }}"
                                                            data-target-size="{{ $item->product_size }}"
                                                            data-target-category="{{ $item->category_name }}"
                                                            data-target-image="{{ asset('assets/images/product/default.jpg') }}"
                                                            data-target="#productdescModal"><i class="icon-size-fullscreen icons"></i></button>
                                                            
                                                        @else
                                                        
                                                            <button title="Quick View" 
                                                            data-toggle="modal" 
                                                            data-target-id="{{ $item->id }}"
                                                            data-target-name="{{ $item->product_name }}"
                                                            data-target-price="{{ number_format($item->price,2) }}"
                                                            data-target-description="{{ $item->product_description }}"
                                                            data-target-size="{{ $item->product_size }}"
                                                            data-target-category="{{ $item->category_name }}"
                                                            data-target-image="{{ $item->product_thumbnail }}"
                                                            data-target="#productdescModal"><i class="icon-size-fullscreen icons"></i></button>
                                                            
                                                        @endif
                                                        
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap-2 text-center">
                                                    <!--<div class="product-rating-wrap">-->
                                                    <!--    <div class="product-rating">-->
                                                    <!--        <i class="icon_star"></i>-->
                                                    <!--        <i class="icon_star"></i>-->
                                                    <!--        <i class="icon_star"></i>-->
                                                    <!--        <i class="icon_star"></i>-->
                                                    <!--        <i class="icon_star gray"></i>-->
                                                    <!--    </div>-->
                                                    <!--    <span>(2)</span>-->
                                                    <!--</div>-->
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
                                                <div class="product-content-wrap-2 product-content-position text-center">
                                                    <!--<div class="product-rating-wrap">-->
                                                    <!--    <div class="product-rating">-->
                                                    <!--        <i class="icon_star"></i>-->
                                                    <!--        <i class="icon_star"></i>-->
                                                    <!--        <i class="icon_star"></i>-->
                                                    <!--        <i class="icon_star"></i>-->
                                                    <!--        <i class="icon_star gray"></i>-->
                                                    <!--    </div>-->
                                                    <!--    <span>(2)</span>-->
                                                    <!--</div>-->
                                                    <h3><a href="{{ url('product_details/'.$item->id) }}">{{$item->product_name}}</a></h3>
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
                                                        <form action="/add_to_cart" method="POST">
                                                           @csrf
                                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                            <button title="Add to Cart" style="font-size:12px;padding-top:5px;padding-bottom:5px;padding-left:12px;padding-right:12px;">Add To Cart</button>
                                                       </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        @else
                                	        <p class="text-center">No products found</p>		
                                    	@endif
                                    </div>
                                </div>
                                <div id="shop-2" class="tab-pane">
                                    @if(count($products) > 0 ) 
                                     @foreach ($products as $item)
                                     <div class="shop-list-wrap mb-30">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-5 col-md-6 col-sm-6">
                                                <div class="product-list-img">
                                                    <a href="{{ url('product_details/'.$item->id) }}">
                                                        
                                                        @if (empty($item->product_thumbnail))
                                                            <img src="{{ asset('assets/images/product/default.jpg') }}" alt="{{ $item->product_name }}" height="220px">
                                                        @else
                                                            <img src="{{ $item->product_thumbnail }}" alt="{{ $item->product_name }}" height="220px">
                                                        @endif
                                                        
                                                    </a>
                                                    <div class="product-list-quickview">
                                                        
                                                        @if (empty($item->product_thumbnail))
                                                        
                                                        <button title="Quick View" 
                                                            data-toggle="modal" 
                                                            data-target-id="{{ $item->id }}"
                                                            data-target-name="{{ $item->product_name }}"
                                                            data-target-price="{{ number_format($item->price,2) }}"
                                                            data-target-description="{{ $item->product_description }}"
                                                            data-target-size="{{ $item->product_size }}"
                                                            data-target-category="{{ $item->category_name }}"
                                                            data-target-image="{{ asset('assets/images/product/default.jpg') }}"
                                                            data-target="#productdescModal"><i class="icon-size-fullscreen icons"></i></button>
                                                            
                                                        @else
                                                        
                                                            <button title="Quick View" 
                                                            data-toggle="modal" 
                                                           data-target-id="{{ $item->id }}"
                                                            data-target-name="{{ $item->product_name }}"
                                                            data-target-price="{{ number_format($item->price,2) }}"
                                                            data-target-description="{{ $item->product_description }}"
                                                            data-target-size="{{ $item->product_size }}"
                                                            data-target-category="{{ $item->category_name }}"
                                                            data-target-image="{{ $item->product_thumbnail }}"
                                                            data-target="#productdescModal"><i class="icon-size-fullscreen icons"></i></button>
                                                            
                                                        @endif
                                                        
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-8 col-lg-7 col-md-6 col-sm-6">
                                                <div class="shop-list-content">
                                                    <h3><a href="{{ url('product_details/'.$item->id) }}">{{$item->product_name}}</a></h3>
                                                    <div class="pro-list-price">
                                                        <span class="new-price">&#8377;{{ number_format($item->price,2) }}</span>
                                                        <!--<span class="old-price">&#8377;45.80</span>-->
                                                    </div>
                                                    <!--<div class="product-list-rating-wrap">-->
                                                    <!--    <div class="product-list-rating">-->
                                                    <!--        <i class="icon_star"></i>-->
                                                    <!--        <i class="icon_star"></i>-->
                                                    <!--        <i class="icon_star"></i>-->
                                                    <!--        <i class="icon_star gray"></i>-->
                                                    <!--        <i class="icon_star gray"></i>-->
                                                    <!--    </div>-->
                                                    <!--    <span>(3)</span>-->
                                                    <!--</div>-->
                                                    <p class="text-justify">{{ Str::words($item->product_description, $words = 50, $end = '...') }}</p>
                                                    <div class="product-list-action">
                                                        <form action="/add_to_cart" method="POST" style="display: inline-block;">
                                                           @csrf
                                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                            <button title="Add to Cart"><i class="icon-basket-loaded"></i></button>
                                                       </form>
                                                       
                                                       <form action="/add_to_wishlist" method="POST" style="display: inline-block;">
                                                           @csrf
                                                            <input type="hidden" name="product_id" value="{{ $item->id }}">
                                                            <button title="Wishlist"><i class="icon-heart"></i></button>
                                                       </form>
                                                        
                                                        
                                                      <!-- compare  <button title="Compare"><i class="icon-refresh"></i></button>  -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @else
                                	       <p>No products found</p>		
                                    @endif
                                </div>
                            </div>
                            <!--<div class="d-flex justify-content-center">-->
                            <!--    {!! $products->links() !!}-->
                            <!--</div>-->
                            
                                    
                            <div class="pro-pagination-style text-center mt-10">
                                
                                {{ $products->onEachSide(1)->links('pagination.default') }}
                                <ul>
                                    <!--<li><a class="prev" href="#"><i class="icon-arrow-left"></i></a></li>-->
                                    <!--<li><a class="active" href="#">1</a></li>-->
                                    <!--<li><a href="#">2</a></li> -->
                                    <!--<li><a class="next" href="#"><i class="icon-arrow-right"></i></a></li>-->
                                </ul>
                            </div>
                        </div>
                        
                        
                       
                    </div>
                    <div class="col-lg-3">
                        <div class="sidebar-wrapper sidebar-wrapper-mrg-right">
                            <!--<div class="sidebar-widget mb-40">-->
                            <!--    <h4 class="sidebar-widget-title">Search </h4>-->
                            <!--    <div class="sidebar-search">-->
                            <!--        <form class="sidebar-search-form" action="#">-->
                            <!--            <input type="text" placeholder="Search here...">-->
                            <!--            <button>-->
                            <!--                <i class="icon-magnifier"></i>-->
                            <!--            </button>-->
                            <!--        </form>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="sidebar-widget mb-35 pt-40">
                                <h4 class="sidebar-widget-title">Categories </h4>
                                <div class="shop-catigory">
                                  
                                    @if(count($categories) > 0 ) 
                                    @foreach ($categories as $categoriesitem)
                                     
                                      <a href="{{ url('category/'.$categoriesitem['id']) }}"><div class="row mb-2">
		                               <div class="col-xs-6">
			                             <img src="{{ $categoriesitem['category_thumbnail'] }}" alt="{{ $categoriesitem['category_alt'] }}" style="height:50px;width:50px;border:1px solid black;border-radius:50%" />
		                               </div>
		                               <div class="col-xs-6 pl-1 pt-10">  
			                             {{ $categoriesitem['category_name'] }}
			                           </div>
	                                  </div>
                                     </a>
                                    @endforeach
                                    @else
                                	    <p>No products found</p>		
                                    @endif
                                    
                                    
	                           
                                       
                                </div>
                            </div>
                           
                          <!--  <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
                                <h4 class="sidebar-widget-title">Refine By </h4>
                                <div class="sidebar-widget-list">
                                    <ul>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox"> <a href="#">On Sale <span>4</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">New <span>5</span></a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">In Stock <span>6</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <!--<div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
                                <h4 class="sidebar-widget-title">Size </h4>
                                <div class="sidebar-widget-list">
                                    <ul>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">XL <span>4</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">L <span>5</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">SM <span>6</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">XXL <span>7</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                           <!-- <div class="sidebar-widget shop-sidebar-border mb-40 pt-40">
                                <h4 class="sidebar-widget-title">Color </h4>
                                <div class="sidebar-widget-list">
                                    <ul>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">Green <span>7</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">Cream <span>8</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">Blue <span>9</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="sidebar-widget-list-left">
                                                <input type="checkbox" value=""> <a href="#">Black <span>3</span> </a>
                                                <span class="checkmark"></span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div> -->
                            <!-- <div class="sidebar-widget shop-sidebar-border pt-40">
                                <h4 class="sidebar-widget-title">Popular Tags</h4>
                                <div class="sidebar-widget-tag">
                                    <ul>
                                        <li><a href="#">Body Care</a></li>
                                        <li><a href="#">Pure Herbs</a></li>
                                        <li><a href="#">Oral Health</a></li>
                                        <li><a href="#">Ayurvedic</a></li>
                                        <li><a href="#">Homeopathy</a></li>
                                    </ul>
                                </div>
                            </div>  -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
         <!-- Modal -->
        <div class="modal fade" id="productdescModal" tabindex="-1" role="dialog">
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
                                        <img id="productimage" src="" alt="Product" height="400">
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
                                    <h2 id="productname"></h2>
                                    <!--<div class="product-ratting-review-wrap">-->
                                    <!--    <div class="product-ratting-digit-wrap">-->
                                    <!--        <div class="product-ratting">-->
                                    <!--            <i class="icon_star"></i>-->
                                    <!--            <i class="icon_star"></i>-->
                                    <!--            <i class="icon_star"></i>-->
                                    <!--            <i class="icon_star"></i>-->
                                    <!--            <i class="icon_star"></i>-->
                                    <!--        </div>-->
                                    <!--        <div class="product-digit">-->
                                    <!--            <span>5.0</span>-->
                                    <!--        </div>-->
                                    <!--    </div>-->
                                    <!--    <div class="product-review-order">-->
                                            <!--<span>62 Reviews</span>-->
                                    <!--        <span>242 orders</span>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <p class="text-justify" id="productdescription"></p>
                                    <div class="pro-details-price">
                                        <span class="new-price" id="productprice"></span>
                                        <!--<span class="old-price">&#8377;42.85</span>-->
                                    </div>
                                    
                                    
                                    <div class="pro-details-quality">
                                        <span>Size:</span>
                                        <div class="size">
                                            <!--<input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">-->
                                        </div>
                                    </div>
                                    <div class="product-details-meta">
                                        <ul>
                                            <li><span>Categories:</span> <a href="#" class="category"></a></li>
                                        </ul>
                                    </div>
                                    <div class="pro-details-action-wrap">
                                        <div class="pro-details-add-to-cart">
                                            
                                            <form action="/add_to_cart" method="POST" style="display: inline-block;">
                                                @csrf
                                                <input type="hidden" name="product_id" value="">
                                                <button title="Add to Cart">Add to Cart</button>
                                            </form>
                                                       
                                                       
                                                       
                                            <!--<a title="Add to Cart" href="#">Add To Cart </a>-->
                                        </div>
                                        <div class="pro-details-action">
                                            <!--<a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>-->
                                            <form action="/add_to_wishlist" method="POST">
                                                @csrf
                                                <input type="hidden" name="product_id" value="">
                                                <button title="Wishlist"><i class="icon-heart"></i></button>
                                            </form>
                                            
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
            $(document).ready(function () {
                $("#productdescModal").on("show.bs.modal", function (e) {
                    var product_id = $(e.relatedTarget).data('target-id');
                    var product_name = $(e.relatedTarget).data('target-name');
                    var product_price = $(e.relatedTarget).data('target-price');
                    var product_description = $(e.relatedTarget).data('target-description');
                    var product_size = $(e.relatedTarget).data('target-size');
                    var category = $(e.relatedTarget).data('target-category');
                    var product_image = $(e.relatedTarget).data('target-image');
                    $('#productname').html(product_name);
                    $('#productprice').html("&#8377; "+product_price);
                    $('#productdescription').html(product_description);
                    $('.size').html(product_size);
                    $('.category').html(category);
                    $('#productimage').attr('src',product_image);
                    $("input[name='product_id']").val(product_id);
                });
            });

    </script>

</body>

</html>