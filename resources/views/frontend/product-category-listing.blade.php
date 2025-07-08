
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
                <h2>{{ $subCategory->sab_category_name ?? 'Products' }}</h2>
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
                    <li>
                      <a href="{{ route('frontend.index') }}">Home</a>
                    </li>
                    <li>{{ $subCategory->sab_category_name ?? 'Products' }}</li>
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

 
 <section class="section-room padding-tb-50">
    <div class="container">
        <div class="row">
        <div class="col-md-12 col-lg-3 col-sm-12 col-xs-12">
               <!-- Filter Button: visible on mobile/tablet only -->
           <div class="filter-btn-sec">
             <button id="filterBtn" class="rx-btn-two fitler-btn-two d-block d-lg-none">Filter</button>
           </div>

          <!-- Overlay -->
          <div id="sidebarOverlay" class="sidebar-overlay"></div>

          <!-- Sidebar: mobile view -->
          <div id="mobileSidebar" class="sidebar d-block d-lg-none">
            <div class="sidebar-header">
              <h4>Filter</h4>
              <button id="closeSidebar" class="close-btn">&times;</button>
            </div>
            <div class="sidebar-content">
              <div class="product-listing-side-bar-sec">
                <div class="sidebar-wrap">

                        <!-- Category -->
                        <!-- <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Category</h4>
                            </div>
                            <ul class="products-list">
                                @foreach($categories as $id => $category)
                                    <li><a href="#">{{ $category }}</a></li>
                                @endforeach
                            </ul>
                        </div> -->

<div class="single-sidebar-item">
                    <div class="single-sidebar-title">
                      <h4>Category</h4>
                    </div>
<div class="dropdown product-sub-cate-dropdown-sec">
  <button class="btn custom-dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Bedding
  </button>
  <ul class="dropdown-menu custom-dropdown-menu">
    <li><a class="dropdown-item" href="#">Bedding 1</a></li>
    <li><a class="dropdown-item" href="#">Bedding 2</a></li>
    <li><a class="dropdown-item" href="#">Bedding 3</a></li>
  </ul>
</div>
<div class="dropdown product-sub-cate-dropdown-sec">
  <button class="btn custom-dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Bedding
  </button>
  <ul class="dropdown-menu custom-dropdown-menu">
    <li><a class="dropdown-item" href="#">Bedding 4</a></li>
    <li><a class="dropdown-item" href="#">Bedding 5</a></li>
    <li><a class="dropdown-item" href="#">Bedding 6</a></li>
  </ul>
</div>
 <div class="dropdown product-sub-cate-dropdown-sec">
  <button class="btn custom-dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Bedding
  </button>
  <ul class="dropdown-menu custom-dropdown-menu">
    <li><a class="dropdown-item" href="#">Bedding 7</a></li>
    <li><a class="dropdown-item" href="#">Bedding 8</a></li>
    <li><a class="dropdown-item" href="#">Bedding 9</a></li>
  </ul>
