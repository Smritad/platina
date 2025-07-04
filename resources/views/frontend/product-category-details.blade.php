
<!DOCTYPE html>
<html lang="en">

<head>
       @include('components.frontend.head')
       <!-- In <head> -->
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
<style>
.read-more-content {
  max-height: 100px; /* adjust height as needed */
  overflow: hidden;
  transition: max-height 0.3s ease;
}

.read-more-content.expanded {
  max-height: 1000px; /* large enough to show all content */
}
</style>
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
                  <h2>Products Details</h2>
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
                      <li>Products</li>
                      <li>Products Details</li>
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
  @php
            $colorMap = [
                "Black" => "#000000",
                "Ice Melt" => "#D3E4F1",
                "Spell Bound" => "#4E646F",
                "White" => "#FFFFFF",
                "Red" => "#FF0000",
                "Green" => "#00FF00",
                "Blue" => "#0000FF",
                "Yellow" => "#FFFF00",
                "Orange" => "#FFA500",
                "Purple" => "#800080",
                "Pink" => "#FFC0CB",
                "Brown" => "#A52A2A",
                "Gray" => "#808080",
                "Cyan" => "#00FFFF",
                "Dark Green" => "#008000",
                "Maroon" => "#800000",
                "Teal" => "#006666",
                "Dove" => "#D6D3D1",
                "Sea Jet" => "#AAC9CE",
                "Peach Beige" => "#FAD9C1",
                "Nomad" => "#BBB3A2",
                "Baby Lavender" => "#E3D1F5",
                "Balistic Sea" => "#5D8AA8",
                "Jet Black" => "#343434",
                "Steel Blue" => "#4682B4",
                "Dark Blue" => "#00008B",
                "Country Blue" => "#9DB4C0",
                "Skin Tan" => "#FFDAB9",
                "Cream" => "#FFFDD0",
                "Peach Pink" => "#FFD1DC",
                "Sea Blue" => "#006994",
                "Silver" => "#C0C0C0",
                "Stone" => "#D8CAB8",
                "Sand" => "#F4E1C1",
                "Beige" => "#F5F5DC",
                "Pearled Ivory" => "#F8F4E3",
                "Lavender" => "#E6E6FA",
                "Ivory" => "#FFFFF0",
                "Beetroot Red" => "#7A263A",
                "Dark Beige" => "#A89F91",
                "Dark Grey" => "#A9A9A9",
                "Light Green" => "#90EE90",
                "Azure Blue" => "#007FFF",
                "Stone Blue" => "#7D98A1",
                "Sky Rocket" => "#AED7E0",
                "Pale Dew" => "#D8E3D7",
                "Frozen Dew" => "#E8F0F2",
                "Amber Ash" => "#D4BFAA",
                "Pista" => "#93C572",
                "Dusty Blue" => "#5A86AD",
                "Sky Blue" => "#87CEEB",
                "Ice" => "#E0F7FA",
                "Wood Ash" => "#C4BEB5",
                "Northern Droplet" => "#D6D7D9",
                "Travertine" => "#E6D8C3",
                "Ash" => "#B2BEB5",
                "Peach" => "#FFE5B4",
                "Cuban Sand" => "#DDD0A8",
                "Blue Breeze" => "#B2D8E1",
                "Sky" => "#87CEFA"
            ];

            $colors = explode(',', $product->colors);
        @endphp

<section class="section-room-details padding-t-50 padding-b-50">
  <div class="container">
