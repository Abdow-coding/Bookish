<?php

use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserOrders;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KashierPaymentController;

Route::get('/', function () {
    return view('Home');
});



Route::get('/Home', function () {
    return view('Home');
})->name('Home');
Route::middleware('auth')->group(function(){
Route::get('/Sell',function(){
    return view('Sell_page');
})->name('sell');

Route::post('/SellBook', [ProductsController::class,'sell'])->name('sellBook');
Route::get('/MyBooks', [ProductsController::class,'listing'])->name('myListings');
});
#--------------------Blogs Routes------------------------------#
Route::get('/Blog', [StoryController::class, 'index'])
    ->name('blog');

Route::get('/Blog/{slug}', [StoryController::class, 'show'])
    ->name('story.show');
#------------------------------------------------------------------------#
Route::get('/contact',function(){
    return view('contact_us');
})->name('contact');

Route::middleware('auth')->group(function(){
    Route::post('/contact', [ContactController::class, 'send'])
    ->name('contact.send');
});


#---------------------- Shop and One Produt --------------------#
Route::get('/Shop',[ProductsController::class,'show'])->name('shop');
    Route::get('/search',[ProductsController::class,'search'])->name('searchProducts');
Route::middleware('auth')->group(function () {
Route::get('/OneProduct/{id}',[ProductsController::class,'details'])->name('OneProduct');
});
#---------------------------------------------------------------------------------------------#






#-------------- Registration Routes --------------------------------#
Route::get('/Registration',function(){
    return view('registration');
})->name('register');

Route::post('/store',[AuthController::class,'store'])->name('storeAccount');

#-------------- Login Routes --------------------------------#
Route::get('/login',function(){
    return view('login');
})->name('login');


Route::post('/login',[AuthController::class,'login'])->name('loginAccount');

#------------------------- Log out Routes-----------------------------#
Route::post('/logout',[AuthController::class,'logout'])->name('logout');
#-------------------------Admin page Routes----------------------------#
Route::middleware(['auth', 'admin'])->prefix('/Admin')->group(function () {

Route::get('/Products',[ProductsController::class,'index'])->name('Product');
Route::post('/Products/search', [ProductsController::class, 'search'])
    ->name('admin.products.search');

Route::get('/UsedPoduct',[ProductsController::class,'Usedbooks'])->name('UsedProduct');


Route::get('/AddProduct',[ProductsController::class,'create'])->name('Add_product');
Route::post('/StoreProduct',[ProductsController::class,'store'])->name('storeProducts');

Route::get('/EditProduct/{id}',[ProductsController::class,'edit'])->name('Edit_product');
Route::post('/UpdateProduct/{id}',[ProductsController::class,'update'])->name('UpdateProducts');
Route::get('/DeleteProduct/{id}',[ProductsController::class,'destroy'])->name('delete_product');
#--------------------------------------------------------------------------------------------------#
Route::get('/Orders',[AdminOrderController::class,'index'])->name('Order.admin');
Route::patch('Orders/{id}/status', [AdminOrderController::class, 'updateStatus'])
    ->name('admin.orders.updateStatus');
Route::get('/Users', [UserOrders::class, 'showUsers'])
    ->name('Admin.Users');
#-------------------------------------------------------------------------------------------------------#
Route::get('/AddNewAdmin' ,function(){
    return view('create_new_admin');
})->name('Admin.create');

Route::post('/CreateAdmin',[AuthController::class,'addAdmin'])->name('Admin.store');
});
#----------------------------- Cart Routes -----------------------------------------------------------------#
Route::middleware('auth')->group(function () {
Route::get('/Cart', [CartController::class, 'index'])
    ->name('cart.index');



Route::post('/Cart', [CartController::class, 'store'])
    ->name('cart.store');

Route::PATCH('/Cart/{id}', [CartController::class, 'update'])
    ->name('cart.update');

Route::delete('/Cart/{id}', [CartController::class, 'destroy'])
    ->name('cart.destroy');
});
#-----------------------------------------------------------------------------------------------------------------#
Route::middleware('auth')->group(function () {
Route::get('/CheckOut',[OrderController::class,'index'])->name('checkout');
Route::post('/Paying',[OrderController::class,'store'])->name('checkout.store');
Route::get('/thank-you/{id}', [OrderController::class, 'thankyou'])
    ->name('thankyou');
});
#--------------------------------------------------------------------------------------------------------------------#

Route::middleware('auth')->get('/my-orders', [
    UserOrders::class,
    'myOrders'
])->name('my.orders');

Route::middleware('auth')->post('/my-orders/{orderId}/retry-payment', [
    UserOrders::class,
    'retryPayment'
])->name('my.orders.retry-payment');


#---------------------- Kashier Payment Routes ----------------------#

Route::get('/payment/kashier/return', [
    KashierPaymentController::class,
    'handleRedirect'
])->name('payment.callback');

Route::post('/payment/kashier/webhook', [
    KashierPaymentController::class,
    'webhook'
])->name('payment.webhook');


