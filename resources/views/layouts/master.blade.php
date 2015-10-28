<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   <title>@yield('title')</title>
    <!-- Bootstrap -->
    {!! Html::style('css/bootstrap.min.css') !!}

    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @yield('script')
  </head>
  <body>
  
  		
  		

<div id="header" class="navbar navbar-default navbar-fixed-top">
    		
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/mygame/public">MyGame Admin-page</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Search</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
       
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
           @if(Auth::check())
        		 {!!Auth::user()->username!!}
      	   @endif 
      	   <span class="glyphicon glyphicon-user" aria-hidden="true">
      	   <span class="caret"></span></a>
          <ul class="dropdown-menu">
         
          	
            
            <li><a href="/mygame/public/users/create">Create Account</a></li>
             <li><a href="#">Settings</a></li>
          
            <li role="separator" class="divider"></li>
            <li><a href="login">Login</a></li>
            <li><a href="logout">Logout</a></li>
          </ul>
        </li>
      </ul>


    </div><!-- /.navbar-collapse -->



  </div><!-- /.container-fluid -->


    
</div>
  		<br>
  			<br>
  				<br>
  					<br>

  <div class="panel-body">
 
  
  {{-- navbar            --}}
   

 {{-- navbar            --}}

<div class="row"> 
 {{-- left navbar --}}

 <div class="col-xs-6 col-md-2">


@yield('navbar')
 
  
   </div>
 {{-- left navbar --}}

 <div class="col-xs-12 col-sm-6 col-md-8">
   <div class="container">
   <div class="well">
   @yield('content')

   </div>
   </div>
 
 </div>



</div>

 
  
</div>
<div class="panel-footer">
	<a src="#">powerd by:misur</a>
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    {!! Html::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') !!}
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    {!! Html::script('js/bootstrap.min.js') !!}

     
  </body>
</html>