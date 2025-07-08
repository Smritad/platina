
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
                  <h2>Order Details</h2>
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
                        <a href="index.html">Home</a>
                      </li>
                       <li>My Account</li> 
                      <li>Order Details</li>
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

  <!-- Order Details Section -->
  <section class="section-menu order-details-sec">
    <div class="container">
      <div class="row">
        <div class="col-12" data-aos="fade-up" data-aos-duration="1000">
          <div class="rx-banner text-center rx-banner-effects">
            <h4>Order <span>Details</span></h4>
          </div>
        </div>

        <div class="account-details-bg-sec">

          <div class="col-12">
              <div class="account-order-details-one-sec">
                <div class="account-order-head">
                  @php
                    $images = json_decode($order->images, true);
                    $firstImage = $images[0] ?? 'default.jpg'; // fallback if empty
                @endphp
@php
    $product = \App\Models\ProductDetails::find($order['product_ids']);
    $sabCategory = DB::table('sub_product_category')
                    ->where('id', $product->product_sab_category_id ?? null)
                    ->first();

    $sabSlug = $sabCategory ? $sabCategory->slug : 'coming-soon';
    $productSlug = $product ? $product->slug : \Illuminate\Support\Str::slug($order['product_names']);
    $productLink = route('product.categoryproduct', [$sabSlug, $productSlug]);
@endphp

                  <figure class="img-product">
<a href="{{ $productLink }}" target="_blank">
    <img src="{{ asset($firstImage) }}" alt="product">
</a>
                  </figure>

                 <div class="content">
                    <!-- <div class="account-order-badge">{{ ucfirst($order->status ?? 'In Progress') }}</div> -->
                    <div class="account-order-badge">Order Placed</div>
                    <h4 class="account-order-title">Order #{{ $order->order_id }}</h4>
                  </div>
                </div>
              </div>


        <div class="order-details-item-card-sec">
  <div class="container">
    <div class="row gy-3">
      <div class="col-md-6">
        <p class="label">Category</p>
        <p class="value fw-bold">{{ $categoryName }}</p>
      </div>
      <div class="col-md-6">
        <p class="label">Sab Category</p>
        <p class="value fw-bold">{{ $subCategoryName }}</p>
      </div>

      <div class="col-md-6">
        <div class="highlighted-label">Start Time</div>
        <p class="value fw-bold mb-0">{{ $order->created_at }}</p>
      </div>
      <div class="col-md-6">
        <p class="label">Address</p>
        <p class="value fw-bold mb-0">{{ $order->shipping_address }}</p>
      </div>
    </div>
  </div>
</div>

          </div>


          <div class="col-12" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
            <div class="order-det-tabs-sec">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link active" id="starters-tab" data-bs-toggle="tab"
                    data-bs-target="#starters" role="tab" aria-controls="starters" aria-selected="true">Order
                    History</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" id="breakfast-tab" data-bs-toggle="tab"
                    data-bs-target="#breakfast" role="tab" aria-controls="breakfast" aria-selected="false">Item
                    Details</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" id="lunch-tab" data-bs-toggle="tab" data-bs-target="#lunch"
                    role="tab" aria-controls="lunch" aria-selected="false">Courier</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" id="dinner-tab" data-bs-toggle="tab" data-bs-target="#dinner"
                    role="tab" aria-controls="dinner" aria-selected="false">Receiver</button>
                </li>
              </ul>
            </div>

            <div class="tab-content rx-menutab">
              <div class="tab-pane fade show active" id="starters" role="tabpanel" aria-labelledby="starters-tab">
                <div class="order-details-timeline-section">
                  <ul class="order-details-timeline">
                    <li>
                      <div class="order-details-timeline-badge success"></div>
                      <div class="order-details-timeline-box">
                        <a class="order-details-timeline-panel" href="javascript:void(0);">
                          <div class="order-det-timeline-para">Product Shipped</div>
                          <span>10/07/2024 4:30pm</span>
                        </a>
                        <p><strong>Courier Service: </strong>FedEx World Service Center</p>
                        <p><strong>Estimated Delivery Date: </strong>12/07/2024</p>
                      </div>
                    </li>
                    <li>
                      <div class="order-details-timeline-badge success"></div>
                      <div class="order-details-timeline-box">
                        <a class="order-details-timeline-panel" href="javascript:void(0);">
                          <div class="order-det-timeline-para">Product Shipped</div>
                          <span>10/07/2024 4:30pm</span>
                        </a>
                        <p><strong>Tracking Number: </strong>2307-3215-6759</p>
                        <p><strong>Warehouse: </strong>T-Shirt 10b</p>
                      </div>
                    </li>
                    <li>
                      <div class="order-details-timeline-badge"></div>
                      <div class="order-details-timeline-box">
                        <a class="order-details-timeline-panel" href="javascript:void(0);">
                          <div class="order-det-timeline-para">Product Packaging</div>
                          <span>12/07/2024 4:34pm</span>
                        </a>
                      </div>
                    </li>
                    <li>
                      <div class="order-details-timeline-badge"></div>
                      <div class="order-details-timeline-box">
                        <a class="order-details-timeline-panel" href="javascript:void(0);">
                          <div class="order-det-timeline-para">Order Placed</div>
                          <span>11/07/2024 2:36pm</span>
                        </a>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>


              <div class="tab-pane fade" id="breakfast" role="tabpanel" aria-labelledby="breakfast-tab">
                <div class="order-details-items-details-sec">
                @foreach($items as $item)
