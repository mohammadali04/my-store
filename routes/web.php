<?php

use App\Http\Controllers\back\AdminAboutController;
use App\Http\Controllers\back\AdminBanerController;
use App\Http\Controllers\back\AdminCategoryController;
use App\Http\Controllers\back\AdminCommentController;
use App\Http\Controllers\back\AdminDashboardController;
use App\Http\Controllers\back\AdminIndexController;
use App\Http\Controllers\back\AdminOrderController;
use App\Http\Controllers\back\AdminProductController;
use App\Http\Controllers\back\AdminSliderController;
use App\Http\Controllers\back\AdminStatController;
use App\Http\Controllers\back\AdminUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\auth\CustomAuthController;
use App\Http\Controllers\front\CheckOutController;
use App\Http\Controllers\front\CommentController;
use App\Http\Controllers\front\ProductController;
use App\Http\Controllers\front\BasketController;
use App\Http\Controllers\front\SearchController;
use App\Http\Controllers\front\ShowCartController;
use App\Http\Controllers\back\ClientMessageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\front\IndexController;
use App\Http\Controllers\ProfileController;
use Aghandeh\IranShippingPrice\Shipping;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/index')->group(function () {
    Route::get('/index', [IndexController::class, 'index'])->name('index');
    Route::get('/about-us', [IndexController::class, 'aboutUs'])->name('about.index');
    Route::get('/connect-us', [IndexController::class, 'connectUs'])->name('connect.index');
    Route::post('/add-client-message',[IndexController::class,'addClientMessage'])->name('add.client.message');

});
Route::prefix('/product')->group(function () {
    Route::get('/index/{product}', [ProductController::class, 'index'])->name('product.index');
    Route::post('/addToBasket/{product}', [ProductController::class, 'addToBasket'])->name('add.basket');
    Route::post('/addcomment/{product}', [CommentController::class, 'store'])->name('comment.store');
});

Route::prefix('/basket')->group(function () {
    Route::get('/index', [BasketController::class, 'index'])->name('basket.index');
    Route::get('/basket-delete/{basket}', [BasketController::class, 'deleteBasket'])->name('destroy.basket');
    Route::post('/doChange/{basket}', [BasketController::class, 'update'])->name('update.basket');
    Route::post('/postprice', [BasketController::class, 'calculatePost'])->name('post.price');
});

Route::prefix('/checkout')->group(function () {
    Route::get('/index', [CheckOutController::class, 'index'])->name('checkout.checkout');
    Route::post('/checkCode', [CheckOutController::class, 'checkCodeResponse'])->name('check.discount.code');
    Route::post('/calculatetotalprice', [CheckOutController::class, 'calculateTotalPriceAll'])->name('calculate.total.price');
    Route::post('/saveorder', [CheckOutController::class, 'saveOrder'])->name('save.order');
    Route::get('/order', [CheckOutController::class, 'order'])->name('zarinpal.varify');
})->middleware(['auth','verified']);

