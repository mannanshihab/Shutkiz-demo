<?php


use App\Livewire\Auth\ForgotPasswordPage;
use App\Livewire\Auth\LoginPage;
use App\Livewire\Auth\RegisterPage;
use App\Livewire\Auth\ResetPasswordPage;
use App\Livewire\BlogDetailsPage;
use App\Livewire\BlogPage;
use App\Livewire\CancelPage;
use App\Livewire\CartPage;
use App\Livewire\CheckoutPage;
use App\Livewire\ContactPage;
use App\Livewire\HomePage;
use App\Livewire\MyOrderDetailsPage;
use App\Livewire\MyOrdersPage;
use App\Livewire\PrivacyPolicyPage;
use App\Livewire\ProductDetailPage;
use App\Livewire\ProductsPage;
use App\Livewire\Recipes;
use App\Livewire\RecipesDetails;
use App\Livewire\ReturnsPage;
use App\Livewire\SuccessPage;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Storage-link
|--------------------------------------------------------------------------
    Route::get('/create-storage-link', function () {
        \Illuminate\Support\Facades\Artisan::call('storage:link');
    });
|
*/

Route::get('/', HomePage::class);
Route::get('/products', ProductsPage::class);
Route::get('/cart', CartPage::class);
Route::get('/products/{slug}', ProductDetailPage::class);
Route::get('/blogs', BlogPage::class);
Route::get('/blogs/{slug}', BlogDetailsPage::class);
Route::get('/recipes', Recipes::class);
Route::get('/contact', ContactPage::class);
Route::get('/returns-policy', ReturnsPage::class);
Route::get('/privacy-policy', PrivacyPolicyPage::class);

Route::middleware('guest')->group(function(){
    Route::get('/login', LoginPage::class)->name('login');
    Route::get('/register', RegisterPage::class);
    Route::get('/forgot', ForgotPasswordPage::class)->name('password.request');
    Route::get('/reset/{token}', ResetPasswordPage::class)->name('password.reset');
});

Route::middleware('auth')->group(function(){
    Route::get('/logout', function(){
        auth()->logout();
        return redirect('/');
    });
    Route::get('/checkout', CheckoutPage::class);
    Route::get('/my-orders', MyOrdersPage::class);
    Route::get('/my-orders/{order_id}', MyOrderDetailsPage::class)->name('my-orders.show');
    Route::get('/success', SuccessPage::class)->name('success');
    Route::get('/cancel', CancelPage::class)->name('cancel');
});