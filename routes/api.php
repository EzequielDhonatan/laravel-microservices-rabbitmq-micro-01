<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\V1\{

    /*
    ================================================== */
    Category\CategoryController, ## CATEGORY

}; // Controllers

Route::get ('/', function () {
    return response()->json( [ 'message' => 'success' ] );
});

Route::group(

    [
        'prefix'        => 'v1',
    ], function () {

    /*
    ================================================== */
    Route::apiResource( 'category', CategoryController::class ); ## CATEGORY

}); // Route::group