Route::prefix('/search')->group(function () {
    Route::get('/index', [SearchController::class, 'index'])->name('search.index');
    Route::get('/display-category-products/{cat_id}', [SearchController::class, 'displayCategoryProducts'])->name('display.category.products');
    Route::post('/search', [SearchController::class, 'search'])->name('search');
    Route::get('search_pro_result', [SearchController::class, 'displaySearch'])->name('search.display');

});
Route::prefix('/admin')->group(function () {
    Route::get('/register', [CustomAuthController::class, 'register'])->name('admin.register');
    Route::post('/store', [CustomAuthController::class, 'store'])->name('admin.auth.store');
    Route::get('/login', [CustomAuthController::class, 'login'])->name('admin.login');
    Route::post('/authenticate', [CustomAuthController::class, 'authenticate'])->name('admin.authenticate');
    Route::get('/dashboard', [CustomAuthController::class, 'dashboard'])->name('admin.dashboard')->middleware(['auth','checkRole','checkStatus','checkStatus']);;
    Route::get('/logout',[CustomAuthController::class,'logout'])->name('admin.logout');
});
Route::prefix('/admin')->middleware(['auth','checkRole','checkStatus','checkStatus'])->group(function(){
    Route::get('/index',[AdminIndexController::class,'index'])->name('admin.index');
    Route::get('/add-info',[AdminIndexController::class,'addInfo'])->name('admin.add.info');
    Route::post('/store-info',[AdminIndexController::class,'storeInfo'])->name('admin.store.info');
    Route::get('/edit-info/{admin_info}',[AdminIndexController::class,'editInfo'])->name('admin.edit.info')->middleware('checkUser');
    Route::post('/update-info/{admin_info}',[AdminIndexController::class,'updateInfo'])->name('admin.update.info');
    Route::get('/show-ability',[AdminIndexController::class,'showAbility'])->name('admin.show.ability');
    Route::get('/create-ability',[AdminIndexController::class,'createAbility'])->name('admin.create.ability');
    Route::post('/store-ability',[AdminIndexController::class,'storeAbility'])->name('admin.store.ability');
    Route::get('/edit-ability/{ability}',[AdminIndexController::class,'editAbility'])->name('admin.edit.ability');
    Route::post('/update-ability/{ability}',[AdminIndexController::class,'updateAbility'])->name('admin.update.ability');
    Route::get('/destroy-ability',[AdminIndexController::class,'destroyAbility'])->name('admin.destroy.ability');
    Route::get('/show-social',[AdminIndexController::class,'showSocials'])->name('admin.show.social');
    Route::get('/create-social',[AdminIndexController::class,'createSocials'])->name('admin.create.social');
    Route::post('/store-social',[AdminIndexController::class,'storeSocials'])->name('admin.store.social');
    Route::get('/edit-social/{social}',[AdminIndexController::class,'editSocials'])->name('admin.edit.social');
    Route::post('/update-social/{social}',[AdminIndexController::class,'updateSocials'])->name('admin.update.social');
    Route::get('/destroy-socials',[AdminIndexController::class,'destroySocials'])->name('admin.destroy.social');
});
Route::prefix('/admin/category')->group(function () {
    Route::get('/index', [AdminCategoryController::class, 'index'])->name('admin.category.index')->middleware(['auth', 'checkRole','checkStatus','checkStatus']);
    Route::get('/children/{category}', [AdminCategoryController::class, 'showChildren'])->name('admin.category.children')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin.category.create')->middleware(['auth', 'checkRole','checkStatus']);
    Route::post('/store', [AdminCategoryController::class, 'store'])->name('admin.category.store')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/edit/{category}', [AdminCategoryController::class, 'edit'])->name('admin.category.edit')->middleware(['auth', 'checkRole','checkStatus']);
    Route::post('/update/{category}', [AdminCategoryController::class, 'update'])->name('admin.category.update')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/destroy', [AdminCategoryController::class, 'destroy'])->name('admin.category.destroy')->middleware(['auth', 'checkRole','checkStatus']);
});
Route::prefix('/admin/product')->group(function () {
    Route::get('/index', [AdminProductController::class, 'index'])->name('admin.product.index')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/create', [AdminProductController::class, 'create'])->name('admin.product.create')->middleware(['auth', 'checkRole','checkStatus']);
    Route::post('/store', [AdminProductController::class, 'store'])->name('admin.product.store')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/edit/{product}', [AdminProductController::class, 'edit'])->name('admin.product.edit')->middleware(['auth', 'checkRole','checkStatus']);
    Route::post('/update/{product}', [AdminProductController::class, 'update'])->name('admin.product.update')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/destroy', [AdminProductController::class, 'destroy'])->name('admin.product.destroy')->middleware(['auth', 'checkRole','checkStatus']);
})->middleware(['auth', 'checkRole','checkStatus']);

