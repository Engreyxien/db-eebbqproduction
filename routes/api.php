<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LeftoverIngredientsController;
use App\Http\Controllers\LeftoversTurnoverController;
use App\Http\Controllers\LeftoversProduceController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\PurchaseorderChickenController;
use App\Http\Controllers\PurchaseorderIngredientsController;
use App\Http\Controllers\StocksChickensController;
use App\Http\Controllers\StocksIngredientsController;
use App\Http\Controllers\StocksTransferController;
use App\Http\Controllers\UserController;

//Auth
Route::post ('/register', [AuthController::class, 'register']);
Route::post ('/login', [AuthController::class, 'login']);

//User
Route::get('/users', [UserController::class, 'getUsers']);
Route::get('/user/{user_id}', [UserController::class, 'getUser']);


//Protected Routes
Route::group (['middleware' => ['auth:sanctum']], function () {

    //Purchase Order Chicken
    Route::get('/purchaseorderchickens', [PurchaseorderChickenController::class, 'getPurchaseorderChickens']);
    Route::get('/purchaseorderchicken/{purchaseorderchicken_id}', [PurchaseorderChickenController::class, 'getPurchaseorderChicken']);
    Route::post('/purchaseorderchicken', [PurchaseorderChickenController::class, 'setPurchaseorderChicken']);

    //Purchase Order Ingredients
    Route::get('/purchaseorderingredients', [PurchaseorderIngredientsController::class, 'getPurchaseorderIngredients']);
    Route::get('/purchaseordersingredients/{purchaseorderingredients_id}', [PurchaseorderIngredientsController::class, 'getPurchaseorderIngredients']);
    Route::post('/purchaseorderingredient', [PurchaseorderIngredientsController::class, 'setPurchaseorderIngredient']);

    //Stocks Chicken
    Route::get('/stockschickens', [StocksChickensController::class, 'getStocksChickens']);
    Route::get('/stockschicken/{stocksChicken_id}', [StocksChickensController::class, 'getStocksChicken']);
    Route::post('/stockschicken', [StocksChickensController::class, 'setStocksChicken']);

    //Stocks Ingredients
    Route::get('/stocksingredients', [StocksIngredientsController::class, 'getStocksIngredients']);
    Route::get('/stocksingredient/{stocksIngredients_id}', [StocksIngredientsController::class, 'getStocksIngredient']);
    Route::post('/stocksingredient', [StocksIngredientsController::class, 'setStocksIngredient']);

    //Leftovers
    Route::get ('/leftoversturnovers', [LeftoversTurnoverController::class, 'getLeftoversTurnovers']);
    Route::get ('/leftoverturnover/{leftoversturnover_id}', [LeftoversTurnoverController::class, 'getLeftoverTurnover']);
    Route::post('/leftoversturnover', [LeftoversTurnoverController::class, 'setLeftoversTurnover']);

    //Leftovers Produce
    Route::get ('/leftoversproduces', [LeftoversProduceController::class, 'getLeftoversProduces']);
    Route::get ('/leftoversproduce/{leftoversproduce_id}', [LeftoversProduceController::class, 'getLeftoversProduce']);
    Route::post('/leftoversproduce', [LeftoversProduceController::class, 'setLeftoversProduce']);

    //Leftover Ingredients
    Route::get ('/leftoveringredients', [LeftoverIngredientsController::class, 'getLeftoverIngredients']);
    Route::get ('/leftoveringredient/{leftoveringredients_id}', [LeftoverIngredientsController::class, 'getLeftoverIngredient']);
    Route::post('/leftoveringredient', [LeftoverIngredientsController::class, 'setLeftoverIngredient']);

    //Materials
    Route::get ('/materials', [MaterialsController::class, 'getMaterials']);
    Route::get ('/materials/{materials_id}', [MaterialsController::class, 'getMaterial']);
    Route::post('/material', [MaterialsController::class, 'setMaterials']);

    //Stocks Transfer
    Route::get ('/stockstransfers', [StocksTransferController::class, 'getStocksTransfers']);
    Route::get ('/stockstransfer/{stockstransfer_id}', [StocksTransferController::class, 'getStocksTransfer']);
    Route::post('/stockstransfer', [StocksTransferController::class, 'setStocksTransfer']);

    //Profile
    Route::post('/updateprofile', [UserController::class, 'updateProfile']);
    Route::put ('/profile/{user_id}', [UserController::class, 'updateUser']);
    Route::put('/password/{user_id}', [UserController::class, 'updatePassword']);
    Route::post('/logout', [AuthController::class, 'logout']);
});



