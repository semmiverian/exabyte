<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Step 1 bikin simple crud

// Route::get('/campaigns', 'CampaignController@index');
// Route::post('/campaigns', 'CampaignController@create');
// Route::patch('/campaigns/{id}', 'CampaignController@update');
// Route::delete('/campaigns/{id}', 'CampaignController@delete');

// Step 2 bikin di kelompokin

Route::prefix('/campaigns')->group(function () {
    Route::get('/', 'CampaignController@index');
    Route::get('/{id}', 'CampaignController@find');
    Route::post('/', 'CampaignController@create');
    Route::patch('/{id}', 'CampaignController@update');
    Route::delete('/{id}', 'CampaignController@delete');
});


Route::prefix('/donations')->group(function () {
    Route::get('/', 'DonationController@index');
    Route::get('/{id}', 'DonationController@find');
    Route::post('/', 'DonationController@create');
    Route::patch('/{id}', 'DonationController@update');
    Route::delete('/{id}', 'DonationController@delete');
});