</div>
</div>

                        <!-- TC -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>TC</h4>
                            </div>
                            <select class="rx-from-control form-select">
                                <option selected>Select</option>
                                @foreach($tcs as $tc)
                                    <option value="{{ $tc }}">{{ $tc }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Age Group -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Age Group</h4>
                            </div>
                            <select class="rx-from-control form-select">
                                <option selected>Select</option>
                                @foreach($ageGroups as $id => $ageGroup)
                                    <option value="{{ $ageGroup }}">{{ $ageGroup }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Collection -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Collection Name</h4>
                            </div>
                            <select class="rx-from-control form-select">
                                <option selected>Select</option>
                                @foreach($collections as $collection)
                                    <option value="{{ $collection }}">{{ $collection }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Fabric Type -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Fabric Type</h4>
                            </div>
                            @foreach($fabricTypes as $id => $fabric)
                                <div class="form-check">
                                    <input class="fabric-type-check form-check-input" type="checkbox" value="{{ $id }}" id="check{{ $id }}">
                                    <label class="form-check-label" for="check{{ $id }}">
                                        {{ $fabric }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Color -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Select Color</h4>
                            </div>
                            <input type="text" class="product-select-color-search-box" placeholder="Search color...">
                            <ul class="products-list">
                                @foreach($uniqueColors as $color)
                                    <li>{{ $color }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Size -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Size</h4>
                            </div>
                            <ul class="list-inline">
                                @foreach($sizes as $id => $size)
                                    <li class="list-inline-item"><a href="#" class="size-btn">{{ $size }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Price Range -->
              <div class="single-sidebar-item">
                <div class="single-sidebar-title">
                  <h4>Price</h4>
                </div>
                <div class="price-range-box">
                  <div class="price-input">
                    <div class="field">
                      <label for="minPrice">Min</label>
                      <input type="number" id="minPrice" value="1000">
                    </div>
                    <div class="field">
                      <label for="maxPrice">Max</label>
                      <input type="number" id="maxPrice" value="5000">
                    </div>
                  </div>
                  <div class="slider">
                    <div class="progress" style="left: 0%; right: 70%;"></div>
                  </div>
                  <div class="range-input">
                    <input type="range" id="rangeMin" min="0" max="100000" value="0" step="100">
                    <input type="range" id="rangeMax" min="0" max="100000" value="30000" step="100">
                  </div>
                </div>
              </div>

                    </div>
                </div>
            </div>
          </div>


          
          <!-- -- Sidebar on desktop: visible only on desktop --> 

          <div class="product-listing-side-bar-sec d-none d-lg-block">
            <div class="sidebar-wrap">

               <!-- Category -->
                        <!-- <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Category</h4>
                            </div>
                            <ul class="products-list">
                                @foreach($categories as $id => $category)
                                    <li><a href="#">{{ $category }}</a></li>
                                @endforeach
                            </ul>
                        </div> -->



                        <div class="single-sidebar-item">
                    <div class="single-sidebar-title">
                      <h4>Category</h4>
                    </div>
<div class="dropdown product-sub-cate-dropdown-sec">
  <button class="btn custom-dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Bedding
  </button>
  <ul class="dropdown-menu custom-dropdown-menu">
    <li><a class="dropdown-item" href="#">Bedding 1</a></li>
    <li><a class="dropdown-item" href="#">Bedding 2</a></li>
    <li><a class="dropdown-item" href="#">Bedding 3</a></li>
  </ul>
</div>
<div class="dropdown product-sub-cate-dropdown-sec">
  <button class="btn custom-dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Bedding
  </button>
  <ul class="dropdown-menu custom-dropdown-menu">
    <li><a class="dropdown-item" href="#">Bedding 4</a></li>
    <li><a class="dropdown-item" href="#">Bedding 5</a></li>
    <li><a class="dropdown-item" href="#">Bedding 6</a></li>
  </ul>
</div>
 <div class="dropdown product-sub-cate-dropdown-sec">
  <button class="btn custom-dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Bedding
  </button>
  <ul class="dropdown-menu custom-dropdown-menu">
    <li><a class="dropdown-item" href="#">Bedding 7</a></li>
    <li><a class="dropdown-item" href="#">Bedding 8</a></li>
    <li><a class="dropdown-item" href="#">Bedding 9</a></li>
  </ul>
</div>
</div>

                        <!-- TC -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>TC</h4>
                            </div>
                            <select class="rx-from-control form-select">
                                <option selected>Select</option>
                                @foreach($tcs as $tc)
                                    <option value="{{ $tc }}">{{ $tc }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Age Group -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Age Group</h4>
                            </div>
                            <select class="rx-from-control form-select">
                                <option selected>Select</option>
                                @foreach($ageGroups as $id => $ageGroup)
                                    <option value="{{ $ageGroup }}">{{ $ageGroup }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Collection -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Collection Name</h4>
                            </div>
                            <select class="rx-from-control form-select">
                                <option selected>Select</option>
                                @foreach($collections as $collection)
                                    <option value="{{ $collection }}">{{ $collection }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Fabric Type -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Fabric Type</h4>
                            </div>
                            @foreach($fabricTypes as $id => $fabric)
                                <div class="form-check">
                                    <input class="fabric-type-check form-check-input" type="checkbox" value="{{ $id }}" id="check{{ $id }}">
                                    <label class="form-check-label" for="check{{ $id }}">
                                        {{ $fabric }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <!-- Color -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Select Color</h4>
                            </div>
                            <input type="text" class="product-select-color-search-box" placeholder="Search color...">
                            <ul class="products-list">
                                @foreach($uniqueColors as $color)
                                    <li>{{ $color }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Size -->
                        <div class="single-sidebar-item">
                            <div class="single-sidebar-title">
                                <h4>Size</h4>
                            </div>
                            <ul class="list-inline">
                                @foreach($sizes as $id => $size)
                                    <li class="list-inline-item"><a href="#" class="size-btn">{{ $size }}</a></li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- Price Range -->
              <div class="single-sidebar-item">
                <div class="single-sidebar-title">
                  <h4>Price</h4>
                </div>
                <div class="price-range-box">
                  <div class="price-input">
                    <div class="field">
                      <label for="minPrice">Min</label>
                      <input type="number" id="minPrice" value="1000">
                    </div>
                    <div class="field">
                      <label for="maxPrice">Max</label>
                      <input type="number" id="maxPrice" value="5000">
                    </div>
                  </div>
                  <div class="slider">
                    <div class="progress" style="left: 0%; right: 70%;"></div>
                  </div>
                  <div class="range-input">
                    <input type="range" id="rangeMin" min="0" max="100000" value="0" step="100">
                    <input type="range" id="rangeMax" min="0" max="100000" value="30000" step="100">
                  </div>
                </div>
              </div>
            </div>
          </div>

</div>  
            <!-- Products -->
<div class="col-12 col-sm-9">
    <div class="product-listing-sec">
        <div class="row mb-minus-24 room-popup">
           @foreach($products as $product)
    @php
        $images = json_decode($product->thumbnail_image ?? '[]');
        $defaultImage = $images[0] ?? '';
        $hoverImage = $images[1] ?? $defaultImage;

        $fabricName = DB::table('fabric_type')
            ->where('id', $product->fabric_type_id)
            ->value('category_name');

        // Get the category slug for the product
        $catSlug = DB::table('sub_product_category')
            ->where('id', $product->product_sab_category_id)
            ->value('slug');
    @endphp

    <div class="col-lg-4 col-sm-6 col-12 mb-24" data-aos="fade-up" data-aos-duration="1000">
        <div class="product-main-box-sec">
            <div class="product-box-front hover-image-wrap">
                <div class="product-icons">
                    <a href="{{ route('wishlist.add', $product->id) }}" class="icon"><i class="fa fa-heart-o"></i></a>
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
    </div>
@endforeach

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
    const form = document.getElementById('filterForm');

    form.querySelectorAll('select, input[type="checkbox"], input[type="number"]').forEach(el => {
        el.addEventListener('change', function() {
            form.submit();
        });
    });

    document.querySelectorAll('.category-filter').forEach(el => {
        el.addEventListener('click', function(e) {
            e.preventDefault();
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'category_id';
            input.value = this.dataset.id;
            form.appendChild(input);
            form.submit();
        });
    });
});
</script>
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
</body>

</html>