<form id="addToCartForm" action="{{ route('add.to.cart', $product->id) }}" method="get">
     <!-- <input type="hidden" name="_token" value="I6JGJ3Qsjigj9R105VdGDXEiNVKHlerGmEKTcjAU" autocomplete="off"> -->
            <div class="row mb-minus-24">  
    @csrf
      <div class="row mb-minus-24">

        <!-- Product Gallery -->
        <div class="col-lg-6 col-12 mb-24">
          <div class="product-gallery">
            <div class="swiper main-swiper">
              <div class="swiper-wrapper">
                @php
                  $mediaFiles = json_decode($product->media_files, true);
                @endphp
                @if(!empty($mediaFiles))
                  @foreach($mediaFiles as $file)
                    <div class="swiper-slide">
                      <img src="{{ asset('uploads/products/media/' . $file) }}" alt="Product Image">
                    </div>
                  @endforeach
                @endif
              </div>
            </div>

            <div class="swiper thumb-swiper mt-3">
              <div class="swiper-wrapper">
                @if(!empty($mediaFiles))
                  @foreach($mediaFiles as $file)
                    <div class="swiper-slide">
                      <img src="{{ asset('uploads/products/media/' . $file) }}" alt="Product Thumb">
                    </div>
                  @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>

        <!-- Product Details -->
        <div class="col-lg-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
          <div class="product-details-content-sec">
            <div class="product-details-sub-title">
              <h6>{{ $categoryName }}</h6>
              <div class="title-in-stock-sec">
                <h4>{{ $product->product_name }}</h4>
                <div class="pro-det-stock-sec">
                  <!-- <p class="stock">In Stock</p> -->
                </div>
              </div>
            </div>
          </div>

          <div class="product-details-price-sec">
            <div class="product-details-price-title">
              <h4>₹ {{ number_format($product->mrp, 2) }}
                @if($product->mrp)
                  <del>₹ {{ number_format($product->mrp, 2) }}</del>
                @endif
              </h4>
            </div>
          </div>

          <div class="product-details-color-sec">
              <div class="product-details-color-variant">
                  <p class="product-details-title">Color :</p>
                
                  <ul class="product-details-color" id="color-options">
                      @foreach($colors as $index => $color)
                          @php
                              $trimmedColor = trim($color);
                              $hexColor = $colorMap[$trimmedColor] ?? '#ffffff'; // fallback to white
                          @endphp
                          <li class="{{ $index === 0 ? 'active' : '' }}"
                              style="background: {{ $hexColor }};"
                              data-color="{{ $trimmedColor }}">
                          </li>
                      @endforeach
                  </ul>

                  <input type="hidden" name="selected_color" id="selected_color" value="{{ trim($colors[0]) }}">
              </div>
          </div>

          <input type="hidden" name="product_id" value="{{ $product->id }}">
          <input type="hidden" name="fabric" value="{{ optional($product->fabricType)->category_name ?? 'N/A' }}">
          <input type="hidden" name="image" value="{{ !empty($mediaFiles) ? $mediaFiles[0] : '' }}">
          <input type="hidden" name="price" value="{{ $product->mrp }}">
          <input type="hidden" name="product_name" value="{{ $product->product_name }}">

          <div class="product-details-size-quantity-sec">
            <div class="row">
              <div class="col-md-6">
                <div class="product-details-size-sec">
                  <div class="product-details-size-wrap">
                    <p class="product-details-size-title">Size :</p>
                  </div>
                  <div class="product-details-size-select-sec">
                    <select class="form-select" id="sizeSelect" name="size">
                      <option selected disabled>Select</option>
                      @if($product->size)
                        <option value="{{ $product->size->category_name }}">{{ $product->size->category_name }}</option>
                      @endif
                    </select>
                  </div>
                </div>
              </div>

                <div class="col-md-6">
            <div class="product-details-quantity-sec">
              <p class="product-details-quantity-title">Quantity :</p>
              <div class="qty-container">
                <button class="qty-btn-minus btn-light" type="button"><i class="fa fa-minus"></i></button>
                <input type="number" name="qty" id="qtyInput" value="1" class="input-qty" min="1" readonly />
                <button class="qty-btn-plus btn-light" type="button"><i class="fa fa-plus"></i></button>
              </div>
            </div>
          </div>

            </div>
          </div>

         <div class="product-details-desc-para-sec">
          <p class="product-details-desc-title">Product Description:</p>
          <p class="read-more-content">{{ $product->description }}</p>
          <a href="javascript:void(0)" class="read-more-toggle">Read more</a>
        </div>


            <div class="product-details-collection-sec">
            <div class="product-details-collection-wrap">
              <p class="product-details-collection-title">Collection Name:</p>
              <p class="product-details-collection-para">
                {{ $product->collection }}
              </p>
            </div>
          </div>
        <div class="product-details-dimension-sec">
            <div class="product-details-dimension-wrap">
              <p class="product-details-dimension-title">Dimension:</p>
              <p class="product-details-dimension-para">
{{ $product->dimension }}              </p>
            </div>
          </div>
        <div class="product-details-fabric-type-sec">
            <div class="product-details-fabric-type-wrap">
              <p class="product-details-fabric-type-title">Fabric Type:</p>
              <p class="product-details-fabric-type-para">
                100% Indian Cotton
              </p>
            </div>
          </div>

            <!-- Hidden fields for Connect Us -->
            <input type="hidden" name="connect_product_name" id="connect_product_name" value="{{ $product->product_name }}">
            <input type="hidden" name="connect_product_size" id="connect_product_size" value="">
            <input type="hidden" name="connect_product_qty" id="connect_product_qty" value="1">
            <!-- end Hidden fields for Connect Us -->

          <div class="product-details-btn-sec">
            <div class="row">
              <div class="col-md-5">
                <div class="pro-det-add-to-cart-btn">
               <button type="button" class="prod-det-btn-two" id="buyNowButton">Buy Now</button>
                </div>
              </div>

                <!-- Connect Us Button -->
  <!-- <div class="col-md-5">
                  <div class="pro-det-add-to-cart-btn">
                      <button type="button" class="prod-det-btn-two" data-bs-toggle="modal" data-bs-target="#connectUsModal">
  Enquire Now  </button>
  </div>
  </div> -->
              <div class="col-md-5">
                <div class="pro-det-add-to-cart-btn">
                  <button type="submit" class="prod-det-btn-two">Add to cart</button>
                </div>
              </div>
              <div class="col-md-2">
                <div class="pro-det-wishlist-btn">
                  <a href="{{ route('wishlist.add', $product->id) }}" class="box-icon hover-tooltip text-capton-2 wishlist btn-icon-action btn btn-wishlist">
                   <span class="fa fa-heart-o"></span>
                    <span class="tooltip text-caption-2">Wishlist</span></a>
                </div>
              </div>
            </div>
            <br>
          </div>

          <div class="product-details-guranteed-sec">
            <div class="product-details-guranteed-title">Guaranteed Safe Checkout :</div>
            <div class="product-details-guranteed-payment">
              <img src="{{ asset('frontend/assets/img/logo/visa-img.png') }}" alt="Visa">
              <img src="{{ asset('frontend/assets/img/logo/mastercard-img.png') }}" alt="MasterCard">
              <img src="{{ asset('frontend/assets/img/logo/amex-img.png') }}" alt="Amex">
              <img src="{{ asset('frontend/assets/img/logo/paypal-img.png') }}" alt="PayPal">
              <img src="{{ asset('frontend/assets/img/logo/od-img.png') }}" alt="OD">
              <img src="{{ asset('frontend/assets/img/logo/disocver-img.png') }}" alt="Discover">
            </div>
          </div>

        </div>
      </div>
    </form>
  </div>
