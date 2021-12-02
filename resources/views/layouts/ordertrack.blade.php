<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My Account</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
     @include('layouts.head')
</head>

<style>




input[type="file"] {
    display: none;
}


</style>

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
                        
                        <li class="active">ORDER STATUS </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- my account wrapper start -->
        <div class="my-account-wrapper pt-120 pb-120" style = "background-image: linear-gradient(-20deg, #e9defa 0%, #fbfcdb 100%);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                               
                               
                                 <div class="col-5 offset-lg-1 bg">
                        				<div class="contact_form_title">
                        				  <h3>	Your Order Status </h3> <br>
                        				  <div class="progress">
                        				  	 @if($track->status == 0)
                                             <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                              @elseif($track->status == 1)
                                              <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                              @elseif($track->status == 2)
                                               <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                               <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                              @elseif($track->status == 3)
                                             <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                              <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                               <div class="progress-bar bg-primary" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                               <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                              @else
                                              <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                              @endif
                        					  <!-- <div class="progress-bar" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                        					  <div class="progress-bar bg-success" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                        					  <div class="progress-bar bg-info" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div> -->
                        					</div>
                        					 @if($track->status == 0)
                                              <h4> Note: Your Order Is In Process </h4>
                                              @elseif($track->status == 1)
                                              <h4> Note: Payment Accepted </h4>
                                              @elseif($track->status == 2)
                                             <h4> Note: Your Order Is On The Way </h4>
                                              @elseif($track->status == 3)
                                              <h4> Note: Order Delivered </h4>
                                              @else
                                             <h4> Note: Your Order Is Cancel </h4>
                                              @endif
                        					
                        				</div>
			                        </div>
			                        
			                        
			                        <div class="col-5 offset-lg-1">
                        				<div class="contact_form_title">
                        				  <h3>	Your Order Details </h3> <br>
                        				  <ul class = "list-group">
                        				  	<li class="list-group-item"> <b> Payment Type: </b> {{ $track->payment_type }} </li>
                        				  	<li class="list-group-item"> <b> Payment ID: </b> {{ $track->transaction_id }} </li>
                        				  
                        				  	<li class="list-group-item"> <b> Total: </b> {{ $track->amount }} </li>
                        				  	<li class="list-group-item"> <b> Month: </b> {{ $track->month }} </li>
                        				  	<li class="list-group-item"> <b> Date: </b> {{ $track->date }} </li>
                        				  	<li class="list-group-item"> <b> Year: </b> {{ $track->year }} </li>
                        				  </ul>
                        				</div>
			                        </div>
                               
                               
                                <!-- My Account Tab Menu End -->
                               
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        
        
        
    </div>
    
   
    
  <!--  <script-->
  <!--src="https://code.jquery.com/jquery-3.5.1.min.js"-->
  <!--integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="-->
  <!--crossorigin="anonymous"></script>-->
    
    
    

   @include('layouts.footer')
    
    @include('layouts.foot')
    
   
    
    
 
  
  


</body>

</html>