<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\support\Facades\JWTAuth;
use App\Http\Controllers\CreateController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\LableController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//User Registration

Route::POST('jointables',[LableController::class,'JoinTables']);


Route::POST('Notes',[NotesController::class,'CreateNotes']);
Route::get('displayNotes',[NotesController::class,'display_createdNotes']);
Route::get('displayNotes/{id}',[NotesController::class,'display_createdNotes_ID']);
Route::put('updateNotes/{id}',[NotesController::class,'update_createdNotes_ID']);
Route::post('updateNotes/{id}',[NotesController::class,'update_createdNotes_ID']);
Route::delete('deleteNotes/{id}',[NotesController::class,'delete_createdNotes_ID']);


Route::POST('lable',[LableController::class,'CreateLable']);
Route::get('displayLable',[LableController::class,'display_CreateLable']);
Route::get('displayLable/{id}',[LableController::class,'display_CreateLable_ID']);
Route::put('updateLable/{id}',[LableController::class,'update_CreateLable_ID']);
Route::post('updateLable/{id}',[LableController::class,'update_CreateLable_ID']);
Route::delete('deleteLable/{id}',[LableController::class,'delete_CreateLable_ID']);


Route::POST('registration',[AuthController::class,'Registerdata']);
Route::POST('login',[AuthController::class,'login']);




Route::middleware(['auth:sanctum'])->group(function(){

    //User Logout 
    Route::POST('logout',[AuthController::class,'logout']);

    //creating Data
    Route::POST('create',[CreateController::class,'store']);

    //Retrieve Data 
    Route::get('displaydata',[CreateController::class,'display']);

    //retrieve data Based on id
    Route::get('displaydata_by_ID/{id}',[CreateController::class,'display_by_id']);

    //update data by PUT method
    Route::put('updatedata_by_ID/{id}',[CreateController::class,'update_by_id']);
    //update data by POST method
    Route::POST('updatedata_by_ID/{id}',[CreateController::class,'update_by_id']);

    //Delete data by Delete method
    Route::Delete('deletedata_by_ID/{id}',[CreateController::class,'delete_by_id']);
});

Route::post('forgotPassword',[CreateController::class,'forgotPassword']);



