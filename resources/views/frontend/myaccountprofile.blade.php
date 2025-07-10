
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
                  <h2>My Account</h2>
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
                      <li>My Account</li>
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

  <!-- My Acount Section -->
  <section class="section-menu my-account-main-sec">
    <div class="container">
      <div class="row">

        <div class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">

          <div class="my-account-dashboard-sec">
            <div class="account-avatar">
              <div class="image">
                <img src="{{ asset('/frontend/assets/img/icons/user-account.png')}}" alt="">
              </div>
              <h4 class="my-account-det-title">{{ $user->name ?? '' }}</h4>
              <p class="my-account-det-para">{{ $user->email ?? '' }}</p>
            </div>

            <div class="my-account-tabs-sec">
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link active" id="account-details-tab" data-bs-toggle="tab"
                    data-bs-target="#account-details" role="tab" aria-controls="account-details" aria-selected="true"><i
                      class="fa fa-user"></i>Account
                    Details</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" id="my-orders-tab" data-bs-toggle="tab"
                    data-bs-target="#my-orders" role="tab" aria-controls="my-orders" aria-selected="false"><i
                      class="fa fa-shopping-cart"></i> My
                    Orders</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button type="button" class="nav-link" id="address-tab" data-bs-toggle="tab" data-bs-target="#address"
                    role="tab" aria-controls="address" aria-selected="false"><i class="fa fa-map-marker"></i>
                    Address</button>
                </li>
                
                <li class="nav-item" role="presentation">
<a href="{{ route('user.logout') }}" class="my-account-logout-sec">
    <i class="fa fa-sign-out"></i> Logout
</a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-md-8" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
          <div class="tab-content rx-menutab">
            <div class="tab-pane fade show active" id="account-details" role="tabpanel"
              aria-labelledby="account-details-tab">
              <div class="my-account-details-information-main-sec">
                <form action="#" class="my-account-details-form-sec">
                  <div class="my-account-information-sec" data-aos="fade-up" data-aos-duration="1000">
                    <div class="inner-title">
                      <h4>Information</h4>
                    </div>
                    <div class="my-account-info-form-sec">
                      <div class="row mb-minus-24">
                       @php
                            $fullName = $user->name ?? '';
                            $nameParts = explode(' ', $fullName, 2); // Split only into 2 parts
                            $firstName = $nameParts[0] ?? '';
                            $lastName = $nameParts[1] ?? '';
                        @endphp

                        <div class="col-sm-6 col-12 mb-24">
                          <div class="my-account-input-box">
                            <input type="text" name="firstname" id="fname" placeholder="First Name*" required value="{{ $firstName }}">
                          </div>
                        </div>
                        <div class="col-sm-6 col-12 mb-24">
                          <div class="my-account-input-box">
                            <input type="text" name="lastname" id="lname" placeholder="Last Name*" required value="{{ $lastName }}">
                          </div>
                        </div>

                        <div class="col-sm-6 col-12 mb-24">
                          <div class="rx-input-box">
                            <input type="email" name="email" id="email-address" placeholder="Email Address*" required value="{{ $user->email ?? '' }}">
                          </div>
                        </div>
                        <div class="col-sm-6 col-12 mb-24">
                          <div class="my-account-input-box">
                            <input type="tel" name="phone" id="phone-number" placeholder="Phone Number*" required value="{{ $user->phone ?? '' }}">
                          </div>
                        </div>
                        
                      </div>
                    </div>
                  </div>
                </form>
              </div>



              <div class="my-account-details-password-main-sec">
                <form id="passwordUpdateForm" action="{{ route('myaccount.password.update') }}" method="POST" class="my-account-password-form-sec">
    @csrf
    <div class="acc-pass-sec" data-aos="fade-up" data-aos-duration="1000">
        <div class="inner-title">
            <h4>Change Password</h4>
        </div>
        <div class="row mb-minus-24">
            <div class="col-12 mb-24">
                <input type="password" name="password_current" id="password_current" placeholder="Current Password*">
                <small id="currentError" class="text-danger"></small>

                <div class="text-end mt-1">
                    <a href="{{ route('user.forgotpassword') }}" class="text-primary" style="font-size: 14px;">
                        Forgot Password?
                    </a>
                </div>
            </div>

            <div class="col-12 mb-24">
                <input type="password" name="password_new" id="password_new" placeholder="New Password*">
                <small id="newPasswordError" class="text-danger"></small>
            </div>

            <div class="col-12 mb-24">
                <input type="password" name="password_new_confirmation" id="password_new_confirmation" placeholder="Confirm Password*">
                <small id="confirmPasswordError" class="text-danger"></small>
            </div>

            <div class="col-12 mb-24">
                <button type="submit" class="rx-btn-two">Update Password</button>
            </div>
        </div>
    </div>
</form>

