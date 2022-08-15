<?php

use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/updateshardcharacter/{idCharacter}', 'GameController@UpdateShardCharacter')->name('game.updateshardcharacter');
Route::post('/updatecharacter/{idCharacter}', 'GameController@UpdateCharacter')->name('game.updatecharacter');
Route::get('/getaccountcharacters', 'GameController@GetAccountCharacters')->name('game.getaccountcharacters');
Route::get('/getallcharacters', 'GameController@GetAllCharacters')->name('game.getallcharacters');