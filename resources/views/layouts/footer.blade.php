<div class="subscribe-area bg-gray pt-115 pb-115">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <div class="section-title">
                            <h2>keep connected</h2>
                            <p>Get updates by subscribe our weekly newsletter</p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div id="mc_embed_signup" class="subscribe-form">
                            <form id="mc-embedded-subscribe-form" class="validate subscribe-form-style" name="mc-embedded-subscribe-form">
                                <!--@csrf-->
                                <div id="mc_embed_signup_scroll" class="mc-form">
                                    <input class="email" id="email" type="email" placeholder="Enter your email address" name="email" value="" required>
                                    <div class="mc-news" aria-hidden="true">
                                        <input type="text" value="" tabindex="-1" name="">
                                    </div>
                                    <div class="clear">
                                        <input id="mc-embedded-subscribe" class="button btn-submit" type="submit" name="subscribe" value="Subscribe">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<footer class="footer-area bg-gray pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">
                        <div class="contact-info-wrap">
                            <div class="footer-logo">
                                <a href="/"><img src="assets/images/logo/logo_long.png" width="200" alt="logo"></a>
                            </div>
                            <div class="single-contact-info">
                                <span>Our Location</span>
                                <p>Shop no: 2 & 3 , PAL Market Raja Bazar, Near IGIMS , Opposite Pillar No:65 , Bailey Road , Patna , Bihar</p>
                            </div>
                            <div class="single-contact-info">
                                <span>24/7 hotline:</span>
                                <p>(+91) 943-027-0997</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="footer-wrap">
                            <div class="footer-menu">
                                <div class="section-title">
                                    <h2>Our Policies</h2>
                                </div><br>
                                <nav>
                                    <ul>
                                        <li style="font-size:8px;"><a href="{{ url('/terms#terms') }}">Terms & Conditions</a></li><br>
                                        <li><a href="{{ url('/terms#privacy') }}">Privacy Policy </a></li><br>
                                        <li><a href="{{ url('/terms#refund') }}">Refund Policy</a></li><br>
                                        <li><a href="{{ url('/terms#customersupport') }}">Customer Support Policy</a></li><br>
                                        <li><a href="{{ url('/terms#shippingpolicy') }}">Shipping Policy</a></li><br>
                                        <li><a href="{{ url('/terms#deliverypolicy') }}">Delivery Policy</a></li></br><br>
                                    </ul>
                                    
                                </nav>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                         <div class="footer-right-wrap">
                            <div class="footer-menu">
                                    <div class="section-title">
                                        <h2>Connect</h2>
                                    </div><br>
                                <div class="social-style-2 social-style-2-mrg">
                                    <a href="#"><i class="social_twitter"></i></a>
                                    <a href="#"><i class="social_facebook"></i></a>
                                    <a href="#"><i class="social_googleplus"></i></a>
                                    <a href="#"><i class="social_instagram"></i></a>
                                    <a href="#"><i class="social_youtube"></i></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="copyright text-center">
                                    <p>&#169; 2020 Geetanajli Medial Pvt Ltd | Developed by <a href="https://korawanindiaitsolution.com/"><span>Korawan India IT Solution</span> </a></p>
                                </div>
            </div>
        </footer>
        
        
        <script>
     $(".btn-submit").click(function(event){
      event.preventDefault();
       
       
            //e.preventDefault();
             var email = document.getElementById("email").value;
             var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
              
             if (reg.test(email))
              {
                 $(this).val('Sending..');
             $(this).prop('disabled', true);
             var url = "{{ URL('/subscribed_email') }}";
            //alert(email);
       
            	$.ajax({
            			url: url,
            			type: "POST",
            			data:{
                            _token:'{{ csrf_token() }}',
            				email: email,
            			},
            			success: function(dataResult){
            			     $(".btn-submit").val('Subscribe');
            			     document.getElementById("email").value = "";
            			     $(".btn-submit").prop('disabled', false);
                            dataResult = JSON.parse(dataResult);
                         if(dataResult.statusCode)
                         {
                             if(dataResult.type == "success")
                             {
                             toastr.success(dataResult.messege);
                             }
                             else{
                             toastr.error(dataResult.messege);
                             }
                         }
                         else
                         {
                             alert("Internal Server Error");
                         }
            				
            			}
            		});
              }else{
                alert("You have entered an invalid email address!");
              }
    
            
        
            	});
        </script>