<?php

use App\Http\Livewire\Admin\AdminCarouselSlidersComponent;
use App\Http\Livewire\Admin\AdminContactUsComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminGeneralCategoryComponent;
use App\Http\Livewire\Admin\AdminJobCategoryComponent;
use App\Http\Livewire\Admin\AdminPropertyCategoryComponent;
use App\Http\Livewire\Admin\AdminSiteSettingComponent;
use App\Http\Livewire\Admin\AdminUserComponent;
use App\Http\Livewire\Admin\BuyerAd\AdminGeneralAdComponent as BuyerAdAdminGeneralAdComponent;
use App\Http\Livewire\Admin\BuyerAd\AdminJobAdComponent as BuyerAdAdminJobAdComponent;
use App\Http\Livewire\Admin\BuyerAd\AdminPropertyAdComponent as BuyerAdAdminPropertyAdComponent;
use App\Http\Livewire\Admin\SellerAd\AdminGeneralAdComponent;
use App\Http\Livewire\Admin\SellerAd\AdminJobAdComponent;
use App\Http\Livewire\Admin\SellerAd\AdminPropertyAdComponent;
use App\Http\Livewire\Home\BuyerAd\BuyerAdComponent;
use App\Http\Livewire\Home\BuyerAd\BuyerAdDetailsComponent;
use App\Http\Livewire\Home\BuyerAd\BuyerAdHeaderSearchComponent;
use App\Http\Livewire\Home\Profile\ChangePasswordComponent;
use App\Http\Livewire\Home\ContactUsComponent;
use App\Http\Livewire\Home\Profile\ProfileComponent;
use App\Http\Livewire\Home\HomeComponent;
use App\Http\Livewire\Home\PostAdComponent;
use App\Http\Livewire\Home\SellerAd\SellerAdComponent;
use App\Http\Livewire\Home\SellerAd\SellerAdDetailsComponent;
use App\Http\Livewire\Home\SellerAd\SellerAdHeaderSearchComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', HomeComponent::class)->name('home');

Route::get('/seller_ad', SellerAdComponent::class)->name('seller_ad');

Route::get('/buyer_ad', BuyerAdComponent::class)->name('buyer_ad');

Route::get('/contact_us', ContactUsComponent::class)->name('contact_us');

Route::get('/seller_ad/{seller_ad_id}', SellerAdDetailsComponent::class)->name('seller_ad.details'); 

Route::get('/buyer_ad/{buyer_ad_id}', BuyerAdDetailsComponent::class)->name('buyer_ad.details');

Route::get('/search/buyer_ad', BuyerAdHeaderSearchComponent::class)->name('search.buyer_ad');

Route::get('/search/seller_ad', SellerAdHeaderSearchComponent::class)->name('search.seller_ad');


// For logged Normal User
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    
    Route::get('/profile', ProfileComponent::class)->name('profile');

    Route::get('/profile/change_password', ChangePasswordComponent::class)->name('profile.change_password');

    Route::get('/post_ad', PostAdComponent::class)->name('post_ad');
});

// For logged Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

    Route::get('/admin/users', AdminUserComponent::class)->name('admin.users');

    Route::get('/admin/categories/general', AdminGeneralCategoryComponent::class)->name('admin.categories.general');

    Route::get('/admin/categories/property', AdminPropertyCategoryComponent::class)->name('admin.categories.property');

    Route::get('/admin/categories/job', AdminJobCategoryComponent::class)->name('admin.categories.job');

    Route::get('/admin/carousel_sliders', AdminCarouselSlidersComponent::class)->name('admin.carousel_sliders');

    Route::get('/admin/seller_ad/general_ad', AdminGeneralAdComponent::class)->name('admin.seller_ad.general_ad');

    Route::get('/admin/seller_ad/property_ad', AdminPropertyAdComponent::class)->name('admin.seller_ad.property_ad');

    Route::get('/admin/seller_ad/job_ad', AdminJobAdComponent::class)->name('admin.seller_ad.job_ad');

    Route::get('/admin/buyer_ad/general_ad', BuyerAdAdminGeneralAdComponent::class)->name('admin.buyer_ad.general_ad');

    Route::get('/admin/buyer_ad/property_ad', BuyerAdAdminPropertyAdComponent::class)->name('admin.buyer_ad.property_ad');

    Route::get('/admin/buyer_ad/job_ad', BuyerAdAdminJobAdComponent::class)->name('admin.buyer_ad.job_ad');

    Route::get('/admin/contact_us', AdminContactUsComponent::class)->name('admin.contact_us');

    Route::get('/admin/site_setting', AdminSiteSettingComponent::class)->name('admin.site_setting');

});