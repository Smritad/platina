
<!DOCTYPE html>
<html lang="en">

<head>
         @include('components.frontend.head')

</head>

<body>
  <!-- Loader -->
  <div class="rx-loader">
    <span class="loader"></span>
  </div>
  <!-- Header -->
          @include('components.frontend.header')

  <!-- Hero -->

   <!-- Breadcrumb -->
    <section class="section-breadcrumb">
      <div class="rx-breadcrumb-image">
        <div class="rx-breadcrumb-overlay"></div>
        <div class="inner-breadcrumb-contact">
          <div class="main-breadcrumb-contact">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="rx-banner-contact">
                    <h2>Reset Password </h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="rx-banner-breadcrumb">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="breadcrumb-contact">
                    <!-- <div class="main-heading">
                      <h4>Our Leadership </h4>
                    </div> -->
                    <div class="last-contact">
                      <ul>
                        <li>
                          <a href="{{route('frontend.index') }}">Home</a>
                        </li>
                        <li>Reset Password </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About -->
    <div class="reset-password-wrap">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 col-6">
            <div class="reset-password-password-box">
      <form method="POST" action="{{ route('user.resetpassword.update') }}" class="form-login form-has-password">
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">
    <div class="col-12">
        <div class="rx-banner text-center rx-banner-effects">
            <h4>Reset <span>Password</span></h4>
            <p>Enter your email and new password</p>
        </div>
        <div class="rx-input-box login-input-box">
            <input type="email" name="email" id="email" class="rx-form-control" placeholder="Email address*" required value="{{ old('email') }}">
            @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
            @endif
        </div>
        <div class="rx-input-box login-input-box">
            <input type="password" name="password" class="rx-form-control" placeholder="New Password*" required>
        </div>
        <div class="rx-input-box login-input-box">
            <input type="password" name="password_confirmation" class="rx-form-control" placeholder="Confirm Password*" required>
        </div>
        <div class="login-inner-button">
            <button type="submit" class="login-btn-two">Reset Password</button>
        </div>
    </div>
</form>

            </div>
          </div>
          <div class="col-lg-6 col-12">
             <div class="reset-right-box">
              <h3>Don't have an account?</h3>
              <p>Welcome! Register to access your personalized experience, saved preferences, and more. We're thrilled to have you with us!</p>
              <button type="button" class="login-btn-two">Register</button>
            </div>
          </div>
        </div>
      </div>
    </div>


      @include('components.frontend.footer')    

  <!-- Back to top  -->
  <a href="#Top" class="back-to-top result-placeholder">
    <i class="fa fa-angle-up"></i>
    <div class="back-to-top-wrap active-progress">
      <svg viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
      </svg>
    </div>
  </a>
  
  <!-- Feature tools -->
  <div class="rx-tools-sidebar-overlay"></div>
  <div class="rx-tools-sidebar">
    <!-- <a href="javascript:void(0)" class="rx-tools-sidebar-toggle in-out">
      <i class="ri-settings-line"></i>
      </a> -->
    <div class="rx-inner-tools-sidebar">
      <div class="rx-bar-title">
        <h6>Tools</h6>
        <a href="javascript:void(0)" class="close-tools"><i class="ri-close-line"></i></a>
      </div>
      <div class="rx-tools-detail">
        <div class="rx-tools-block">
          <h3>Select Color</h3>
          <ul class="rx-color">
            <li class="color-primary active-color"></li>
            <li class="color-1"></li>
            <li class="color-2"></li>
            <li class="color-3"></li>
            <li class="color-4"></li>
            <li class="color-5"></li>
            <li class="color-6"></li>
            <li class="color-7"></li>
            <li class="color-8"></li>
            <li class="color-9"></li>
          </ul>
        </div>
        <div class="rx-tools-block">
          <h3>Modes</h3>
          <div class="rx-tools-rtl">
            <div class="mode-primary rx-tools-item mode active-mode ltr" data-rx-mode-tool="ltr">
              <img src="{{ asset('/frontend/assets/img/tools/ltr.png')}}" alt="ltr">
              <p>LTR</p>
            </div>
            <div class="mode-primary rx-tools-item mode rtl" data-rx-mode-tool="rtl">
              <img src="{{ asset('/frontend/assets/img/tools/rtl.png')}}" alt="rtl">
              <p>RTL</p>
            </div>
          </div>
        </div>
        <div class="rx-tools-block">
          <h3>Dark Modes</h3>
          <div class="rx-tools-dark">
            <div class="mode-primary rx-tools-item mode active-dark-mode light" data-rx-mode-tool="light">
              <img src="{{ asset('/frontend/assets/img/tools/light.png')}}" alt="light">
              <p>Light</p>
            </div>
            <div class="rx-tools-item mode dark" data-rx-mode-tool="dark">
              <img src="{{ asset('/frontend/assets/img/tools/dark.png')}}" alt="dark">
              <p>Dark</p>
            </div>
          </div>
        </div>
        <div class="rx-tools-block">
          <h3>Box Design</h3>
          <div class="rx-tools-box">
            <div class="rx-tools-item default active-box" data-bry-mode-tool="default">
              <img src="{{ asset('/frontend/assets/img/tools/box-0.png')}}" alt="box-0">
              <p>Default</p>
            </div>
            <div class="rx-tools-item box-1" data-bry-mode-tool="box-1">
              <img src="{{ asset('/frontend/assets/img/tools/box-1.png')}}" alt="box-1">
              <p>Box-1</p>
            </div>
          </div>
        </div>
        <div class="rx-tools-block">
          <h3>Backgrounds</h3>
          <div class="rx-tools-bg">
            <div class="rx-tools-item bg-0 active-bg">
              <img src="{{ asset('/frontend/assets/img/tools/bg-0.png')}}" alt="bg-0">
              <p>Default</p>
            </div>
            <div class="rx-tools-item bg-1">
              <img src="{{ asset('/frontend/assets/img/tools/bg-1.png')}}" alt="bg-1">
              <p>Bg-1</p>
            </div>
            <div class="rx-tools-item bg-2">
              <img src="{{ asset('/frontend/assets/img/tools/bg-2.png')}}" alt="bg-2">
              <p>Bg-2</p>
            </div>
            <div class="rx-tools-item bg-3">
              <img src="{{ asset('/frontend/assets/img/tools/bg-3.png')}}" alt="bg-3">
              <p>Bg-3</p>
            </div>
            <div class="rx-tools-item bg-4">
              <img src="{{ asset('/frontend/assets/img/tools/bg-4.png')}}" alt="bg-4">
              <p>Bg-4</p>
            </div>
            <div class="rx-tools-item bg-5">
              <img src="{{ asset('/frontend/assets/img/tools/bg-5.png')}}" alt="bg-5">
              <p>Bg-5</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Plugins -->
         @include('components.frontend.main-js')
</body>

</html>