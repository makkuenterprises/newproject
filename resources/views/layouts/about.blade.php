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
                        <li class="active">About Us </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="about-us-area pt-120 pb-50 ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="about-us-logo">
                            <img src="assets/images/banner/about_banner.jpg" alt="logo" width="100%">
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9">
                        <div class="about-us-content">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
        <!--<div class="service-area pb-120">-->
        <!--    <div class="container">-->
        <!--        <div class="service-wrap-border service-wrap-padding-3">-->
        <!--            <div class="row">-->
        <!--                <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1">-->
        <!--                    <div class="single-service-wrap-2 mb-30">-->
        <!--                        <div class="service-icon-2 icon-red">-->
        <!--                            <i class="icon-cursor"></i>-->
        <!--                        </div>-->
        <!--                        <div class="service-content-2">-->
        <!--                            <h3>Free Shipping</h3>-->
        <!--                            <p>Oders over $99</p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1 service-border-1-none-md">-->
        <!--                    <div class="single-service-wrap-2 mb-30">-->
        <!--                        <div class="service-icon-2 icon-red">-->
        <!--                            <i class="icon-refresh "></i>-->
        <!--                        </div>-->
        <!--                        <div class="service-content-2">-->
        <!--                            <h3>90 Days Return</h3>-->
        <!--                            <p>For any problems</p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-lg-3 col-md-6 col-sm-6 col-12 service-border-1">-->
        <!--                    <div class="single-service-wrap-2 mb-30">-->
        <!--                        <div class="service-icon-2 icon-red">-->
        <!--                            <i class="icon-credit-card "></i>-->
        <!--                        </div>-->
        <!--                        <div class="service-content-2">-->
        <!--                            <h3>Secure Payment</h3>-->
        <!--                            <p>100% Guarantee</p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--                <div class="col-lg-3 col-md-6 col-sm-6 col-12">-->
        <!--                    <div class="single-service-wrap-2 mb-30">-->
        <!--                        <div class="service-icon-2 icon-red">-->
        <!--                            <i class="icon-earphones "></i>-->
        <!--                        </div>-->
        <!--                        <div class="service-content-2">-->
        <!--                            <h3>24h Support</h3>-->
        <!--                            <p>Dedicated support</p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <!--<div class="banner-area pb-85">-->
        <!--    <div class="container">-->
        <!--        <div class="row">-->
        <!--            <div class="col-lg-6 col-md-6">-->
        <!--                <div class="banner-wrap mb-30">-->
        <!--                    <div class="banner-img banner-img-zoom">-->
        <!--                        <a href="product-details.html"><img src="assets/images/banner/fast1.jpg" alt=""></a>-->
        <!--                    </div>-->
        <!--                    <div class="banner-content-11 banner-content-11-modify">-->
        <!--                        <h2><span></span><br></h2>-->
                               
        <!--                        <div class="btn-style-4">-->
        <!--                            <a class="hover-red" href="product-details.html"> <i class="icon-arrow-right"></i></a>-->
        <!--                            <p class="text-light">Get updated with trending topics and all the social buzz around all our brands & products.</p>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--            <div class="col-lg-6 col-md-6">-->
        <!--                <div class="banner-wrap mb-30">-->
        <!--                    <div class="banner-img banner-img-zoom">-->
        <!--                        <a href="product-details.html"><img src="assets/images/banner/run2.jpg" alt=""></a>-->
        <!--                    </div>-->
        <!--                    <div class="banner-content-11 banner-content-11-modify">-->
        <!--                        <h2><span></span><br></h2>-->
        <!--                        <p></p>-->
        <!--                        <div class="btn-style-4">-->
        <!--                            <a class="hover-black" href="product-details.html">Shop now <i class="icon-arrow-right"></i></a>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        
         <div class="about-us-area pb-120 pt-50 mb-20 text-justify">
            <div class="container">
                <div class="section-title mb-45 text-center">
                    <h2>We Are a Digital Healthcare Platform</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-4 about-text">
                       <p>4med.in brings to you an online platform, which can be accessed for all your health needs. We are trying to make healthcare a hassle-free experience for you. Get your allopathic, ayurvedic, homeopathic medicines, vitamins & nutrition supplements and other health-related products delivered at home. </p>
                       <p>We make healthcare Transparent, Reachable  and Affordable.About 4med India’s leading digital consumer healthcare platform E-Pharmacy Order medicines and health products online and get it delivered at home from licensed pharmacies Online Consultations Consult qualified and registered doctors on chat for free Labs Tests .Book lab tests online for hassle-free, home sample collection service.Get reports online.
                            Authentic Information Read medicine and health content written by qualified doctors and health professionals</p>

                    </div>
                </div>
            </div>
        </div>
        <div class="team-area pb-90">
            <div class="container">
                <div class="section-title mb-45 text-center">
                    <h2>Leadership</h2>
                </div>
                <div class="row">
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                                <img src="assets/images/banner/run3.png" alt="">
                                <div class="team-action">
                                    <a class="facebook" href="#">
                                        <i class="social_facebook"></i>
                                    </a>
                                    <a class="twitter" href="#">
                                        <i class="social_twitter"></i>
                                    </a>
                                    <a class="instagram" href="#">
                                        <i class="social_instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4>Jitendra singh</h4>
                                <span>Co-Founder</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                                <img src="assets/images/banner/run4.jpg" alt="">
                                <div class="team-action">
                                    <a class="facebook" href="#">
                                        <i class="social_facebook"></i>
                                    </a>
                                    <a class="twitter" href="#">
                                        <i class="social_twitter"></i>
                                    </a>
                                    <a class="instagram" href="#">
                                        <i class="social_instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4>Dhirendra K singh</h4>
                                <span>M.D. & Co-Founder</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-lg-4 col-sm-6 col-xs-12">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                                <img src="assets/images/banner/run3.png" alt="">
                                <div class="team-action">
                                    <a class="facebook" href="#">
                                        <i class="social_facebook"></i>
                                    </a>
                                    <a class="twitter" href="#">
                                        <i class="social_twitter"></i>
                                    </a>
                                    <a class="instagram" href="#">
                                        <i class="social_instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4>Geeta singh</h4>
                                <span>Co-Founder</span>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-lg-3 col-md-6 col-sm-6">-->
                    <!--    <div class="team-wrapper mb-30">-->
                    <!--        <div class="team-img">-->
                    <!--            <img src="assets/images/banner/run4.jpg" alt="">-->
                    <!--            <div class="team-action">-->
                    <!--                <a class="facebook" href="#">-->
                    <!--                    <i class="social_facebook"></i>-->
                    <!--                </a>-->
                    <!--                <a class="twitter" href="#">-->
                    <!--                    <i class="social_twitter"></i>-->
                    <!--                </a>-->
                    <!--                <a class="instagram" href="#">-->
                    <!--                    <i class="social_instagram"></i>-->
                    <!--                </a>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--        <div class="team-content text-center">-->
                    <!--            <h4>Jitendra singh</h4>-->
                    <!--            <span>Co-Founder</span>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
