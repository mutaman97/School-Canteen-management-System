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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

//EMPLOYEE AUTHENTICATION SECTION

Route::prefix('employee')
    ->as('employee.')
    ->group(function() {
        Route::get('home', 'Home\EmployeeHomeController@index')->name('home');

    	Route::namespace('Auth\Login')
    		->group(function() {
    			Route::get('login', 'EmployeeController@showLoginForm')->name('login');
				Route::post('login', 'EmployeeController@login')->name('login');
				Route::post('logout', 'EmployeeController@logout')->name('logout');
    		});
	});

//User AUTHENTICATION SECTION

Route::prefix('user')
    ->as('user.')
    ->group(function() {
        Route::get('home', 'Home\EmployeeHomeController@index')->name('home');

        Route::namespace('Auth\Login')
            ->group(function() {
                Route::get('login', 'UserController@showLoginForm')->name('login');
                Route::post('login', 'UserController@login')->name('login');
                Route::post('logout', 'UserController@logout')->name('logout');
            });
    });

//PARENT AUTHENTICATION SECTION

Route::prefix('parent')
    ->as('parent.')
    ->group(function() {
        Route::get('/home', 'Home\StudentparentHomeController@index')->name('home');

        Route::namespace('Auth\Login')
            ->group(function() {
                Route::get('login', 'StudentparentController@showLoginForm')->name('login');
                Route::post('login', 'StudentparentController@login')->name('login');
                Route::post('logout', 'StudentparentController@logout')->name('logout');

            });
    });

//STUDENT AUTHENTICATION SECTION

Route::prefix('student')
    ->as('student.')
    ->group(function() {
        Route::get('home', 'Home\StudentHomeController@index')->name('login.home');

        Route::namespace('Auth\Login')
            ->group(function() {
                Route::get('login', 'StudentController@showLoginForm')->name('login');
                Route::post('login', 'StudentController@login')->name('login');
                Route::post('logout', 'StudentController@logout')->name('logout');
            });
    });

// PARENT SECTION

Route::prefix('parent')
    ->as('parent.')->namespace('Parent')
    ->group(function() {

//        Route::get('home', 'Home\StudentparentHomeController@index')->name('home');
//
//        Route::namespace('Auth\Login')
//            ->group(function() {
//                Route::get('login', 'StudentparentController@showLoginForm')->name('login');
//                Route::post('login', 'StudentparentController@login')->name('login');
//                Route::post('logout', 'StudentparentController@logout')->name('logout');
//            });

//        Route::get('/', 'DashboardController@index')->name('dashboard');
//        Route::get('/dashboard-data', 'DashboardController@staticData');

        // Deposit
        Route::get('deposit/{student}','PlanController@depo')->name('depo');

        // Select Student
        Route::get('/','PlanController@student')->name('student.payment');

        //Report Route
        Route::resource('report', 'ReportController');

        //Download Pdf
        Route::get('payment-invoice/{id}', 'ReportController@invoicePdf')->name('payment-invoice');



        Route::get('/profile', 'ProfileController@index')->name('myprofile');
//        Route::post('genup', 'ProfileController@genUpdate')->name('genupdate');
        Route::post('passup', 'ProfileController@updatePassword')->name('passup');

    });

// User Section

Route::prefix('user')
    ->as('user.')->namespace('user')
    ->group(function() {

        // Deposit
        Route::get('deposit/{student}','PlanController@depo')->name('depo');

        // Select Student
        Route::get('/','PlanController@student')->name('payment');

        //Report Route
        Route::resource('report', 'ReportController');

        //Download Pdf
        Route::get('payment-invoice/{id}', 'ReportController@invoicePdf')->name('payment-invoice');



        Route::get('/profile', 'ProfileController@index')->name('myprofile');
//        Route::post('genup', 'ProfileController@genUpdate')->name('genupdate');
        Route::post('passup', 'ProfileController@updatePassword')->name('passup');

    });

// STUDENT SECTION

Route::prefix('student')
    ->as('merchant.')->namespace('Merchant')->group( function ()
{
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard-data', 'DashboardController@staticData');

    // Deposit
    Route::get('deposit','PlanController@depo')->name('depo');

    // Select Student
    Route::get('student','PlanController@student')->name('student.payment');

    //Report Route
    Route::resource('report', 'ReportController');
});

// STRIPE SECTION

Route::post('/checkout', 'StripeController@checkout')->name('checkout');
Route::get('/success', 'StripeController@success')->name('checkout.success');
Route::get('/cancel', 'StripeController@cancel')->name('checkout.cancel');
Route::post('/webhook', 'StripeController@webhook')->name('checkout.webhook');

