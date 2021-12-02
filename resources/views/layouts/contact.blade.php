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
                        <li class="active">Contact us </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="contact-area pt-115 pb-120">
            <div class="container">
                <div class="contact-info-wrap-3 pb-85">
                    
                    <div class="about-us-area pt-20 pb-50 ">
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
        
                    <h3>contact info</h3>
                    <div class="row">
                        <div class="col-lg-4 col-md-4">
                            <div class="single-contact-info-3 text-center mb-30">
                                <i class="icon-location-pin "></i>
                                <h4>our address</h4>
                                <p>Shop no: 2 & 3 , PAL Market Raja Bazar, Near IGIMS , Opposite Pillar No:65 , Bailey Road , Patna , Bihar</p>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-contact-info-3 extra-contact-info text-center mb-30">
                                <ul>
                                    <li><i class="icon-screen-smartphone"></i><a href="tel:+919430270997">943-027-0997</a></li>
                                    <li><i class="icon-envelope "></i> <a href="mailto:care@4med.in"> care@4med.in</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="single-contact-info-3 text-center mb-30">
                                <i class="icon-clock "></i>
                                <h4>openning hour</h4>
                                <p>8:00am - 10:00pm </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="get-in-touch-wrap">
                    <h3>Get In Touch</h3>
                    <div class="contact-from contact-shadow">
                        <form id="contact-form" action="{{ url('sendbasicemail') }}" method="get">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <input name="name" type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <input name="email" type="email" placeholder="Email">
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <input name="subject" type="text" placeholder="Subject">
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <textarea name="message" placeholder="Your Message"></textarea>
                                </div>
                                
                                <div class="col-lg-12 col-md-12">
                                    <button class="submit" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                        <p class="form-messege"></p>
                    </div>
                </div>
                <div class="contact-map pt-120 mb-100">
                    <div id="map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1235.8690661343403!2d85.0878382770218!3d25.605133745884167!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ed57bfedda02e3%3A0xa8dd77f2b6345599!2sPal%20Market!5e0!3m2!1sen!2sin!4v1609919826426!5m2!1sen!2sin" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
                
            </div>
        </div>
       
    </div>
     

    @include('layouts.footer')
    
    @include('layouts.foot')
   
    
    <!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYNfZ-tL7Q_kGLMO4Y5xz4lCl70V74AF4"></script>-->
    <!--<script>-->
    <!--    function init() {-->
    <!--        var mapOptions = {-->
    <!--            zoom: 11,-->
    <!--            scrollwheel: false,-->
    <!--            center: new google.maps.LatLng(40.709896, -73.995481),-->
    <!--            styles: [{-->
    <!--                    "featureType": "water",-->
    <!--                    "elementType": "geometry",-->
    <!--                    "stylers": [{-->
    <!--                            "color": "#e9e9e9"-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "lightness": 17-->
    <!--                        }-->
    <!--                    ]-->
    <!--                },-->
    <!--                {-->
    <!--                    "featureType": "landscape",-->
    <!--                    "elementType": "geometry",-->
    <!--                    "stylers": [{-->
    <!--                            "color": "#f5f5f5"-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "lightness": 20-->
    <!--                        }-->
    <!--                    ]-->
    <!--                },-->
    <!--                {-->
    <!--                    "featureType": "road.highway",-->
    <!--                    "elementType": "geometry.fill",-->
    <!--                    "stylers": [{-->
    <!--                            "color": "#ffffff"-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "lightness": 17-->
    <!--                        }-->
    <!--                    ]-->
    <!--                },-->
    <!--                {-->
    <!--                    "featureType": "road.highway",-->
    <!--                    "elementType": "geometry.stroke",-->
    <!--                    "stylers": [{-->
    <!--                            "color": "#ffffff"-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "lightness": 29-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "weight": 0.2-->
    <!--                        }-->
    <!--                    ]-->
    <!--                },-->
    <!--                {-->
    <!--                    "featureType": "road.arterial",-->
    <!--                    "elementType": "geometry",-->
    <!--                    "stylers": [{-->
    <!--                            "color": "#ffffff"-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "lightness": 18-->
    <!--                        }-->
    <!--                    ]-->
    <!--                },-->
    <!--                {-->
    <!--                    "featureType": "road.local",-->
    <!--                    "elementType": "geometry",-->
    <!--                    "stylers": [{-->
    <!--                            "color": "#ffffff"-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "lightness": 16-->
    <!--                        }-->
    <!--                    ]-->
    <!--                },-->
    <!--                {-->
    <!--                    "featureType": "poi",-->
    <!--                    "elementType": "geometry",-->
    <!--                    "stylers": [{-->
    <!--                            "color": "#f5f5f5"-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "lightness": 21-->
    <!--                        }-->
    <!--                    ]-->
    <!--                },-->
    <!--                {-->
    <!--                    "featureType": "poi.park",-->
    <!--                    "elementType": "geometry",-->
    <!--                    "stylers": [{-->
    <!--                            "color": "#dedede"-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "lightness": 21-->
    <!--                        }-->
    <!--                    ]-->
    <!--                },-->
    <!--                {-->
    <!--                    "elementType": "labels.text.stroke",-->
    <!--                    "stylers": [{-->
    <!--                            "visibility": "on"-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "color": "#ffffff"-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "lightness": 16-->
    <!--                        }-->
    <!--                    ]-->
    <!--                },-->
    <!--                {-->
    <!--                    "elementType": "labels.text.fill",-->
    <!--                    "stylers": [{-->
    <!--                            "saturation": 36-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "color": "#333333"-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "lightness": 40-->
    <!--                        }-->
    <!--                    ]-->
    <!--                },-->
    <!--                {-->
    <!--                    "elementType": "labels.icon",-->
    <!--                    "stylers": [{-->
    <!--                        "visibility": "off"-->
    <!--                    }]-->
    <!--                },-->
    <!--                {-->
    <!--                    "featureType": "transit",-->
    <!--                    "elementType": "geometry",-->
    <!--                    "stylers": [{-->
    <!--                            "color": "#f2f2f2"-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "lightness": 19-->
    <!--                        }-->
    <!--                    ]-->
    <!--                },-->
    <!--                {-->
    <!--                    "featureType": "administrative",-->
    <!--                    "elementType": "geometry.fill",-->
    <!--                    "stylers": [{-->
    <!--                            "color": "#fefefe"-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "lightness": 20-->
    <!--                        }-->
    <!--                    ]-->
    <!--                },-->
    <!--                {-->
    <!--                    "featureType": "administrative",-->
    <!--                    "elementType": "geometry.stroke",-->
    <!--                    "stylers": [{-->
    <!--                            "color": "#fefefe"-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "lightness": 17-->
    <!--                        },-->
    <!--                        {-->
    <!--                            "weight": 1.2-->
    <!--                        }-->
    <!--                    ]-->
    <!--                }-->
    <!--            ]-->
    <!--        };-->
    <!--        var mapElement = document.getElementById('map');-->
    <!--        var map = new google.maps.Map(mapElement, mapOptions);-->
    <!--        var marker = new google.maps.Marker({-->
    <!--            position: new google.maps.LatLng(40.709896, -73.995481),-->
    <!--            map: map,-->
    <!--            icon: 'assets/images/icon-img/pin.png',-->
    <!--            animation: google.maps.Animation.BOUNCE,-->
    <!--            title: 'Snazzy!'-->
    <!--        });-->
    <!--    }-->
    <!--    google.maps.event.addDomListener(window, 'load', init);-->
    <!--</script>-->
</body>

</html>