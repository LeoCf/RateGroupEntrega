<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

   <!--  <title>{{ config('app.name', 'Laravel') }}</title> -->
         <title>RateMe</title>

    <!-- Styles -->
   <!--  -->
    <link href="/css/app.css" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ URL::asset('css/homepage.css') }}">



    <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="icon" href="favicon.ico" type="image/x-icon"/>
       <script src='https://www.google.com/recaptcha/api.js'></script>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        







</head>
<body>
<!-- Scripts -->
 <!--  -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>


 <!--  Scrip to change background images Working propely -->
     <script>
                var header = $('body');
                var backgrounds = new Array(
                    'url(../images/bk_home.jpg)'
                  , 'url(../images/images.jpeg)'
                  , 'url(../images/image3.jpg)'
                  , 'url(../images/image4.jpg)'
                );

                var current = 0;

                function nextBackground() {
                    current++;
                    current = current % backgrounds.length;
                    header.css('background-image', backgrounds[current]);
                }
                setInterval(nextBackground, 20000);

                header.css('background-image', backgrounds[0]);
    </script>



                   
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                       
                        <!-- Authentication Links -->
                    @if (Auth::guest())

                        <div class="menu_vertical"> 
                           <a href="{{ url('/home') }}"><img src="{{ URL::asset('images/logo_RateMe.png') }}" alt="logoRateMe" width="120px" height="100px"/></a>
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
    
                            
                        </div>
                    @elseif(Auth::user()->type=='user')
                        <div class="menu_vertical"> 
                            <img src="{{ URL::asset('images/logo_RateMe.png') }}" alt="logoRateMe" width="120px" height="100px"/>
                            <ul>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:40px">
                                <img src="/avatars/{{ Auth::user()->avatar }}" style="width:32px ;height:32px; position:absolute; top:0px; left:0px; border-radius: 50%">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                                
                                <li><a href="/perfil">Perfil</a></li>
                                <li><a href="/avaliar">Avaliar</a></li>
                                <li><a href="/procurarGrupos">Procurar Grupos</a></li>
                                <li><a href="/gerirDisciplinasGrupos">Gerir Disciplinas e Grupos </a></li>
                            </ul>  
                        </div>
                    
                        @else if(Auth::user()->type=='prof')
                            <div class="menu_vertical"> 
                            <img src="{{ URL::asset('images/logo_RateMe.png') }}" alt="logoRateMe" width="120px" height="100px" />
                            <ul>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="position:relative; padding-left:40px">
                                <img src="/avatars/{{ $user->avatar }}" style="width:32px ;height:32px; position:absolute; top:0px; left:0px; border-radius: 50%">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ url('/logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                          <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                                <li><a href="/procurarGrupos">As minhas Disciplinas</a></li>
                                <li><a href="#contact">Perfil</a></li>
                            </ul>  
                        </div>
                    @endif

                    
                    </ul>
               
            
    

         @yield('menu')
        
        @yield('content')

<div class="footer">
@section('footer')
      <footer>
        <ul>
            <li>Sobre Nós</li> 
            <li>Contactos</li>
            <li>Rate Groups &reg; </li>
        </ul>
      </footer>
@show
</div>     
    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
