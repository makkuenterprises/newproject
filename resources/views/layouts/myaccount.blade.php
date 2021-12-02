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
@import url('https://fonts.googleapis.com/css?family=Nanum+Gothic');

@-webkit-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

@-moz-keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}

@keyframes Gradient {
	0% {
		background-position: 0% 50%
	}
	50% {
		background-position: 100% 50%
	}
	100% {
		background-position: 0% 50%
	}
}
	
	
	a{
		color:#777;
	}
	a:hover{
		color:#f39305;
		text-decoration:none;
		}
.text-center{text-align:center;}
.banner-heading{
	font-family: 'Nanum Gothic', sans-serif;
	font-size: 75px;
    font-weight: 700;
    line-height: 100px;
    margin-bottom: 30px;
	color:#fff;
}
.banner-sub-heading{
	font-family: 'Nanum Gothic', sans-serif;
	font-size: 30px;
    font-weight: 300;
    line-height: 30px;
    margin-bottom: 50px;
	color:#fff;
}
.btn-warning{background-color:#eca439;}
.btn-warning:hover{background-color:#f39305;}
.mybtn{
	border-radius:0; 
	height:30px;
	margin:10px auto;
	line-height:10px;
}
.form-control{
	color:#d1d1d1;
	font-size:14px;
	font-weight:400;
	border-bottom:2px solid #f39305;
	border-top:0;
	border-left:0;
	border-right:0;
	height:30px;
}
.form-check-input{
	background-color:#fff !important;
	border-radius:50% !important;
	border:2px solid #f39305 !important;
}
.modal-content{
	width:400px;
	margin:auto;
}

.modal-header {
    padding:0.7rem 1rem;
    border-bottom: 1px solid #e9ecef;
   border-radius:0;
	background-color:#9a4a05;
}
.modal-title{
	font-size:16px;
	font-family: 'Nanum Gothic', sans-serif;
	text-transform:uppercase;
	color:#fff;
	text-align:center;
	}
.modal-body{
	background-image:url('http://snippetimg.meditialabs.com/bgs/bg1.jpg');
	background-position:top left;
	background-size:cover;
	width:100%;
	padding:1.5rem 3rem 3rem 3rem;
}
.text-intro{
	font-size:0.8em;
	color:#777;
	text-align:center;
}
.form-div{
	background-color:#fff;
	padding:2em 1.5em;
	box-shadow:2px 2px 2px 2px rgba(215,215,215,0.5);
}
form{
	border:0 !important;
}
@media (max-width:500px){
	.modal-content{
	width:330px;
	margin:auto;
}
.banner-heading{
	font-size: 30px;
    line-height: 30px;
    margin-bottom: 20px;
}
.banner-sub-heading{
	font-size: 10px;
    font-weight: 200;
    line-height: 10px;
    margin-bottom: 40px;
}
}
@media (max-width:768px){
	.banner-text{
	padding:150px 0 150px 0;
}
	.banner-sub-heading{
	font-size: 23px;
    font-weight: 200;
    line-height: 23px;
    margin-bottom: 40px;
}
}



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
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li class="active">My Account </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- my account wrapper start -->
        <div class="my-account-wrapper pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">
                                <div class="col-lg-3 col-md-4">
                                    <div class="myaccount-tab-menu nav" role="tablist">
                                        <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                            Dashboard</a>
                                        <a href="#orders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                        <a href="#returnorders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>Return Orders</a>
                                         <a href="#cancelorders" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i>Cancel Orders</a>
                                        <!--<a href="#download" data-toggle="tab"><i class="fa fa-cloud-download"></i> Download</a>-->
                                        <a href="#payment-method" data-toggle="tab"><i class="fa fa-credit-card"></i> Your Prescription 
                                         </a>
                                        <a href="#address-edit" data-toggle="tab"><i class="fa fa-map-marker"></i> address</a>
                                        <a href="#account-info" data-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                                        <a href="{{ url('/logout') }}" id = "delete"><i class="fa fa-sign-out"></i> Logout</a>
                                    </div>
                                </div>
                                <!-- My Account Tab Menu End -->
                                <!-- My Account Tab Content Start -->
                                <div class="col-lg-9 col-md-8">
                                    <div class="tab-content" id="myaccountContent">
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Dashboard</h3>
                                                <div class="welcome">
                                                    @if(Auth::User()->profile_pic == NULL)
                                                    <div class = "row">
                                                        
                                                        <div class = "col-sm-3">
                                                            <img src = "{{ asset('assets/images/avatar.png') }}" width = "150px" height = "150px">
                                                        </div>
                                                        
                                                        <div class = "col-sm-9">
                                                            
                                                             <form action = "{{ route('profile.update') }}" method = "post" enctype = "multipart/form-data">
                                                        @csrf
                                                       
                                                      
                                                       
                                                            <label style = "margin-top:77px;"> Click Here To Upload File
                                                                <input type = "file" size="60" name = "profile_pic">
                                                            </label>
                                                       
                                                     
                                                       
                                                        
                                                        <button type = "submit" class = "btn btn-danger btn-sm mt-4"> Submit </button>
                                                    </form>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                     
                                                   
                                                    @else
                                                    
                                                    <div class = "row">
                                                        
                                                        <div class = "col-sm-3">
                                                            
                                                             <img src="{{asset('uploads/avatar')}}/{{ Auth::user()->profile_pic }}"  width = "150px" height = "150px">
                                                            
                                                        </div>
                                                        
                                                        <div class = "col-sm-9">
                                                            
                                                            <form action = "{{ route('profile.update') }}" method = "post" enctype = "multipart/form-data">
                                                        @csrf
                                                        <label style = "margin-top:77px;"> Click Here To Upload File
                                                                <input type = "file" size="60" name = "profile_pic">
                                                            </label>
                                                        <button type = "submit" class = "btn btn-danger btn-sm mt-4"> Submit </button>
                                                    </form>
                                                            
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                   
                                                    
                                                    @endif <br>
                                                    <p class = "mt-4">Hello, <strong>{{ Auth::User()->name }}</strong> </p>
                                                </div> 

                                                <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                                
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="orders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Orders
                                                
                                                <span class = "float-right"> 
                                                
                                                     <a class = "btn btn-primary" href="" data-toggle="modal" data-target="#exampleModal">
                                                    Click Here For Order Tracking
                                                    <i class="fas fa-chevron-down"></i>
                                                    </a>
                                                
                                                </span>
                                                
                                                </h3>
                                               
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered" id="dataTables-example">
                                                        <thead class="thead-light">
                                                          
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Order Id</th>
                                                               
                                                                <th>Payment Type</th>
                                                                <th>Payment ID</th>
                                                                <th>Amount</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th> Return Status</th>
                                                                <th> Action </th>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody>
                                                            @php $i = 1; @endphp 
                                                             @foreach($orders as $order)
                                                            <tr>
                                                                <td> {{ $i++ }} </td>
                                                                <td>{{ $order->id }}</td>
                                                                
                                                                <td>{{ $order->payment_type }}</td>
                                                                <td>{{ $order->transaction_id }}</td>
                                                                <td>&#8377;{{ $order->amount }}</td>
                                                                <td>{{ $order->date }}</td>
                                                                <td>
                                                                	@if($order->status == 0)
                                                        			<span class = "badge badge-warning"> Pending  </span>
                                                        			@elseif($order->status == 1)
                                                        			<span class = "badge badge-info"> Payment Accept </span>
                                                        			@elseif($order->status == 2)
                                                        			<span class = "badge badge-warning"> Progress </span>
                                                        			@elseif($order->status == 3)
                                                        			<span class = "badge badge-success"> Delivered </span>
                                                        			@else
                                                        			<span class = "badge badge-danger"> Cancel </span>
                                                        			@endif
                                                        		</td>
                                                        		
                                                        		 <td>
                                                                  @if($order->return_order == 0)
                                                                      <span class = "badge badge-warning"> No Request  </span>
                                                                      @elseif($order->return_order == 1)
                                                                      <span class = "badge badge-info"> Pending </span>
                                                                      @elseif($order->return_order == 2)
                                                                      <span class = "badge badge-warning"> Accept </span>
                                                                      @elseif($order->return_order == 3)
                                                                      <span class = "badge badge-success">  </span>
                                                                      @else
                                                                      <span class = "badge badge-danger"> Cancel </span>
                                                                      @endif
                                                                     </td>
                                                                
                                                               
                                                                
                                                                <td>
                                             
                                                                     <button class = "btn btn-info btn-sm" id = "{{ $order->id }}" class="product_cart_button addcart" data-toggle="modal" data-target="#ordermodal" onclick = "orderView(this.id)">View</button>
                                                                
                                                                </td>
                                                            </tr>
                                                            
                                                            
                                                             

                                                            
                                                            
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                         <div class="tab-pane fade" id="returnorders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3> Orders
                                                
                                                
                                                
                                                </h3>
                                               
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered" id="dataTables-example">
                                                        <thead class="thead-light">
                                                          
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Order Id</th>
                                                                <th>Payment Type</th>
                                                                <th>Amount</th>
                                                                <th>Date</th>
                                                                <th> Status </th>
                                                                <th> Return Status </th>
                                                                <th> Refund Status </th>
                                                                <th> Action </th>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody>
                                                            @php $i = 1; @endphp
                                                            @foreach($returnorders as $return)
                                                            <tr>
                                                                <td> {{ $i++ }} </td>
                                                                <td>  {{ $return->id }} </td>
                                                                <td>  {{ $return->payment_type }} </td>
                                                                
                                                                
                                                                <td> &#8377;{{ $return->amount }} </td>
                                                                <td> {{ $return->date }} </td>
                                                                
                                                                <td>
                                                                    
                                                                    	@if($return->status == 0)
                                                        			<span class = "badge badge-warning"> Pending  </span>
                                                        			@elseif($return->status == 1)
                                                        			<span class = "badge badge-info"> Payment Accept </span>
                                                        			@elseif($return->status == 2)
                                                        			<span class = "badge badge-warning"> Progress </span>
                                                        			@elseif($return->status == 3)
                                                        			<span class = "badge badge-success"> Delivered </span>
                                                        			@else
                                                        			<span class = "badge badge-danger"> Cancel </span>
                                                        			@endif
                                                                    
                                                                    
                                                                </td>
                                                                
                                                                <td>
                                                                  @if($return->return_order == 0)
                                                                      <span class = "badge badge-warning"> No Request  </span>
                                                                      @elseif($return->return_order == 1)
                                                                      <span class = "badge badge-info"> Pending </span>
                                                                      @elseif($return->return_order == 2)
                                                                      <span class = "badge badge-success"> Accept </span>
                                                                      @elseif($return->return_order == 3)
                                                                      <span class = "badge badge-success"> Accept </span>
                                                                      @else
                                                                      <span class = "badge badge-danger"> Cancel </span>
                                                                      @endif
                                                                </td>
                                                                
                                                                <td>
                                                                  @if($return->return_order == 0)
                                                                      <span class = "badge badge-warning"> No Request  </span>
                                                                      @elseif($return->return_order == 1)
                                                                      <span class = "badge badge-info"> Pending </span>
                                                                      @elseif($return->return_order == 2)
                                                                      <span class = "badge badge-info"> Pending </span>
                                                                      @elseif($return->return_order == 3)
                                                                      <span class = "badge badge-success"> Accept </span>
                                                                      @else
                                                                      <span class = "badge badge-danger"> Cancel </span>
                                                                      @endif
                                                                </td>
                                                                
                                                                <td>
                  
                                                                    @if($return->return_order == 0)
                                                                        @if($return->payment_type == 'cashon')
                                                                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target-orderid="{{ $return->id }}" data-target="#BankDetailsModal">Return</button>
                                                                        @else
                                                                            <form action="{{ url('confirm/return') }}" method="POST" id = "return">
                                                                                @csrf
                                                                                <input type="hidden" class="form-control" name="orderid" value="{{ $return->id }}"> 
                                                                                <input type="hidden" name="payment_type" value="online">
                                                                                <button type="submit" class="btn btn-danger btn-sm">Return</button>
                                                                            </form>
                                                                        @endif
                                                                    @elseif($return->return_order == 2)
                                                                        <span class = "badge badge-warning"> Success </span>
                                                                    @else
                                                                    @endif
                                                                </td>
                                
                                                            </tr>
                                                            @endforeach
                                                                
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="tab-pane fade" id="cancelorders" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3> Orders
                                                
                                                
                                                
                                                </h3>
                                               
                                                <div class="myaccount-table table-responsive text-center">
                                                    <table class="table table-bordered" id="dataTables-example">
                                                        <thead class="thead-light">
                                                          
                                                            <tr>
                                                                <th>#</th>
                    
                                                                <th>Payment Type</th>
                                                                
                                                                <th>Amount</th>
                                                                <th>Date</th>
                                                                <th> Status </th>
                                                               
                                                                <th> Action </th>
                                                            </tr>
                                                            
                                                        </thead>
                                                        <tbody>
                                                            @php $i = 1; @endphp
                                                            @foreach($cancelorders as $cancel)
                                                            @if($cancel->status == 0 || $cancel->status == 1  || $cancel->status == 2)
                                                            <tr>
                                                                
                                                                <td> {{ $i++ }} </td>
                                                                <td>  {{ $cancel->payment_type }} </td>
                                                                
                                                                
                                                                <td> {{ $cancel->amount }} </td>
                                                                <td> {{ $cancel->date }} </td>
                                                                
                                                                <td>
                                                                    
                                                                    	@if($cancel->status == 0)
                                                        			<span class = "badge badge-warning"> Pending  </span>
                                                        			@elseif($cancel->status == 1)
                                                        			<span class = "badge badge-info"> Payment Accept </span>
                                                        			@elseif($cancel->status == 2)
                                                        			<span class = "badge badge-warning"> Progress </span>
                                                        			@elseif($cancel->status == 3)
                                                        			<span class = "badge badge-success"> Delivered </span>
                                                        			@else
                                                        			<span class = "badge badge-danger"> Cancel </span>
                                                        			@endif
                                                                    
                                                                    
                                                                </td>
                                                                
                                                               
                                                                
                                                                <td>
                                                                    
                                                                <a href = "{{ url('cancel/order/'.$cancel->id) }}" id = "cancel" class="btn btn-danger btn-sm">Cancel</a> 
                                                                       
                                                                </td>
                                                            
                                                            </tr>
                                                            @endif
                                                            @endforeach
                                                                
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                        <div class="modal fade" id="ordermodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLavel" aria-hidden="true">
                                                                  <div class="modal-dialog modal-lg" role = "document">
                                                                    <div class="modal-content">
                                                                      <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                          <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                      </div>
                                                                      <div class="modal-body">
                                                                        <div class="row" id = "form2">
                                                                            <div class="col-md-4">
                                                                                <div class="card">
                                                                                    <img src = "" id = "pimage">
                                                                                    <div class="card-body text-left">
                                                                                        <h5 class="card-title" id = "pname"> Payment Type : <strong> <u> <span id = "payment_type"> </span> </u> </strong> </h5>
                                                                                       
                                                                                        <h5 class="card-title" id = "pname"> Order Date : <strong> <u> <span id = "order_date"> </span>   </u> </strong></h5>
                                                                                        <h5 class="card-title" id = "pname"> Order Month : <strong>  <u> <span id = "order_month"> </span> </u></strong></h5>
                                                                                        <h5 class="card-title" id = "pname"> Order Year : <strong>  <u> <span id = "order_year"> </span> </u></strong></h5>
                                                                                        <h5 class="card-title" id = "pname"> Status Code : <strong> <u><span id = "status_code"> </span> </u></strong></h5>
                                                                                        <h5 class="card-title" id = "pname"> Amount : <strong> <u> <span id = "amount"> </span> </u></strong></h5>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-8">
                                                                               
                                                                              <div class="myaccount-table table-responsive text-center">
                                                                                <table class="table table-striped table-bordered table-hover"  id="records_table">
                                                                                    <thead>
                                                                                      <tr>
                                                                                        <th>Sr No.</th>
                                                                                        <th>Product Image</th>
                                                                                        <th>Product Name</th>
                                                                                        <th>Single Price</th>
                                                                                        <th>Quantity</th>
                                                                                        <th>Total Price</th>
                                                                                      </tr>
                                                                                    </thead>
                                                                                    <tbody id="tablebody"></tbody>
                                                                                 </table>
                                                                                 </div>
                                                                               
                                                                               
                                                                            </div>
                                                                            
                                                                                
                                                                           
                                                                        
                                                                        </div>
                                                                      </div>
                                                                      
                                                                    </div>
                                                                  </div>
                                                                </div>
                                                                
                                                                <script>
   $('body').on('hidden.bs.modal', '.modal', function () {
        $("#ordermodal").empty();
      });
    </script>
                                        <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                        <!--<div class="tab-pane fade" id="download" role="tabpanel">-->
                                        <!--    <div class="myaccount-content">-->
                                        <!--        <h3>Downloads</h3>-->
                                        <!--        <div class="myaccount-table table-responsive text-center">-->
                                        <!--            <table class="table table-bordered">-->
                                        <!--                <thead class="thead-light">-->
                                        <!--                    <tr>-->
                                        <!--                        <th>Product</th>-->
                                        <!--                        <th>Date</th>-->
                                        <!--                        <th>Expire</th>-->
                                        <!--                        <th>Download</th>-->
                                        <!--                    </tr>-->
                                        <!--                </thead>-->
                                        <!--                <tbody>-->
                                        <!--                    <tr>-->
                                        <!--                        <td>Haven - Free Real Estate PSD Template</td>-->
                                        <!--                        <td>Aug 22, 2018</td>-->
                                        <!--                        <td>Yes</td>-->
                                        <!--                        <td><a href="#" class="check-btn sqr-btn "><i class="fa fa-cloud-download"></i> Download File</a></td>-->
                                        <!--                    </tr>-->
                                        <!--                    <tr>-->
                                        <!--                        <td>HasTech - Profolio Business Template</td>-->
                                        <!--                        <td>Sep 12, 2018</td>-->
                                        <!--                        <td>Never</td>-->
                                        <!--                        <td><a href="#" class="check-btn sqr-btn "><i class="fa fa-cloud-download"></i> Download File</a></td>-->
                                        <!--                    </tr>-->
                                        <!--                </tbody>-->
                                        <!--            </table>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div>-->
                                        <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Prescription Status</h3>
                                                @if($prescriptions->count() > 0)
                                                @foreach($prescriptions as $row)
                                                    <ul>
                                                        <li> <strong> Image - </strong>  <img src="{{asset('uploads/prescription')}}/{{ $row->image }}"  width = "100px" height = "100px">  </li>
                                                        <li> <strong> Status - </strong>
                                                        
                                                            @if($row->verified == 0)
                                                                    <span class = "badge badge-warning"> Pending  </span>
                                                                  @elseif($row->verified == 1)
                                                                  <span class = "badge badge-info"> Prescription Is On Review </span>
                                                                 @elseif($row->verified == 2)
                                                                  <span class = "badge badge-info"> Your Order Is Packed </span>
                                                                  @elseif($row->verified == 3)
                                                                  <span class = "badge badge-info"> Your Order Is Shipped </span>
                                                                  @elseif($row->verified == 4)
                                                                  <span class = "badge badge-info"> Your Order Is Deleiverd </span>
                                                                  @else
                                                                  <span class = "badge badge-success"> Approved </span>
                                                                  @endif
                                                        
                                                        
                                                        </li>
                                                    </ul>
                                                @endforeach
                                                @else
                                                    <p class="saved-message">You don't have any prescriptions uploaded, please upload it.</p>
                                                @endif
                                                
                                            </div>
                                        </div>
                                        <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                            
                                             <div class="customer-zone mb-20">
                                                 <p class="cart-page-title">Want To Add New Address? <a class="checkout-click1" href="#">Click here to Add Address</a></p>
                                                    <div class="checkout-login-info">
                                                       
                                                        <form action="{{ route('profile.address') }}" method = "post">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="sin-checkout-login">
                                                                        <label> Full Name <span>*</span></label>
                                                                        <input type = "text" name = "fullname" required>
                                                                    </div>
                                                                </div>
                                                                 <div class="col-lg-6 col-md-6">
                                                                    <div class="sin-checkout-login">
                                                                        <label> City <span>*</span></label>
                                                                        <input type = "text" name = "city" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="sin-checkout-login">
                                                                        <label> State <span>*</span></label>
                                                                        <input type = "text" name = "state" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-6">
                                                                    <div class="sin-checkout-login">
                                                                        <label> PinCode <span>*</span></label>
                                                                        <input type = "text" name = "pin_code" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="sin-checkout-login">
                                                                        <label> Alternate Phone Number <span>*</span></label>
                                                                        <input type = "text" name = "alternate_phone">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12 col-md-12">
                                                                    <div class="sin-checkout-login">
                                                                        <label>Add Address <span>*</span></label>
                                                                        <textarea name = "full_address" rows = "5" required> </textarea>
                                                                    </div>
                                                                </div>
                
                                                            </div>
                                                            
                                                            <button type = "submit" class = "btn btn-danger"> Submit </button>
                                                            
                                                        </form>
                                                       
                                                    </div>
                                                </div>
                                            
                                            <div class = "row">
                                            @php  $i = 1; @endphp
                                            @foreach($addresses as $address)
                                            <div class = "col-6">
                                            <div class="myaccount-content">
                                                <h3>{{ $i++ }} Address </h3>
                                                <address>
                                                    <p><strong>Name - </strong> {{ $address->fullname }} </p>
                                                    <p><strong>City - </strong> {{ $address->city }}</p>
                                                    <p><strong>State - </strong> {{ $address->state }}</p>
                                                    <p><strong>Pin Code - </strong>  {{ $address->pin_code }} </p>
                                                    <p><strong>Alternate Phone - </strong> {{ $address->alternate_phone }} </p>
                                                   <p><strong>Address - </strong> {{ $address->full_address }} </p>
                                                </address>
                                                <!--<a href="{{ url('/edit/address/' .$address->id) }}" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit Address</a>-->
                                                <!-- <div class="customer-zone mb-20">-->
                                                <!--    <p class="cart-page-title">Want To Edit Address? <a class="checkout-click3" href="#">Click Here</a></p>-->
                                                <!--    <div class="checkout-login-info3">-->
                                                <!--        <form action="#">-->
                                                <!--            <input type="text" placeholder="Coupon code">-->
                                                <!--            <input type="submit" value="Apply Coupon">-->
                                                <!--        </form>-->
                                                <!--    </div>-->
                                                <!--</div>-->
                                             <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Edit Address</button>-->
                                           
                                                    <button class = "btn btn-info" id = "{{ $address->id }}" class="product_cart_button addcart" data-toggle="modal" data-target="#cartmodal" onclick = "productView(this.id)">Edit Address</button>
                                            
                                            <!--<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
                                            <!--  <div class="modal-dialog modal-sm" role="document">-->
                                            <!--    <div class="modal-content">-->
                                            <!--      <div class="modal-header">-->
                                            <!--        <div class = "text-center">-->
                                            <!--            <h3 class="modal-title text-center" id="exampleModalLabel"><u> Edit Address </u></h3>-->
                                            <!--        </div>-->
                                            <!--        <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
                                            <!--          <span aria-hidden="true">&times;</span>-->
                                            <!--        </button>-->
                                            <!--      </div>-->
                                            <!--      <div class="modal-body">-->
                                            <!--        <form>-->
                                            <!--          <div class = "row">-->
                                            <!--         <div class = "col-6">-->
                                            <!--          <div class="form-group">-->
                                            <!--            <label for="recipient-name" class="col-form-label">Name:</label>-->
                                            <!--            <input type="text" class="form-control" id="recipient-name">-->
                                            <!--          </div>-->
                                            <!--          </div>-->
                                            <!--          <div class = "col-6">-->
                                            <!--          <div class="form-group">-->
                                            <!--            <label for="message-text" class="col-form-label">City:</label>-->
                                            <!--            <input type="text" class="form-control" id="recipient-name">-->
                                            <!--          </div>-->
                                            <!--          </div>-->
                                            <!--          </div>-->
                                                      
                                            <!--           <div class = "row">-->
                                            <!--         <div class = "col-6">-->
                                            <!--          <div class="form-group">-->
                                            <!--            <label for="recipient-name" class="col-form-label">State:</label>-->
                                            <!--            <input type="text" class="form-control" id="recipient-name">-->
                                            <!--          </div>-->
                                            <!--          </div>-->
                                            <!--          <div class = "col-6">-->
                                            <!--          <div class="form-group">-->
                                            <!--            <label for="message-text" class="col-form-label">Pin Code:</label>-->
                                            <!--            <input type="text" class="form-control" id="recipient-name">-->
                                            <!--          </div>-->
                                            <!--          </div>-->
                                            <!--          </div>-->
                                                      
                                            <!--           <div class = "row">-->
                                            <!--         <div class = "col-12">-->
                                            <!--          <div class="form-group">-->
                                            <!--            <label for="recipient-name" class="col-form-label">Alternate Phone:</label>-->
                                            <!--            <input type="text" class="form-control" id="recipient-name">-->
                                            <!--          </div>-->
                                            <!--          </div>-->
                                            <!--          <div class = "col-12">-->
                                            <!--          <div class="form-group">-->
                                            <!--            <label for="message-text" class="col-form-label">Address:</label>-->
                                            <!--            <textarea class = "form-control" rows = "5" class = "form-control"> </textarea>-->
                                            <!--          </div>-->
                                            <!--          </div>-->
                                            <!--          </div>-->
                                            <!--        </form>-->
                                            <!--      </div>-->
                                            <!--      <div class="modal-footer">-->
                                                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                                            <!--        <button type="button" class="btn btn-primary">Update</button>-->
                                            <!--      </div>-->
                                            <!--    </div>-->
                                            <!--  </div>-->
                                            <!--</div>-->
                                            
                                            <div class="modal fade" id="cartmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLavel" aria-hidden="true">
                                              <div class="modal-dialog modal-lg" role = "document">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Edit Address</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                    </button>
                                                  </div>
                                                  <div class="modal-body">
                                                    <div class="row">
                                                        
                                                        <div class="col-md-12">
                                                            <ul class="list-group">
                                                                <form action = "{{ url('user/address/update/') }}" method = "post">
                                                                    @csrf
                                                                    <input type = "hidden" name = "address_id" id = "address_id" value = "">
                                                                  <li class="list-group-item">Name: <input type = "text" name = "fullname" id = "fullname" value = "">  </li>
                                                                  <li class="list-group-item">City: <input type = "text" name = "city" id = "city" value = ""> </li>
                                                                  <li class="list-group-item">State: <input type = "text" name = "state" id = "state" value = "">  </li>
                                                                  <li class="list-group-item">Pin Code: <input type = "text" name = "pin_code" id = "pin_code" value = "">   </li>
                                                                  <li class="list-group-item">Alternate Phone: <input type = "text" name = "alternate_phone" id = "alternate_phone" value = "">  </li>
                                                                  <li class="list-group-item">Address:  <textarea name = "full_address" id = "full_address" rows = "5">  </textarea>  </li>
                                                                  <div class = "text-center">
                                                                    <li class="list-group-item"> <button type = "submit" class = "btn btn-info"> Update </button> </li>
                                                                  </div>
                                                                 </form>
                                                            </ul>
                                                        </div>
                                                       
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                              </div>
                                            </div>
                                                
                                                
                                            </div>
                                            </div>
                                            @endforeach
                                           
                                            </div>
                                            
                                            
                                           
               
                                        </div>
                                        <!-- Single Tab Content End -->
                                        <!-- Single Tab Content Start -->
                                        <div class="tab-pane fade" id="account-info" role="tabpanel">
                                            <div class="myaccount-content">
                                                <h3>Account Details</h3>
                                                <div class="account-details-form">
                                                    
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="first-name" class="required"> Name</label>
                                                                    <input type="text" id="first-name" value = "{{ $user->name }}" readonly/>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <div class="single-input-item">
                                                                    <label for="last-name" class="required">Email</label>
                                                                    <input type="text" id="last-name" value = "{{ $user->email }}" readonly/>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="single-input-item">
                                                            <label for="display-name" class="required">Contact No</label>
                                                            <input type="text" id="display-name" value = "{{ $user->phone }}"/>
                                                        </div>
                                                      <form action="{{ route('password.update') }}" method = "post"> 
                                                      @csrf
                                                        <fieldset>
                                                            <legend>Password change</legend>
                                                            <div class="single-input-item">
                                                                <label for="current-pwd" class="required">Current Password</label>
                                                                <input type="password" id="current-pwd" name = "oldpass"/>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="new-pwd" class="required">New Password</label>
                                                                        <input type="password" id="password" name = "password" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="confirm-pwd" class="required">Confirm Password</label>
                                                                        <input type="password" id="confirm_password" name = "confirm_password"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                        <div class="single-input-item">
                                                            <button type = "submit" class="check-btn sqr-btn ">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div> <!-- Single Tab Content End -->
                                        
                                        
 
                                        
                                        
                                    </div>
                                </div> <!-- My Account Tab Content End -->
                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
        
        
        
    </div>
    
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Tracking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action = "{{ route('order.tracking') }}" method = "post">
            @csrf
            <div class = "modal-body">
                <label> Status Code </label>
                <input type="text" name="code" class="form-control" placeholder="Enter Your Order Id" required="">
            </div>
            <button type="submit" class="btn btn-danger"> Submit </button>
        </form>
      </div>
      
    </div>
  </div>
</div>

<!-- Modal Bank Details body -->
<div class="modal fade" id="BankDetailsModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <center>  <span class="modal-title">Bank Details Form</span></center>
              <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
		    <p class="text-intro">Please provide your bank details for refunding your amount directly into your bank account.</p>
		        <div class="form-div">
                    <form action="{{ url('confirm/return') }}" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" name="orderid">
                        <div class="form-group">
                            <input type="text" class="form-control" name="accntname" placeholder="Account holder name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="bankname" placeholder="Bank name" required>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="ifsc" placeholder="IFSC Code" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="accountnumber" placeholder="Account number" required>
                        </div><br>
                        <button type="submit" class="btn btn-warning btn-block mybtn" name="payment_type" value="cod">Return Order</button>
                        
                    </form>
		        </div>
        </div>
    </div>
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
    
   
    
     <script type="text/javascript">
      
    function productView(id){
        
        //alert(id);
        $.ajax({

            url: "{{ url('/user/address/view/')  }}/" +id,
            type: "GET",
            success:function(data){
                //alert(data);
                console.log(data);
                dataResult = JSON.parse(data);
                $('#address_id').val(dataResult.address_id);
                $('#fullname').val(dataResult.name);
                $('#city').val(dataResult.city);
                $('#state').val(dataResult.state);
                $('#pin_code').val(dataResult.pin_code);
                $('#alternate_phone').val(dataResult.phone);
                $('#full_address').val(dataResult.address);
                //$('#product_id').val(data.product.id);
                //$('#discount_price').text(data.product.discount_price);

                
            }

        })
    }
    
    
    function orderView(id){
        
        //alert(id);
         var $table = $("table#myTable tbody");
        $.ajax({

            url: "{{ url('/user/order/view/')  }}/" +id,
            type: "GET",
            success:function(data){
                //alert(data);
                console.log(data);
                dataResult = JSON.parse(data);
                console.log(dataResult)
                // $('#amount').text(dataResult.amount);
                // $('#payment_type').text(dataResult[0].payment_type);
               
                // $('#status_code').text(dataResult.status_code);
                // $('#status').text(dataResult.status_type);
                // $('#order_date').text(dataResult[1].date);
                // $('#order_month').text(dataResult[2].month);
                // $('#order_year').text(dataResult.year);
               // $('#product_name').text(dataResult.product_name);
               
               
               $('#payment_type').text(dataResult[0].payment_type);
               $('#order_date').text(dataResult[0].date);
               $('#order_month').text(dataResult[0].month);
               $('#order_year').text(dataResult[0].year);
               $('#status_code').text(dataResult[0].status_code);
              $('#amount').text(dataResult[0].amount);
              
              
             
               
               
               
                               var trHTML = '';
                $.each(JSON.parse(data), function (i, item) {
                     var img1 = '<a href="' + item.product_thumbnail + '"><img src="' + item.product_thumbnail + '" width = "60px" height = "60px"/></a>';
                    trHTML += '<tr>' +
                        '<td>' + (i + 1)  + '</td>' +
                          '<td>' + img1 + '</td>' +
                        '<td>' + item.product_name + '</td>' +
                    
                        '<td>' + item.singleprice + '</td>' +
                        '<td>' + item.quantity + '</td>' +
                        '<td>' + item.totalprice + '</td>' +
                       
                       
                        '</tr>';
                });
                
                $('#records_table > tbody').append(trHTML);
               
      
                
            }

        })
    }
    
    


  </script>
  
 
  
  <script>
    
    $('#password, #confirm_password').on('keyup', function () {
  if ($('#password').val() == $('#confirm_password').val()) {
    $('#message').html('Matching').css('color', 'green');
  } else 
    $('#message').html('Not Matching').css('color', 'red');
});
  
  </script>
  
  <script>
    $(document).ready(function () {
        $('#dataTables-example').dataTable();
    });
  </script>
  <script>
    $('#dataTables-example').DataTable({
        "ordering": true
    });
    $(document).ready(function () {             
      $('.dataTables_filterinput[type="search"]').css(
         {'width':'450px','display':'inline-block'}
      );
    });
    
    </script>
    
    
    <script>
            $(document).ready(function () {
                $("#BankDetailsModal").on("show.bs.modal", function (e) {
                    var order_id = $(e.relatedTarget).data('target-orderid');
                    $("input[name='orderid']").val(order_id);
                });
            });

    </script>


</body>

</html>