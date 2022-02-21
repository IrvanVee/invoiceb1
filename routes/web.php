<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\DarkModeController;

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

Route::get('dark-mode-switcher', [DarkModeController::class, 'switch'])->name('dark-mode-switcher');

Route::middleware('loggedin')->group(function() {
    Route::get('login', [AuthController::class, 'loginView'])->name('login-view');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'registerView'])->name('register-view');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function() {
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/', [PageController::class, 'dashboardOverview1'])->name('dashboard-overview-1');
    // Route::get('dashboard-overview-2-page', [PageController::class, 'dashboardOverview2'])->name('dashboard-overview-2');
    // Route::get('dashboard-overview-3-page', [PageController::class, 'dashboardOverview3'])->name('dashboard-overview-3');
    // Route::get('inbox-page', [PageController::class, 'inbox'])->name('inbox');
    // Route::get('file-manager-page', [PageController::class, 'fileManager'])->name('file-manager');
    // Route::get('point-of-sale-page', [PageController::class, 'pointOfSale'])->name('point-of-sale');
    // Route::get('chat-page', [PageController::class, 'chat'])->name('chat');
    // Route::get('post-page', [PageController::class, 'post'])->name('post');
    Route::get('calendar-page', [PageController::class, 'calendar'])->name('calendar');
    Route::get('invoice-list-page', [PageController::class, 'invoiceList'])->name('invoice-list');
    Route::get('invoice-form-page', [PageController::class, 'invoiceForm'])->name('invoice-form');
    Route::get('quote-list-page', [PageController::class, 'quoteList'])->name('quote-list');
    Route::get('quote-form-page', [PageController::class, 'quoteForm'])->name('quote-form');
    Route::get('findProductName', [PageController::class, 'findProductName'])->name('findProductName');
    Route::get('findPrice', [PageController::class, 'findPrice'])->name('findPrice');
    Route::post('qoute-list-page/store',[PageController::class,'quoteStore'])->name('quote-store');
    Route::get('quote-detail/{id}',[PageController::class,'quoteshow'])->name('quote-detail');
    Route::get('quote-edit/edit/{id}',[PageController::class,'quotesedit'])->name('quote-edit');
    Route::patch('quote-update/{id}',[PageController::class,'quotesupdate'])->name('quote-update');
    Route::delete('/quotation-list-page/delete/{id}',[PageController::class,'quotationdelete'])->name('quote-delete');

    // CUSTOMER SET
    Route::get('customers-form-page', [PageController::class, 'usersLayout1'])->name('users-layout-1');
    Route::get('customers-list-page', [PageController::class, 'usersLayout2'])->name('users-layout-2');
    Route::get('customers-list-page/edit/{id}', [PageController::class, 'customerEdit'])->name('customer-edit');
    Route::put('customers-list-page/update/{id}', [PageController::class, 'customerUpdate'])->name('customer-update'); 
    Route::post('customers-list-page/store', [PageController::class, 'customerStore'])->name('customer-store');
    Route::get('customers-list-page/delete/{id}', [PageController::class, 'customerDelete'])->name('customer-delete');
    // END CUSTOMER

    // USER SET
    Route::get('users-form-page', [PageController::class, 'usersLayout3'])->name('users-layout-3');
    Route::get('users-list-page', [PageController::class, 'usersLayout4'])->name('users-layout-4');
    Route::get('users-list-page/edit/{id}', [PageController::class, 'usersEdit'])->name('users-edit');
    Route::put('users-list-page/update/{id}', [PageController::class, 'usersUpdate'])->name('users-update');
    Route::post('users-list-page/store', [PageController::class, 'usersStore'])->name('users-store');
    Route::get('users-list-page/delete/{id}', [PageController::class, 'usersDelete'])->name('users-delete');
    // END USER

    // PRODUCT SET
    Route::get('product-form-page', [PageController::class, 'profileOverview1'])->name('profile-overview-1');
    Route::get('product-list-page', [PageController::class, 'profileOverview2'])->name('profile-overview-2');
    Route::get('product-list-page/edit/{id}', [PageController::class, 'productEdit'])->name('product-edit');
    Route::put('product-list-page/update/{id}', [PageController::class, 'productUpdate'])->name('product-update');
    Route::post('product-list-page/store', [PageController::class, 'productStore'])->name('product-store');
    Route::get('product-list-page/delete/{id}', [PageController::class, 'productDelete'])->name('product-delete');
    //END PRODUCT

    // TAX SET
    Route::get('tax-form-page', [PageController::class, 'taxForm'])->name('tax-form');
    Route::get('tax-list-page', [PageController::class, 'taxList'])->name('tax-list');
    Route::get('tax-list-page/edit/{id}', [PageController::class, 'taxEdit'])->name('tax-edit');
    Route::put('tax-list-page/update/{id}', [PageController::class, 'taxUpdate'])->name('tax-update');
    Route::post('tax-list-page/store', [PageController::class, 'taxStore'])->name('tax-store');
    Route::get('tax-list-page/delete/{id}', [PageController::class, 'taxDelete'])->name('tax-delete');
    // END TAX

    // DISCOUNT SET
    Route::get('discount-form-page', [PageController::class, 'discountForm'])->name('discount-form');
    Route::get('discount-list-page', [PageController::class, 'discountList'])->name('discount-list');
    Route::get('discount-list-page/edit/{id}', [PageController::class, 'discountEdit'])->name('discount-edit');
    Route::put('discount-list-page/update/{id}', [PageController::class, 'discountUpdate'])->name('discount-update');
    Route::post('discount-list-page/store', [PageController::class, 'discountStore'])->name('discount-store');
    Route::get('discount-list-page/delete/{id}', [PageController::class, 'discountDelete'])->name('discount-delete');
    // END DISCOUNT

    // Route::get('profile-overview-3-page', [PageController::class, 'profileOverview3'])->name('profile-overview-3');
    Route::get('wizard-layout-1-page', [PageController::class, 'wizardLayout1'])->name('wizard-layout-1');
    Route::get('wizard-layout-2-page', [PageController::class, 'wizardLayout2'])->name('wizard-layout-2');
    Route::get('wizard-layout-3-page', [PageController::class, 'wizardLayout3'])->name('wizard-layout-3');
    Route::get('blog-layout-1-page', [PageController::class, 'blogLayout1'])->name('blog-layout-1');
    Route::get('blog-layout-2-page', [PageController::class, 'blogLayout2'])->name('blog-layout-2');
    Route::get('blog-layout-3-page', [PageController::class, 'blogLayout3'])->name('blog-layout-3');
    Route::get('pricing-layout-1-page', [PageController::class, 'pricingLayout1'])->name('pricing-layout-1');
    Route::get('pricing-layout-2-page', [PageController::class, 'pricingLayout2'])->name('pricing-layout-2');
    Route::get('invoice-layout-1-page', [PageController::class, 'invoiceLayout1'])->name('invoice-layout-1');
    Route::get('invoice-layout-2-page', [PageController::class, 'invoiceLayout2'])->name('invoice-layout-2');
    Route::get('faq-layout-1-page', [PageController::class, 'faqLayout1'])->name('faq-layout-1');
    Route::get('faq-layout-2-page', [PageController::class, 'faqLayout2'])->name('faq-layout-2');
    Route::get('faq-layout-3-page', [PageController::class, 'faqLayout3'])->name('faq-layout-3');
    Route::get('login-page', [PageController::class, 'login'])->name('login');
    Route::get('register-page', [PageController::class, 'register'])->name('register');
    Route::get('error-page-page', [PageController::class, 'errorPage'])->name('error-page');
    Route::get('update-profile-page', [PageController::class, 'updateProfile'])->name('update-profile');
    Route::get('change-password-page', [PageController::class, 'changePassword'])->name('change-password');
    Route::get('regular-table-page', [PageController::class, 'regularTable'])->name('regular-table');
    Route::get('tabulator-page', [PageController::class, 'tabulator'])->name('tabulator');
    Route::get('modal-page', [PageController::class, 'modal'])->name('modal');
    Route::get('slide-over-page', [PageController::class, 'slideOver'])->name('slide-over');
    Route::get('notification-page', [PageController::class, 'notification'])->name('notification');
    Route::get('accordion-page', [PageController::class, 'accordion'])->name('accordion');
    Route::get('button-page', [PageController::class, 'button'])->name('button');
    Route::get('alert-page', [PageController::class, 'alert'])->name('alert');
    Route::get('progress-bar-page', [PageController::class, 'progressBar'])->name('progress-bar');
    Route::get('tooltip-page', [PageController::class, 'tooltip'])->name('tooltip');
    Route::get('dropdown-page', [PageController::class, 'dropdown'])->name('dropdown');
    Route::get('typography-page', [PageController::class, 'typography'])->name('typography');
    Route::get('icon-page', [PageController::class, 'icon'])->name('icon');
    Route::get('loading-icon-page', [PageController::class, 'loadingIcon'])->name('loading-icon');
    Route::get('regular-form-page', [PageController::class, 'regularForm'])->name('regular-form');
    Route::get('datepicker-page', [PageController::class, 'datepicker'])->name('datepicker');
    Route::get('tail-select-page', [PageController::class, 'tailSelect'])->name('tail-select');
    Route::get('file-upload-page', [PageController::class, 'fileUpload'])->name('file-upload');
    Route::get('wysiwyg-editor-page', [PageController::class, 'wysiwygEditor'])->name('wysiwyg-editor');
    Route::get('validation-page', [PageController::class, 'validation'])->name('validation');
    Route::get('chart-page', [PageController::class, 'chart'])->name('chart');
    Route::get('slider-page', [PageController::class, 'slider'])->name('slider');
    Route::get('image-zoom-page', [PageController::class, 'imageZoom'])->name('image-zoom');

    
});


