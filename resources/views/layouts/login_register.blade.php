<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>4med | Login</title>
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
                        <li class="active">Login - Register </li>
                    </ul>
                </div>
            </div>
        </div>
        
        

        


          
       
    

        <div class="login-register-area pt-115 pb-120">
              
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                <a class="active" data-toggle="tab" href="#lg1">
                                    <h4> login </h4>
                                </a>
                                <a data-toggle="tab" href="#lg2">
                                    <h4> register </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="login_register" method="POST">
                                                @csrf
                                                <input type="email" name="email" placeholder="Email" required>
                                                <input type="password" name="password" placeholder="Password" required>
                                                <div class="button-box">
                                                    <div class="login-toggle-btn">
                                                        <!--<input type="checkbox">-->
                                                        <!--<label>Remember me</label>-->
                                                        <a href="#">Forgot Password?</a>
                                                    </div>
                                                    <button type="submit">Login</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div id="lg2" class="tab-pane">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="{{ url('/otp') }}" method="post" class="ref-form">
                                                @csrf
                                                <input type="text" name="name" placeholder="Full Name" required>
                                                <input type="email" name="email" placeholder="E-mail" required>
                                                 
                                                <input type="password" name="password" placeholder="Password" required >
                                                <input type="number" 
                                                    name="phone"
                                                    placeholder="Phone" 
                                                    id="call" 
                                                    min="1000000000"
                                                    max="9999999999" 
                                                    required  
                                                    oninvalid="this.setCustomValidity('Mobile number should be 10 digit.')"
                                                    oninput="this.setCustomValidity('')" 
                                                    />
                                                <input type="checkbox" name="terms" placeholder="" title="please accept our terms & conditions." required >
                                                I agree to the <a href="{{ url('/terms') }}">terms & conditions</a><br><br>
                                                <div class="button-box">
                                                    <button type="submit" >Register</button>
                                                </div>
                                            </form>
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
    
   


    @include('layouts.footer')
    
    @include('layouts.foot')
    <!-- phone validation-->
    <script>
    // jQuery(document).ready(function () {
    //   jQuery("#call").keypress(function (e) {
    //      var length = jQuery(this).val().length;
    //   if(length > 9 && length < 9) {
    //         return false;
    //   } else if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
    //         return false;
    //   } else if((length == 0) && (e.which == 48)) {
    //         return false;
    //   }
    //   });
    // });
    
    jQuery(document).ready(function(){
        // jQuery('.ref-form input').on('keydown',function(){
        //         check_inputfield();
        // });
        
        // function check_inputfield(){
        //     if($('input[name="full_name"]').val().length > 1 || $('input[name="full_name"]').val() != ''){
        //          $('input[name="email"]').prop('disabled',false);
        
        //     }   
        //     else{
        //         $('input[name="email"]').val('');
        //         $('input[name="email"]').prop('disabled',true);
        //     }
        //     if($('input[name="email"]').val().length > 1 || $('input[name="email"]').val() != ''){
        //          $('input[name="user-password"]').prop('disabled',false);
        
        //     }   
        //     else{
        //         $('input[name="user-password"]').val('');
        //         $('input[name="user-password"]').prop('disabled',true);
        //     }
        //      if($('input[name="mobile"]').val().length > 1 || $('input[name="mobile"]').val() != ''){
        //          $('input[name="dob"]').prop('disabled',false);
        
        //     }   
        //     else{
        //         $('input[name="dob"]').val('');
        //         $('input[name="dob"]').prop('disabled',true);
        //     }
        //     if($('input[name="mobile"]').val().length > 1 || $('input[name="mobile"]').val() != ''){
        //          $('input[name="dob"]').prop('disabled',false);
        
        //     }   
        //     else{
        //         $('input[name="dob"]').val('');
        //         $('input[name="dob"]').prop('disabled',true);
        //     }
        // }
    });
    </script>
   

</body>

</html>