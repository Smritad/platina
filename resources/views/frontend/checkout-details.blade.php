
<!DOCTYPE html>
<html lang="en">

<head>
       @include('components.frontend.head')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- CSS for the spinner -->
    <style>
       .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid rgba(255, 255, 255, 0.2); 
            border-top: 5px solid #ffffff; 
            border-radius: 50%;
            animation: spin 1.2s cubic-bezier(0.42, 0, 0.58, 1) infinite;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.5); 
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        
    </style>
</head>

<body class="preload-wrapper">
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
                    @if (!Auth::guard('frontend')->check())
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

                    @php use App\Models\OrderDetail; @endphp

                    @if (Auth::guard('frontend')->check())
                        @php
                            $user = Auth::guard('frontend')->user();
                            $latestOrder = OrderDetail::where('user_id', $user->id)->latest()->first();
                        @endphp
                    @else
                        <p>Please log in to view your orders.</p>
                    @endif

                <div class="rx-checkout-wrap checkout-information-sec" data-aos="fade-up" data-aos-duration="1000">
    <div class="inner-title">
        <h4>Information</h4>
    </div>
    <form class="info-box">
        <div class="rx-billing-details">
            <div class="row mb-minus-24">

                <!-- First Name -->
                <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                        <input type="text" id="first-name" name="first_name" placeholder="First Name*"
                            value="{{ old('first_name', isset($latestOrder->customer_name) ? explode(' ', $latestOrder->customer_name)[0] : ($userInfo->name ?? '')) }}">
                        <span class="error-message"></span>
                    </div>
                </div>

                <!-- Last Name -->
                <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                        <input type="text" name="last_name" id="lname" placeholder="Last Name*"
                            value="{{ old('last_name', isset($latestOrder->customer_name) ? explode(' ', $latestOrder->customer_name)[1] ?? '' : ($userInfo->last_name ?? '')) }}">
                        <span class="error-message"></span>
                    </div>
                </div>

                <!-- Email -->
                <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                        <input type="email" name="email" id="email-address" placeholder="Email Address*" required
                            value="{{ old('email', $userInfo->email ?? '') }}">
                        <span class="error-message"></span>
                    </div>
                </div>

                <!-- Phone Number -->
                <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                        <input type="tel" name="phone" id="phone-number" placeholder="Phone Number*" required
                            value="{{ old('phone', $userInfo->phone ?? '') }}">
                        <span class="error-message"></span>
                    </div>
                </div>
                <!-- Postal Code -->
                <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                        <input type="text" id="postalcode" name="postal_code" placeholder="Postal Code*"
                            value="{{ old('postal_code', $latestOrder->postal_code ?? '') }}">
                        <span class="error-message"></span>
                    </div>
                </div>
                <!-- City -->
                <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                        <input type="text" id="city" name="city" placeholder="City" readonly>
                        <span class="error-message"></span>
                    </div>
                </div>

                <!-- Street -->
                <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                        <input type="text" id="street-sec" name="street" placeholder="Street"
                            value="{{ old('street', $latestOrder->street ?? '') }}">
                        <span class="error-message"></span>
                    </div>
                </div>

                <!-- State -->
                <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                        <input type="text" id="state" name="state" placeholder="State" readonly>
                        <span class="error-message"></span>
                    </div>
                </div>

                <!-- Country -->
                <div class="col-sm-6 col-12 mb-24">
                    <div class="rx-input-box">
                        <input type="text" id="country" name="country" placeholder="Country" value="India" readonly>
                        <span class="error-message"></span>
                    </div>
                </div>


                <!-- Billing Address -->
                <div class="col-12 mb-24">
                    <div class="rx-input-box">
                        <textarea name="billing_address" id="billing_address" placeholder="Billing Address*" required>{{ old('billing_address', $latestOrder->billing_address ?? '') }}</textarea>
                        <span class="error-message"></span>
                    </div>
                </div>

                <!-- Same as Billing -->
                <div class="col-12 mb-24">
                    <div class="billing-address-block-sec direct">
                        <label class="billing-address-label-sec">
                            <input type="checkbox" name="same_as_billing" class="billing-address-checkbox-cc">
                            Same as Billing Address
                        </label>
                    </div>
                </div>

                <!-- Shipping Address -->
                <div class="col-12 mb-24">
                    <div class="rx-input-box">
                        <input type="text" name="shipping_address" id="shipping-address" placeholder="Shipping Address" required
                            value="{{ old('shipping_address', $latestOrder->shipping_address ?? '') }}">
                        <span class="error-message"></span>
                    </div>
                </div>

            </div>
        </div>
    </form>
