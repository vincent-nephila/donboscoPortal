<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta author="Roy Plomantes">
        <meta poweredby = "Nephila Web Technology, Inc">
        
        @if (Auth::guest())
        <title>Don Bosco Technical Institute of Makati, Inc.</title>
        @else
	<title>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }} - Don Bosco Technical Institute</title>

	<script>
            
        
        </script>	

        @endif
        
	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/circle.css') }}" rel="stylesheet">
        <link href="{{ asset('/css/donbosco.css') }}" rel="stylesheet">
        
        
        <script src="{{asset('/js/jquery.min.js')}}"></script>
        <script src="{{asset('/js/bootstrap.min.js')}}"></script>
        

        </head>
<body> 
<div class= "container-fluid">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="col-md-1 col-sm-2 col-xs-3" style=""> 
            <img class ="img-responsive" style="margin-top: 10px;max-width: 73px" src = "{{ asset('/images/DBTI.png') }}" alt="Don Bosco Technical School"/>
            </div>
            <div class="col-md-11 col-sm-10 col-xs-9" style="padding-top: 10px">
                <span style="font-size: 14pt; font-weight: bold;">Don Bosco Technical Institute of Makati</span><br>Chino Roces Ave., Makati City<br>Tel No : 892-01-01
            </div>   
            
        </div>
    
</div>
 
       <nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
                            <a class="navbar-brand" style="margin-left: 5px;font-size: 14px;"  href="{{ url('/') }}">DBTI - Makati School Information System</a>
			</div>
                    
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            
				<ul class="nav navbar-nav">
                                 @if(Auth::guest())
                                 @else
                                    @if(Auth::user()->accesslevel == env('USER_REGISTRAR'))
                                    
                                    
                                        <li>
                                        <a href="{{url('/')}}" >Home</a>
                                        
                                        
                                        </li>
                                        
                                         <li class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">Reports
                                        <span class="caret"></span></a>
                               
                                        <ul class="dropdown-menu" role="menu">
                           
                                        <li><a href="{{url('/')}}"><i class="fa fa-btn fa-sign-out"></i>List of Student per Elective</a></li>
                                        
                                        
                                        </ul>
                                        </li>
                                        
                                        
                                    @endif
                                 @endif
                                 
				</ul>

                            <ul class="nav navbar-nav navbar-right">
		   @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}  <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
				</ul>
			</div>
		</div>
	</nav>
    <div class="col-md-1" style="text-align: center">
        <button type="button" id="sendoff" class="btn btn-success btn-circle btn-xl" title="Send out mails" onclick="emailblast()" style="margin-top: 5px;margin-bottom: 5px;" ><i id="sendofflg" class="fa fa-paper-plane-o"></i></button>
        <a href="{{url("/")}}" class="btn btn-default btn-circle btn-lg" title="Home" style="margin-top: 5px;margin-bottom: 5px;" ><i class="fa fa-home"></i></a>
        <a href="{{url("/reports")}}" class="btn btn-default btn-circle btn-lg" title="Reports"  style="margin-top: 5px;margin-bottom: 5px;" ><i class="fa fa-list"></i></a>
    </div>
    <div class="col-md-11">
    @yield('content')
    </div>
    
<div class="container_fluid">
     <div class="col-md-12"> 
<p class="text-muted"> Copyright 2016, Don Bosco Technical Institute of Makati, Inc.  All Rights Reserved.<br />
 <a href="http://www.nephilaweb.com.ph">Powered by: Nephila Web Technology, Inc.</a></p>
</div>
  </div>
</body>

<script>
    function emailblast(){
        $("#sendoff").prop("disabled",true);
        $("#sendofflg").removeClass("fa-paper-plane-o").addClass("fa-spinner fa-spin");
        
        $.ajax({
            type:"GET",
            url:"/blastmail",
            success:function(data){
                $("#sendoff").prop("disabled",false);
                $("#sendofflg").removeClass("fa-spinner fa-spin").addClass("fa-paper-plane-o");
            }
        });
    }
    
</script>
</html>