<?php

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

Route::get('/', [
    'uses' => 'HomeController@home',
    'as' => 'public.home'
]);

Route::match(['get', 'post'], '/product/{id}', [
    'as' => 'public.product',
    'uses' => 'HomeController@productPage'
]);
Route::match(['get', 'post'], '/cart', [
    'as' => 'public.cart',
    'uses' => 'user\CartController@addProduct'
]);
Route::match(['get', 'post'], '/getcart', [
    'as' => 'public.getcart',
    'uses' => 'user\CartController@getProduct'
]);
Route::match(['get','post'], '/viewcart',[
    'as' => 'public.viewcart',
    'uses' => 'user\CartController@viewCart'
]);
Route::match(['get', 'post'], '/updatecart',[
    'as' => 'public.updatecart',
    'uses' => 'user\CartController@updateCart'
]);
Route::match(['get', 'post'], '/deletecart', [
    'as' => 'public.deletecart',
    'uses' => 'user\CartController@deleteCart'
]);
Route::match(['get', 'post'], '/checkout', [
    'as' => 'public.checkout',
    'uses' => 'user\CartController@checkout'
]);

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix'=>'admin', 'middleware'=> 'guest'],function(){
    Route::get('/',[
        'as' => 'admin',
        'uses' => 'admin\LoginController@index'
    ]);
    Route::get('login',[
        'as' => 'admin.getlogin',
        'uses' => 'admin\LoginController@showLoginForm'
    ]);
    Route::post('login',[
        'as' => 'admin.postlogin',
        'uses' => 'admin\LoginController@login'
        ]);
    
});