Route::prefix('/admin/comment')->group(function () {
    Route::get('/index', [AdminCommentController::class, 'index'])->name('admin.comment.index')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/status/{comment}', [AdminCommentController::class, 'setStatus'])->name('admin.comment.status')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/edit/{comment}', [AdminCommentController::class, 'edit'])->name('admin.comment.edit')->middleware(['auth', 'checkRole','checkStatus']);
    Route::post('/update/{comment}', [AdminCommentController::class, 'update'])->name('admin.comment.update')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/add-to-favorites', [AdminCommentController::class, 'addTfavoriteComments'])->name('admin.favorite.comment')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/show-favorite-comments', [AdminCommentController::class, 'showFavoriteComments'])->name('favorite.comment.show')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/destroy-favorite-comments', [AdminCommentController::class, 'destroyFavoriteComments'])->name('favorite.comment.destroy')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/destroy', [AdminCommentController::class, 'destroy'])->name('admin.comment.destroy')->middleware(['auth', 'checkRole','checkStatus']);
})->middleware(['auth', 'checkRole','checkStatus']);

Route::prefix('/admin-messages')->middleware(['verified','auth','checkRole','checkStatus'])->group(function(){
    Route::get('/index',[ClientMessageController::class,'index'])->name('admin.message.index');
    Route::get('/show/{message}',[ClientMessageController::class,'show'])->name('admin.message.show');/////////////////
    Route::get('/destroy',[ClientMessageController::class,'destroy'])->name('admin.message.destroy');
});

Route::prefix('/admin-messages')->middleware(['verified','auth','checkRole','checkStatus'])->group(function(){
    Route::get('/index',[ClientMessageController::class,'index'])->name('admin.message.index');
    Route::get('/show/{message}',[ClientMessageController::class,'show'])->name('admin.message.show');/////////////////
    Route::get('/destroy',[ClientMessageController::class,'destroy'])->name('admin.message.destroy');
});

Route::prefix('/admin-connect-us')->middleware(['verified','auth','checkRole','checkStatus'])->group(function(){
    Route::get('/index',[AdminAboutController::class,'connectUsOptions'])->name('admin.connect.option');
    Route::get('/create-option',[AdminAboutController::class,'connectUsOptionCreate'])->name('admin.connect.create');/////////////////
    Route::post('/store-option',[AdminAboutController::class,'connectUsOptionStore'])->name('admin.connect.store');
    Route::get('/edit-option/{connectUsOption}',[AdminAboutController::class,'connectUsOptionEdit'])->name('admin.connect.edit');
    Route::post('/update-option/{connectUsOption}',[AdminAboutController::class,'connectUsOptionUpdate'])->name('admin.connect.update');
    Route::get('/show-our-goal',[AdminAboutController::class,'showOurGoal'])->name('admin.show.goal');
    Route::post('/update-our-goal/{ourGoal}',[AdminAboutController::class,'updateOurGoal'])->name('admin.update.goal');
    Route::get('/destroy-option',[AdminAboutController::class,'connectUsOptionDestroy'])->name('admin.connect.destroy');
});

