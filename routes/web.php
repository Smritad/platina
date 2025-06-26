<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

use App\Models\ProductDetails;
use Illuminate\Http\Request;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\UserDetailsController;
use App\Http\Controllers\Backend\UserPermissionsController;
use App\Http\Controllers\Backend\home\BannerDetailsController;
use App\Http\Controllers\Backend\home\AboutusDetailsDetailsController;
use App\Http\Controllers\Backend\home\BrandEthosDetailsDetailsController;
use App\Http\Controllers\Backend\home\PremiumDetailsController;
use App\Http\Controllers\Backend\home\TestimonialsDetailsController;
use App\Http\Controllers\Backend\home\MaterialsDetailsController;
use App\Http\Controllers\Backend\home\BlogsDetailsController;
use App\Http\Controllers\Backend\home\FooterDetailsController;
use App\Http\Controllers\Backend\home\ReturnPolicyDetailsController;
use App\Http\Controllers\Backend\home\PrivacyPolicyDetailsController;
use App\Http\Controllers\Backend\home\TermsConditionsDetailsController;
use App\Http\Controllers\Backend\about\AboutHayagreevasDetailsController;
use App\Http\Controllers\Backend\about\PlatinaBrandDetailsController;
use App\Http\Controllers\Backend\about\TeamLeadershipDetailsController;
use App\Http\Controllers\Backend\about\ManufacturingUnitDetailsController ;
use App\Http\Controllers\Backend\seo\SeoManagementController ;
use App\Http\Controllers\Backend\ProductCategoryController;
use App\Http\Controllers\Backend\ProductSubCategoryController;
use App\Http\Controllers\Backend\AgeCategoryController;
use App\Http\Controllers\Backend\FabricTypeController;
use App\Http\Controllers\Backend\SizeController;
use App\Http\Controllers\Backend\ProductContentController;
use App\Http\Controllers\Backend\ProductDetailsController;



use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\RegisterController;
use App\Http\Controllers\Frontend\LoginDetailsController;
use App\Http\Controllers\Frontend\PoliciesController;
use App\Http\Controllers\Frontend\AbouthayagreevasController;
use App\Http\Controllers\Frontend\PlatinaBrndController;
use App\Http\Controllers\Frontend\TeamController;
use App\Http\Controllers\Frontend\ManufacturingController;
use App\Http\Controllers\Frontend\AllProductsController;
use App\Http\Controllers\Frontend\ProductsListingDetailsController;
use App\Http\Controllers\Frontend\CategoryProductsDetailsController;
use App\Http\Controllers\Frontend\ForgotPasswordController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CategoryProductsListingDetailsController;
use App\Http\Controllers\Frontend\ComingSoonController;
use App\Http\Controllers\Frontend\ConnectUsController;
use App\Http\Controllers\Frontend\ContactController;


// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/admin-login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/admin-logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::get('/change-password', [LoginController::class, 'change_password'])->name('admin.changepassword');
Route::post('/update-password', [LoginController::class, 'updatePassword'])->name('admin.updatepassword');

Route::get('/admin-register', [LoginController::class, 'register'])->name('admin.register');
Route::post('/register', [LoginController::class, 'authenticate_register'])->name('admin.register.authenticate');
    
// // Admin Routes with Middleware
Route::group(['middleware' => ['auth:web', \App\Http\Middleware\PreventBackHistoryMiddleware::class]], function () {
        Route::get('/dashboard', function () {
            return view('backend.dashboard'); 
        })->name('admin.dashboard');
});
Route::resource('banner-details', BannerDetailsController::class);
Route::resource('aboutus-details-platina', AboutusDetailsDetailsController::class);
Route::resource('brand-ethos-details', BrandEthosDetailsDetailsController::class);
Route::resource('Premium-details', PremiumDetailsController::class);
Route::resource('testimonials-details', TestimonialsDetailsController::class);
Route::resource('material-details', MaterialsDetailsController::class);
Route::resource('blogs-details', BlogsDetailsController::class);
Route::resource('footer-details', FooterDetailsController::class);
Route::resource('manage-return-policy', ReturnPolicyDetailsController::class);
Route::resource('manage-privacy-policy', PrivacyPolicyDetailsController::class);
Route::resource('manage-terms-conditions', TermsConditionsDetailsController::class);
Route::resource('manage-about-hayagreevas', AboutHayagreevasDetailsController::class);
Route::resource('manage-platina-brand', PlatinaBrandDetailsController::class);
Route::resource('manage-team-leadership', TeamLeadershipDetailsController::class);
Route::resource('manage-manufacturing-unit', ManufacturingUnitDetailsController ::class);
Route::resource('seo-tags', SeoManagementController ::class);
Route::resource('product-category', ProductCategoryController::class);
Route::resource('product-subcategory', ProductSubCategoryController::class);
Route::resource('age-group', AgeCategoryController::class);
Route::resource('fabric-type', FabricTypeController::class);
Route::resource('product-size', SizeController::class);
Route::resource('product-content', ProductContentController::class);
Route::resource('product-details', ProductDetailsController::class);




