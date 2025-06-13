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
    @include('components.frontend.header')
    <section class="section-hero margin-b-50">
      <div class="container-fulid">
        <div class="row">
          <div class="col-12">
<div class="rx-slider">
    @foreach($banners as $banner)
        <div class="rx-slide" 
             style="background-image: url('{{ asset('/platina/home/banner/' . $banner->banner_images) }}'); 
                    background-size: cover; 
                    background-position: center;">

            {{-- Foreground image (if needed for effect) --}}
            <img src="{{ asset('/platina/home/banner/' . $banner->banner_images) }}" 
                 alt="hero-box" 
                 class="banner-arrow-img">

            <div class="rx-hero-contact">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="inner-contact slider-animation">
                                <h2>{!! $banner->banner_heading !!}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endforeach
</div>



          </div>
        </div>
      </div>
    </section>
    <!-- About -->
<section class="section-about padding-tb-50">
  <div class="container">
    <div class="row mb-minus-24 vertical-height-equal">

      <!-- Left Image Column -->
      <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
        <div class="rx-about-img">
          <img src="{{ asset('platina/home/banner/' . $about->image) }}" alt="about" class="rx-white-img">
          <div class="rx-rounded-circle">
            <a href="#">
              <svg viewBox="0 0 100 100" width="100" height="100">
                <defs>
                  <path id="circle" d="M 50, 50 m -37, 0 a 37,37 0 1,1 74,0 a 37,37 0 1,1 -74,0"></path>
                </defs>
                <text>
                  <textPath xlink:href="#circle">
                    About Us - About Us - About -
                  </textPath>
                </text>
              </svg>
              <div class="inner-contact">
                <i class="ri-arrow-right-up-line"></i>
              </div>
            </a>
          </div>
        </div>
      </div>

      <!-- Right Text Column -->
      <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
        <div class="rx-about-contact">
          <div class="rx-banner">
            <p>{{ $about->title }}</p>
                @php
                  $subtitle = $about->subtitle;
                  $words = explode(' ', $subtitle);
                  $lastWord = array_pop($words);
                  $firstPart = implode(' ', $words);
                @endphp
                      <h4>{{ $firstPart }} <span>{{ $lastWord }}</span></h4>
                                </div>
                                <div class="inner-contact">
                                  <p>{!! $about->description !!}</p>

                                <div class="rx-about-inner-box">
                        <div class="row mb-minus-24">
                          @php
                            $counter_texts = explode(',', $about->counter_text);
                            $counter_descriptions = explode(',', $about->counter_description);
                          @endphp

                          @foreach($counter_texts as $index => $counterText)
                            @php
                              $mtClass = ($index === 1) ? 'mt-24' : ''; // Apply mt-24 only to the second box (index 1)
                            @endphp
                            <div class="col-sm-4 col-12 rx-575-50 mb-24 {{ $mtClass }}">
                              <div class="rx-about-box">
                                <h5>{{ $counterText }}</h5>
                                <p>{{ $counter_descriptions[$index] ?? '' }}</p>
                              </div>
                            </div>
                          @endforeach
                        </div>
                      </div>
                      </div>
                              </div>
                            </div>

                          </div>
                        </div>
                      </section>

   
   <section class="section-services padding-tb-50">
  <div class="container">
    <div class="row mb-minus-24">
      <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
        <div class="rx-banner text-center rx-banner-effects">
          <p>
            <img src="{{ asset('frontend/assets/img/banner/left-shape.svg') }}" alt="banner-left-shape" class="svg-img left-side">
            {{ $brandEthos->title ?? '' }}
            <img src="{{ asset('frontend/assets/img/banner/right-shape.svg') }}" alt="banner-right-shape" class="svg-img right-side">
          </p>
                @php
                    $headingWords = explode(' ', $brandEthos->heading ?? '');
                    $lastWord = array_pop($headingWords);
                    $firstPart = implode(' ', $headingWords);
                @endphp

                <h4>{{ $firstPart }} <span>{{ $lastWord }}</span></h4>
        </div>
      </div>

      @php
        $texts = explode('|', $brandEthos->counter_text ?? '');
        $descriptions = explode('|', $brandEthos->counter_description ?? '');
        $images = explode('|', $brandEthos->counter_images ?? '');
      @endphp

      @foreach($texts as $index => $text)
        <div class="col-xl-3 col-lg-6 col-sm-6 col-12 mb-24 rx-575-50" data-aos="flip-left" data-aos-duration="1000" data-aos-delay="{{ $index * 200 }}">
          <div class="rx-services">
            <div class="services-ico">
              <img src="{{ asset('platina/home/brandethos/' . ($images[$index] ?? '')) }}" alt="services-{{ $index + 1 }}" class="svg-img">
            </div>
            <div class="services-contact">
              <h5>{{ $text }}</h5>
              <p>{{ $descriptions[$index] ?? '' }}</p>
            </div>
          </div>
        </div>
      @endforeach

    </div>
  </div>
