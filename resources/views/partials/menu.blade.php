

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}" style="color:#fff;font-weight: bold;">
                   <img src="/img/scholarship.svg" style="width: 20px;height: 20px;margin-right: 6px;"></img>
                    Qcm_Generator
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto ml-2">
                        @if(Gate::check('isUser') || Gate::check('isAdmin') || Gate::check('isTeacher'))
                        <li class="nav-item active" style="font-size: 14px;">
                                    <a class="nav-link" href="/home" style="color: #fff;"><img src="/img/homepage.svg" style="width: 20px;height: 20px;margin-right: 4px;margin-top: -4px;"></img>Mon Compte<span class="sr-only">(current)</span> </a>
                                       
                        </li>
                        @endif

                        @if(Gate::check('isUser') || Gate::check('isAdmin') || Gate::check('isTeacher'))
                        <li class="nav-item dropdown" style="font-size: 14px;">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"style="color: #fff;"><img src="/img/settings-gears.svg" style="width: 20px;height: 20px;margin-top: -4px;margin-right: 4px;"></img>
                                Settings
                                  
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="/Student/create">Language</a>
                            </div>
                        </li>
                        @endif

                        @if(Gate::check('isAdmin') || Gate::check('isTeacher'))
                        <li class="nav-item dropdown" style="font-size: 14px;">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;"><img src="/img/test.svg" style="width: 20px;height: 20px;margin-top: -4px;margin-right: 4px;"></img>
                                Qcm Manager
                                  
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="/Qcm/create">Add Qcm</a>
                                  <a class="dropdown-item" href="/Qcm">Mes Qcm</a>
                                  <a class="dropdown-item" href="/Qcm/All">Catalogue de Qcm</a>
                            </div>
                        </li>
                        @endif 

                        @if(Gate::check('isAdmin') || Gate::check('isTeacher'))
                        <li class="nav-item dropdown" style="font-size: 14px;">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff;"><img src="/img/team.svg" style="width: 20px;height: 20px;margin-top: -4px;margin-right: 4px;"></img>
                                Groupe Manager
                                  
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                  <a class="dropdown-item" href="/Groupe/create">Add Groupe</a>
                                  <a class="dropdown-item" href="/Groupe">Mes Groupe</a>
                            </div>
                        </li>
                        @endif 

                        
                        @if(Gate::check('isUser'))
                        <li class="nav-item active" style="font-size: 14px;">
                                    <a class="nav-link" href="/Quiz" style="color: #fff;"><img src="/img/test.svg" style="width: 20px;height: 20px;margin-right: 4px;margin-top: -4px;"></img>Mes Qcms<span class="sr-only">(current)</span> </a>
                                       
                        </li>
                        @endif 
                        
                        @if(Gate::check('isUser'))
                        <li class="nav-item active" style="font-size: 14px;">
                                    <a class="nav-link" href="/Inscription" style="color: #fff;"><img src="/img/team.svg" style="width: 20px;height: 20px;margin-right: 4px;margin-top: -4px;"></img>Mes Groupes<span class="sr-only">(current)</span> </a>
                                       
                        </li>
                        @endif 



                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}" style="color: #fff;">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}" style="color: #fff;">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre  style="color: #fff;">
                                    <img src="/uploads/avatars/{{ Auth::user()->avatar}}" style="width: 25px;height: 25px;float: left;border-radius: 50%;margin-right: 15px;">
                                    {{ Auth::user()->firstname }} {{ Auth::user()->secondname }}<span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="/home"><span>Mon Compte</span>
                                    <a class="dropdown-item" href="/home">Settings <span class="caret"></span> <hr>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    
                                    
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
</nav>