</section>
<!-- Connect Us Modal -->
<div class="modal fade" id="connectUsModal" tabindex="-1" aria-labelledby="connectUsModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('connect.us.send') }}" method="POST">
      @csrf
      <div class="modal-content" style="border-radius: 8px; overflow: hidden; box-shadow: 0 5px 20px rgba(0,0,0,0.2); max-width: 500px; margin: auto;">
        
        <div class="modal-header" style="background-color: #f8f8f8; border-bottom: 1px solid #ddd;">
        <h5 class="modal-title text-center w-100" id="connectUsModalLabel" style="color: #9d7e54;">Connect With Us</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        
        <div class="modal-body" style="background-color: #fff; padding: 1rem 1.5rem;">
          <!-- Product hidden data -->
          <input type="hidden" name="product_name" id="modal_product_name">
          <input type="hidden" name="product_size" id="modal_product_size">
          <input type="hidden" name="product_qty" id="modal_product_qty">

          <!-- User inputs -->
          <div class="mb-2">
            <input type="text" class="form-control" name="name" required placeholder="Name*">
          </div>

          <div class="mb-2">
            <input type="email" class="form-control" name="email" required placeholder="Email*">
          </div>

          <div class="mb-2">
            <input type="tel" class="form-control" name="phone" required placeholder="Phone*">
          </div>

          <div class="mb-2">
            <textarea class="form-control" name="address" rows="2" required placeholder="Address*"></textarea>
          </div>

          <div class="mb-2">
            <textarea class="form-control" name="message" rows="2" required placeholder="Message*"></textarea>
          </div>
        </div>

      <div class="modal-footer justify-content-center" style="background-color: #f8f8f8; border-top: 1px solid #ddd;">
  <button type="submit" class="btn" style="background-color: #9d7e54; color: #fff; padding: 8px 24px; border-radius: 4px;">
    Send Message
  </button>
