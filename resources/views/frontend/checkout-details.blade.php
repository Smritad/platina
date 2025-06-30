
<!DOCTYPE html>
<html lang="en">

<head>
       @include('components.frontend.head')
<meta name="csrf-token" content="{{ csrf_token() }}">

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
  <section class="section-breadcrumb padding-b-50">
    <div class="rx-breadcrumb-image">
      <div class="rx-breadcrumb-overlay"></div>
      <div class="inner-breadcrumb-contact">
        <div class="main-breadcrumb-contact">
          <div class="container">
            <div class="row">
              <div class="col-12">
                <div class="rx-banner-contact">
                  <h2>Checkout</h2>
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
                      <h4>About Hayagreevas</h4>
                    </div> -->
                  <div class="last-contact">
                    <ul>
                      <li>
                        <a href="{{route('frontend.index') }}">Home</a>
                      </li>
                      <!-- <li>Products</li> -->
                      <li>Checkout</li>
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

  <!-- Checkout -->
  <section class="section-checkout padding-t-50 padding-b-100">
    <div class="container">
      <div class="row mb-minus-24">
        <div class="col-lg-7 col-12 mb-24">
          <div class="rx-checkout">
  @if(!Auth::guard('frontend')->check())
<div class="checkout-login-now-button-sec">
    <p class="checkout-login-para-cont">Already have an account?</p>
    <div class="checkout-login-now-under">
        <a href="{{ route('user.login') }}" class="direct-to">Login Here</a>
    </div>
</div>

<div class="checkout-login-wrap" data-aos="fade-up" data-aos-duration="1000">
    <div class="checkout-login-form">
        <form id="otpForm" class="login-box">
            @csrf
            <div class="checkout-login-phone-number-wrap">
                <input type="email" name="email" id="email" placeholder="Enter Email" required>
            </div>

            <div class="checkout-login-button">
                <button type="button" id="sendOtpBtn" class="rx-btn-two"><span id="btnText">Send OTP</span></button>
            </div>

            <div id="otpSection" style="display: none;">
                <input type="text" name="otp" id="otp" placeholder="Enter OTP" required><br><br>
                <button class="tf-btn" type="submit"><span class="text">Verify OTP</span></button>
                <button type="button" id="resendOtpBtn" class="tf-btn" style="display: none;"><span id="resendBtnText">Resend OTP</span></button>
            </div>
        </form>
        <div id="otpMessage"></div>
    </div>