</div>



                    <!-- Payment Option -->
                    <div class="checkout-payment-sec">
                        <h5 class="checkout-payment-title-sec">Payment Option:</h5>
                       <form class="form-payment">
                        <div class="form-check checkout-payment-credit-card-sec">
                            <input class="form-check-input" type="radio" name="paymentMethod" id="creditCardOption" checked>
                            <label class="form-check-label" for="creditCardOption">Online Payment</label>
                            <p>Make your payment directly into our bank account. Your order will not be shipped until the funds have cleared in our account.</p>

                           
                        </div>
                    </div>

                    <div class="checkout-page-btn">
                        <button class="checkout-btn-two" id="payNowButton">Pay Now</button>
                    </div>
                  </form>
                </div>
            </div>

            <!-- Sidebar Cart -->
<div class="col-lg-5 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
    <div class="rx-room-details-sidebar side-checkout-content">
        <div class="sub-title">
            <h4>Shopping Cart</h4>
        </div>

        <div class="shopping-cart-list-product">
    @foreach ($cartItems as $index => $item)
                <div class="shopping-cart-item-product mb-3">
                    <a href="#" class="img-product">
                <img src="{{ asset('uploads/products/media/' . $item['image']) }}" alt="{{ $item['name'] ?? 'Product' }}" class="product-image img-fluid rounded">
                    </a>
                    <div class="content-box">
                        <div class="info">
                            <a href="#" class="name-product link text-title"
                               data-id="{{ $item['product_id'] }}"
                               data-price="{{ $item['price'] }}">
                                {{ $item['product_name'] }}
                            </a>
                            <div class="variant text-caption-1">
                                <span class="desp-cat-sec">Size:</span>
                                <span class="product-size size">{{ $item['size'] }}</span>
                            </div>
                            <div class="variant text-caption-1">
                                <span class="desp-cat-sec">Color:</span>
                                <span class="product-print color">{{ $item['color'] }}</span>
                            </div>
                            <div class="variant text-caption-1">
                                <span class="desp-cat-sec">Quantity:</span>
                                <span class="quantity"><strong>{{ $checkoutCart[$index]['quantity'] ?? 1 }}</strong></span>
                            </div>
                        </div>
                        <div class="total-price text-button">
                            <span class="price">
                                <i class="fa fa-inr" aria-hidden="true"></i>
                                {{ number_format($item['price'] * $checkoutCart[$index]['quantity'] ?? 1 ) }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- GST Sections -->
        <div class="order-shipping-price-sec mt-3">
             <fieldset class="ship-item">
        <label>
            <span>Subtotal</span>
            <span class="price">
                <i class="fa fa-inr" aria-hidden="true"></i>
                <span id="subtotal">
                   {{ number_format($cartTotal) }}
                </span>
            </span>
        </label>
    </fieldset>
            <fieldset class="ship-item" id="cgstSection" style="display:none;">
                <label>
                    <span>CGST</span>
                    <span class="price">
                        <i class="fa fa-inr" aria-hidden="true"></i>
                        <span id="cgstAmount">0</span>
                    </span>
                </label>
            </fieldset>

            <fieldset class="ship-item" id="sgstSection" style="display:none;">
                <label>
                    <span>SGST</span>
                    <span class="price">
                        <i class="fa fa-inr" aria-hidden="true"></i>
                        <span id="sgstAmount">0</span>
                    </span>
                </label>
            </fieldset>

            <fieldset class="ship-item" id="igstSection" style="display:none;">
                <label>
                    <span>IGST</span>
                    <span class="price">
                        <i class="fa fa-inr" aria-hidden="true"></i>
                        <span id="igstAmount">0</span>
                    </span>
                </label>
            </fieldset>
        </div>

        <!-- Grand Total -->
        <div class="order-summary-total-sec">
            <span class="total-para">Total</span>
            <span class="total-price-checkout">
                <i class="fa fa-inr" aria-hidden="true"></i> 
                <span id="total">{{ number_format($cartTotal) }}</span>
            </span>
        </div>
    </div>
</div>


        </div>
    </div>
</section>
 <!-- Loader Overlay (Initially Hidden) -->
        <div id="loading-overlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100vh; background: rgba(0, 0, 0, 0.5); color: black; display: flex; align-items: center; justify-content: center; font-size: 24px; z-index: 9999; flex-direction: column; gap: 20px;">
            <div class="spinner"></div><br><br>
            <!-- <div>Processing...</div> -->
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
<script>
document.getElementById('postalcode').addEventListener('blur', function () {
    let pincode = this.value.trim();
    if (pincode.length === 6) {
        fetch(`/get-location-from-pincode/${pincode}`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('city').value = data.city || '';
                    document.getElementById('state').value = data.state || '';
                    // Only update country if the API sends it
                    if (data.country) {
                        document.getElementById('country').value = data.country;
                    }
                }
            });
    }
});
</script>
<script>
document.querySelector('.billing-address-checkbox-cc').addEventListener('change', function () {
    const billing = document.getElementById('billing_address').value;
    const shipping = document.getElementById('shipping-address');

    if (this.checked) {
        shipping.value = billing;
    } else {
        shipping.value = '';
    }
});
</script>


