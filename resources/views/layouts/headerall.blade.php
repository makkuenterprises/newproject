<?php 
    use App\Http\Controllers\ProductsController;
    use App\Http\Controllers\CartController;
    use App\Http\Controllers\WishlistController;
    $totalcart=0;
    $totalwishlist=0;
    if(Session::has('user'))
        {
          $totalcart= CartController::cartItem();
          $totalwishlist= WishlistController::wishlistItem();
        }
?>

<div  style="">
 <div class="container">
    <div class="header-large-device">
        <div class="header-bottom">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-3">
                                <div class="logo">
                                    <a href="{{ url('/') }}"><img src="{{asset('assets/images/logo/logo1.png')}}" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6">
                                <div class="main-menu main-menu-padding-1 main-menu-lh-1">
                                     <nav>
                                        <ul>
                                            <li><a href="{{ url('/') }}">HOME</a></li>
                                            <li><a href="{{ url('/products') }}">PRODUCTS </a></li>
                                            <li><a href="{{ url('/categories') }}">CATEGORIES </a></li>
                                            <li><a href="{{ url('/about') }}">ABOUT US</a></li>
                                            <li><a href="{{ url('/contact') }}">CONTACT US</a></li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                            <div class="col-xl-2 col-lg-3">
                                <div class="header-action header-action-flex header-action-mrg-right">
                                    <div class="same-style-2 header-search-1">
                                        <a class="search-toggle" href="#">
                                            <i class="icon-magnifier s-open"></i>
                                            <i class="icon_close s-close"></i>
                                        </a>
                                        <div class="search-wrap-1">
                                            <form action="/search" method="GET">
                                                <input placeholder="Search products…" type="text" name="query" required>
                                                <button class="button-search" type="submit"><i class="icon-magnifier"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                    
                                    <div class="same-style-2">
                                        <a href="{{ url('/login_register') }}" title="my account"><i class="icon-user"></i></a>
                                    </div>
                                    <div class="same-style-2">
                                        @if($totalwishlist > 0)
                                            <a href="{{ url('/wishlistt') }}"><i class="icon-heart"></i><span class="pro-count red">{{ $totalwishlist }}</span></a>
                                        @else
                                            <a href="{{ url('/wishlistt') }}"><i class="icon-heart"></i></a>
                                        @endif
                                    </div>
                                    <div class="same-style-2 header-cart">
                                        @if($totalcart > 0)
                                            <a href="{{ url('/cartt') }}"><i class="icon-basket-loaded"></i><span class="pro-count red" >{{ $totalcart }}</span></a>
                                        @else
                                            <a href="{{ url('/cartt') }}"><i class="icon-basket-loaded"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-small-device small-device-ptb-1">
                    <div class="row align-items-center">
                        <div class="col-5">
                            <div class="mobile-logo">
                                <a href="/">
                                    <img alt="logo" src="{{ asset('assets/images/logo/logo_long_mobile.png') }}" alt="4med">
                                </a>
                            </div>
                        </div>
                        <div class="col-7">
                            <div class="header-action header-action-flex">
                                <div class="same-style-2">
                                    <a href="{{ url('/login_register') }}"><i class="icon-user"></i></a>
                                </div>
                                <div class="same-style-2">
                                    @if($totalwishlist > 0)
                                        <a href="{{ url('/wishlistt') }}"><i class="icon-heart"></i><span class="pro-count red">{{ $totalwishlist }}</span></a>
                                    @else
                                        <a href="{{ url('/wishlistt') }}"><i class="icon-heart"></i></a>
                                    @endif
                                </div>
                                <div class="same-style-2 header-cart">
                                    <a class="cart-active" href="#">
                                        @if($totalcart > 0)
                                            <a href="{{ url('/cartt') }}"><i class="icon-basket-loaded"></i><span class="pro-count red" >{{ $totalcart }}</span></a>
                                        @else
                                            <a href="{{ url('/cartt') }}"><i class="icon-basket-loaded"></i></a>
                                        @endif
                                    </a>
                                </div>
                                <div class="same-style-2 main-menu-icon">
                                    <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>