</div>

      </div>
    </form>
  </div>
</div>

<section class="description-sec">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="tab-custom product-det-custom-tab-sec">
            <!-- Nav tabs -->
            <ul class="nav nav-tabs justify-content-center mb-3 border-bottom-0" role="tablist">
             
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="section2-tab" data-bs-toggle="tab" data-bs-target="#section2" type="button"
                  role="tab" aria-controls="section2" aria-selected="false">Shipping Fees & Timeline</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="section3-tab" data-bs-toggle="tab" data-bs-target="#section3" type="button"
                  role="tab" aria-controls="section3" aria-selected="true">Returns & Exchange</button>
              </li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content product-detail-tab-sec bg-white rounded-3 p-4 border-light-subtle">
             
              <div class="tab-pane fade show active" id="section2" role="tabpanel" aria-labelledby="section2-tab">
                <p>{!! $product->shipping !!}</p>
              </div>
              <div class="tab-pane fade" id="section3" role="tabpanel" aria-labelledby="section3-tab">
                <p>{!! $product->return_exchange !!}</p>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<section class="section-blog padding-t-50 padding-b-100">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
          <div class="rx-banner text-center rx-banner-effects">
            <h4>Related <span>Products</span></h4>
          </div>
        </div>
        <div class="col-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
          <div class="owl-carousel related-product-slider" id="rxblogslider">
            @foreach($products as $product)
                @php
                    $images = json_decode($product->thumbnail_image ?? '[]');
                    $defaultImage = $images[0] ?? 'default.webp';
                    $hoverImage = $images[1] ?? $defaultImage;

                    $fabricName = DB::table('fabric_type')
                        ->where('id', $product->fabric_type_id)
                        ->value('category_name');

                    $catSlug = DB::table('sub_product_category')
                        ->where('id', $product->product_sab_category_id)
                        ->value('slug');
                @endphp

                <div class="product-main-box-sec">
                    <div class="product-box-front hover-image-wrap">
                        <div class="product-icons">
                            <a href="#" class="icon"><i class="fa fa-heart-o"></i></a>
                        </div>
                        <a href="{{ route('product.categoryproduct', [$catSlug, $product->slug]) }}">
                            <img src="{{ asset('uploads/products/thumbnails/' . $defaultImage) }}" alt="{{ $product->product_name }}" class="img-default">
                            <img src="{{ asset('uploads/products/thumbnails/' . $hoverImage) }}" alt="{{ $product->product_name }}" class="img-hover">
                        </a>
                        <div class="product-name-wrap">
                            <a href="{{ route('product.categoryproduct', [$catSlug, $product->slug]) }}">
                                <div class="product-inner-contact">
                                    <h4>{{ $product->product_name }}</h4>
                                    <h5 class="product-price">₹ {{ number_format($product->mrp) }}</h5>
                                    <h5 class="product-fabric">{{ $fabricName }}</h5>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
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
    document.addEventListener('DOMContentLoaded', function () {
      const filterBtn = document.getElementById('filterBtn');
      const sidebar = document.getElementById('mobileSidebar');
      const overlay = document.getElementById('sidebarOverlay');
      const closeBtn = document.getElementById('closeSidebar');

      filterBtn.addEventListener('click', () => {
        sidebar.classList.add('open');
        overlay.classList.add('show');
      });

      overlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
      });

      closeBtn.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
      });
    });
  </script>
  
  <script>
    const rangeMin = document.getElementById("rangeMin");
    const rangeMax = document.getElementById("rangeMax");
    const minPrice = document.getElementById("minPrice");
    const maxPrice = document.getElementById("maxPrice");
    const progress = document.querySelector(".slider .progress");

    const priceGap = 500;

    function updateSlider() {
      let minVal = parseInt(rangeMin.value);
      let maxVal = parseInt(rangeMax.value);

      if ((maxVal - minVal) < priceGap) {
        if (event.target.id === "rangeMin") {
          rangeMin.value = maxVal - priceGap;
        } else {
          rangeMax.value = minVal + priceGap;
        }
      } else {
        minPrice.value = minVal;
        maxPrice.value = maxVal;
        progress.style.left = (minVal / rangeMin.max) * 100 + "%";
        progress.style.right = 100 - (maxVal / rangeMax.max) * 100 + "%";
      }
    }

    rangeMin.addEventListener("input", updateSlider);
    rangeMax.addEventListener("input", updateSlider);

    minPrice.addEventListener("input", () => {
      let val = parseInt(minPrice.value);
      if (val < parseInt(rangeMax.value) - priceGap) {
        rangeMin.value = val;
        updateSlider();
      }
    });

    maxPrice.addEventListener("input", () => {
      let val = parseInt(maxPrice.value);
      if (val > parseInt(rangeMin.value) + priceGap) {
        rangeMax.value = val;
        updateSlider();
      }
    });

    updateSlider(); // Initial set
  </script>

  <script>
    $(document).ready(function () {
      $('.main-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: true,
        asNavFor: '.thumb-slider'
      });

      $('.thumb-slider').slick({
        slidesToShow: 5,
        slidesToScroll: 1,
        asNavFor: '.main-slider',
        focusOnSelect: true,
        arrows: false,
        centerMode: true
      });
    });
  </script>

