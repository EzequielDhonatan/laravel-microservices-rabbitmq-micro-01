<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{

    /* REGISTER
    ================================================== */
    Register\Category\CategoryController, ## CATEGORY

}; // Controllers

Route::get ('/', function () {
    return response()->json( [ 'message' => 'success' ] );
});

/* CATEGORY
================================================== */
Route::apiResource( 'register/category', CategoryController::class ); ## CATEGORY
