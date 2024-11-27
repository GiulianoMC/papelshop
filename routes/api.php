<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {

    // Pessoas
    Route::apiResource('pessoas', 'PessoaApiController');

    // Perfils
    Route::apiResource('perfils', 'PerfilApiController');

});