<script>
  document.getElementById("payNowButton").addEventListener("click", async function (e) {
    e.preventDefault();

    if (!validateForm()) {
        return;
    }

    let orderData = {
        customer_info: {
            first_name: document.getElementById("first-name").value,
            last_name: document.getElementById("lname").value,
            email: document.getElementById("email-address").value,
            phone: document.getElementById("phone-number").value,
            street: document.getElementById("street-sec").value,
            city: document.getElementById("city").value,
            state: document.getElementById("state").value,
            postal_code: document.getElementById("postalcode").value,
            country: "India",
            billing_address: document.getElementById("billing_address").value,
            shipping_address: document.getElementById("shipping-address").value,
            description: document.getElementById("note") ? document.getElementById("note").value : ""
        },
        cart_items: []
    };

   document.querySelectorAll(".shopping-cart-item-product").forEach((item) => {
    let productElement = item.querySelector(".name-product");
    let quantityElement = item.querySelector(".quantity strong");
    let imageElement = item.querySelector(".product-image");
    let sizeElement = item.querySelector(".product-size");
    let printElement = item.querySelector(".product-print");

    let quantity = quantityElement ? parseInt(quantityElement.innerText) : 1;
    let unitPrice = parseFloat(productElement.getAttribute("data-price"));

    orderData.cart_items.push({
        product_id: productElement.getAttribute("data-id"),
        product_name: productElement.innerText,
        quantity: quantity,
        price: unitPrice, // unit price
        subtotal: unitPrice * quantity, // total for this item
        image: imageElement ? imageElement.getAttribute("src") : "",
        size: sizeElement ? sizeElement.innerText : "N/A",
        print: printElement ? printElement.innerText.replace("Print: ", "").trim() : "N/A"
    });
});

 let gstData = {
        cgst: document.getElementById("cgstAmount")?.innerText || "0",
        sgst: document.getElementById("sgstAmount")?.innerText || "0",
        igst: document.getElementById("igstAmount")?.innerText || "0",
        total_gst: (
            parseFloat(document.getElementById("cgstAmount")?.innerText || 0) +
            parseFloat(document.getElementById("sgstAmount")?.innerText || 0) +
            parseFloat(document.getElementById("igstAmount")?.innerText || 0)
        ).toFixed(2)
    };
    orderData.gst_info = gstData;
    showLoader();

    try {

        let paymentUrl = "{{ route('payment.process') }}";
        console.log("Sending request to:", paymentUrl);
        let response = await fetch("{{ route('payment.process') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").getAttribute("content")
            },
            body: JSON.stringify({
amount: parseFloat(document.querySelector(".total-price-checkout").innerText.replace(/[₹,]/g, "").trim()),
                order_data: orderData
            })
        });

