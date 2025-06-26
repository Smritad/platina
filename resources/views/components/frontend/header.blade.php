    <!-- Header -->
    <header>
     <style>.master-category-link {
    color:rgb(157, 126, 84);
 /* or whatever color you want */
    text-decoration: none;
}
.master-category-link:hover {
    color: rgb(157, 126, 84);
 /* hover color */
}
</style>
       <section class="main_menu" id="myHeader">
        <div class="container">
          <div class="row v-center">
            <div class="header-item item-left">
              <div class="logo">
                <a href="{{route('frontend.index') }}"><img src="{{ asset('frontend/assets/img/logo/logo.webp')}}" alt="Platina India"></a>
              </div>
            </div>
            <!-- menu start here -->
            <div class="header-item item-center">
              <div class="menu-overlay"></div>
              <nav class="menu">
                <div class="mobile-menu-head">
                  <div class="go-back"><i class="fa fa-angle-left"></i></div>
                  <div class="current-menu-title"></div>
                  <div class="mobile-menu-close">×</div>
                </div>
                <ul class="menu-main">
                  <li class="menu-item-has-children">
                    <a href="#">About Us <i class="fa fa-angle-down"></i></a>
                    <div class="sub-menu single-column-menu">
                      <ul>
                        <li><a href="{{ route('frontend.abouthayagreevas') }}">About Hayagreevas</a></li>
                        
                        <li><a href="{{ route('frontend.platina-brand') }}">PLATINA INDIA™ </a></li>
                        <li><a href="{{ route('frontend.team') }}">Our Leadership</a></li>
                        <li><a href="{{ route('frontend.manufacturing-unit') }}">Manufacturing Excellence</a></li>
                      </ul>
                    </div>
                  </li>


                  @php
                    $categoriesWithSub = \App\Models\ProductSabCategory::whereNull('sub_product_category.deleted_at')
                        ->join('master_product_category', 'sub_product_category.product_mast_category_id', '=', 'master_product_category.id')
                        ->whereNull('master_product_category.deleted_at')
                        ->get([
          
                          'sub_product_category.id',
                            'sub_product_category.sab_category_name',
                            'sub_product_category.slug as sub_slug',
                            'master_product_category.category_name as master_name',
                            'master_product_category.slug as master_slug',
                            'sub_product_category.product_mast_category_id'
                        ])
                        ->groupBy('product_mast_category_id');
                    @endphp


<li class="menu-item-has-children">
    <a href="{{ route('coming.soon') }}">
        Products <i class="fa fa-angle-down"></i>
    </a>
    <div class="sub-menu mega-menu row mega-menu-column-4 scrollbar" id="style-3">
        <div class="row">
            @foreach($categoriesWithSub as $masterCategoryId => $subCategories)
                @php
                    $masterName = $subCategories->first()->master_name;
                    $masterSlug = \Illuminate\Support\Str::slug($masterName);

                    // Check if product details exist for this master category
                    $masterHasProducts = \Illuminate\Support\Facades\DB::table('product_details')
                        ->where('product_category_id', $masterCategoryId)
                        ->whereNull('deleted_at')
                        ->exists();
                @endphp
                <div class="col-md-3 list-item border-right-one">
                    <h3>
                        <a href="{{ $masterHasProducts ? route('product.category', $masterSlug) : route('coming.soon') }}" class="master-category-link">
                            {{ $masterName }}
                        </a>
                    </h3>

                    <ul>
                        @foreach($subCategories as $sub)
                     
                            @php
                              
                                // Check if product details exist for this sub category
                                $subHasProducts = \Illuminate\Support\Facades\DB::table('product_details')
                                    ->where('product_sab_category_id', $sub->id)
                                    ->whereNull('deleted_at')
                                    ->exists();

                            @endphp
                            <li>
                                <a href="{{ $subHasProducts ? route('product.details', $sub->sub_slug) : route('coming.soon') }}">
                                    {{ $sub->sab_category_name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach

            <div class="col-md-3 list-item border-right-one">
                <div class="menu-img">
                    <img src="{{ asset('frontend/assets/img/home/bedding-menu.jpg') }}" class="img-responsive" alt="Menu Image">
                </div>
            </div>
        </div>
    </div>
</li>

                  <!-- <li><a href="#">Bedding Care</a></li> -->
                                    <li><a href="{{ route('contact.us') }}">Contact Us</a></li>

                </ul>
              </nav>
            </div>
            <!-- menu end here -->
            <div class="header-item header-right-item item-right">
              
              <!-- mobile menu trigger -->
              <div class="mobile-menu-trigger">
                <span></span>
              </div>
                                  

    <ul class="header-top-info">
<!-- <li class="hvr-icon-pop user-dropdown">
    @if (Auth::guard('frontend')->check()) 
        <a href="#">
            <img class="hvr-icon" src="{{ asset('frontend/assets/img/icons/user.png') }}" alt="User Icon"> 
            Welcome, 
            {{ 
                Auth::guard('frontend')->user()->name 
                ?? Str::limit(explode('@', Auth::guard('frontend')->user()->email)[0], 10)
            }}
        </a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('frontend.account') }}">My Account</a></li>
            <li><a href="{{ route('user.logout') }}">Logout</a></li>
        </ul>
    @else
        <a href="#"><img class="hvr-icon" src="{{ asset('frontend/assets/img/icons/user.png') }}" alt="User Icon"></a>
        <ul class="dropdown-menu">
            <li><a href="{{ route('user.login') }}" class="rx-btn-two">Login</a></li>
            <li>Don’t have an account?</li>
            <li><a href="{{ route('user.registration') }}">Register</a></li>
        </ul>
    @endif
</li> -->

     

                @php
    $wishlistCount = 0;

    if (auth('frontend')->check()) {
        $wishlistCount = \App\Models\Wishlist::where('user_id', auth('frontend')->id())->count();
   
    } else {
        $sessionId = session()->getId();
        $hasWishlist = \App\Models\Wishlist::where('session_id', $sessionId)->exists();
        $wishlistCount = $hasWishlist 
            ? \App\Models\Wishlist::where('session_id', $sessionId)->count() 
            : 0;
    }
@endphp

              <!-- <li class="hvr-icon-pop">
                  <a href="{{ route('shows.wishlist') }}">
                      <img class="hvr-icon" src="{{ asset('frontend/assets/img/icons/heart.png') }}">
                      <span class="wishlist-count">{{ $wishlistCount }}</span>
                  </a>
              </li> -->


             

             @php
use App\Models\Cart;

$userId = auth('frontend')->check() ? auth('frontend')->id() : null;
$sessionId = !$userId ? session()->getId() : null;

$cartQuery = Cart::query();

if ($userId) {
    $cartQuery->where('user_id', $userId);
} else {
    $cartQuery->where('session_id', $sessionId);
}

$cartCount = $cartQuery->count();
@endphp

<!-- <li class="hvr-icon-pop">
    <a href="{{ route('show.cart') }}" class="topcart">
        <img class="hvr-icon" src="{{ asset('frontend/assets/img/icons/cart.png') }}">
        <span>{{ $cartCount }}</span>
    </a>
</li> -->

            </ul>

            </div>
          </div>
        </div>
      </section>
    </header>