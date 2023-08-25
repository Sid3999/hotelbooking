<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

use App\Favourite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FavouriteController;
use App\Http\Controllers\SiteMapController;

Route::get('/', 'PageController@index')->name('index');
Route::get('/rooms', 'PageController@rooms')->name('rooms');
// Route::get('/userregister' , 'PageController@register')->name('register');
Route::get('/rooms/{id}', 'PageController@room_detail')->name('room-detail');
Route::get('/rooms-available', 'PageController@room_available')->name('room_available');
Route::get('/about-us', 'PageController@about')->name('about');
Route::get('/news', 'PageController@news')->name('news');
Route::get('/contact', 'PageController@contact')->name('contact');
Route::get('/room-link-booking', 'PageController@booking')->name('room-link-booking');
Route::post('/bookingStore', 'BookingController@store')->name('booking.store');


// wishlist routes start here
Route::prefix('wishlist')->group(function () {
    Route::get('/store', [FavouriteController::class,'store'])->name('wishlist.store');
});

// end of wishlist routes

// Admin Login Route
Route::get('admin', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::get('admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AdminLoginController@login')->name('admin.login');
Route::resource('register-as-business', 'Auth\RegisterAsBusinessController');

/* Auth routes with email verified */
Auth::routes(['verify' => true]);

/** Authenticated routes for admin panel */
Route::group(['middleware' => ['auth', 'verified']], function () {
    
    //Payments routes start here
    Route::prefix('/payments')->group(function(){
        Route::get('/index','PaymentController@index')->name('payments.index');
        Route::get('/get-user-payment','PaymentController@get_payemnt')->name('payments.get_payment');
        Route::get('/pay','PaymentController@pay')->name('payments.pay');
    });
        Route::get('/generate_invoice' , 'PaymentController@generateInvoice');
        Route::get('invoice/{id}' , 'PaymentController@Invoice');
        Route::get('/invoices/index' , 'PaymentController@allinvoices')->name('allinvoices');
        Route::get('/print/{id}' , 'PaymentController@print')->name('print');
        
     
    //ban user
    Route::get('/ban-user',[UsersController::class,'ban'])->name('user.ban');
    //Payments routes end here
    Route::get('/user', 'UsersController@user')->name('user');
    Route::get('/nopermission', 'UsersController@nopermission')->name('nopermission');
    Route::get('/dashboard', 'UsersController@dashboard')->name('dashboard');
    /** Admin Profile Routes */
    Route::get('/profile', 'UsersController@adminProfile')->name('admin.profile');
    Route::post('/profile/update', 'UsersController@adminProfileUpdate')->name('admin.profile.update');
    /** User Profile Routes */
    Route::get('/user/profile', 'UsersController@userProfile')->name('user.profile');
    Route::post('/user/profile/update', 'UsersController@userProfileUpdate')->name('user.profile.update');
    /**
     * User CRUD Routes
     */
    Route::get('/users', 'UsersController@users')->name('users');
    Route::resource('users', 'UsersController');
    /* Roles Routes */
    Route::get('/role', 'RolesController@index')->name('role.index');
    /* Permission Routes */
    Route::resource('permission', 'PermissionsController');
    /* Category routes */
    Route::resource('category', 'CategoryController');
    Route::get('/media', 'MediaController@index')->name('media');
    Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');
    // list all lfm routes here...

    /* Social profile routes */
    Route::resource('social', 'SocialProfileController');
    /* product routes */
    Route::resource('attribute', 'AttributeController');
    Route::resource('product', 'ProductController');
    Route::resource('hotel', 'HotelController');
    Route::get('/my-profile', 'HotelController@my_profile')->name('hotelprofile');
    Route::get('/hotels/create', 'HotelController@create')->name('hotels.create');
    Route::post('/hotels/create', 'HotelController@storehotel')->name('hotel.storehotel');
    
    
    Route::post('hotel/{id}', [
        'as' => 'hotel.update',
        'uses' => 'HotelController@update'
    ]);
    
    Route::get('updatestatus', 'HotelController@updatestatus');
    Route::get('hotel/delete-gallery-image/{image_id}', 'HotelController@delete_gallery_image')->name('hotel.delete.gallery.image');
    Route::get('image/{filename}', 'HotelController@displayImage')->name('image.displayImage');
    Route::resource('hotel-service', 'HotelServiceController');
    Route::resource('hotel-surrounding', 'HotelSurroundingController');
    Route::resource('hotel-gallery', 'HotelGalleryController');
    Route::resource('room-category', 'RoomCatrgoryController');
    Route::resource('room-category-service', 'RoomServiceController');
    Route::resource('room-category-gallery', 'RoomGalleryController');
    Route::resource('hotel-rooms', 'RoomController');
    Route::get('searchhotel/{value}', 'RoomController@getroom');
    Route::get('hotel-information', 'HotelController@hotel_info')->name('hotel.hotelinfo');
    
   
    
    Route::resource('room-booking', 'BookingController');
    Route::get('/get-service-data/{id}', 'HotelServiceController@serviceData');
    Route::get('/get-surrounding-data/{id}', 'HotelSurroundingController@surroundingData');
    Route::resource('tax', 'TaxController');
    Route::get('booking-dashboard', 'BookingController@bookingDashboard')->name('booking.dashboard');
    Route::get('customer-logout', 'UsersController@customerLogout')->name('customer-logout');
    Route::resource('ratings', 'RatingController');

    Route::resource('cities', 'CityController');

    Route::resource('facilities','FacilityController');
});
/**
 * User home route
 */

Route::get('/home', 'HomeController@index')->name('home');
/** Social Login */
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');
Route::match(['post', 'get'], 'getroom', 'BookingController@getRooms')->name('getroom');
Route::get("faqs", "PageController@faqs")->name('faqs');
Route::get("terms_and_condition", "PageController@terms_and_condition")->name('terms_and_condition');
Route::get("privacy_policy", "PageController@privacy_policy")->name('privacy_policy');
Route::resource("contactUs", "ContactUsController");
Route::post('/blogs' , [BlogController::class , 'create'])->name('admin.blog.create');
Route::get('/blogs/create' ,[BlogController::class , 'store'])->name('blog');
Route::get('/blogs' , [BlogController::class , 'index'])->name('admin.blog.index');
Route::get('/edit/{id}' ,  [BlogController::class , 'edit'])->name('blog.edit');
ROute::get('/delete{id}' ,  [BlogController::class , 'destory'])->name('blog.destroy');
Route::post('/update{blog}' , [BlogController::class , 'update'])->name('blog.update');
Route::get('/news-details/{blog}' , [PageController::class , 'single_blog'])->name('single-blog');
// Customer section routes start here
Route::prefix('/customer')->group(function(){
    Route::get('/myprofile' , [CustomerController::class , 'myprofile'])->name('myprofile');
    Route::post('/update-profile' , [CustomerController::class , 'update'])->name('myprofile.update');
    Route::get('/change-password' ,[CustomerController::class , 'changepassword'])->name('changepassword');
    Route::post('/update-password' ,[CustomerController::class , 'updatepassword'])->name('myprofile.updatepassword');
    Route::get('/my-orders' , [CustomerController::class , 'myorder'])->name('myorders');
    Route::post('my-profile', [CustomerController::class , 'update'])->name('my-profile');
});

// end customer routes here

Route::get('/sitemap', [SiteMapController::class,'index'])->name('sitemap');