</div>
@endif
 
                                                      
            <div class="rx-checkout-wrap checkout-information-sec" data-aos="fade-up" data-aos-duration="1000">
              <div class="inner-title">
                <h4>Information</h4>
              </div>
              <div class="rx-billing-details">
                <div class="row mb-minus-24">
                  <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                      <input type="text" name="firstname" id="fname" placeholder="First Name*" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                      <input type="text" name="lasttname" id="lname" placeholder="Last Name*" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                      <input type="email" name="email-address" id="email-address" placeholder="Email Address*" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                      <input type="tel" name="phone-number" id="phone-number" placeholder="Phone Number*" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                      <input type="text" id="town-city-sec" name="town-city-sec" placeholder="Town/City*">
                    </div>
                  </div>
                  <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                      <input type="text" id="street-sec" name="street-sec" placeholder="Street...">
                    </div>
                  </div>
                  <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                      <select class="rx-from-control form-select" aria-label="Select Method" id="city">
                        <option selected>Choose State</option>
                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                        <option value="Assam">Assam</option>
                        <option value="Bihar">Bihar</option>
                        <option value="Chhattisgarh">Chhattisgarh</option>
                        <option value="Goa">Goa</option>
                        <option value="Gujarat">Gujarat</option>
                        <option value="Haryana">Haryana</option>
                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                        <option value="Jharkhand">Jharkhand</option>
                        <option value="Karnataka">Karnataka</option>
                        <option value="Kerala">Kerala</option>
                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                        <option value="Maharashtra">Maharashtra</option>
                        <option value="Manipur">Manipur</option>
                        <option value="Meghalaya">Meghalaya</option>
                        <option value="Mizoram">Mizoram</option>
                        <option value="Nagaland">Nagaland</option>
                        <option value="Odisha">Odisha</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                       
                       
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                      <!-- <label for="postalcode">Postal Code*</label> -->
                      <input type="text" id="postalcode" name="postalcode" placeholder="Postal Code*">
                    </div>
                  </div>
                  <div class="col-12 mb-24">
                    <div class="rx-input-box">
                      <!-- <label for="address">Address*</label> -->
                      <input type="text" name="address" id="address" placeholder="Billing Address" required>
                    </div>
                  </div>
                  
                  <div class="col-12 mb-24">
                      <div class="billing-address-block-sec direct">
                    <label class="billing-address-label-sec">
                      <input type="checkbox" name="billing-address-details" class="billing-address-checkbox-cc">
                      Same as Billing Address
                    </label>
                    <!--<a href="login.html" class="direct-to">Already have an account?</a>-->
                  </div>
                  </div>
                  
                  <div class="col-12 mb-24">
                    <div class="rx-input-box">
                      <!-- <label for="address">Address*</label> -->
                      <input type="text" name="shipping-address" id="address" placeholder="Shipping Address" required>
                    </div>
                  </div>
                  
                  
                
                </div>
                

              </div>
            </div>


            <div class="checkout-payment-sec">
              <h5 class="checkout-payment-title-sec">Choose Payment Option:</h5>

              <!-- Credit Card Option -->
              <div class="form-check checkout-payment-credit-card-sec">
                <input class="form-check-input" type="radio" name="paymentMethod" id="creditCardOption" checked>
                <label class="form-check-label" for="creditCardOption">Credit Card</label>
                <p>Please make your payment directly to our bank account. Your order will be shipped once the payment is
                  successfully received and cleared.</p>
              </div>

              <!-- Credit Card Form -->
              <form>
                <div class="choose-pay-margin">
                  <input type="text" class="form-control" placeholder="Name On Card*" required>
                </div>
                <div class="position-relative choose-pay-margin">
                  <input type="text" class="form-control" placeholder="Card Numbers*" required>
                  <div class="position-absolute card-icons">
                    <img src="assets/img/logo/visa-card-sec-img.png" width="40" alt="Visa">
                    <img src="assets/img/logo/mastercard-card-sec-img.png" width="30" alt="MasterCard">
                    <img src="assets/img/logo/jcb-card-sec-img.png" width="30" alt="JCB">
                    <img src="assets/img/logo/american-express-card-sec-img.png" width="30" alt="Amex">
                  </div>
                </div>
                <div class="row choose-pay-margin choose-date-cvv-sec">
                  <div class="col-md-6">
                    <input type="date" class="form-control date-sec" required>
                  </div>
                  <div class="col-md-6">
                    <input type="text" class="form-control" placeholder="CVV*" required>
                  </div>
                </div>
                <div class="form-check">
                  <div class="choose-payment-block direct">
                    <label class="choose-payment-label">
                      <input type="checkbox" name="save-card-details" class="choose-payment-checkbox-cc">
                      Save Card Details
                    </label>
                    <!--<a href="login.html" class="direct-to">Already have an account?</a>-->
                  </div>
                </div>
              </form>
              <hr>

              <!-- Cash on Delivery -->
              <div class="form-check checkout-payment-cod-sec">
                <input class="form-check-input" type="radio" name="paymentMethod" id="codOption">
                <label class="form-check-label" for="codOption">Cash on Delivery</label>
                <p>Pay with cash at your doorstep. No advance payment required—your order will be processed and shipped
                  immediately.</p>
              </div>

              <hr>

              <!-- Apple Pay -->
              <div class="form-check checkout-payment-apple-pay-sec">
                <input class="form-check-input" type="radio" name="paymentMethod" id="applePayOption">
                <label class="form-check-label" for="applePayOption">
                  <i class="fa fa-apple"></i> Apple Pay
                </label>
                <p>Quick and secure payment using your Apple device. Fast checkout with Face ID or Touch ID.</p>
              </div>

              <hr>

              <!-- PayPal -->
              <div class="form-check checkout-payment-paypal-sec">
                <input class="form-check-input" type="radio" name="paymentMethod" id="paypalOption">
                <label class="form-check-label" for="paypalOption">
                  <img src="assets/img/logo/paypal.png" alt="PayPal" width="70">
                </label>
                <p>Secure and convenient checkout with your PayPal account. Pay using your linked bank, debit, or credit
                  card—no need to enter details every time.</p>
              </div>
            </div>




          </div>
        </div>
        <div class="col-lg-5 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
          <div class="rx-room-details-sidebar side-checkout-content">
            <div class="sub-title">
              <h4>Shopping Cart</h4>
            </div>

            <div class="shopping-cart-list-product">
             @foreach ($checkoutCart as $item)
