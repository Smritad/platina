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



use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PoliciesController;
use App\Http\Controllers\Frontend\AbouthayagreevasController;
use App\Http\Controllers\Frontend\PlatinaBrndController;
use App\Http\Controllers\Frontend\TeamController;
use App\Http\Controllers\Frontend\ManufacturingController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('admin.authenticate');
Route::get('/logout', [LoginController::class, 'logout'])->name('admin.logout');
Route::get('/change-password', [LoginController::class, 'change_password'])->name('admin.changepassword');
Route::post('/update-password', [LoginController::class, 'updatePassword'])->name('admin.updatepassword');

Route::get('/register', [LoginController::class, 'register'])->name('admin.register');
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




// Frontend
Route::get('/home', [HomeController::class, 'home'])->name('frontend.index');
Route::get('/return-policy', [PoliciesController::class, 'index'])->name('frontend.return');
Route::get('/privacy-policy', [PoliciesController::class, 'privacy'])->name('frontend.privacy');
Route::get('/terms-conditions', [PoliciesController::class, 'termsconditions'])->name('frontend.termsconditions');
Route::get('/about-hayagreevas', [AbouthayagreevasController::class, 'index'])->name('frontend.abouthayagreevas');
Route::get('/platina-brand', [PlatinaBrndController::class, 'index'])->name('frontend.platina-brand');
Route::get('/team', [TeamController::class, 'index'])->name('frontend.team');
Route::get('/manufacturing-unit', [ManufacturingController::class, 'index'])->name('frontend.manufacturing-unit');

