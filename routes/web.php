<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $coins = (new KriosMane\CoinMarketCap\Api)->all_cryptos();
////    echo json_encode($coins);
////    die;
//    $coins = $coins['data'];
//    Storage::disk('public')->put('coins.json', json_encode($coins));

    $loadedCoins = Storage::disk('public')->get('coins.json');

    $loadedCoins = collect(json_decode($loadedCoins));

    return view('welcome', compact('loadedCoins'));
});
