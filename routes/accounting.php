<?php

use App\Http\Controllers\Accounting\ChartOfAccountController;
use App\Http\Controllers\AccCoaController;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {

    Route::resource('/chart_of_accounts', ChartOfAccountController::class);

    Route::resource('/accounts', AccCoaController::class);
    Route::get('/accounts/selectedform/{id}', [AccCoaController::class, 'selectedForm']);

});
