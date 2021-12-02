<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>4med | OTP</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="{{ csrf_token() }}">
    
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
                        <li>
                            <a href="/login_register">Login - Register </a>
                        </li>
                        <li class="active">Verification</li>
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
                                <a class="active" data-toggle="tab" href="#">
                                    <h4> Verification </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg1" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                            <form action="{{ url('/register') }}" id="sign-up-form" method="POST">
                                                @csrf
                                                
                                                
                                                <input type="hidden" name="name" value="{{ $data['name'] }}">
                                                <input type="hidden" name="email" value="{{ $data['email'] }}">
                                                <input type="hidden" name="phone" value="{{ $data['phone'] }}">
                                                <input type="hidden" name="payment_mode" value="{{ $data['payment_mode'] }}">
                                                <input type="hidden" name="status" value="{{ $data['status'] }}">
                                                <input type="hidden" name="password" value="{{ $data['password'] }}">
                                                
                                                <input type="number" name="otp" id="code" placeholder="Enter otp">
                                                <div class="button-box">
                                                    

                                                    
                                                    <button type="submit" >Verify</button>
                                                </div>
                                            </form>

                                            <div id="recaptcha-container"></div>
    
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
    
   <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-app.js"></script>

  <!-- If you enabled Analytics in your project, add the Firebase SDK for Analytics -->
  <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-analytics.js"></script>

  <!-- Add Firebase products that you want to use -->
  <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.2.6/firebase-firestore.js"></script>
  
    <script>
    
  
    // Event bindings.
   
  
    
    //window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');

            
            // For Firebase JS SDK v7.20.0 and later, measurementId is optional
            const firebaseConfig = {
              apiKey: "AIzaSyA4k77YC_Ycx6EsKZ2H2cPnhR-zGLmn7gg",
              authDomain: "med-23b7b.firebaseapp.com",
              projectId: "med-23b7b",
              databaseURL: "https://med-23b7b.firebaseio.com",
              storageBucket: "med-23b7b.appspot.com",
              messagingSenderId: "655893481425",
              appId: "1:655893481425:web:5c5d28907b0cc76da442f0",
              measurementId: "G-YC21WM3PEK"
            };
            
            firebase.initializeApp(firebaseConfig);
            
       


 // Create a Recaptcha verifier instance globally
      // Calls submitPhoneNumberAuth() when the captcha is verified
      window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
        'recaptcha-container',
        {
          size: "invisible",
          callback: function(response) {
            submitPhoneNumberAuth();
          }
        }
      );
      
     
      
    </script>
    
   
    
<script>

function submitPhoneNumberAuth() {
        var phoneNumber = "+91"+{{ $data['phone'] }};
        var appVerifier = window.recaptchaVerifier;
        firebase
          .auth()
          .signInWithPhoneNumber(phoneNumber, appVerifier)
          .then(function(confirmationResult) {
            window.confirmationResult = confirmationResult;
            toastr.success("Otp has been sent to your mobile no.");
            //alert(confirmationResult);
          })
          .catch(function(error) {
            console.log(error);
            //toastr.error(error);
            //alert(error);
          });
      }
      
       function submitPhoneNumberAuthCode() {
        var code = document.getElementById("code").value;
        confirmationResult
          .confirm(code)
          .then(function(result) {
            var user = result.user;
            console.log(user);
            document.getElementById("sign-up-form").submit();
          })
          .catch(function(error) {
            console.log(error);
            toastr.error(error);
          });
      }


</script>

 <script>
    submitPhoneNumberAuth();
    
    </script>
   
</body>

</html>