<div class="shopping-cart-item-product">
    <a href="#" class="img-product">
        <img src="{{ $item['image'] }}" alt="product">
    </a>
    <div class="content-box">
        <div class="info">
            <a href="#" class="name-product link text-title">{{ $item['product_name'] }}</a>
            <div class="variant text-caption-1">
                <span class="desp-cat-sec">Size:</span> 
                <span class="size">{{ $item['size'] }}</span>
            </div>
            <div class="variant text-caption-1">
                <span class="desp-cat-sec">Color:</span> 
                <span class="size">{{ $item['color'] }}</span>
            </div>
            <div class="variant text-caption-1">
                <span class="desp-cat-sec">Quantity:</span> 
                <span class="size">{{ $item['quantity'] }}</span>
            </div>
        </div>
        <div class="total-price text-button">
            <span class="price">
                <i class="fa fa-inr" aria-hidden="true"></i>
                {{ number_format($item['price'] * $item['quantity']) }}
            </span>
        </div>
    </div>
</div>
@endforeach

            

              <div class="shopping-cart-item-product">
                  <strong>Total:</strong> 
                  <span class="price">
                      <i class="fa fa-inr" aria-hidden="true"></i> 
                      {{ number_format($cartTotal) }}
                  </span>
              </div>

            </div>

           

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
          @include('components.frontend.main-js')

<script>
        $(document).ready(function () {

            $("#loginForm").submit(function (event) {
                event.preventDefault(); // Prevent page reload

                $.ajax({
                    url: "{{ route('login.authenticate') }}", 
                    method: "POST",
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function (response) {
                        if (response.success) {
                            $("#loginMessage").html("<p style='color: green;'>" + response.message + "</p>");
                            $("#auth-section").hide(); 

                        } else {
                            $("#loginMessage").html("<p style='color: red;'>" + response.message + "</p>");
                        }
                    },
                    error: function (xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMsg = "<ul style='color: red;'>";
                        $.each(errors, function (key, value) {
                            errorMsg += "<li>" + value[0] + "</li>";
                        });
                        errorMsg += "</ul>";
                        $("#loginMessage").html(errorMsg);
                    }
                });
            });
        });
    </script>
     <!----- OTP Sending verifying with timer---->  
   <script>
document.getElementById('sendOtpBtn').addEventListener('click', sendOtp);
document.getElementById('resendOtpBtn').addEventListener('click', resetForm);

function sendOtp() {
    let email = document.getElementById('email').value;
    let otpSection = document.getElementById('otpSection');
    let resendBtn = document.getElementById('resendOtpBtn');

    fetch("{{ route('send.otp') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ email: email })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('otpMessage').innerHTML = `<p style="color: ${data.success ? 'green' : 'red'};">${data.message}</p>`;
        if (data.success) {
            otpSection.style.display = 'block';
            document.getElementById('sendOtpBtn').style.display = 'none';
            document.getElementById('email').style.display = 'none';
            resendBtn.style.display = 'inline-block';
            startTimer(120, resendBtn, document.getElementById('resendBtnText'));
        }
    });
}

function resetForm() {
    document.getElementById('email').style.display = 'block';
    document.getElementById('email').value = '';
    document.getElementById('sendOtpBtn').style.display = 'inline-block';
    document.getElementById('resendOtpBtn').style.display = 'none';
    document.getElementById('otpSection').style.display = 'none';
    document.getElementById('otp').value = '';
    document.getElementById('otpMessage').innerHTML = '';
}

function startTimer(duration, button, btnText) {
    let timeLeft = duration;
    button.disabled = true;
    function updateTimer() {
        let min = Math.floor(timeLeft / 60);
        let sec = timeLeft % 60;
        btnText.innerHTML = `Resend OTP in <b>${min}:${sec < 10 ? '0' : ''}${sec}s</b>`;
        if (timeLeft-- > 0) {
            setTimeout(updateTimer, 1000);
        } else {
            button.disabled = false;
            btnText.innerHTML = 'Resend OTP';
        }
    }
    updateTimer();
}

document.getElementById('otpForm').addEventListener('submit', function(e) {
    e.preventDefault();
    fetch("{{ route('verify.otp') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            email: document.getElementById('email').value,
            otp: document.getElementById('otp').value
        })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('otpMessage').innerHTML = `<p style="color: ${data.success ? 'green' : 'red'};">${data.message}</p>`;
        if (data.success) {
            window.location.reload(); // Or redirect if needed
        }
    });
});
</script>

</body>

</html>