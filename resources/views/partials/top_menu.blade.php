 
 
<!-- this is perfect don't touch it !!!!-->
<!-- just modifier le premium pop up !!!!-->



<nav  class="navbar navbar-expand-sm bg-light" style="margin: -0.1em;">
    <a href="{{ url('/') }} " style="font-size: 12px;color: black;">Follow us on :</a>
    <button class="navbar-toggler bg-secondary" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}"><span class="navbar-toggler-icon"></span></button>
                   
        <div class="collapse navbar-collapse mb-0 mt-0" id="navbarColor01">
            <!-- Left Side Of Navbar -->
                <ul  class="navbar-nav mr-auto ml-0 " style="margin: -0.6em;"> 
                      <li class="nav-item " ><a href="#" class="nav-link" ><img src="/icon/facebook1.png" alt="facebook"  width="12" height="12" title="facebook" class="icon" ></a></li>
                      <li class="nav-item " ><a href="#" class="nav-link" ><img src="/icon/twitter.png" alt="twitter"  width="12" height="12" title="twitter" class="icon"></a></li>
                      <li class="nav-item " ><a href="#"  class="nav-link" target="_blank"><img src="/icon/linkedin.png" alt="linkedin"  width="12" height="12" title="linkedin" class="icon"></a></li>
                      <li class="nav-item " ><a href="#" class="nav-link"  target="_blank"><img src="/icon/google-plus.png" alt="google-plus"  width="12" height="12" title="google-plus"  class="icon"></a></li>

                </ul>
            <!-- Right Side Of Navbar -->    
                <ul  class="navbar-nav mr-0 ml-0"> 
                    <a style="padding: 0.1em;margin:0.1em;font-size: 12px;"><img src="premium.png" width="20" height="20" class="d-inline-block align-right" alt="">Get Our Premium</a>
                </ul>
        </div>
</nav>

<!--
<div class="card-body">
                        
                        <div class="modal fade" id="premiumpopup" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal"> &times;</button>
                                    
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                            @csrf

                                            <div class="form-group row">
                                                <label for="email" class="col-sm-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                <div class="col-md-6">
                                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('email') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                <div class="col-md-6">
                                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                                    @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-md-6 offset-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                        <label class="form-check-label" for="remember">
                                                            {{ __('Remember Me') }}
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group row mb-0">
                                                <div class="col-md-8 offset-md-4">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Login') }}
                                                    </button>

                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary m-t-10" data-dismiss="modal" > Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>!-->