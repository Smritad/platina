@php
  $footer = DB::table('footer_details')->first();
  $socialLinks = isset($footer->social_links) ? explode(',', $footer->social_links) : [];
@endphp

<footer>
  <div class="rx-main-footer padding-tb-100">
    <div class="container">
      <div class="row mb-minus-24">
        <div class="col-lg-3 col-sm-6 col-12 mb-24 footer-order-1">
          <div class="rx-social-media">
            <div class="rx-logo">
              <img src="{{ asset('uploads/footer/' . ($footer->logo ?? 'default-logo.png')) }}" alt="logo">
            </div>
            <div class="inner-contact">
              <p>{{ $footer->description ?? '' }}</p>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-6 col-420-full mb-24 footer-order-2">
          <div class="rx-footer-items">
            <div class="rx-items-heading">
              <h4>Explore</h4>
            </div>
            <div class="rx-items-contact">
              <ul>
                <li><a href="#" class="line-hover">FAQ’s</a></li>
                <li><a href="{{ route('frontend.privacy') }}" class="line-hover">Privacy Policy</a></li>
                <li><a href="{{ route('frontend.termsconditions') }}" class="line-hover">Terms & Condition</a></li>
                <li><a href="{{ route('frontend.return') }}" class="line-hover">Return & Refund Policy</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-6 col-420-full mb-24 footer-order-3">
          <div class="rx-footer-items">
            <div class="rx-items-heading">
              <h4>Materials</h4>
            </div>
            <div class="rx-items-contact">
              <ul>
                <li><a href="#">Giza 45 Cotton</a></li>
                <li><a href="#">100 % Cotton</a></li>
                <li><a href="#">Percale</a></li>
                <li><a href="#">Sateen</a></li>
                <li><a href="#">Jacquard</a></li>
                <li><a href="#">Linen</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-2 col-sm-4 col-6 col-420-full mb-24 footer-order-4">
          <div class="rx-footer-items">
            <div class="rx-items-heading">
              <h4>Best Seller</h4>
            </div>
            <div class="rx-items-contact">
              <ul>
                <li><a href="#">Bed Sheets</a></li>
                <li><a href="#">Comforters</a></li>
                <li><a href="#">Quilts</a></li>
                <li><a href="#">Duvet Covers</a></li>
                <li><a href="#">Pillow Covers</a></li>
                <li><a href="#">Cushion Covers</a></li>
                <li><a href="#">Quilt Sets</a></li>
              </ul>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-6 col-420-full mb-24 footer-order-5">
          <div class="rx-footer-other-info">
            <div class="inner-info">
              <h5>Address</h5>
              <p>{{ $footer->address ?? '' }}</p>
            </div>
            <div class="inner-info">
              <h5>Mail</h5>
              <a href="mailto:{{ $footer->email ?? '' }}">{{ $footer->email ?? '' }}</a>
            </div>
            <div class="inner-info">
              <h5>Phone No</h5>
              <a href="tel:{{ $footer->phone ?? '' }}">{{ $footer->phone ?? '' }}</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="rx-footer-copy">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="rx-footer-inner-contact">
            <div class="rx-footer-left-side-contact">
              <p>Copyright © 2025 Platina India. All rights reserved. Designed By 
                <a href="http://www.matrixbricks.com" target="_blank">Matrix Bricks</a>
              </p>
            </div>
            <div class="rx-footer-last-logo">
              @php
                $icons = ['fa-facebook', 'fa-instagram', 'fa-linkedin', 'fa-twitter'];
              @endphp
              
              @foreach ($socialLinks as $key => $link)
                @if (!empty($link))
                  <div class="rx-inner-footer-logo">
                    <a href="{{ $link }}" target="_blank">
                      <i class="fa {{ $icons[$key] ?? 'fa-globe' }}"></i>
                    </a>
                  </div>
                @endif
              @endforeach

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