<script>
document.getElementById('passwordUpdateForm').addEventListener('submit', function(e) {
    let valid = true;

    // Reset errors
    document.getElementById('currentError').innerText = '';
    document.getElementById('newPasswordError').innerText = '';
    document.getElementById('confirmPasswordError').innerText = '';

    const current = document.getElementById('password_current').value.trim();
    const newPass = document.getElementById('password_new').value.trim();
    const confirmPass = document.getElementById('password_new_confirmation').value.trim();

    // Current password required
    if (!current) {
        document.getElementById('currentError').innerText = 'Please enter current password.';
        valid = false;
    }

    // New password validation
    if (newPass.length < 6) {
        document.getElementById('newPasswordError').innerText = 'Password must be at least 6 characters.';
        valid = false;
    }

    // Match confirm password
    if (newPass !== confirmPass) {
        document.getElementById('confirmPasswordError').innerText = 'Passwords do not match.';
        valid = false;
    }

    if (!valid) e.preventDefault(); // stop form
});
</script>


              </div>
            </div>

            <div class="tab-pane fade" id="my-orders" role="tabpanel" aria-labelledby="my-orders-tab">
              <div class="my-orders-section">
                <form>
                  <div class="my-orders-table-repsonsive">
                    <table class="my-orders-table-sec" id="ordersTable">
  <thead>
    <tr class="my-orders-details-header-sec">
      <th>Orders</th>
      <th>Date</th>
      <th>Status</th>
      <th>Total</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($orders as $order)
    <tr class="my-orders-det-item">
      <td>{{ $order->order_id }}</td>
      <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d F Y') }}</td>
      <td>Order Placed</td>
      <td><i class="fa fa-inr"></i> {{ number_format($order->total_price, 2) }} for {{ $order->total_quantity }} {{ Str::plural('item', $order->total_quantity) }}</td>
      <td>
        <a href="{{ route('order.view', $order->order_id) }}" class="rx-btn-two">View</a>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="5" class="text-center">No orders found.</td>
    </tr>
    @endforelse
  </tbody>
</table>

                  </div>

                </form>
              </div>
            </div>


            <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
              <div class="my-orders-address-sec">
                <div class="my-orders-address-header-sec" data-aos="fade-up" data-aos-duration="1000">
                  <div class="inner-title">
                    <h4>Address</h4>
                  </div>
                  <!-- <div class="my-orders-address-btn">
                    <button class="rx-btn-two" type="submit">Add New</button>
                  </div> -->
                </div>

                <div class="my-address-add-new-col-sec">
                  <div class="row">
                   <!-- Billing Address -->
<div class="col-12 col-md-6">
  <div class="address-box">
    <h5>Billing Address</h5>

    <div id="billing-address-display">
      @if($billingAddress)
        <p>{!! nl2br(e($billingAddress)) !!}</p>
      @else
        <p class="text-muted">No billing address found.</p>
      @endif
      <button class="rx-btn-two" type="button" onclick="editAddress('billing')">Edit</button>
    </div>

    <form id="billing-address-form" action="{{ route('user.address.update') }}" method="POST" style="display: none;">
      @csrf
      <input type="hidden" name="type" value="billing">
      <textarea name="address" rows="4" class="form-control mb-2">{{ $billingAddress }}</textarea>
      <button type="submit" class="rx-btn-two">Update</button>
    </form>
  </div>
</div>

<!-- Shipping Address -->
<div class="col-12 col-md-6">
  <div class="address-box">
    <h5>Shipping Address</h5>

    <div id="shipping-address-display">
      @if($shippingAddress)
        <p>{!! nl2br(e($shippingAddress)) !!}</p>
      @else
        <p class="text-muted">No shipping address found.</p>
      @endif
      <button class="rx-btn-two" type="button" onclick="editAddress('shipping')">Edit</button>
    </div>

    <form id="shipping-address-form" action="{{ route('user.address.update') }}" method="POST" style="display: none;">
      @csrf
      <input type="hidden" name="type" value="shipping">
      <textarea name="address" rows="4" class="form-control mb-2">{{ $shippingAddress }}</textarea>
      <button type="submit" class="rx-btn-two">Update</button>
    </form>
  </div>
</div>

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
  <!-- Book Room Modal -->
 
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
function editAddress(type) {
    document.getElementById(type + '-address-display').style.display = 'none';
    document.getElementById(type + '-address-form').style.display = 'block';
}
</script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
<!-- Optional Responsive CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">

<!-- jQuery (required for DataTables) -->

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>
<script>
  $(document).ready(function() {
      $('#ordersTable').DataTable({
          responsive: true,
          ordering: true,
          pageLength: 10,
          lengthChange: false,
          language: {
              search: "Search Orders:",
              emptyTable: "No orders available",
              paginate: {
                  previous: "Prev",
                  next: "Next"
              }
          },
          columnDefs: [
              { orderable: false, targets: -1 } // Disable sorting on 'Action' column
          ]
      });
  });
</script>

</body>

</html>