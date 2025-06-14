<!-- Page Body Start-->
 <div class="page-body-wrapper">
        <!-- Page Sidebar Start-->
        <div class="sidebar-wrapper" data-layout="stroke-svg">
          <div class="logo-wrapper"><a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{ asset('admin/assets/images/logo/faviconplatina.webp') }}" alt="" style="max-width: 20% !important;"></a>
		  	<a href="{{ route('admin.dashboard') }}">
				<img class="img-fluid" src="{{ asset('admin/assets/images/logo/platinalogo.jpg') }}" alt="" style="max-width: 65% !important;">
			</a>  
		  <div class="back-btn"><i class="fa fa-angle-left"> </i></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
          </div>
          <div class="logo-icon-wrapper"><a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{ asset('admin/assets/images/logo/faviconplatina.webp') }}" alt="" ></a></div>
          <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
              <ul class="sidebar-links" id="simple-bar">
                <li class="back-btn"><a href="{{ route('admin.dashboard') }}"><img class="img-fluid" src="{{ asset('admin/assets/images/logo/logo-icon.png') }}" alt=""></a>
                  <div class="mobile-back text-end"> <span>Back </span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                </li>
             
                <li class="sidebar-list {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"> </i>
                  <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.dashboard') }}">
                    <svg class="stroke-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-home') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#fill-home') }}"></use>
                    </svg>
                    <span class="lan-3">Dashboard</span>
                  </a>
                </li>

                   <li class="sidebar-list {{ request()->routeIs('banner-details.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"> </i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon"> 
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-icons') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-icons') }}"></use>
                    </svg>
                    <span>Home page</span>
                  </a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{ route('banner-details.index') }}" class="{{ request()->routeIs('banner-details.index') ? 'active' : '' }}">Banner Details</a></li>
                    <li><a href="{{ route('aboutus-details-platina.index') }}" class="{{ request()->routeIs('aboutus-details-platina.index') ? 'active' : '' }}">Aboutus Details Platina</a></li>
                    <li><a href="{{ route('material-details.index') }}" class="{{ request()->routeIs('material-details.index') ? 'active' : '' }}">Material Details</a></li>
                    <li><a href="{{ route('brand-ethos-details.index') }}" class="{{ request()->routeIs('brand-ethos-details.index') ? 'active' : '' }}">Brand Ethos Details</a></li>
                    <li><a href="{{ route('Premium-details.index') }}" class="{{ request()->routeIs('Premium-details.index') ? 'active' : '' }}">Our Premium Collections</a></li>
                    <li><a href="{{ route('testimonials-details.index') }}" class="{{ request()->routeIs('testimonials-details.index') ? 'active' : '' }}">Testimonials</a></li>
                    <li><a href="{{ route('blogs-details.index') }}" class="{{ request()->routeIs('blogs-details.index') ? 'active' : '' }}">Blogs Details</a></li>
                    <li><a href="{{ route('footer-details.index') }}" class="{{ request()->routeIs('footer-details.index') ? 'active' : '' }}">Footer Details</a></li>


                  </ul>
                </li>
                
                <li class="sidebar-list {{ request()->routeIs('return-policy.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"> </i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon"> 
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-icons') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-icons') }}"></use>
                    </svg>
                    <span>Policies</span>
                  </a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{ route('manage-return-policy.index') }}" class="{{ request()->routeIs('return-policy.index') ? 'active' : '' }}">Return Policy</a></li>
                    <li><a href="{{ route('manage-privacy-policy.index') }}" class="{{ request()->routeIs('privacy-policy.index') ? 'active' : '' }}">Privacy Policy</a></li>
                    <li><a href="{{ route('manage-terms-conditions.index') }}" class="{{ request()->routeIs('terms-conditions.index') ? 'active' : '' }}">Terms Conditions</a></li>
                  </ul>
                </li>

                         <li class="sidebar-list {{ request()->routeIs('return-policy.index') ? 'active' : '' }}">
                  <i class="fa fa-thumb-tack"> </i>
                  <a class="sidebar-link sidebar-title" href="#">
                    <svg class="stroke-icon"> 
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-icons') }}"></use>
                    </svg>
                    <svg class="fill-icon">
                      <use href="{{ asset('admin/assets/svg/icon-sprite.svg#stroke-icons') }}"></use>
                    </svg>
                    <span>About</span>
                  </a>
                  <ul class="sidebar-submenu">
                    <li><a href="{{ route('manage-about-hayagreevas.index') }}" class="{{ request()->routeIs('manage-about-hayagreevas.index') ? 'active' : '' }}">About Hayagreevas</a></li>
                     <li><a href="{{ route('manage-platina-brand.index') }}" class="{{ request()->routeIs('manage-platina-brand.index') ? 'active' : '' }}">Platina Brand</a></li>
                     <li><a href="{{ route('manage-team-leadership.index') }}" class="{{ request()->routeIs('manage-team-leadership.index') ? 'active' : '' }}">Team Leadership</a></li>
                     <li><a href="{{ route('manage-manufacturing-unit.index') }}" class="{{ request()->routeIs('manage-manufacturing-unit.index') ? 'active' : '' }}">Manufacturing</a></li>

                  </ul>
                </li>
                    </ul>
                </li>

               

              </ul>
              <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
            </div>
          </nav>
        </div>


        