<?php

use Illuminate\Support\Facades\Route;

Route::prefix('product')->group(function () {
    Route::get('/order/form', 'Product\OrderController@orderFormIndex')->name('product.order.form.index');
    Route::post('/order/form', 'Product\OrderController@processOrderForm')->name('product.order.form.process');
    Route::get('/order/excel', 'Product\OrderController@orderExportIndex')->name('product.order.export.index');
    Route::post('/order/form', 'Product\OrderController@exportOrderToExcel')->name('product.order.export.process');
});