<script>
  const thumbSwiper = new Swiper(".thumb-swiper", {
    spaceBetween: 10,
    slidesPerView: 4,
    loop: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    watchSlidesProgress: true,
  });

  const mainSwiper = new Swiper(".main-swiper", {
    spaceBetween: 10,
    loop: true,
    autoplay: {
      delay: 2000,
      disableOnInteraction: false,
    },
    thumbs: {
      swiper: thumbSwiper,
    },
  });
</script>

<script>
document.addEventListener('DOMContentLoaded', function () {
  document.querySelector('[data-bs-target="#connectUsModal"]').addEventListener('click', function () {
    let size = document.getElementById('sizeSelect').value || 'N/A';
    let qty = document.getElementById('qtyInput').value;

    document.getElementById('modal_product_name').value = document.getElementById('connect_product_name').value;
    document.getElementById('modal_product_size').value = size;
    document.getElementById('modal_product_qty').value = qty;

    document.getElementById('connect_product_size').value = size;
    document.getElementById('connect_product_qty').value = qty;
  });
});
</script>



  <script>
document.getElementById('buyNowButton').addEventListener('click', function (e) {
    e.preventDefault();

    const selectedColor = document.getElementById('selected_color').value;
    const sizeSelect = document.getElementById('sizeSelect').value;
    const qty = document.getElementById('qtyInput').value;
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    if (!selectedColor)    return notyf.error('Please select a color.');
if (!sizeSelect || sizeSelect === 'Select')  return notyf.error('Please select a size.');
if (!qty || isNaN(qty) || qty < 1)   return notyf.error('Please enter a valid quantity.');


    const data = {
        product_id: document.querySelector('input[name="product_id"]').value,
        product_name: document.querySelector('input[name="product_name"]').value,
        price: document.querySelector('input[name="price"]').value,
        image: '{{ !empty($mediaFiles) ? asset("uploads/products/media/" . $mediaFiles[0]) : asset("default-image.jpg") }}',
        fabric: document.querySelector('input[name="fabric"]').value || '',
        selected_color: selectedColor,
        size: sizeSelect,
        qty: qty
    };

    console.log('✅ Debug Product ID:', data.product_id);

    fetch('{{ route('buy.now') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify(data)
    })
    .then(async res => {
        const contentType = res.headers.get('content-type');
        if (!res.ok) {
            let msg = 'Something went wrong.';
            if (contentType && contentType.includes('application/json')) {
                const json = await res.json();
                msg = json.message || msg;
            } else {
                const text = await res.text();
                console.error('❌ HTML error response:', text);
            }
            throw new Error(msg);
        }
        return res.json();
    })
    .then(response => {
        if (response.status === 'success') {
            window.location.href = response.redirect_url;
        } else {
            alert(response.message || 'Something went wrong');
        }
    })
    .catch(error => {
        console.error('❌ Error:', error);
        alert(error.message || 'Something went wrong.');
    });
});
</script>



