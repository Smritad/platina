
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
                  <h2>Register</h2>
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
                      <li>Register</li>
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
          <div class="register-page-img">
            <img src="{{ asset('frontend/assets/img/products/product-2.webp') }}" alt="about-two" class="register-page-white-img">
          </div>
        </div>
        <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
          <div class="register-page-inner-form">
<form action="{{ route('registration.store') }}" method="POST" class="form-login form-has-password" onsubmit="return validateForm()">
  @csrf
  <div class="row">
    <div class="col-12">
      <div class="rx-banner text-center register-banner-effects">
        <p>
          <img src="{{ asset('frontend/assets/img/banner/left-shape.svg') }}" alt="banner-left-shape" class="svg-img left-side">
          Join Us
          <img src="{{ asset('frontend/assets/img/banner/right-shape.svg') }}" alt="banner-right-shape" class="svg-img right-side">
        </p>
        <h4>Register</h4>
      </div>
    </div>

    <div class="col-lg-12 col-12">
      <div class="rx-input-box register-input-box">
        <input type="text" name="name" id="name" class="rx-form-control" placeholder="Full Name*">
        <small id="nameError" class="text-danger"></small>
      </div>
    </div>

    <div class="col-lg-6 col-12">
      <div class="rx-input-box register-input-box">
        <input type="email" name="email" id="email" class="rx-form-control" placeholder="Email Id*">
        <small id="emailError" class="text-danger"></small>
      </div>
    </div>

    <div class="col-lg-6 col-12">
      <div class="rx-input-box register-input-box">
        <input type="tel" name="phone" id="phone" class="rx-form-control" placeholder="Phone Number*">
        <small id="phoneError" class="text-danger"></small>
      </div>
    </div>

    <div class="col-lg-6 col-12">
      <div class="rx-input-box register-input-box register-pb-sec">
        <input type="password" name="password" id="password" class="rx-form-control" placeholder="Password*">
        <i toggle="#password" class="toggle-password ri-eye-line"></i>
        <small id="passwordError" class="text-danger"></small>
      </div>
    </div>

    <div class="col-lg-6 col-12">
      <div class="rx-input-box register-input-box register-pb-sec">
        <input type="password" name="password_confirmation" id="confirm_password" class="rx-form-control" placeholder="Confirm Password*">
        <i toggle="#confirm_password" class="toggle-password ri-eye-line"></i>
        <small id="confirmPasswordError" class="text-danger"></small>
      </div>
    </div>

    <div class="register-inline-block direct">
      <label class="register-remember-me-label">
        <input type="checkbox" name="agree_checkbox" id="agree_checkbox" class="register-remember-me-checkbox">
        I Agree to the <a href="#">Terms of Use</a>
      </label>
      <small id="agreeError" class="text-danger"></small>
    </div>

    <div class="col-12">
      <div class="register-inner-button">
        <button type="submit" class="register-btn-two">Register</button>
      </div>
    </div>

    <div class="col-12">
      <div class="already-login-now-button-sec">
        <p class="already-login-para-cont">Already have an account?</p>
        <div class="already-login-now-under">
          <a href="{{ route('user.login') }}" class="direct-to">Login</a>
        </div>
      </div>
    </div>
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
function validateForm() {
  let isValid = true;

  // Input values
  let name = document.getElementById("name").value.trim();
  let email = document.getElementById("email").value.trim();
  let phone = document.getElementById("phone").value.trim();
  let password = document.getElementById("password").value.trim();
  let confirmPassword = document.getElementById("confirm_password").value.trim();
  let agreeCheckbox = document.getElementById("agree_checkbox").checked;

  // Reset errors
  document.getElementById("nameError").innerText = "";
  document.getElementById("emailError").innerText = "";
  document.getElementById("phoneError").innerText = "";
  document.getElementById("passwordError").innerText = "";
  document.getElementById("confirmPasswordError").innerText = "";
  document.getElementById("agreeError").innerText = "";

  // Name
  if (!/^[A-Za-z\s]+$/.test(name)) {
    document.getElementById("nameError").innerText = "Name must contain only alphabets and spaces.";
    isValid = false;
  }

  // Email
  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    document.getElementById("emailError").innerText = "Enter valid email.";
    isValid = false;
  }

  // Phone
  if (!/^[0-9]{10}$/.test(phone)) {
    document.getElementById("phoneError").innerText = "Enter valid 10-digit phone number.";
    isValid = false;
  }

  

  // Password
  if (password.length < 8) {
    document.getElementById("passwordError").innerText = "Password must be at least 8 characters.";
    isValid = false;
  }

  if (password !== confirmPassword) {
    document.getElementById("confirmPasswordError").innerText = "Passwords do not match.";
    isValid = false;
  }

  // Checkbox
  if (!agreeCheckbox) {
    document.getElementById("agreeError").innerText = "You must agree to the Terms & Conditions.";
    isValid = false;
  }

  return isValid;
}
</script>
<script>
document.querySelectorAll(".toggle-password").forEach(function(toggle) {
  toggle.addEventListener("click", function() {
    const input = document.querySelector(this.getAttribute("toggle"));
    if (input.getAttribute("type") === "password") {
      input.setAttribute("type", "text");
      this.classList.remove("ri-eye-line");
      this.classList.add("ri-eye-off-line");
    } else {
      input.setAttribute("type", "password");
      this.classList.remove("ri-eye-off-line");
      this.classList.add("ri-eye-line");
    }
  });
});
</script>
<script>
function validateForm() {
  let name = document.getElementById("name").value.trim();
  let email = document.getElementById("email").value.trim();
  let phone = document.getElementById("phone").value.trim();
  let password = document.getElementById("password").value.trim();
  let confirmPassword = document.getElementById("confirm_password").value.trim();
  let agree = document.getElementById("agree_checkbox").checked;

  let isValid = true;

  // Clear previous errors
  document.getElementById("nameError").innerText = "";
  document.getElementById("emailError").innerText = "";
  document.getElementById("phoneError").innerText = "";
  document.getElementById("passwordError").innerText = "";
  document.getElementById("confirmPasswordError").innerText = "";
  document.getElementById("agreeError").innerText = "";

  // Name
  if (name === "") {
    document.getElementById("nameError").innerText = "Name is required.";
    isValid = false;
  }

  // Email
  if (email === "") {
    document.getElementById("emailError").innerText = "Email is required.";
    isValid = false;
  } else if (!/^\S+@\S+\.\S+$/.test(email)) {
    document.getElementById("emailError").innerText = "Enter a valid email.";
    isValid = false;
  }

  // Phone
  if (phone === "") {
    document.getElementById("phoneError").innerText = "Phone number is required.";
    isValid = false;
  } else if (!/^\d{10}$/.test(phone)) {
    document.getElementById("phoneError").innerText = "Enter a valid 10-digit phone number.";
    isValid = false;
  }

  // Password
  if (password === "") {
    document.getElementById("passwordError").innerText = "Password is required.";
    isValid = false;
  } else if (password.length < 6) {
    document.getElementById("passwordError").innerText = "Password must be at least 6 characters.";
    isValid = false;
  }

  // Confirm Password
  if (confirmPassword === "") {
    document.getElementById("confirmPasswordError").innerText = "Please confirm your password.";
    isValid = false;
  } else if (password !== confirmPassword) {
    document.getElementById("confirmPasswordError").innerText = "Passwords do not match.";
    isValid = false;
  }

  // Terms checkbox
  if (!agree) {
    document.getElementById("agreeError").innerText = "You must agree to the terms.";
    isValid = false;
  }

  return isValid;
}
</script>

</body>

</html>