Route::group(['prefix'=>'admin','middleware' => 'admin_auth'], function () {
    Route::match(['get', 'post'], 'dashboard', [
        'as' => 'admin.dashboard',
        'uses' => 'admin\DashboardController@index'
    ]);
    Route::get('logout',[
		'as'=>'admin.logout',
		'uses'=>'admin\LoginController@logout'
    ]);
    Route::match(['get','post'],'add-category',[
        'as' => 'admin.add-category',
        'uses' => 'admin\CategoryController@addCategory'
    ]);
    Route::match(['get', 'post'], 'manage-category', [
        'as' => 'admin.manage-category',
        'uses' => 'admin\CategoryController@manageCategory'
    ]);
    Route::match(['get', 'post'], '/edit-category/{id}', [
        'as' => 'admin.edit-category',
        'uses' => 'admin\CategoryController@editCategory'
    ]);
    Route::match(['get', 'post'], '/update-category', [
        'as' => 'admin.update-category',
        'uses' => 'admin\CategoryController@updateCategory'
    ]);
    Route::match(['get', 'post'], '/manage-attribute-group',[
        'as' => 'admin.manage-attribute-group',
        'uses' => 'admin\AttributegroupController@manageAttributegroup'
    ]);
    Route::match(['get', 'post'], '/add-attribute-group', [
        'as' => 'admin.add-attribute-group',
        'uses' => 'admin\AttributegroupController@addAttributegroup'
    ]);
    Route::match(['get', 'post'], '/edit-attribute-group', [
        'as' => 'admin.edit-attribute-group',
        'uses' => 'admin\AttributegroupController@editAttributegroup'
    ]);
    Route::match(['get','post'],'/delete-attribute-group',[
        'as' => 'admin.delete-attribute-group',
        'uses' => 'admin\AttributegroupController@deleteAttributegroup'
    ]);
    Route::match(['get', 'post'], '/manage-attributes', [
        'as' => 'admin.manage-attributes',
        'uses' => 'admin\AttributeController@manageAttribute'

    ]);
    Route::match(['get', 'post'], '/add-attribute',[
        'as' => 'admin.add-attribute',
        'uses' =>'admin\AttributeController@addAttribute'
    ]);
    Route::match(['get','post'],'/delete-attribute',[
        'as' => 'admin.delete-attribute',
        'uses' => 'admin\AttributeController@deleteAttribute'
    ]);
    Route::match(['get','post'],'/edit-attribute',[
        'as' => 'admin.edit-attribute',
        'uses' => 'admin\AttributeController@editAttribute'
    ]);
    Route::match(['get', 'post'], '/add-brand', [
        'as' => 'admin.add-brand',
        'uses' =>'admin\BrandController@addBrand'
    ]);
    Route::match(['get', 'post'], '/manage-brand', [
        'as' => 'admin.manage-brand',
        'uses' =>'admin\BrandController@manageBrand'
    ]);
    Route::match(['get', 'post'], '/delete-brand', [
        'as' => 'admin.delete-brand',
        'uses' =>'admin\BrandController@deleteBrand'
    ]);
    Route::match(['get','post'],'/edit-brand',[
        'as' => 'admin.edit-brand',
        'uses' =>'admin\BrandController@editBrand'
    ]);
    Route::match(['get', 'post'], 'add-product', [
        'as' => 'admin.add-product',
        'uses' => 'admin\ProductController@addProduct'
    ]);
    Route::match(['get', 'post'], 'manage-product', [
        'as' => 'admin.manage-product',
        'uses' => 'admin\ProductController@manageProduct'
    ]);
    Route::match(['get','post'],'edit-product/{id}',[
        'as' => 'admin.edit-product',
        'uses' => 'admin\ProductController@editProduct'
    ]);
    Route::match(['get','post'],'/get-attribute',[
        'uses' => 'admin\ProductController@getAttribute'
    ]);
    Route::match(['get', 'post'], '/create-product', [
        'as' => 'admin.create-product',
        'uses' => 'admin\ProductController@createProduct'
    ]);
    Route::match(['get', 'post'], '/view-product/{id}',[
        'as' => 'admin.view-product',
        'uses' => 'admin\ProductController@viewProduct'
    ]);
    Route::match(['get','post'],'/manage-collection',[
        'as' => 'admin.manage-collection',
        'uses' => 'admin\CollectionController@manageCollection'
    ]);
    Route::match(['get', 'post'], '/add-collection', [
        'as' => 'admin.add-collection',
        'uses' => 'admin\CollectionController@addCollection'
    ]);
    Route::match(['get', 'post'], '/edit-collection', [
        'as' => 'admin.edit-collection',
        'uses' => 'admin\CollectionController@editCollection'
    ]);
    Route::match(['get', 'post'], '/delete-collection',[
        'as' => 'admin.delete-collection',
        'uses' => 'admin\CollectionController@deleteCollection'
    ]);
    Route::match(['get', 'post'], '/collection-products', [
        'as' => 'admin.collection-products',
        'uses' => 'admin\CollectionController@collectionProducts'
    ]);
    Route::get('/collection-product/{id}', [
        'as' =>'admin.collection-product',
        'uses' => 'admin\CollectionController@collectionProduct'
    ]);
    Route::match(['get', 'post'], '/get-category-products', [
        'as' => 'admin.get-category-products',
        'uses' =>'admin\ProductController@getcategoryProduct'
    ]);
    Route::match(['get','post'],'/add-collection-products',[
        'as' => 'admin.add-collection-products',
        'uses' => 'admin\Collection_productController@addCollectionproducts'
    ]);
    Route::match(['get', 'post'], '/edit-collection-products/{id}', [
        'as' => 'admin.edit-collection-products',
        'uses' => 'admin\Collection_productController@editCollectionproduct'
    ]);
    Route::match(['get', 'post'], '/delete-collection-product',[
        'as' => 'admin.delete-collection-product',
        'uses' => 'admin\Collection_productController@deleteCollectionproduct'
    ]);
    Route::match(['get', 'post'], '/manage-sales', [
        'as' => 'admin.manage-sales',
        'uses' => 'admin\OnsellController@manageSell'
    ]);
    Route::match(['get', 'post'], '/add-sales', [
        'as' => 'admin.add-sales',
        'uses' => 'admin\OnsellController@addSell'
    ]);
    Route::match(['get', 'post'], '/delete-sale', [
        'as' => 'admin.delete-sale',
        'uses' => 'admin\OnsellController@deleteSell'
    ]);
    Route::match(['get', 'post'], '/update-sale', [
        'as' => 'admin.update-sale',
        'uses' => 'admin\OnsellController@updateSell'
    ]);
    Route::match(['get','post'],'/sale-products',[
        'as' => 'admin.sale-products',
        'uses' => 'admin\OnsellController@saleProducts'
    ]);
    Route::match(['get', 'post'], '/get-sale-category-product', [
        'as' => 'admin.get-sale-category-product',
        'uses' => 'admin\ProductController@getsellProduct'
    ]);
    Route::match(['get', 'post'], '/add-sale-products/{id}', [
        'as' => 'admin.add-sale-products',
        'uses' => 'admin\OnsellController@addsaleProducts'
    ]);
    Route::match(['get', 'post'], '/edit-sale-products/{id}',[
        'as' => 'admin.edit-sale-products',
        'uses' => 'admin\Sell_productController@editsaleProduct'
    ]);
    Route::match(['get', 'post'], '/create-sale-products', [
        'as' => 'admin.create-sale-products',
        'uses' => 'admin\Sell_productController@createsellProduct'
    ]);
    Route::match(['get','post'],'/delete-sale-product',[
        'as' => 'admin.delete-sale-product',
        'uses' => 'admin\Sell_productController@deletesellProduct'
    ]);
    Route::match(['get', 'post'], '/add-slider', [
        'as' => 'admin.add-slider',
        'uses' => 'admin\SliderController@addSlider'
    ]);
    Route::match(['get', 'post'], '/insert-slider', [
        'as' => 'admin.insert-slider',
        'uses' => 'admin\SliderController@insertSlider'
    ]);
    Route::match(['get', 'post'], '/manage-menu', [
        'as' => 'admin.manage-menu',
        'uses' => 'admin\MenuController@manageMenu'
    ]);
    Route::match(['get', 'post'], '/add-menu', [
        'as' => 'admin.add-menu',
        'uses' => 'admin\MenuController@addMenu'
    ]);
    Route::match(['get', 'post'], '/create-contactinfo', [
        'as' => 'admin.create-contactinfo',
        'uses' => 'admin\ContactinfoController@createContactinfo'
    ]);
    Route::match(['get', 'post'], '/add-contactinfo', [
        'as' => 'admin.add-contactinfo',
        'uses' => 'admin\ContactinfoController@addContactinfo'
    ]);
    Route::match(['get', 'post'], '/vendor-list', [
        'as' => 'admin.vendor-list',
        'uses' => 'admin\VendorController@getVendor'
    ]);
    Route::match(['get', 'post'], '/manage-coupon', [
        'as' => 'admin.manage-coupon',
        'uses' => 'admin\CouponController@manageCoupon'
    ]);
    Route::match(['get', 'post'], '/add-coupon', [
        'as' => 'admin.add-coupon',
        'uses' => 'admin\CouponController@addCoupon'
    ]);
    Route::match(['get', 'post'], '/insert-coupon', [
        'as' => 'admin.insert-coupon',
        'uses' => 'admin\CouponController@insertCoupon'
    ]);
    Route::match(['get', 'post'], '/setfeatured', [
        'as' => 'admin.setfeatured',
        'uses' => 'admin\ProductController@setFeature'
    ]);
    Route::match(['get', 'post'], '/setverified', [
        'as' => 'admin.setverified',
        'uses' => 'admin\VendorController@setVerified'
    ]);
    Route::match(['get', 'post'], '/vendor-details/{id}', [
        'as' => 'admin.vendor-details',
        'uses' => 'admin\VendorController@vendorDetails'
    ]);
    Route::match(['get', 'post'], '/manage-tag', [
        'as'=> 'admin.manage-tag',
        'uses' => 'admin\TagController@manageTags'
    ]);
    Route::match(['get', 'post'], '/add-tag', [
        'as' => 'admin.add-tag',
        'uses' => 'admin\TagController@addTag'
    ]);
    Route::match(['get', 'post'], '/delete-tag', [
        'as' => 'admin.delete-tag',
        'uses' => 'admin\TagController@deleteTag'
    ]);
    Route::match(['get', 'post'], '/update-tag', [
        'as' => 'admin.update-tag',
        'uses' => 'admin\TagController@updateTag'
    ]);

});

