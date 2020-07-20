<?php

use Illuminate\Support\Facades\Route;

Route::prefix('ra')->group(function () {
    Route::get('/excel/upload', 'RA\ExcelController@excelUploadIndex')->name('ra.excel.upload.index');
    Route::post('/excel/upload', 'RA\ExcelController@excelUploadProcess')->name('ra.excel.upload.process');
    Route::get('/excel/download', 'RA\ExcelController@excelExportIndex')->name('ra.excel.download.index');
    Route::post('/excel/download', 'RA\ExcelController@exportToExcel')->name('ra.excel.download.process');
});
