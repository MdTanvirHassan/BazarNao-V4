<?php

use App\Http\Controllers\Accounting\ChartOfAccountController;

Route::resource('/chart_of_accounts', ChartOfAccountController::class);
    Route::get('/chart_of_accounts', [ChartOfAccountController::class, 'index'])->name('chart_of_accounts.index');
    Route::get('/chart_of_accounts/create', [ChartOfAccountController::class, 'create'])->name('chart_of_accounts.create');
    Route::get('/chart_of_accounts/edit/{id}', [ChartOfAccountController::class, 'edit'])->name('chart_of_accounts.edit');
    Route::post('/chart_of_accounts/update/{id}', [ChartOfAccountController::class, 'update'])->name('chart_of_accounts.update');
    Route::get('/chart_of_accounts/destroy/{id}', [ChartOfAccountController::class, 'destroy'])->name('chart_of_accounts.destroy');