Route::group(['prefix'=>'user','middleware'=>'guest'],function(){
  Route::get('register',[
		'uses'=>'user\Auth\RegisterController@getRegister',
		'as'=>'user.getRegister'
	]);
	Route::post('register',[
		'uses'=>'user\Auth\RegisterController@postRegister',
		'as'=>'user.postRegister'
	]);
	Route::get('auth/register/activate/{token}',[
		'uses'=>'user\Auth\LoginController@signupActivate',
		'as'=>'user.signupActivate'
	]);
	Route::get('login',[
		'uses'=>'user\Auth\RegisterController@getRegister',
		'as'=>'user.getLogin'
	]);
	Route::post('login',[
		'uses'=>'user\Auth\LoginController@postLogin',
		'as'=>'user.postLogin'
    ]);
    Route::get('auth/resend-verification',[
		'as' => 'user.resend_verification',
	    'uses' => 'user\Auth\RegisterController@resend'
	]);

});

Route::group(['prefix'=>'user','middleware'=>['authen','type'],'type'=>['user']],function(){
	Route::get('logout',[
		'uses'=>'user\Auth\LoginController@getLogout',
		'as'=>'user.getLogout'
	]);
	Route::get('profile',[
		'uses'=>'user\DashboardController@index',
		'as'=>'user.profile'
    ]);
    Route::match(['get', 'post'], 'order', [
        'uses' => 'user\DashboardController@recentOrder',
        'as' => 'user.order'
    ]);
    Route::match(['get', 'post'], 'cancelled-order', [
        'uses' => 'user\DashboardController@cancelOrder',
        'as' => 'user.cancelled-order'
    ]);
    Route::post('review', [
        'uses' =>'ReviewController@addReview',
        'as' => 'user.review'
    ]);
	Route::post('profile/update',[
		'uses'=>'user\DashboardController@updateProfile',
		'as'=>'user.update_profile'
	]);
	Route::match(['get', 'post'], '/checkout', [
        'uses' => 'user\CheckoutController@index',
        'as' => 'user.checkout'
    ]);
    Route::match(['get', 'post'], '/postcheckout', [
        'uses' => 'user\CheckoutController@postCheckout',
        'as' => 'user.postcheckout'
    ]);
	
});
  