</section>

    <!-- Rooms -->
<section class="section-room padding-tb-50">
  <div class="container">
    <div class="row mb-minus-24 room-popup">
      <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
        <div class="rx-banner text-center rx-banner-effects">
          <p>
            <img src="{{ asset('/frontend/assets/img/banner/left-shape.svg')}}" alt="banner-left-shape" class="svg-img left-side">
            {{ $materials->title ?? '' }}
            <img src="{{ asset('/frontend/assets/img/banner/right-shape.svg')}}" alt="banner-right-shape" class="svg-img right-side">
          </p>
          <h4>{{ $materials->heading ?? '' }} <span> </span></h4>
        </div>
      </div>

      @php
        $images = explode(',', $materials->images ?? '');
        $texts = explode(',', $materials->text ?? '');
        $descriptions = explode(',', $materials->description ?? '');
      @endphp

      @foreach($texts as $index => $text)
      <div class="col-lg-4 col-sm-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="{{ $index * 200 }}">
        <div class="rx-rooms-main-box">
          <div class="rooms-box-front">
            <img src="{{ asset('platina/home/materials/' . trim($images[$index] ?? '')) }}" alt="room-{{ $index + 1 }}">
            <div class="content-wrap">
              <div class="inner-contact">
                <h4>{{ $text }}</h4>
              </div>
            </div>
          </div>
          <div class="rooms-box-back">
            <img src="{{ asset('platina/home/materials/' . trim($images[$index] ?? '')) }}" alt="rooms-{{ $index + 1 }}">
            <div class="content-wrap">
              <div class="box-overlay"></div>
              <div class="inner-back-side">
                <div class="rx-price">
                  <span>{{ 250 + ($index * 50) }}$ / N</span> {{-- Example price --}}
                </div>
                <div class="sub-inner-contact">
                  <h5>{{ $text }}</h5>
                  <ul>
                    @foreach(explode(',', $descriptions[$index] ?? '') as $desc)
                      <li>{{ trim($desc) }}</li>
                    @endforeach
                  </ul>
                </div>
                <div class="last-contact">
                  <a href="#" class="inner-button">Know More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

    <!-- Amenities -->
<section class="section-amenities padding-tb-50">
  <div class="container">
    <div class="row">
      <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
        <div class="rx-banner text-center rx-banner-effects">
          <p>
            <img src="{{ asset('/frontend/assets/img/banner/left-shape.svg')}}" alt="banner-left-shape" class="svg-img left-side">
            {{ $premium->title ?? '' }}
            <img src="{{ asset('/frontend/assets/img/banner/right-shape.svg')}}" alt="banner-right-shape" class="svg-img right-side">
          </p>
            @php
                $heading = $premium->heading ?? '';
                $words = explode(' ', $heading);
                $count = count($words);

                if ($count >= 2) {
                    $before = implode(' ', array_slice($words, 0, $count - 2));
                    $lastTwo = implode(' ', array_slice($words, -2));
                } else {
                    $before = '';
                    $lastTwo = $heading;
                }
            @endphp

            <h4>
                {{ $before }} <span>{{ $lastTwo }}</span>
            </h4>
        </div>
      </div>

      <div class="col-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
        <div class="owl-carousel rx-amenities-slider">
          @php
            $counterTexts = explode('|', $premium->counter_text ?? '');
            $counterDescs = explode('|', $premium->counter_description ?? '');
            $images = explode('|', $premium->counter_image ?? '');
          @endphp

          @foreach($counterTexts as $index => $counterText)
            <div class="row mb-minus-24">
              <div class="col-lg-8 col-12 mb-24">
                <div class="rx-amenities-img">
                  <img src="{{ asset('platina/home/premium/' . trim($images[$index] ?? 'default.webp')) }}" alt="amenities-{{ $index + 1 }}">
                </div>
              </div>
              <div class="col-lg-4 col-12 mb-24">
                <div class="rx-amenities-contact amenities-animation">
                  <div class="inner-banner">
                    <h4>{{ $counterText }}</h4>
                  </div>
                  <p>{{ $counterDescs[$index] ?? '' }}</p>
                  <div class="amenities-btn">
                    <a href="#" class="rx-btn-two">Shop Now</a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

    @php
    $texts = explode(',', $testimonials->text ?? '');
    $designations = explode(',', $testimonials->designations ?? '');
    $descriptions = explode(',', $testimonials->description ?? '');
    $images = explode(',', $testimonials->image ?? '');