// Frontend
Route::get('/test', [HomeController::class, 'home'])->name('frontend.index');
// registeration
Route::get('/register', [RegisterController::class, 'register'])->name('user.registration');
Route::post('/register', [RegisterController::class, 'authenticate_register'])->name('registration.store');

 //===== Login Page
Route::get('/user-login', [RegisterController::class, 'login'])->name('user.login');
Route::post('/user-login', [RegisterController::class, 'authenticate_login'])->name('login.store');



Route::get('/logout', [RegisterController::class, 'logout'])->name('user.logout');
Route::get('/my-account', function() {
    return view('frontend.my_account'); // Create this blade or link to actual account page
})->name('frontend.account');

//===== Checkout Page Login Functionality
    Route::post('/checkout-register', [RegistrationController::class, 'authenticate_checkout_register'])->name('login.authenticate');

//======== Send OTP
    Route::post('/send-otp', [CheckoutController::class, 'sendOtp'])->name('send.otp');
    Route::post('/verify-otp', [CheckoutController::class, 'verifyOtp'])->name('verify.otp');

Route::get('/forgot-password', [ForgotPasswordController::class, 'forgot_password'])->name('user.forgotpassword');
Route::post('/forgot-password', [ForgotPasswordController::class, 'update_password'])->name('user.updatepassword');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'reset_password'])->name('user.resetpassword');
Route::post('/reset-password', [ForgotPasswordController::class, 'update_reset_password'])->name('user.resetpassword.update');
Route::get('/contact-us', [ContactController::class, 'index'])->name('contact.us');
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');


Route::get('/return-policy', [PoliciesController::class, 'index'])->name('frontend.return');
Route::get('/privacy-policy', [PoliciesController::class, 'privacy'])->name('frontend.privacy');
Route::get('/terms-conditions', [PoliciesController::class, 'termsconditions'])->name('frontend.termsconditions');
Route::get('/about-hayagreevas', [AbouthayagreevasController::class, 'index'])->name('frontend.abouthayagreevas');
Route::get('/platina-brand', [PlatinaBrndController::class, 'index'])->name('frontend.platina-brand');
Route::get('/team', [TeamController::class, 'index'])->name('frontend.team');
Route::get('/manufacturing-unit', [ManufacturingController::class, 'index'])->name('frontend.manufacturing-unit');
Route::get('/products', [AllProductsController::class, 'index'])->name('product.all');
Route::get('/category/{slug}', [CategoryProductsListingDetailsController::class, 'index'])->name('product.category');

Route::get('/products/{slug}', [ProductsListingDetailsController::class, 'index'])->name('product.details');
Route::get('/products-details/{catSlug}/{productSlug}', [CategoryProductsDetailsController::class, 'index'])->name('product.categoryproduct');

Route::get('add-to-cart/{id}', [CartController::class, 'addToCart'])->name('add.to.cart');
Route::get('show-cart', [CartController::class, 'showCart'])->name('show.cart');
Route::delete('remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('remove.from.cart');
Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('show.checkout');
Route::post('/cart/store-checkout-data', [CheckoutController::class, 'storeCheckoutData'])->name('cart.storeCheckoutData');


Route::post('/connect-us/send', [ConnectUsController::class, 'send'])->name('connect.us.send');
Route::post('/thankyou', [ThankyouController::class, 'index'])->name('Thank.you');


Route::post('/buy-now', [CartController::class, 'buyNow'])->name('buy.now');
Route::get('/buy-now/checkout', [CartController::class, 'showBuyNowCheckout'])->name('show.buy.now.checkout');




Route::get('/wishlist', [WishlistController::class, 'index'])->name('shows.wishlist');
Route::get('/wishlist/add/{id}', [WishlistController::class, 'add'])->name('wishlist.add');
Route::get('/wishlist/remove/{id}', [WishlistController::class, 'remove'])->name('wishlist.remove');

Route::get('/coming-soon', [ComingSoonController::class, 'index'])->name('coming.soon');
