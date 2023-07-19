<?php

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

Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    Route::get('/', function () {
        return redirect('/login');
    });


        // Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware' => ['guest']], function() {
            /**
            * Register Routes
            */
            Route::get('/register', 'RegisterController@show')->name('register.show');
            Route::post('/register', 'RegisterController@register')->name('register.perform');

            /**
            * Login Routes
            */
            Route::get('/login', 'LoginController@show')->name('login.show');
            Route::post('/login', 'LoginController@login')->name('login.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
            /**
            * Logout Routes
            */
        Route::get('/logout', 'LogoutController@logout')->name('logout.perform');
        Route::get('/dashboard', 'Dashboard\DashboardController@index')->name('dashboard');

        // TRANSACTION ROUTES
        Route::get('/transaction/new', 'TransactionController@newtransaction')->name('transaction.new');
        Route::post('/transaction/new/store', 'TransactionController@storetransaction')->name('transaction.store');
        Route::get('/transaction/pending', 'PendingController@pendingtransaction')->name('transaction.pending');
        Route::get('/transaction/approved', 'ApprovedController@approvedtransaction')->name('transaction.approved');

        //LOGS ROUTES
        Route::get('/log/document', 'LogController@documentlog')->name('log.document');
        Route::get('/log/view', 'LogController@viewlog')->name('log.view');
      

        //TRANSACTION EDIT DELETE
        Route::get('/pending/edit/{id}', 'PendingController@edittransaction')->name('pending.edit');
        Route::post('/pending/edit/update', 'PendingController@updatetransaction')->name('pending.edit.update');
        Route::get('/pending/delete/{id}', 'PendingController@deletetransaction')->name('pending.delete');
        
       

        //EMPLOYEE ROUTES
        Route::get('/employee/new', 'EmployeeController@newemployee')->name('employee.new');
        Route::post('/employee/new/save', 'EmployeeController@saveemployee')->name('employee.save');
        Route::get('/employee/list', 'ListController@listemployee')->name('employee.list');

        //EMPLOYEE EDIT DELETE
        Route::get('/list/edit/{id}', 'ListController@editlist')->name('list.edit');
        Route::post('/list/edit/update', 'ListController@updatelist')->name('list.edit.update');   
        Route::get('/list/delete/{id}', 'ListController@deletelist')->name('list.delete');

        //APPROVED ROUTES
       

    });
      
           
});