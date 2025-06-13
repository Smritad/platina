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
    <!-- end Header -->
    
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
                <h2>{{ $policy->title ?? 'Return & Refund Policy' }}</h2>
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
                <div class="last-contact">
                  <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>{{ $policy->title ?? 'Return & Refund Policy' }}</li>
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
<div class="policy-wrap">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="policy-text">
          {!! $policy->description ?? '' !!}
        </div>
      </div>
    </div>
  </div>
</div>


    <!-- Footer -->
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
                <img src="assets/img/tools/ltr.png" alt="ltr">
                <p>LTR</p>
              </div>
              <div class="mode-primary rx-tools-item mode rtl" data-rx-mode-tool="rtl">
                <img src="assets/img/tools/rtl.png" alt="rtl">
                <p>RTL</p>
              </div>
            </div>
          </div>
          <div class="rx-tools-block">
            <h3>Dark Modes</h3>
            <div class="rx-tools-dark">
              <div class="mode-primary rx-tools-item mode active-dark-mode light" data-rx-mode-tool="light">
                <img src="assets/img/tools/light.png" alt="light">
                <p>Light</p>
              </div>
              <div class="rx-tools-item mode dark" data-rx-mode-tool="dark">
                <img src="assets/img/tools/dark.png" alt="dark">
                <p>Dark</p>
              </div>
            </div>
          </div>
          <div class="rx-tools-block">
            <h3>Box Design</h3>
            <div class="rx-tools-box">
              <div class="rx-tools-item default active-box" data-bry-mode-tool="default">
                <img src="assets/img/tools/box-0.png" alt="box-0">
                <p>Default</p>
              </div>
              <div class="rx-tools-item box-1" data-bry-mode-tool="box-1">
                <img src="assets/img/tools/box-1.png" alt="box-1">
                <p>Box-1</p>
              </div>
            </div>
          </div>
          <div class="rx-tools-block">
            <h3>Backgrounds</h3>
            <div class="rx-tools-bg">
              <div class="rx-tools-item bg-0 active-bg">
                <img src="assets/img/tools/bg-0.png" alt="bg-0">
                <p>Default</p>
              </div>
              <div class="rx-tools-item bg-1">
                <img src="assets/img/tools/bg-1.png" alt="bg-1">
                <p>Bg-1</p>
              </div>
              <div class="rx-tools-item bg-2">
                <img src="assets/img/tools/bg-2.png" alt="bg-2">
                <p>Bg-2</p>
              </div>
              <div class="rx-tools-item bg-3">
                <img src="assets/img/tools/bg-3.png" alt="bg-3">
                <p>Bg-3</p>
              </div>
              <div class="rx-tools-item bg-4">
                <img src="assets/img/tools/bg-4.png" alt="bg-4">
                <p>Bg-4</p>
              </div>
              <div class="rx-tools-item bg-5">
                <img src="assets/img/tools/bg-5.png" alt="bg-5">
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

