<?php

use App\Http\Controllers\RepairController;

Route::get('/', function () {
    return redirect()->route('repairs.index');
});

Route::resource('repairs', RepairController::class);