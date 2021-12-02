<!doctype html>
<html class="no-js" lang="zxx">

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
                        <li class="active">Categories </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="shop-area pt-120 pb-120">
            <div class="container">
                <div class="row flex-row-reverse">
                    <div class="col-lg-12">
                        <!--  <div class="shop-topbar-wrapper">-->
                        <!--    <div class="shop-topbar-left">-->
                        <!--        <div class="view-mode nav">-->
                        <!--            <a class="active" href="#shop-1" data-toggle="tab"><i class="icon-grid"></i></a>-->
                        <!--            <a href="#shop-2" data-toggle="tab"><i class="icon-menu"></i></a>-->
                        <!--        </div>-->
                        <!--        <p>Showing 1 - 20 of 30 results </p>-->
                        <!--    </div>-->
                        <!--    <div class="product-sorting-wrapper">-->
                        <!--        <div class="product-shorting shorting-style">-->
                        <!--            <label>View :</label>-->
                        <!--            <select>-->
                        <!--                <option value=""> 20</option>-->
                        <!--                <option value=""> 23</option>-->
                        <!--                <option value=""> 30</option>-->
                        <!--            </select>-->
                        <!--        </div>-->
                        <!--        <div class="product-show shorting-style">-->
                        <!--            <label>Sort by :</label>-->
                        <!--            <select>-->
                        <!--                <option value="">Default</option>-->
                        <!--                <option value=""> Name</option>-->
                        <!--                <option value=""> price</option>-->
                        <!--            </select>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div> -->
                        <div class="shop-bottom-area">
                            <div class="tab-content jump">
                                <div id="shop-1" class="tab-pane active">
                                    <div class="row">
                                        
                                         @if(count($categories) > 0 ) 
                                             @foreach ($categories as $categoriesitem)
                                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12" >
                                                    <a href="{{ url('category/'.$categoriesitem->id) }}">
                                                        <div class="single-product-wrap mb-35 cat-item" style="padding:15px;border-radius:10px;">
                                                            <h4 style="padding-top:10px;padding-bottom:10px;">{{ $categoriesitem->category_name }} ({{ $categoriesitem->products_count }})</h4>
                                                            <div class="product-img product-img-zoom mb-15">
                                                                <img src="{{ $categoriesitem->category_thumbnail }}" alt="{{ $categoriesitem->category_name }}" height="300px" style="border-radius:10px;">
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                             
                                    @endforeach
                                    @else
                                	    <p>No categories found</p>		
                                    @endif
                            
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    @include('layouts.footer')
    
    @include('layouts.foot')
    
    <script>
        $(document).ready(function () {
          var back = ["#caedd7","#ccd7e3","#e3d7cc","#dff5f0"];
          
           $('.cat-item').each(function(){
               var rand = back[Math.floor(Math.random() * back.length)];
               $(this).css('background-color',rand);
          });
          //$('.cat-item').css('background',rand);
        })
    </script>

</body>

</html>