@endphp

<section class="section-testimonials padding-tb-50">
  <div class="container">
    <div class="row">
      <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
        <div class="rx-banner text-center rx-banner-effects">
          <p>
            <img src="{{ asset('/frontend/assets/img/banner/left-shape.svg')}}" alt="banner-left-shape" class="svg-img left-side">
            {{ $testimonials->title ?? '' }}
            <img src="{{ asset('/frontend/assets/img/banner/right-shape.svg')}}" alt="banner-right-shape" class="svg-img right-side">
          </p>
         <h4>
    @php
        $heading = $testimonials->heading ?? '';
        $words = explode(' ', $heading);
        $count = count($words);
        if ($count >= 1) {
            $before = implode(' ', array_slice($words, 0, $count - 1));
            $last = $words[$count - 1];
        } else {
            $before = '';
            $last = $heading;
        }
    @endphp
    {{ $before }} <span>{{ $last }}</span>
</h4>

        </div>
      </div>

      <div class="col-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
        <div class="owl-carousel rx-testimonials-slider">
          @foreach ($texts as $index => $text)
            <div class="row mb-minus-24">
              <div class="col-md-4 col-12 mb-24">
                <div class="rx-testimonials-img">
                  <img src="{{ asset('/platina/home/Testimonials/' . ($images[$index] ?? 'default.webp')) }}" alt="testimonial-{{ $index + 1 }}">
                </div>
              </div>
              <div class="col-md-8 col-12 mb-24">
                <div class="rx-testimonials-contact">
                  <div class="rx-inner-banner">
                    <h4>{{ $text ?? '' }}</h4>
                    <span>({{ $designations[$index] ?? '' }})</span>
                  </div>
                  <div class="inner-contact">
                    <p>"{{ $descriptions[$index] ?? '' }}"</p>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

    <!-- Blog -->
   <section class="section-blog padding-t-50 padding-b-100">
  <div class="container">
    <div class="row">
      <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
        <div class="rx-banner text-center rx-banner-effects">
          <p>
            <img src="{{ asset('/frontend/assets/img/banner/left-shape.svg')}}" alt="banner-left-shape" class="svg-img left-side">
            {{ $blogsdetails->title ?? '' }}
            <img src="{{ asset('/frontend/assets/img/banner/right-shape.svg')}}" alt="banner-right-shape" class="svg-img right-side">
          </p>
          <h4>
            @php
                $heading = $blogsdetails->heading ?? '';
                $words = explode(' ', $heading);
                $before = implode(' ', array_slice($words, 0, count($words) - 1));
                $lastWord = $words[count($words) - 1] ?? '';
            @endphp
            {{ $before }} <span>{{ $lastWord }}</span>
          </h4>
        </div>
      </div>

      <div class="col-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
        <div class="owl-carousel rx-blog-slider" id="rxblogslider">
          @php
              $texts = explode('|', $blogsdetails->text ?? '');
              $descriptions = explode('|', $blogsdetails->description ?? '');
              $images = explode('|', $blogsdetails->images ?? '');
              $count = max(count($texts), count($descriptions), count($images));
          @endphp

          @for ($i = 0; $i < $count; $i++)
            <div class="rx-blog-card">
              <div class="rx-blog-img">
                @if (!empty($images[$i]))
                  <img src="{{ asset('platina/home/blogs/' . $images[$i]) }}" alt="blog-{{ $i + 1 }}">
                @else
                  <img src="{{ asset('frontend/assets/img/default-blog.jpg') }}" alt="default-blog">
                @endif
              </div>
              <div class="rx-blog-contact">
                <span>{{ $texts[$i] ?? '' }}</span>
                <h4><a href="#">{{ $descriptions[$i] ?? '' }}</a></h4>
              </div>
            </div>
          @endfor
        </div>
      </div>

    </div>
  </div>
</section>

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
    @include('components.frontend.main-js')

  </body>
  </html>