<script>
  // Assuming you have already initialized Notyf as `notyf`
  document.getElementById('addToCartForm').addEventListener('submit', function(e) {
    const selectedColor = document.getElementById('selected_color').value;
    const sizeSelect    = document.getElementById('sizeSelect').value;
    const qty           = document.getElementById('qtyInput').value;

    // Validate Color
    if (!selectedColor) {
      notyf.error('Please select a color.');
      e.preventDefault();
      return false;
    }

    // Validate Size
    if (!sizeSelect || sizeSelect === 'Select') {
      notyf.error('Please select a size11.');
      e.preventDefault();
      return false;
    }

    // Validate Quantity
    if (!qty || isNaN(qty) || qty < 1) {
      notyf.error('Please enter a valid quantity.');
      e.preventDefault();
      return false;
    }
    // If we reach here, the form will submit normally
  });

  // Color selection handler
  document.querySelectorAll('#color-options li').forEach(function(el) {
    el.addEventListener('click', function() {
      document.querySelectorAll('#color-options li').forEach(function(li) {
        li.classList.remove('active');
      });
      this.classList.add('active');
      document.getElementById('selected_color').value = this.dataset.color;
    });
  });
</script>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.querySelector(".read-more-toggle");
    const content = document.querySelector(".read-more-content");

    if (toggleBtn && content) {
      toggleBtn.addEventListener("click", function () {
        content.classList.toggle("expanded");
        toggleBtn.textContent = content.classList.contains("expanded")
          ? "Read less"
          : "Read more";
      });
    }
  });
</script>
<script>
  document.querySelector('.qty-btn-plus').addEventListener('click', function(e) {
    e.preventDefault();
    let qtyInput = document.getElementById('qtyInput');
    let current = parseInt(qtyInput.value) || 1;
    qtyInput.value = current + 1;
  });

  document.querySelector('.qty-btn-minus').addEventListener('click', function(e) {
    e.preventDefault();
    let qtyInput = document.getElementById('qtyInput');
    let current = parseInt(qtyInput.value) || 1;
    if (current > 1) {
      qtyInput.value = current - 1;
    }
  });
</script>


</body>

</html>