Route::prefix('/admin/user')->group(function () {
    Route::get('/show-users', [AdminUserController::class, 'manageUsers'])->name('admin.user.index')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/show-officers', [AdminUserController::class, 'manageOfficers'])->name('admin.officer.index')->middleware(['auth', 'checkGeneralManager']);
    Route::get('/status/{user}', [AdminUserController::class, 'setStatus'])->name('admin.user.status')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/edit/{user}', [AdminUserController::class, 'edit'])->name('admin.user.edit')->middleware(['auth', 'checkRole','checkStatus']);
    Route::post('/update/{user}', [AdminUserController::class, 'update'])->name('admin.user.update')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/destroy', [AdminUserController::class, 'destroy'])->name('admin.user.destroy')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/change-level-one', [AdminUserController::class, 'changeLevel1'])->name('admin.user.level1')->middleware(['auth', 'checkGeneralManager']);
    Route::get('/change-level-two', [AdminUserController::class, 'changeLevel2'])->name('admin.user.level2')->middleware(['auth', 'checkGeneralManager']);
    Route::get('/change-level-three', [AdminUserController::class, 'changeLevel3'])->name('admin.user.level3')->middleware(['auth', 'checkGeneralManager']);
});
Route::prefix('/admin/baner')->group(function () {
    Route::get('/index', [AdminBanerController::class, 'index'])->name('admin.baner.index')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/create', [AdminBanerController::class, 'create'])->name('admin.baner.create')->middleware(['auth', 'checkRole','checkStatus']);
    Route::post('/store', [AdminBanerController::class, 'store'])->name('admin.baner.store')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/edit/{baner}', [AdminBanerController::class, 'edit'])->name('admin.baner.edit')->middleware(['auth', 'checkRole','checkStatus']);
    Route::post('/update/{baner}', [AdminBanerController::class, 'update'])->name('admin.baner.update')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/destroy', [AdminBanerController::class, 'destroy'])->name('admin.baner.destroy')->middleware(['auth', 'checkRole','checkStatus']);
})->middleware(['auth', 'checkRole','checkStatus']);

Route::prefix('/admin/slider')->group(function () {
    Route::get('/index', [AdminSliderController::class, 'index'])->name('admin.slider.index')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/create/{product}', [AdminSliderController::class, 'create'])->name('admin.slider.create')->middleware(['auth', 'checkRole','checkStatus']);
    Route::post('/store', [AdminSliderController::class, 'store'])->name('admin.slider.store')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/edit/{slider}', [AdminSliderController::class, 'edit'])->name('admin.slider.edit')->middleware(['auth', 'checkRole','checkStatus']);
    Route::post('/update/{slider}', [AdminSliderController::class, 'update'])->name('admin.slider.update')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/destroy', [AdminBanerController::class, 'destroy'])->name('admin.slider.destroy')->middleware(['auth', 'checkRole','checkStatus']);
})->middleware(['auth', 'checkRole','checkStatus']);

Route::prefix('/admin/order')->group(function () {
    Route::get('/index', [AdminOrderController::class, 'index'])->name('admin.order.index')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/edit/{order}', [AdminOrderController::class, 'edit'])->name('admin.order.edit')->middleware(['auth', 'checkRole','checkStatus']);
    Route::post('/update/{order}', [AdminOrderController::class, 'update'])->name('admin.order.update')->middleware(['auth', 'checkRole','checkStatus']);
    Route::post('/change-status/{status}', [AdminOrderController::class, 'changeStatus'])->name('admin.order.status')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/destroy', [AdminOrderController::class, 'destroy'])->name('admin.order.destroy')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/getstat', [AdminStatController::class, 'getStat'])->name('admin.get.stat')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/show-factor/{order}', [AdminOrderController::class, 'showFactor'])->name('admin.show.factor')->middleware(['auth', 'checkRole','checkStatus']);
    Route::post('/proces-stat', [AdminStatController::class, 'processStat'])->name('admin.process.stat')->middleware(['auth', 'checkRole','checkStatus']);
    Route::get('/show-stat', [AdminStatController::class, 'showStat'])->name('admin.show.stat')->middleware(['auth', 'checkRole','checkStatus']);
})->middleware(['auth', 'checkRole','checkStatus']);
Route::prefix('/admin/dashboard')->group(function () {
    Route::get('/index', [AdminDashboardController::class, 'index'])->name('admin.dashboard.index');
});
// Route::get('buy', function () {
//     return view('front.checkout.shop');
// });
// Route::post('shop', [CheckOutController::class, 'add_order'])->name('admin.show.stat');
// Route::get('order', [CheckOutController::class, 'order'])->name('admin.show.stat');این دو متد ظاهرا تعریف نشده

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::get('buy',function(){
    return view('shop');
});

Route::get('order', [CheckOutController::class, 'order'])->name('zarinpal.varify');
Route::post('shop', [CheckOutController::class, 'addOrder']);
require __DIR__ . '/auth.php';