
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
    <header>
         @include('components.frontend.header')

    </header>
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
                    <h2>Order Confirmation</h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- <div class="rx-banner-breadcrumb"> -->
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <!-- <div class="breadcrumb-contact"> -->
                    <!-- <div class="main-heading">
                      <h4>Our Leadership </h4>
                    </div> -->
                    <!-- <div class="last-contact">
                      <ul>
                        <li>
                          <a href="{{route('frontend.index') }}">Home</a>
                        </li>
                        <li>Coming Soon</li>
                      </ul>
                    </div>
                  </div> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About -->
    <div class="thanks-wrap py-5" style="background-color: #f9f9f9;">
  <div class="container">
    <div class="row justify-content-center text-center">
      <div class="col-lg-8">
        <div class="thank-you-box bg-white p-4 p-md-5 shadow-sm rounded">

          <!-- Logo -->
          <img src="{{ asset('frontend/assets/img/logo/logo.webp') }}" alt="Logo" class="mb-4" style="max-width: 120px;">

          <!-- Heading -->
<h3 class="mb-3" style="color: #8B4513;">Thank You for Your Purchase!</h3> <!-- SaddleBrown -->
          <p class="mb-4">
            Your order has been successfully placed. A confirmation email has been sent to
            <a href="mailto:{{ $order->customer_email }}">{{ $order->customer_email }}</a>.
          </p>

          <hr class="mb-4">

          <!-- Customer Details -->
          <h5 class="text-start mb-3 fw-bold">Customer Details</h5>
          <div class="bg-light p-3 rounded mb-4">
            <div class="d-flex justify-content-between mb-2"><span>Name</span><strong>{{ $order->customer_name ?? 'N/A' }}</strong></div>
            <div class="d-flex justify-content-between mb-2"><span>Email ID</span><strong>{{ $order->customer_email ?? 'N/A' }}</strong></div>
            <div class="d-flex justify-content-between mb-2"><span>Number</span><strong>{{ $order->customer_phone ?? 'N/A' }}</strong></div>
            <div class="d-flex justify-content-between mb-2"><span>Shipping Address</span><strong class="text-end">{{ $order->shipping_address ?? 'N/A' }}</strong></div>
            <div class="d-flex justify-content-between"><span>Billing Address</span><strong class="text-end">{{ $order->billing_address ?? 'N/A' }}</strong></div>
          </div>

          <!-- Order Summary -->
          <h5 class="text-start mb-3 fw-bold">Order Summary</h5>

          @php
              $productNames = json_decode($order->product_names, true) ?? [];
              $quantities = json_decode($order->quantities, true) ?? [];
              $prices = json_decode($order->prices, true) ?? [];
              $sizes = json_decode($order->sizes, true) ?? [];
              $prints = json_decode($order->prints, true) ?? [];
          @endphp

          <div class="bg-light p-3 rounded mb-4">
            <div class="d-flex justify-content-between mb-2"><span>Order ID</span><strong>#{{ $order->order_id }}</strong></div>
          </div>

          @foreach($productNames as $index => $productName)
          <div class="border p-3 rounded mb-3">
            <div class="d-flex justify-content-between mb-2"><span>Product</span><strong>{{ $productName ?? 'N/A' }}</strong></div>
            <div class="d-flex justify-content-between mb-2"><span>Quantity</span><strong>{{ $quantities[$index] ?? 'N/A' }}</strong></div>
            <div class="d-flex justify-content-between mb-2"><span>Size</span><strong>{{ $sizes[$index] ?? '-' }}</strong></div>
            <div class="d-flex justify-content-between mb-2"><span>Print Option</span><strong>{{ $prints[$index] ?? 'Front & Back Print' }}</strong></div>
            <div class="d-flex justify-content-between"><span>Price</span>
              <strong><i class="fa fa-inr"></i> {{ number_format($prices[$index] ?? '-') }} INR</strong>
            </div>
          </div>
          @endforeach

          <!-- Total -->
          <div class="bg-light p-3 rounded mb-4">
            <div class="d-flex justify-content-between fw-bold">
              <span>Total</span>
              <span><i class="fa fa-inr"></i> {{ number_format($order->total_price ?? '-') }} INR</span>
            </div>
          </div>

          <!-- Button -->
          <div class="text-center">
            <a href="{{ route('product.all') }}" class="btn px-4 py-2" style="background-color: rgb(157, 126, 84); color: white; border: none;">
            Continue Shopping
            </a>
          </div>

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
         @include('components.frontend.main-js')

  </body>

</html>