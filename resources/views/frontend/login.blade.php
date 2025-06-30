
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
  <section class="section-breadcrumb padding-b-50">
    <div class="rx-breadcrumb-image">
      <div class="rx-breadcrumb-overlay"></div>
      <div class="inner-breadcrumb-contact">
        <div class="main-breadcrumb-contact">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="rx-banner-contact">
                  <h2>Login</h2>
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
                      <h4>Manufacturing Excellence </h4>
                    </div> -->
                  <div class="last-contact">
                    <ul>
                      <li>
                        <a href="{{route('frontend.index') }}">Home</a>
                      </li>
                      <li>Login</li>
                      <!-- <li>Manufacturing Excellence </li> -->
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


  <section class="section-about padding-tb-50">
    <div class="container">
      <div class="row mb-50">
        <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
          <div class="login-page-img">
            <img src="{{ asset('frontend/assets/img/home/unit.webp') }}" alt="about-two" class="login-page-white-img">
          </div>
        </div>
        <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
          <div class="login-page-inner-form">
         

    <form action="{{ route('login.store') }}" method="POST" class="form-login form-has-password" onsubmit="return validateLoginForm()">
        @csrf

        <div class="row">
            <div class="col-12">
                <div class="rx-banner text-center login-banner-effects">
                    <p>
                        <img src="{{ asset('frontend/assets/img/banner/left-shape.svg') }}" alt="banner-left-shape" class="svg-img left-side">
                        Join Us
                        <img src="{{ asset('frontend/assets/img/banner/right-shape.svg') }}" alt="banner-right-shape" class="svg-img right-side">
                    </p>
                    <h4>Login</h4>
                </div>
            </div>

            {{-- Email --}}
            <div class="col-lg-12 col-12">
                <div class="rx-input-box login-input-box">
                    <input type="email" id="email" name="email" class="rx-form-control" placeholder="Username or email address*" value="{{ old('email') }}" required>
                </div>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="col-lg-12 col-12">
                <div class="rx-input-box login-input-box">
                    <input type="password" id="password-field" name="password" class="rx-form-control" placeholder="Password*" required>
                    <i toggle="#password-field" class="toggle-password ri-eye-line"></i>
                </div>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            {{-- Remember + Forgot --}}
            <div class="login-inline-block direct">
                <label class="remember-me-label">
                    <input type="checkbox" name="remember" class="remember-me-checkbox">
                    Remember Me
                </label>
                <a href="{{ route('user.forgotpassword') }}" class="direct-to">Forgot Password?</a>
            </div>

            {{-- Login button --}}
            <div class="col-12">
                <div class="login-inner-button">
                    <button type="submit" class="login-btn-two">Login</button>
                </div>
            </div>

            {{-- Register link --}}
            <div class="col-12">
                <div class="register-now-button-sec">
                    <p class="register-now-para-cont">Don’t have an account?</p>
                    <div class="regis-now-under">
                        <a href="{{ route('user.registration') }}" class="direct-to">Register Now</a>
                    </div>
                </div>
            </div>

            {{-- Success or error messages --}}
            @if(session('message'))
                <div class="alert alert-success mt-2">{{ session('message') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger mt-2">{{ session('error') }}</div>
            @endif
        </div>
    </form>



          </div>
        </div>
      </div>
    </div>
  </section>


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
         <script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.querySelector('.toggle-password');
        const passwordField = document.querySelector('#password-field');

        togglePassword.addEventListener('click', function () {
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            // Toggle the eye / eye-slash icon (if you want to change the icon)
            this.classList.toggle('ri-eye-line');
            this.classList.toggle('ri-eye-off-line');
        });
    });
</script>

</body>

</html>