<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\{

    /* REGISTER
    ================================================== */
    Register\Category\CategoryController, ## CATEGORY

}; // Controllers

Route::get ('/', function () {
    return response()->json( [ 'message' => 'success' ] );
});

Route::group(

    [
        'prefix'        => 'v1',
    ], function () {

    /* REGISTER
    ================================================== */
    Route::apiResource( 'register/category', CategoryController::class ); ## CATEGORY

}); // Route::group
