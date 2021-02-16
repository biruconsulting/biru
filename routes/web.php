<?php

use App\Http\Controllers\SellerAdPostController;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminGeneralCategoryComponent;
use App\Http\Livewire\Admin\AdminJobCategoryComponent;
use App\Http\Livewire\Admin\AdminPropertyCategoryComponent;
use App\Http\Livewire\Admin\AdminUserComponent;
use App\Http\Livewire\BuyerAdComponent;
use App\Http\Livewire\ContactUsComponent;
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\PostAdComponent;
use App\Http\Livewire\SellerAdComponent;
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

Route::post('/seller_ad/post', [SellerAdPostController::class, 'store'])->name('seller_ad.post');

Route::get('/post_ad', PostAdComponent::class)->name('post_ad');


// For Normal User
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    //
});

// For Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');

    Route::get('/admin/users', AdminUserComponent::class)->name('admin.users');

    Route::get('/admin/categories/general', AdminGeneralCategoryComponent::class)->name('admin.categories.general');

    Route::get('/admin/categories/property', AdminPropertyCategoryComponent::class)->name('admin.categories.property');

    Route::get('/admin/categories/job', AdminJobCategoryComponent::class)->name('admin.categories.job');
});