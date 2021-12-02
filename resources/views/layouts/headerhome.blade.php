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

<div class="header-large-device">
    <div class="header-middle" style="">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-3 col-lg-2">
                                <div class="logo">
                                    <a href="{{ url('/') }}"><img src="assets/images/logo/logo1.png" alt="4med"></a>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-8">
                                <div class="main-menu main-menu-padding-1 main-menu-lh-2">
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
                            <div class="col-xl-2 col-lg-2">
                                <div class="header-action header-action-flex">
                                    <div class="same-style-2 same-style-2-font-inc" title="my account">
                                        <a href="login_register"><i class="icon-user"></i></a>
                                    </div>
                                    <div class="same-style-2 same-style-2-font-inc"  title="Wishlist">
                                        @if($totalwishlist > 0)
                                            <a href="{{ url('/wishlistt') }}"><i class="icon-heart"></i><span class="pro-count red">{{ $totalwishlist }}</span></a>
                                        @else
                                            <a href="{{ url('/wishlistt') }}"><i class="icon-heart"></i></a>
                                        @endif
                                    </div>
                                    <div class="same-style-2 same-style-2-font-inc header-cart" title="Cart">
                                        <!--<a class="cart-active" href="#">-->
                                        @if($totalcart > 0)
                                            <a href="{{ url('/cartt') }}"><i class="icon-basket-loaded"></i><span class="pro-count red" >{{ $totalcart }}</span></a>
                                        @else
                                            <a href="{{ url('/cartt') }}"><i class="icon-basket-loaded"></i></a>
                                        @endif
                                            <!--<span class="cart-amount">$2,435.30</span>-->
                                        <!--</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="header-bottom header-bottom-ptb">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="categori-search-wrap categori-search-wrap-modify">
                                    <div class="categori-style-1">
                                        <select class="nice-select nice-select-style-1" name="">
                                            <option value="">All Categories </option>
                                            @foreach ($categories as $catitem)
                                                <option value="{{ $catitem->id }}">{{ $catitem->category_name }}</option>
                                            @endforeach 
                                            
                                            
                                        </select>
                                    </div>
                                    <div class="search-wrap-3">
                                        <form action="/searchwithcatid">
                                            @csrf
                                            <input placeholder="Search Products..." type="text" name="query" required>
                                            <input type="hidden" name="catid" value="" required>
                                            <button><i class="lnr lnr-magnifier"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="header-small-device">
            <div class="header-small-device small-device-ptb-1" style="">
                <div class="container">
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
                                <div class="same-style-2 same-style-2-font-inc">
                                    <a href="login_register"><i class="icon-user"></i></a>
                                </div>
                                <div class="same-style-2 same-style-2-font-inc">
                                    <a href="{{ url('/wishlistt') }}"><i class="icon-heart"></i><span class="pro-count red">{{ $totalwishlist }}</span></a>
                                </div>
                                <div class="same-style-2 same-style-2-font-inc header-cart">
                                    <!--<a class="cart-active" href="#">-->
                                    <!--    <i class="icon-basket-loaded"></i><span class="pro-count red">{{ $totalcart }}</span>-->
                                    <!--</a>-->
                                    <a href="{{ url('/cartt') }}"><i class="icon-basket-loaded"></i><span class="pro-count red" >{{ $totalcart }}</span></a>
                                </div>
                                <div class="same-style-2 main-menu-icon">
                                    <a class="mobile-header-button-active" href="#"><i class="icon-menu"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
            
            
                 <div class="header-bottom header-bottom-ptb">
                    <div class="mr-1 ml-1">
                        <div class="row">
                            <div class="col-lg-12 col-sm-12">
                                <div class="categori-search-wrap categori-search-wrap-modify">
                                    <div class="categori-style-1">
                                        <select class="nice-select nice-select-style-1" name="">
                                            <option value="">All Categories </option>
                                            @foreach ($categories as $catitem)
                                                <option value="{{ $catitem->id }}">{{ $catitem->category_name }}</option>
                                            @endforeach 
                                        </select>
                                    </div>
                                    <div class="search-wrap-3">
                                        <form action="/searchwithcatid">
                                            @csrf
                                            <input placeholder="Search Products..." type="text" name="query" required>
                                            <input type="hidden" name="catid" value="" required>
                                            <button><i class="lnr lnr-magnifier"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
            </div>
            
            
            </div>