<!--updated content-->
           <div class="about-us-area pb-120 pt-50 mb-10 text-justify">
            <div class="container">
                <div class="section-title mb-45 text-center">
                            <h2>Our Story</h2>
                        </div>
                <div class="row">
                    <div class="col-lg-12 col-md-4 about-text">
                       <p>The idea In healthcare, the information around our medicines and lab tests is either unavailable or complicated to us.So we decided to create a platform that stood for transparent, authentic and accessible information for all.This idea grew into a company and 4med was created in 2012.</p>
                       
                       <br>
                       <h4>What We Offer</h4>
                       <p>We provide accurate, reliable & ethical information on medicines and help people use their medicines effectively and safely.We get medicines and other health products delivered at home in 1000+ cities across India from licensed and verified pharmacies.We also provide diagnostic services from certified labs and online doctor consults at any time, from anywhere.The journey so far We’ve made health care reachable to millions by giving them quality care at affordable prices.We continue to expand our rich and extensive medical content and are working hard to make this information available in multiple language.</p>

                       <br>
                       <h4>How we bring you closer to better health</h4>    
                       <p>Over the past years, we’ve worked to build a healthcare platform that not only delivers medicine – but a platform that guides customers to the right and affordable care. </p>

                       <br>
                       <h4>Our work and culture</h4>    
                       <p>At 4med we strongly believe that a great culture is an important ingredient for a startup’s success. Our culture promotes radical candor, fast paced iterations, collaboration and a flat hierarchy. Listed below are our core values that enshrine our culture.</p>
                       <p>At 4med we believe that every individual has the power to drive impact and change. We encourage our team members to take ownership and charge not paying heed to organizational trappings. As a result individuals (and not just leaders) have the potential to drive big impact on our business and customers.</p>

                       <br>
                       <h4>Done is better than perfect</h4> 
                       <p>We are highly experimental and data driven organization. As such we believe in shipping soon and often. We believe that in the long run failing fast beats all else.</p>
                       
                       <br>
                       <h4>Team and not individual</h4> 
                       <p>We believe in the power of the team. For us a superstar team is much more important than a superstar individual.</p>
                       
                       <br>
                       <h4>Accountability with empathy</h4>
                       <p >We believe that everyone can shine in an environment that’s right for them and we strive to help our team members discover that environment. Our communication philosophy is that of radical candor - Challenge Directly but Care Personally.</p>
                       
                       <br>
                       <h4>Contact Us</h4>
                       <p>For any kind of questions, or if you just want to say “hello”,</p>
                       <p>Feel free to get in touch at <a href="mailto:care@4med.in"><span class="a" style=" display:inline;color:blue;"> care@4med.in</span></a></p>
                       <p>Registered & Corporate Address</p>
                       <p>Second floor, Pal Market, Raja Bazar, Bailey Road, Patna- 800014, India</p>
                       
                       
                    </div>
                </div>
                
                <br><br><br>
                




