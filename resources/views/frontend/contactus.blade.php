
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
    <section class="section-breadcrumb padding-b-50">
      <div class="rx-breadcrumb-image">
        <div class="rx-breadcrumb-overlay"></div>
        <div class="inner-breadcrumb-contact">
          <div class="main-breadcrumb-contact">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <div class="rx-banner-contact">
                    <h2>Contact Us</h2>
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
                          <a href="{{ route('frontend.index') }}">Home</a>
                        </li>
                        <li>Contact Us</li>
                        <!--<li>About Hayagreevas</li>-->
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
    
    <section class="section-services padding-t-50">
      <div class="container">
      <div class="row mb-minus-24">
    @foreach($records as $record)
        <div class="col-xl-4 col-lg-6 col-sm-6 col-12 mb-24 rx-575-50" data-aos="flip-left" data-aos-duration="1000">
    <div class="contact-us-3-col-sec">
        <div class="contact-us-ico-sec">
            <img src="{{ asset('frontend/assets/img/icons/address.png') }}" alt="Address Icon" class="svg-img">
        </div>
        <div class="contact-us-content-sec">
            <h5>Address</h5>
            <p>
                <a href="https://maps.app.goo.gl/EYjTyAFkgsgzK22P6" target="_blank" rel="noopener noreferrer">
                    {{ $record->address }}
                </a>
            </p>
        </div>
    </div>
</div>




        <div class="col-xl-4 col-lg-6 col-sm-6 col-12 mb-24 rx-575-50" data-aos="flip-left" data-aos-duration="1000">
            <div class="contact-us-3-col-sec">
                <div class="contact-us-ico-sec">
                    <img src="{{ asset('frontend/assets/img/icons/phone-ringing.png') }}" alt="Phone Icon" class="svg-img">
                </div>
                <div class="contact-us-content-sec">
                    <h5>Phone Number</h5>
                    <p><a href="tel:{{ $record->phone }}">{{ $record->phone }}</a></p>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-6 col-sm-6 col-12 mb-24 rx-575-50" data-aos="flip-left" data-aos-duration="1000">
            <div class="contact-us-3-col-sec">
                <div class="contact-us-ico-sec">
                    <img src="{{ asset('frontend/assets/img/icons/email-icon.png') }}" alt="Email Icon" class="svg-img">
                </div>
                <div class="contact-us-content-sec">
                    <h5>Email</h5>
                    <p><a href="mailto:{{ $record->email }}">{{ $record->email }}</a></p>
                </div>
            </div>
        </div>
   
</div>

      </div>
    </section>
    
    <!-- Contact -->
    <section class="section-contact padding-t-50 padding-b-100">
        <div class="container">
            <h2 class="d-none">Contact</h2>
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
                    <div class="rx-contact-form">
                        <div class="row mb-minus-24">
                            <div class="col-lg-6 col-12 mb-24">
                                <div class="rx-contact-touch-ifrem">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.47600107083!2d72.9018054!3d19.0867629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c7003c24ea01%3A0xd49e0c3aaa72741d!2sMODI%20ESTATE!5e0!3m2!1sen!2sin!4v1750928892290!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                            </div>
</div>                          
  <div class="col-lg-6 col-12 mb-24">
                                <div class="rx-inner-form">
                                   <form action="{{ route('contact.send') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-12 col-12 mb-24">
            <div class="contact-us-title-sec">
                <h4>Get In Touch</h4>
            </div>
        </div>
        <div class="col-lg-12 col-12 mb-24">
            <div class="rx-input-box">
                <input type="text" name="name" class="rx-form-control" placeholder="Full Name*" required>
            </div>
        </div>
        <div class="col-lg-6 col-12 mb-24">
            <div class="rx-input-box">
                <input type="email" name="email" class="rx-form-control" placeholder="Email Address*" required>
            </div>
        </div>
        <div class="col-lg-6 col-12 mb-24">
            <div class="rx-input-box">
                <input type="text" name="phone" class="rx-form-control" placeholder="Phone Number*" required>
            </div>
        </div>
        <div class="col-12 mb-24">
            <div class="rx-input-box">
                <input type="text" name="subject" class="rx-form-control" placeholder="Subject*" required>
            </div>
        </div>
        <div class="col-12 mb-24">
            <div class="rx-input-box">
                <textarea name="message" class="rx-form-control" placeholder="Message"></textarea>
            </div>
        </div>
         <!-- reCAPTCHA -->
        <div class="col-12 mb-24 text-center">
            <div class="g-recaptcha" data-sitekey="6Ldlr3ErAAAAALsnWwc8C2MxfjMBTHiT5vutaMRI"></div>
        </div>
        <div class="col-12">
            <div class="rx-inner-button justify-content-center">
                <button type="submit" class="rx-btn-two">Send Message</button>
            </div>
        </div>
    </div>
</form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
         @endforeach
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
    <!-- Book Room Modal -->
    <!-- <div class="rx-modal modal fade" id="rx_booking_from">
      <div class="rx-modal-dialog modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="sub-title">
            <h4>Check Availability</h4>
          </div>
          <button type="button" class="qty-close" data-bs-dismiss="modal" aria-label="Close">
          <i class="ri-close-line"></i>
          </button>
          <div class="modal-body">
            <div class="rx-booking-from">
              <form action="#">
                <div class="rx-inner-input">
                  <label for="checkin">Check in*</label>
                  <input type="text" id="checkin" class="rx-from-control datepicker">
                </div>
                <div class="rx-inner-input">
                  <label for="checkout">Check Out*</label>
                  <input type="text" id="checkout" class="rx-from-control datepicker">
                </div>
                <div class="rx-inner-input">
                  <label for="rooms">Room Type*</label>
                  <select class="rx-from-control form-select" aria-label="Select Method" id="rooms">
                    <option selected>Select</option>
                    <option value="1">Junior Suite</option>
                    <option value="2">Twin Room</option>
                    <option value="3">Quad Room</option>
                    <option value="4">Deluxe Room</option>
                    <option value="5">Executive Room</option>
                    <option value="6">Presidential Room</option>
                  </select>
                </div>
                <div class="rx-inner-input">
                  <label for="adults">Adults*</label>
                  <select class="rx-from-control form-select" aria-label="Select Method" id="adults">
                    <option selected>Select</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="rx-inner-input">
                  <label for="children">Children*</label>
                  <select class="rx-from-control form-select" aria-label="Select Method" id="children">
                    <option selected>Select</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                </div>
                <div class="rx-inner-button">
                  <a href="javascript:void(0)" class="rx-btn-two">Book Room</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div> -->
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
             @include('components.frontend.main-js')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>

  </body>

</html>