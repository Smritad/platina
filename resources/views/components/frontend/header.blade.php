    <!-- Header -->
    <header>
      <!-- <section class="topbar-section">
        <div class="container">
          <div class="row row-mb">
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
              <div class="social-links">
                <span>Follow Us:</span>
                <ul>
                  <a href="#"><i class="hvr-bounce-in fa fa-facebook-f"></i></a>
                  <a href="#"><i class="hvr-bounce-in fa fa-instagram"></i></a>
                  <a href="#"><i class="hvr-bounce-in fa fa-linkedin"></i></a>
                </ul>
              </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col">
              <div class="topbar-info">
                <ul>
                  <li><img src="assets/img/icons/phone.webp"> <a href="tel:+91 98765 43210">+91 98765 43210</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </section> -->
       <section class="main_menu" id="myHeader">
        <div class="container">
          <div class="row v-center">
            <div class="header-item item-left">
              <div class="logo">
                <a href="index.html"><img src="{{ asset('frontend/assets/img/logo/logo.webp')}}" alt="Platina India"></a>
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
                        <li><a href="#">About Hayagreevas</a></li>
                        <li><a href="#">The PLATINA India Brand </a></li>
                        <li><a href="#">Our Leadership</a></li>
                        <li><a href="#">Manufacturing Excellence</a></li>
                      </ul>
                    </div>
                  </li>

                  <li class="menu-item-has-children">
                    <a href="#">Products <i class="fa fa-angle-down"></i></a>
                    <div class="sub-menu mega-menu row mega-menu-column-4 scrollbar" id="style-3">
                      <div class="row">
                        <div class="col-md-3 list-item border-right-one">
                          <h3>Bedding</h3>
                          <ul>
                            <li><a href="#">Bed Sheet</a></li>
                            <li><a href="#">Pillow Covers</a></li>
                            <li><a href="#">Quilt Set</a></li>
                            <li><a href="#">Comforter Set</a></li>
                            <li><a href="#">Bed Covers</a></li>
                            <li><a href="#">Cover Let</a></li>
                            <li><a href="#">Duvet Cover Set</a></li>
                          </ul>
                        </div>

                        <div class="col-md-3 list-item border-right-one">
                          <h3>Living</h3>
                          <ul>
                            <li><a href="#">Cushion Cover</a></li>
                            <li><a href="#">Bolster Cover</a></li>
                          </ul>
                        </div>

                        <div class="col-md-3 list-item border-right-one">
                          <h3>Table Linen</h3>
                          <ul>
                            <li><a href="#">Table Cover</a></li>
                            <li><a href="#">Table Napkins</a></li>
                            <li><a href="#">Cocktail Napkins</a></li>
                            <li><a href="#">Table Runner</a></li>
                            <li><a href="#">Table Set</a></li>
                            <li><a href="#">Place Mats</a></li>
                          </ul>
                        </div>
                        <div class="col-md-3 list-item border-right-one">
                          <div class="menu-img">
                            <img src="{{ asset('frontend/assets/img/home/bedding-menu.jpg')}}" class="img-responsive">
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>



                  <!-- <li class="menu-item-has-children">
                    <a href="#">Bedding <i class="fa fa-angle-down"></i></a>
                    <div class="sub-menu mega-menu row mega-menu-column-4 scrollbar" id="style-3">
                      <div class="row">
                        <div class="col-md-3 list-item border-right-one">
                          <h3>Products</h3>
                          <ul>
                            <li><a href="#">Bed Sheets</a></li>
                            <li><a href="#">Comforters</a></li>
                            <li><a href="#">Quilts</a></li>
                            <li><a href="#">Duvet Covers</a></li>
                            <li><a href="#">Pillow Covers</a></li>
                            <li><a href="#">Cushion Covers</a></li>
                            <li><a href="#">Quilt Sets</a></li>
                            <li><a href="#">Duvet Cover Sets</a></li>
                            <li><a href="#">Dohars</a></li>
                            <li><a href="#">Trousseau Set</a></li>
                          </ul>
                        </div>
                        <div class="col-md-3 list-item border-right-one">
                          <h3>Materials</h3>
                          <ul>
                            <li><a href="#">Giza 45 Cotton</a></li>
                            <li><a href="#">100 % Cotton</a></li>
                            <li><a href="#">Percale</a></li>
                            <li><a href="#">Sateen</a></li>
                            <li><a href="#">Jacquard</a></li>
                            <li><a href="#">Linen</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 list-item">
                          <div class="menu-img">
                            <img src="assets/img/home/bedding-menu.jpg" class="img-responsive">
                          </div>
                        </div>
                      </div>
                    </div>
                  </li>


                  <li class="menu-item-has-children">
                    <a href="#">Table <i class="fa fa-angle-down"></i></a>
                    <div class="sub-menu mega-menu row mega-menu-column-4 scrollbar" id="style-3">
                      <div class="row">
                        <div class="col-md-3 list-item border-right-one">
                          <h3>Products</h3>
                          <ul>
                            <li><a href="#">Table Cloth</a></li>
                            <li><a href="#">Table Napkins</a></li>
                          </ul>
                        </div>
                        <div class="col-md-3 list-item border-right-one">
                          <h3>Materials</h3>
                          <ul>
                            <li><a href="#">Giza 45 Cotton</a></li>
                            <li><a href="#">100 % Cotton</a></li>
                            <li><a href="#">Percale</a></li>
                            <li><a href="#">Sateen</a></li>
                            <li><a href="#">Jacquard</a></li>
                            <li><a href="#">Linen</a></li>
                          </ul>
                        </div>
                        <div class="col-md-6 list-item">
                          <div class="menu-img">
                            <img src="assets/img/home/table-menu.jpg" class="img-responsive">
                          </div>
                        </div>
                      </div>
                    </div>
                  </li> -->


                  <li><a href="#">Bedding Care</a></li>
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
                <li class="hvr-icon-pop">
                  <a href="#"><img class="hvr-icon" src="{{ asset('frontend/assets/img/icons/user.png')}}"></a>
                </li>
                <li class="hvr-icon-pop">
                  <a href="#"><img class="hvr-icon" src="{{ asset('frontend/assets/img/icons/heart.png')}}"></a>
                </li>
                <li class="hvr-icon-pop">
                  <a href="#" class="topcart"><img class="hvr-icon" src="{{ asset('frontend/assets/img/icons/cart.png')}}"> <span>0</span></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>
    </header>