</div>
                    

</div> 
        <div class="testimonial-area bg-gray-3 pt-115 pb-115">
            <div class="container">
                <div class="section-title mb-45 text-center">
                    <h2>Testimonials</h2>
                </div>
                <div class="testimonial-active-2 dot-style-2 dot-style-2-position-static">
                    <div class="single-testimonial-2 text-center">
                        <div class="testimonial-img">
                            <img alt="" src="assets/images/banner/run.jpg">
                        </div>
                        <p>4med.in is an online pharmacy that aims at making healthcare delivery simple, accessible and affordable. To ensure this, 4med.in has brought together doctors, pharmacist, path labs and consumers on a single platform.</p>
                        <div class="client-info">
                            <h5>Dhirendra K singh </h5>
                            <span>M.D. & Co-Founder</span>
                        </div>
                    </div>
                    <div class="single-testimonial-2 text-center">
                        <div class="testimonial-img">
                            <img alt="" src="assets/images/banner/run.jpg">
                        </div>
                        <p>4med.in is an online pharmacy that aims at making healthcare delivery simple, accessible and affordable. To ensure this, 4med.in has brought together doctors, pharmacist, path labs and consumers on a single platform.</p>
                        <div class="client-info">
                            <h5>Dhirendra K singh </h5>
                            <span>M.D. & Co-Founder</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="container">
        <div class="section-title mb-45 text-center">
            <br><br><br>
            <h2>INDIA’S OWN HEALTHCARE PLATFORM</h2>
                <div class="row">
                    <div class="col-lg-12 col-md-4 about-text"><br>
                    <p>© All rights reserved. In compliance with Drugs and Cosmetics Act, 1940 and Drugs and Cosmetics Rules, 1945, we don't process requests for Schedule X and other habit forming drugs.</p>
                    </div>
                </div>
        </div>
          </div>     
        <!--<div class="brand-logo-area pt-120 pb-80">-->
        <!--    <div class="container">-->
        <!--        <div class="brand-logo-wrap-2">-->
        <!--            <div class="single-brand-logo-2 mb-30">-->
        <!--                <img src="assets/images/brand-logo/brand-logo-6.png" alt="brand-logo">-->
        <!--            </div>-->
        <!--            <div class="single-brand-logo-2 mb-30">-->
        <!--                <img src="assets/images/brand-logo/brand-logo-7.png" alt="brand-logo">-->
        <!--            </div>-->
        <!--            <div class="single-brand-logo-2 mb-30">-->
        <!--                <img src="assets/images/brand-logo/brand-logo-8.png" alt="brand-logo">-->
        <!--            </div>-->
        <!--            <div class="single-brand-logo-2 mb-30">-->
        <!--                <img src="assets/images/brand-logo/brand-logo-9.png" alt="brand-logo">-->
        <!--            </div>-->
        <!--            <div class="single-brand-logo-2 mb-30">-->
        <!--                <img src="assets/images/brand-logo/brand-logo-10.png" alt="brand-logo">-->
        <!--            </div>-->
        <!--            <div class="single-brand-logo-2 mb-30">-->
        <!--                <img src="assets/images/brand-logo/brand-logo-11.png" alt="brand-logo">-->
        <!--            </div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        
        <br><br><br>
    </div>

    @include('layouts.footer')
    
    @include('layouts.foot')

</body>

</html>