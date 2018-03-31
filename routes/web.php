<?php
use Illuminate\Http\Request;
use App\User;
use App\Notifications\Published;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/
', function () {    
	return view('home');
});*/

Route::resource('/', 'HotelController');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('hotels', 'HotelController');

Route::resource('rooms', 'RoomController');

Route::resource('tariffs', 'TariffController');

Route::resource('searches', 'searchController');

Route::resource('bookings', 'bookingController');


