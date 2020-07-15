<?php

use Illuminate\Support\Facades\Route;

Route::prefix('product')->group(function () {
    Route::get('/order/form', 'Product\OrderController@orderFormIndex')->name('product.order.form.index');
    Route::post('/order/form', 'Product\OrderController@processOrderForm')->name('product.order.form.process');
});