<div class="order-details-items-details-head">
    <figure class="order-details-items-details-img-product">
        <img src="{{ asset($item['image']) }}" alt="{{ $item['name'] }}">
    </figure>
    <div class="od-item-details-content">
        <div class="od-item-details-title">{{ $item['name'] }}</div>
        <div class="mt_4"><span class="fw-6">Size:</span> {{ $item['size'] }}</div>
        <div class="mt_4"><span class="fw-6">Quantity:</span> {{ $item['quantity'] }}</div>
        <div class="mt_4"><span class="fw-6">Color:</span> {{ $item['color'] }}</div>
        <div class="mt_4">
            <span class="fw-6">Price:</span>
            <i class="fa fa-inr" aria-hidden="true"></i> {{ number_format($item['price'], 2) }}
        </div>
        <!-- <div class="mt_4">
            <span class="fw-6">Total:</span>
            <i class="fa fa-inr" aria-hidden="true"></i> {{ number_format($item['total'], 2) }}
        </div> -->
    </div>
</div>

                  <ul class="od-items-details-list">
                    <li class="odid-total-content-sec">
                      <span class="od-id-list-total-price">Total Price</span>
                      <span class="fw-6">{{ number_format($item['total'], 2) }}</span>
                    </li>

                    @if(($order->cgst ?? 0) > 0 || ($order->sgst ?? 0) > 0)
    <li class="odid-order-content-sec">
        <span class="od-id-list-order-price">CGST</span>
        <span class="fw-6">₹{{ number_format($order->cgst, 2) }}</span>
    </li>
    <li class="odid-order-content-sec">
        <span class="od-id-list-order-price">SGST</span>
        <span class="fw-6">₹{{ number_format($order->sgst, 2) }}</span>
    </li>
@elseif(($order->igst ?? 0) > 0)
    <li class="odid-order-content-sec">
        <span class="od-id-list-order-price">IGST</span>
        <span class="fw-6">₹{{ number_format($order->igst, 2) }}</span>
    </li>
@endif
<br>
<li class="odid-order-content-sec">
    <span class="od-id-list-order-price">Order Total</span>
    <span class="fw-6">₹{{ number_format($totalPrice, 2) }}</span>
</li>

                  </ul>
                </div>
              </div>
@endforeach



              <div class="tab-pane fade" id="lunch" role="tabpanel" aria-labelledby="lunch-tab">
                <div class="order-details-courier-sec">
                  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus, minima expedita! Tempora,
                    quidem sed nemo distinctio a maiores consequuntur suscipit molestiae assumenda commodi nesciunt vero
                    corporis ab velit mollitia vel optio. Vitae quisquam praesentium eum magni ad, veniam aut earum?
                    Dicta hic quaerat debitis assumenda harum porro molestiae quas, totam excepturi magnam maiores
                    maxime voluptates sapiente quae inventore. Pariatur quo vitae tempore, aspernatur expedita ducimus
                    recusandae. Beatae quas voluptate magnam.</p>
                </div>
              </div>


              <div class="tab-pane fade" id="dinner" role="tabpanel" aria-labelledby="dinner-tab">
                <div class="order-details-recevier-sec">

                  <p class="od-recevier-title">Thank you Your order has been received</p>
                  <ul class="od-receiver-list">
                    <li>Order Number: <span>{{ $order->order_id }}</span></li>
                    <li>Date: <span></span>{{ $order->created_at }}</li>
                    <li>Total: <span><i class="fa fa-inr" aria-hidden="true"></i>{{ $order->total_price }}</span></li>
                    <li>Payment Methods: <span>Online</span></li>

                  </ul>

                </div>
              </div>
            </div>
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