Route::group(['prefix'=>'vendor','middleware'=>'guest'],function(){
    Route::get('register',[
		'uses'=>'Vendor\Auth\RegisterController@getRegister',
		'as'=>'vendor.getRegister'
	]);
	Route::post('register',[
		'uses'=>'Vendor\Auth\RegisterController@postRegister',
		'as'=>'vendor.postRegister'
	]);
	Route::get('login',[
		'uses'=>'Vendor\Auth\LoginController@getLogin',
		'as'=>'vendor.getLogin'
	]);
	Route::post('login',[
		'uses'=>'Vendor\Auth\LoginController@postLogin',
		'as'=>'vendor.postLogin'
	]);
	Route::get('auth/register/activate/{token}',[
		'uses'=>'Vendor\Auth\LoginController@signupActivate',
		'as'=>'vendor.signupActivate'
    ]);
    Route::get('auth/resend-verification',[
		'as' => 'vendor.resend_verification',
	    'uses' => 'Vendor\Auth\RegisterController@resend'
	]);
});

Route::group(['prefix'=>'vendor','middleware'=>['authen','type'],'type'=>['vendor']],function(){
    Route::get('logout',[
		'uses'=>'Vendor\Auth\LoginController@getLogout',
		'as'=>'vendor.getLogout'
    ]);
    Route::match(['get', 'post'], '/edit-profile/{id}', [
        'as' => 'vendor.edit-profile',
        'uses' => 'Vendor\ProfileController@editProfile'
    ]);
    Route::match(['get', 'post'], '/update-profile', [
        'as' => 'vendor.update-profile',
        'uses' => 'Vendor\ProfileController@updateProfile'
    ]);
    Route::match(['get','post'],'/setting',[
        'as' => 'vendor.setting',
        'uses' => 'Vendor\ProfileController@changePassword'
    ]);
    Route::match(['get', 'post'], '/matchpassword', [
        'as' => 'vendor.matchpassword',
        'uses' => 'Vendor\ProfileController@matchPassword'
    ]);
    Route::match(['get', 'post'], '/update-password', [
        'as' => 'vendor.update-password',
        'uses' => 'Vendor\ProfileController@updatePassword'
    ]);
	Route::get('dashboard',[
		'uses'=>'Vendor\DashBoardController@index',
		'as'=>'vendor.dashboard'
    ]);
    Route::match(['get', 'post'], '/add-product', [
        'as' => 'vendor.add-product',
        'uses' => 'Vendor\ProductController@addProduct'
    ]);
    Route::match(['get', 'post'], '/create-product', [
        'as' => 'vendor.create-product',
        'uses' => 'Vendor\ProductController@createProduct'
    ]);
    Route::match(['get', 'post'], '/manage-product', [
        'as' => 'vendor.manage-product',
        'uses' => 'Vendor\ProductController@manageProduct'
    ]);
    Route::match(['get', 'post'], '/get-attribute', [
        'as' => 'vendor.get-attribute',
        'uses' => 'Vendor\ProductController@getAttribute'
    ]);
    Route::match(['get', 'post'], '/get-profile', [
        'as' => 'vendor.get-profile',
        'uses' => 'Vendor\ProfileController@getProfile'
    ]);
    Route::match(['get', 'post'], '/manage-coupon', [
        'as' => 'vendor.manage-coupon',
        'uses' => 'Vendor\CouponController@manageCoupon'
    ]);
    Route::match(['get', 'post'], '/add-coupon', [
        'as' => 'vendor.add-coupon',
        'uses' => 'Vendor\CouponController@addCoupon'
    ]);
    Route::match(['get', 'post'], '/insert-coupon', [
        'as' => 'vendor.insert-coupon',
        'uses' => 'Vendor\CouponController@insertCoupon'
    ]);
    Route::match(['get', 'post'], '/sale-products',[
        'as' => 'vendor.sale-products',
        'uses' => 'Vendor\OnsellController@sellProducts'

    ]);
    Route::match(['get', 'post'], '/add-sale-products/{id}', [
        'as' => 'vendor.add-sale-products',
        'uses' => 'Vendor\OnsellController@addProducts'
    ]);
    Route::match(['get', 'post'], '/edit-sale-products{id}', [
        'as' => 'vendor.edit-sale-products',
        'uses' => 'Vendor\Sell_productController@editProduct'
    ]);
    Route::match(['get', 'post'], '/get-category-products', [
        'as' => 'vendor.get-category-products',
        'uses' => 'Vendor\ProductController@getcategoryProduct'
    ]);
  
});

//Password reset routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('fpass');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');