let text = await response.text();
console.log("Backend Response Raw:", text);
let data = JSON.parse(text);

        let order_id = null;

        if (data.order_id) {
            order_id = data.order_id;
            
            let options = {
                key: data.razorpay_key,
                amount: data.amount * 100,
                currency: "INR",
                order_id: data.order_id,
                handler: async function (response) {
                    try {
                        let verifyResponse = await fetch("{{ route('payment.verify') }}", {
                            method: "POST",
                            headers: {
                                "Content-Type": "application/json",
                                "X-CSRF-TOKEN": document.querySelector("meta[name='csrf-token']").getAttribute("content")
                            },
                            body: JSON.stringify({
                                razorpay_order_id: response.razorpay_order_id,
                                razorpay_payment_id: response.razorpay_payment_id,
                                razorpay_signature: response.razorpay_signature,
                                order_id: order_id,
                                order_data: orderData
                            })
                        });

                        let verifyData = await verifyResponse.json();
                        console.log("Verify Data:", verifyData);

                        if (verifyData.status === 'success') {
                            // Redirect to Order Confirmation with order data
                            let url = "{{ route('order.confirm') }}" + "?order_id=" + order_id;
                            window.location.href = url;
                        } else {
                            alert("Payment verification failed. Please try again.");
                        }
                    } catch (error) {
                        alert("Something went wrong. Please try again.");
                    } finally {
                        hideLoader();
                    }
                }
            };

            let rzp1 = new Razorpay(options);
            rzp1.open();

            // Hide loader if payment is failed or popup is closed
            rzp1.on("payment.failed", function () {
                hideLoader();
            });
        } else {
            alert("Order creation failed. Please try again.");
            hideLoader();
        }
    } catch (error) {
        alert("An error occurred while processing the payment.");
        hideLoader();
    }
});

function showLoader() {
    document.getElementById("loading-overlay").style.display = "flex";
}

function hideLoader() {
    document.getElementById("loading-overlay").style.display = "none";
}

document.addEventListener("DOMContentLoaded", function () {
    hideLoader();
});

// Form Validation Function
function validateForm() {
    let isValid = true;

    function showError(input, message) {
        const errorElement = input.nextElementSibling;
        errorElement.innerText = message;
        errorElement.style.color = "red";
        input.style.borderColor = "red";
    }

    function clearError(input) {
    // Check if the next sibling exists and is an error message container
    const errorElement = input.nextElementSibling;

    if (errorElement && errorElement.classList.contains('error-message')) {
        errorElement.innerText = "";  // Clear the error message
    }
    
    input.style.borderColor = "";  // Reset the border color
}


    const firstName = document.getElementById("first-name");
    const lastName = document.getElementById("lname");
    const email = document.getElementById("email-address");
    const phone = document.getElementById("phone-number");
    const street = document.getElementById("street-sec");
    const city = document.getElementById("city");
    const state = document.getElementById("state");
    const postalCode = document.getElementById("postalcode");
    const billingAddress = document.getElementById("billing_address");
    const shippingAddress = document.getElementById("shipping-address");
    const sameAsBilling = document.querySelector('.billing-address-checkbox-cc');

    const nameRegex = /^[A-Za-z\s]+$/;
    if (!nameRegex.test(firstName.value.trim())) {
        showError(firstName, "First Name should only contain letters.");
        isValid = false;
    } else {
        clearError(firstName);
    }

    if (!nameRegex.test(lastName.value.trim())) {
        showError(lastName, "Last Name should only contain letters.");
        isValid = false;
    } else {
        clearError(lastName);
    }

    const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailRegex.test(email.value.trim())) {
        showError(email, "Enter a valid Email Address.");
        isValid = false;
    } else {
        clearError(email);
    }

    const phoneRegex = /^\d{10,12}$/;
