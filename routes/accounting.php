<?php

use App\Http\Controllers\Accounting\ChartOfAccountController;
use App\Http\Controllers\AccCoaController;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {

    Route::resource('/chart_of_accounts', ChartOfAccountController::class);
    Route::post('/chart_of_accounts/insert_coa2', [ChartOfAccountController::class, 'insertCoa2'])->name('accounts.insert_coa2');
    Route::post('/chart_of_accounts/selectPhead', [ChartOfAccountController::class, 'selectPhead'])->name('accounts.selectPhead');
    Route::post('/chart_of_accounts/tree_view', [ChartOfAccountController::class, 'tree_view'])->name('accounts.tree_view');
    

    Route::resource('/accounts', AccCoaController::class);
    Route::get('/accounts/selectedform/{id}', [AccCoaController::class, 'selectedForm']);

});
