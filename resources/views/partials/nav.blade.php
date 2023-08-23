<div class="site-wrap">

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
  
    <div class="site-navbar-wrap js-site-navbar bg-white" style="background-color: white;">
      
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="">
            <div class="row align-items-center" style="background-color: white;">
              <div class="col-2">
                <?php $data = webinfo();
                if($data != null){
                  $name = explode(" ",$data->name);
                }
                
               
                ?>
                @if ($data != null)
                <h2 class="mb-0 site-logo"><a href="{{url ('/')}}">{{$name[0]}}<strong class="font-weight-bold"><?php if(isset($name[1])){?>{{$name[1]}} <?php }?></strong> </a></h2>
                @else
                <h2 class="mb-0 site-logo"><a href="{{url ('/')}}">Job<strong class="font-weight-bold">Finder</strong> </a></h2>
                @endif
               
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    <ul class="site-menu js-clone-nav d-none d-lg-block">

                      @if(Auth::check())
                      @if (Auth::user()->user_type== '' || Auth::user()->user_type == null)
                      <li><a href="{{url('/main')}}"> Admin Dashboard</a></li>
                      @endif
                      @endif

                    
                      

                      @if(!Auth::check())
                    
                      <li><a href="{{url('/register')}}">For Job Seeker</a></li>
                      <li>
                        <a href="{{route('employer.register')}}">For Employer</a>
                      </li>
                      @else
                      
                      @endif
                      
                      @if(!Auth::check())
                      <li><a href="{{route('company')}}">Company</a></li>
                      @endif

                      
                      
                      {{-- <li><a href="contact.html">Contact</a></li> --}}
                      <li>
                        @if (Auth::check())
                        @if(Auth::user()->user_type=='employer')
                        <li> <a class="dropdown-item" href="{{route('my.job')}}">Jobs Posted</a></li>
                        <li><a class="dropdown-item" href="{{route('applicant')}}"> Applicants</a></li>
                        <li><a class="dropdown-item" href="{{url('/chatify')}}"><button class="btn btn-secondary">Inbox</button></a></li>
                        <li><a class="dropdown-item" href="{{ route('company.view') }}"> {{ __('Company') }} </a></li>
                        <li> <a href="{{route('job.create')}}"><button class="btn btn-secondary">Post a job</button></a> </li>
                       
                        
                            
                        @elseif(Auth::user()->user_type=='seeker')
                        <li><a href="{{route('company')}}">Company</a></li>
                        <li> <a class="dropdown-item" href="user/profile">{{ __('Profile') }}</a></li>
                        <li> <a class="dropdown-item" href="{{route('mysave-job')}}">{{ __('Saved Jobs') }}</a></li> 
                        <li> <a class="dropdown-item" href="{{route('view-jobs')}}">{{ __('Applied Job') }}</a></li> 
                        <li><a class="dropdown-item" href="{{url('/chatify')}}"><button class="btn btn-primary">Inbox</button></a></li>
                         @else   
                         @endif
                            
                        @endif

                     
                      

                 
                @if(!Auth::check())
                <button type="button" class="btn btn-primary  text-white py-3 px-4 rounded" data-toggle="modal" data-target="#exampleModal">
                  Login
                </button>
                @else
              <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> {{ __('Logout') }} </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">  @csrf
              </form>
            @endif
            
`                   </li>
                    </ul>
                  </div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<!--modal-->

<!-- Modal -->
              <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="POST" action="{{ route('login') }}">
                                      @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label ">{{ __('Password') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-12 offset-md-4">
                               

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
         <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

        </form>
      </div>
    </div>
  </div>
</div>