if (!phoneRegex.test(phone.value.trim())) {
    showError(phone, "Phone Number should be 10 to 12 digits.");
    isValid = false;
} else {
    clearError(phone);
}


    if (street.value.trim() === "") {
        showError(street, "Street is required.");
        isValid = false;
    } else {
        clearError(street);
    }

    if (city.value.trim() === "") {
        showError(city, "City is required.");
        isValid = false;
    } else {
        clearError(city);
    }

    if (state.value.trim() === "") {
        showError(state, "State is required.");
        isValid = false;
    } else {
        clearError(state);
    }

    const postalCodeRegex = /^\d{6}$/;
    if (!postalCodeRegex.test(postalCode.value.trim())) {
        showError(postalCode, "Postal Code must be exactly 6 digits.");
        isValid = false;
    } else {
        clearError(postalCode);
    }

    if (billingAddress.value.trim() === "") {
        showError(billingAddress, "Billing Address is required.");
        isValid = false;
    } else {
        clearError(billingAddress);
    }

    if (!sameAsBilling.checked && shippingAddress.value.trim() === "") {
        showError(shippingAddress, "Shipping Address is required.");
        isValid = false;
    } else {
        clearError(shippingAddress);
    }

    return isValid;
}

</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const gstRate = 0.06; // 6%
    const cartTotal = {{ $cartTotal ?? 0 }};
    const stateInput = document.getElementById('state');

    function calculateGST() {
    const state = stateInput.value.trim().toLowerCase();
    const gstAmount = Math.round(cartTotal * gstRate);
    const gstDisplay = gstAmount.toFixed(2);

    // Hide all first
    document.getElementById('cgstSection').style.display = 'none';
    document.getElementById('sgstSection').style.display = 'none';
    document.getElementById('igstSection').style.display = 'none';

    if (state === 'maharashtra') {
        let half = Math.round(gstAmount / 2);
        document.getElementById('cgstAmount').innerText = half;
        document.getElementById('sgstAmount').innerText = half;
        document.getElementById('cgstSection').style.display = 'block';
        document.getElementById('sgstSection').style.display = 'block';
        console.log("GST Type: CGST + SGST");
    } else {
        document.getElementById('igstAmount').innerText = gstDisplay;
        document.getElementById('igstSection').style.display = 'block';
        console.log("GST Type: IGST");
    }

    // Update total
    let newTotal = Math.round(cartTotal + gstAmount);
    document.getElementById('total').innerText = newTotal;
    console.log("Total with GST:", newTotal);
}





    // 📦 When pincode is filled, fetch location
    document.getElementById('postalcode').addEventListener('blur', function () {
        let pincode = this.value.trim();
        if (pincode.length === 6) {
            fetch(`/get-location-from-pincode/${pincode}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('city').value = data.city || '';
                        document.getElementById('state').value = data.state || '';
                        if (data.country) {
                            document.getElementById('country').value = data.country;
                        }

                        // ✅ Trigger GST calculation once state is updated
                        calculateGST();
                    }
                });
        }
    });

    // Optional: Recalculate if state field is manually edited
    stateInput.addEventListener('change', calculateGST);
});

</script>

<script>
  // (Your existing Notyf init here)
  var notyf = new Notyf({
    duration: 3000,
    ripple: true,
    position: { x: 'right', y: 'top' },
    dismissible: true,
    types: [
      {
        type: 'custom-success',
        background: 'black',
        icon: { className: 'fa fa-check-circle', tagName: 'i', color: 'white' }
      }
    ]
  });

  @if(session('message'))
    notyf.open({
      type: 'custom-success',
      message: {!! json_encode(session('message')) !!}
    });
  @endif
</script>


</body>

</html>