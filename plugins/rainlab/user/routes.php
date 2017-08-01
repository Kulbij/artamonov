<?php namespace RainLab\User;

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function () {
    Route::get('facebook', 'RainLab\User\Handlers\ProcessSocialsRegister@authFacebook');
    Route::get('vk', 'RainLab\User\Handlers\ProcessSocialsRegister@authVk');
});

Route::group(['prefix' => 'register'], function () {
    Route::get('facebook', 'RainLab\User\Handlers\ProcessSocialsRegister@registerFacebook');
    Route::get('vk', 'RainLab\User\Handlers\ProcessSocialsRegister@registerVk');
});