<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Geetanjali | Products Details</title>
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
                        <li class="active">product details </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="product-details-area pt-120 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="product-details-tab">
                            <div class="pro-dec-big-img-slider">
                                <div class="easyzoom-style">
                                    <div class="easyzoom">
                                        <a href="{{ $products->product_thumbnail }}">
                                            
                                            @if (empty($products->product_thumbnail))
                                                <img src="{{ asset('assets/images/product/default.jpg') }}" alt="{{ $products->product_name }}" height="520px">
                                            @else
                                                <img src="{{ $products->product_thumbnail }}" alt="{{ $products->product_name }}" height="520px">
                                            @endif
                                            
                                        </a>
                                    </div>
                                    <a class="easyzoom-pop-up img-popup" href="{{ $products->product_thumbnail }}"><i class="icon-size-fullscreen"></i></a>
                                </div>
                                <!--<div class="easyzoom-style">-->
                                <!--    <div class="easyzoom easyzoom--overlay">-->
                                <!--        <a href="assets/images/product-details/b-large-2.jpg">-->
                                <!--            <img src="assets/images/product-details/large-2.jpg" alt="">-->
                                <!--        </a>-->
                                <!--    </div>-->
                                <!--    <a class="easyzoom-pop-up img-popup" href="assets/images/product-details/b-large-2.jpg"><i class="icon-size-fullscreen"></i></a>-->
                                <!--</div>-->
                                <!--<div class="easyzoom-style">-->
                                <!--    <div class="easyzoom easyzoom--overlay">-->
                                <!--        <a href="assets/images/product-details/b-large-3.jpg">-->
                                <!--            <img src="assets/images/product-details/large-3.jpg" alt="">-->
                                <!--        </a>-->
                                <!--    </div>-->
                                <!--    <a class="easyzoom-pop-up img-popup" href="assets/images/product-details/b-large-3.jpg"><i class="icon-size-fullscreen"></i></a>-->
                                <!--</div>-->
                                <!--<div class="easyzoom-style">-->
                                <!--    <div class="easyzoom easyzoom--overlay">-->
                                <!--        <a href="assets/images/product-details/b-large-4.jpg">-->
                                <!--            <img src="assets/images/product-details/large-4.jpg" alt="">-->
                                <!--        </a>-->
                                <!--    </div>-->
                                <!--    <a class="easyzoom-pop-up img-popup" href="assets/images/product-details/b-large-4.jpg"><i class="icon-size-fullscreen"></i></a>-->
                                <!--</div>-->
                                <!--<div class="easyzoom-style">-->
                                <!--    <div class="easyzoom easyzoom--overlay">-->
                                <!--        <a href="assets/images/product-details/b-large-2.jpg">-->
                                <!--            <img src="assets/images/product-details/large-2.jpg" alt="">-->
                                <!--        </a>-->
                                <!--    </div>-->
                                <!--    <a class="easyzoom-pop-up img-popup" href="assets/images/product-details/b-large-2.jpg"><i class="icon-size-fullscreen"></i></a>-->
                                <!--</div>-->
                            </div>
                            <!--<div class="product-dec-slider-small product-dec-small-style1">-->
                            <!--    <div class="product-dec-small active">-->
                            <!--        <img src="assets/images/product-details/small-1.jpg" alt="">-->
                            <!--    </div>-->
                            <!--    <div class="product-dec-small">-->
                            <!--        <img src="assets/images/product-details/small-2.jpg" alt="">-->
                            <!--    </div>-->
                            <!--    <div class="product-dec-small">-->
                            <!--        <img src="assets/images/product-details/small-3.jpg" alt="">-->
                            <!--    </div>-->
                            <!--    <div class="product-dec-small">-->
                            <!--        <img src="assets/images/product-details/small-4.jpg" alt="">-->
                            <!--    </div>-->
                            <!--    <div class="product-dec-small">-->
                            <!--        <img src="assets/images/product-details/small-2.jpg" alt="">-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="product-details-content pro-details-content-mrg">
                            <h2>{{ $products->product_name }}</h2>
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
                            <!--        <span>242 orders</span>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <p class="text-justify">{!! $products->product_description !!}</p>
                            <div class="pro-details-price">
                                <span class="new-price">&#8377;{{ number_format($products->price,2) }}</span>
                                <!--<span class="old-price">&#8377;215</span>-->
                            </div>
                            <!--<div class="pro-details-color-wrap">-->
                            <!--    <span>Color:</span>-->
                            <!--    <div class="pro-details-color-content">-->
                            <!--        <ul>-->
                            <!--            <li><a class="dolly" href="#">dolly</a></li>-->
                            <!--            <li><a class="white" href="#">white</a></li>-->
                            <!--            <li><a class="azalea" href="#">azalea</a></li>-->
                            <!--            <li><a class="peach-orange" href="#">Orange</a></li>-->
                            <!--            <li><a class="mona-lisa active" href="#">lisa</a></li>-->
                            <!--            <li><a class="cupid" href="#">cupid</a></li>-->
                            <!--        </ul>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div class="pro-details-size">-->
                            <!--    <span>Size:</span>-->
                            <!--    <div class="pro-details-size-content">-->
                            <!--        <ul>-->
                            <!--            <li><a href="#">XS</a></li>-->
                            <!--            <li><a href="#">S</a></li>-->
                            <!--            <li><a href="#">M</a></li>-->
                            <!--            <li><a href="#">L</a></li>-->
                            <!--            <li><a href="#">XL</a></li>-->
                            <!--        </ul>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <div class="pro-details-quality">
                                <span>Size:</span>
                                        <div class="size">
                                            <!--<input class="cart-plus-minus-box" type="text" name="qtybutton" value="1">-->
                                            {{ $products->product_size }}
                                        </div>
                                <!--<div class="cart-plus-minus">-->
                                <!--    <input class="cart-plus-minus-box" type="text" name="qtybutton" value="{{ $products->product_size }}" readonly>-->
                                <!--</div>-->
                            </div>
                            <div class="product-details-meta">
                                <ul>
                                    <li><span>Categories:</span> {{ $products->category_name }}</li>
                                    <!--<li><span>Tag: </span> <a href="#">Fashion,</a> <a href="#">Mentone</a> , <a href="#">Texas</a></li>-->
                                </ul>
                            </div>
                            <div class="pro-details-action-wrap">
                                <div class="pro-details-add-to-cart">
                                    <a title="Add to Cart" href="#">Add To Cart </a>
                                </div>
                                <div class="pro-details-action">
                                    <a title="Add to Wishlist" href="#"><i class="icon-heart"></i></a>
                                    <!--<a title="Add to Compare" href="#"><i class="icon-refresh"></i></a>-->
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
        <!--<div class="description-review-wrapper pb-110">-->
        <!--    <div class="container">-->
        <!--        <div class="row">-->
        <!--            <div class="col-lg-12">-->
        <!--                <div class="dec-review-topbar nav mb-45">-->
        <!--                    <a class="active" data-toggle="tab" href="#des-details1">Description</a>-->
        <!--                    <a data-toggle="tab" href="#des-details2">Specification</a>-->
                            <!--<a data-toggle="tab" href="#des-details3">Meterials </a>-->
                            <!--<a data-toggle="tab" href="#des-details4">Reviews and Ratting </a>-->
        <!--                </div>-->
        <!--                <div class="tab-content dec-review-bottom">-->
        <!--                    <div id="des-details1" class="tab-pane active">-->
        <!--                        <div class="description-wrap">-->
        <!--                            <p class="text-justify">{{ $products->product_description }}</p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                    <div id="des-details2" class="tab-pane">-->
        <!--                        <div class="specification-wrap table-responsive">-->
        <!--                            <table>-->
        <!--                                <tbody>-->
        <!--                                    <tr>-->
        <!--                                        <td class="title width1">Name</td>-->
        <!--                                        <td>{{ $products->product_name }}</td>-->
        <!--                                    </tr>-->
                                           
        <!--                                    <tr>-->
        <!--                                        <td class="title width1">Categories</td>-->
        <!--                                        <td>{{ $products->category_name }}</td>-->
        <!--                                    </tr>-->
        <!--                                    <tr>-->
        <!--                                        <td class="title width1">Size</td>-->
        <!--                                        <td>{{ $products->product_size }}</td>-->
        <!--                                    </tr>-->
                                            
        <!--                                </tbody>-->
        <!--                            </table>-->
        <!--                        </div>-->
        <!--                    </div>-->
                            <!--<div id="des-details3" class="tab-pane">-->
                            <!--    <div class="specification-wrap table-responsive">-->
                            <!--        <table>-->
                            <!--            <tbody>-->
                            <!--                <tr>-->
                            <!--                    <td class="title width1">Top</td>-->
                            <!--                    <td>Cotton Digital Print Chain Stitch Embroidery Work</td>-->
                            <!--                </tr>-->
                            <!--                <tr>-->
                            <!--                    <td class="title width1">Bottom</td>-->
                            <!--                    <td>Cotton Cambric</td>-->
                            <!--                </tr>-->
                            <!--                <tr>-->
                            <!--                    <td class="title width1">Dupatta</td>-->
                            <!--                    <td>Digital Printed Cotton Malmal With Chain Stitch</td>-->
                            <!--                </tr>-->
                            <!--            </tbody>-->
                            <!--        </table>-->
                            <!--    </div>-->
                            <!--</div>-->
                            <!--<div id="des-details4" class="tab-pane">-->
                            <!--    <div class="review-wrapper">-->
                            <!--        <h2>1 review for Sleeve Button Cowl Neck</h2>-->
                            <!--        <div class="single-review">-->
                            <!--            <div class="review-img">-->
                            <!--                <img src="assets/images/product-details/client-1.png" alt="">-->
                            <!--            </div>-->
                            <!--            <div class="review-content">-->
                            <!--                <div class="review-top-wrap">-->
                            <!--                    <div class="review-name">-->
                            <!--                        <h5><span>John Snow</span> - March 14, 2019</h5>-->
                            <!--                    </div>-->
                            <!--                    <div class="review-rating">-->
                            <!--                        <i class="yellow icon_star"></i>-->
                            <!--                        <i class="yellow icon_star"></i>-->
                            <!--                        <i class="yellow icon_star"></i>-->
                            <!--                        <i class="yellow icon_star"></i>-->
                            <!--                        <i class="yellow icon_star"></i>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--                <p>Donec accumsan auctor iaculis. Sed suscipit arcu ligula, at egestas magna molestie a. Proin ac ex maximus, ultrices justo eget, sodales orci. Aliquam egestas libero ac turpis pharetra, in vehicula lacus scelerisque</p>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="ratting-form-wrapper">-->
                            <!--        <span>Add a Review</span>-->
                            <!--        <p>Your email address will not be published. Required fields are marked <span>*</span></p>-->
                            <!--        <div class="ratting-form">-->
                            <!--            <form action="#">-->
                            <!--                <div class="row">-->
                            <!--                    <div class="col-lg-6 col-md-6">-->
                            <!--                        <div class="rating-form-style mb-20">-->
                            <!--                            <label>Name <span>*</span></label>-->
                            <!--                            <input type="text">-->
                            <!--                        </div>-->
                            <!--                    </div>-->
                            <!--                    <div class="col-lg-6 col-md-6">-->
                            <!--                        <div class="rating-form-style mb-20">-->
                            <!--                            <label>Email <span>*</span></label>-->
                            <!--                            <input type="email">-->
                            <!--                        </div>-->
                            <!--                    </div>-->
                            <!--                    <div class="col-lg-12">-->
                            <!--                        <div class="star-box-wrap">-->
                            <!--                            <div class="single-ratting-star">-->
                            <!--                                <a href="#"><i class="icon_star"></i></a>-->
                            <!--                            </div>-->
                            <!--                            <div class="single-ratting-star">-->
                            <!--                                <a href="#"><i class="icon_star"></i></a>-->
                            <!--                                <a href="#"><i class="icon_star"></i></a>-->
                            <!--                            </div>-->
                            <!--                            <div class="single-ratting-star">-->
                            <!--                                <a href="#"><i class="icon_star"></i></a>-->
                            <!--                                <a href="#"><i class="icon_star"></i></a>-->
                            <!--                                <a href="#"><i class="icon_star"></i></a>-->
                            <!--                            </div>-->
                            <!--                            <div class="single-ratting-star">-->
                            <!--                                <a href="#"><i class="icon_star"></i></a>-->
                            <!--                                <a href="#"><i class="icon_star"></i></a>-->
                            <!--                                <a href="#"><i class="icon_star"></i></a>-->
                            <!--                                <a href="#"><i class="icon_star"></i></a>-->
                            <!--                            </div>-->
                            <!--                            <div class="single-ratting-star">-->
                            <!--                                <a href="#"><i class="icon_star"></i></a>-->
                            <!--                                <a href="#"><i class="icon_star"></i></a>-->
                            <!--                                <a href="#"><i class="icon_star"></i></a>-->
                            <!--                                <a href="#"><i class="icon_star"></i></a>-->
                            <!--                                <a href="#"><i class="icon_star"></i></a>-->
                            <!--                            </div>-->
                            <!--                        </div>-->
                            <!--                    </div>-->
                            <!--                    <div class="col-md-12">-->
                            <!--                        <div class="rating-form-style mb-20">-->
                            <!--                            <label>Your review <span>*</span></label>-->
                            <!--                            <textarea name="Your Review"></textarea>-->
                            <!--                        </div>-->
                            <!--                    </div>-->
                            <!--                    <div class="col-lg-12">-->
                            <!--                        <div class="form-submit">-->
                            <!--                            <input type="submit" value="Submit">-->
                            <!--                        </div>-->
                            <!--                    </div>-->
                            <!--                </div>-->
                            <!--            </form>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="related-product pb-115">
            <div class="container">
                <div class="section-title mb-45 text-center">
                    <h2>Related Product</h2>
                </div>
                <div class="related-product-active">
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="product_details?productid=1">
                                    <img src="assets/images/banner/slow1.png" alt="product">
                                </a>
                                <div class="product-action-2 tooltip-style-2">
                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                    <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 text-center">
                                <div class="product-rating-wrap">
                                    <div class="product-rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(2)</span>
                                </div>
                                <h3><a href="product_details?productid=1">Nutrition</a></h3>
                                <div class="product-price-2">
                                    <span>&#8377;38.50</span>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 product-content-position text-center">
                                <div class="product-rating-wrap">
                                    <div class="product-rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(2)</span>
                                </div>
                                <h3><a href="product_details?productid=1">Nutrition</a></h3>
                                <div class="product-price-2">
                                    <span>&#8377;38.50</span>
                                </div>
                                <div class="pro-add-to-cart">
                                    <button title="Add to Cart">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="product_details?productid=2">
                                    <img src="assets/images/banner/fast11.jpg" alt="">
                                </a>
                                <span class="pro-badge left bg-red">-20%</span>
                                <div class="product-action-2 tooltip-style-2">
                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                    <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 text-center">
                                <div class="product-rating-wrap">
                                    <div class="product-rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(2)</span>
                                </div>
                                <h3><a href="product_details?productid=2">Navratna Ayurvedic Cool Hair Oil</a></h3>
                                <div class="product-price-2">
                                    <span class="new-price">&#8377;26.50 </span>
                                    <span class="old-price">&#8377;45.85</span>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 product-content-position text-center">
                                <div class="product-rating-wrap">
                                    <div class="product-rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(2)</span>
                                </div>
                                <h3><a href="product_details?productid=2">Navratna Ayurvedic Cool Hair Oil</a></h3>
                                <div class="product-price-2">
                                    <span class="new-price">&#8377;26.50 </span>
                                    <span class="old-price">&#8377;45.85</span>
                                </div>
                                <div class="pro-add-to-cart">
                                    <button title="Add to Cart">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="product_details?productid=1">
                                    <img src="assets/images/banner/fast15.jpg" alt="">
                                </a>
                                <div class="product-action-2 tooltip-style-2">
                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                    <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 text-center">
                                <div class="product-rating-wrap">
                                    <div class="product-rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(2)</span>
                                </div>
                                <h3><a href="product_details?productid=1">Baby Bubble bath and wash</a></h3>
                                <div class="product-price-2">
                                    <span>&#8377;485.50</span>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 product-content-position text-center">
                                <div class="product-rating-wrap">
                                    <div class="product-rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(2)</span>
                                </div>
                                <h3><a href="product_details?productid=1">Baby Bubble bath and wash</a></h3>
                                <div class="product-price-2">
                                    <span>&#8377;485.50</span>
                                </div>
                                <div class="pro-add-to-cart">
                                    <button title="Add to Cart">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="product_details?productid=1">
                                    <img src="assets/images/banner/fast16.jpg" alt="">
                                </a>
                                <div class="product-action-2 tooltip-style-2">
                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                    <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 text-center">
                                <div class="product-rating-wrap">
                                    <div class="product-rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(2)</span>
                                </div>
                                <h3><a href="product_details?productid=1">Baby Bath Soap</a></h3>
                                <div class="product-price-2">
                                    <span>&#8377;238 </span>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 product-content-position text-center">
                                <div class="product-rating-wrap">
                                    <div class="product-rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(2)</span>
                                </div>
                                <h3><a href="product_details?productid=1">Baby Bath Soap</a></h3>
                                <div class="product-price-2">
                                    <span>&#8377;238</span>
                                </div>
                                <div class="pro-add-to-cart">
                                    <button title="Add to Cart">Add To Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-plr-1">
                        <div class="single-product-wrap">
                            <div class="product-img product-img-zoom mb-15">
                                <a href="product-details.html">
                                    <img src="assets/images/product/product-19.jpg" alt="">
                                </a>
                                <div class="product-action-2 tooltip-style-2">
                                    <button title="Wishlist"><i class="icon-heart"></i></button>
                                    <button title="Quick View" data-toggle="modal" data-target="#exampleModal"><i class="icon-size-fullscreen icons"></i></button>
                                    <button title="Compare"><i class="icon-refresh"></i></button>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 text-center">
                                <div class="product-rating-wrap">
                                    <div class="product-rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(2)</span>
                                </div>
                                <h3><a href="product-details.html">Faded Grey T-Shirt</a></h3>
                                <div class="product-price-2">
                                    <span>$65.50</span>
                                </div>
                            </div>
                            <div class="product-content-wrap-2 product-content-position text-center">
                                <div class="product-rating-wrap">
                                    <div class="product-rating">
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star"></i>
                                        <i class="icon_star gray"></i>
                                    </div>
                                    <span>(2)</span>
                                </div>
                                <h3><a href="product-details.html">Faded Grey T-Shirt</a></h3>
                                <div class="product-price-2">
                                    <span>$65.50</span>
                                </div>
                                <div class="pro-add-to-cart">
                                    <button title="Add to Cart">Add To Cart</button>
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
    
</body>

</html>