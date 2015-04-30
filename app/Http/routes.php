<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/', function () {
    return view('index');
});

$app->get('/home', function () {
    return view('enquete.index');
});

$app->get('/enquete', 'App\Http\Controllers\EnqueteController@showAll');
$app->get('/enquete/{id}', 'App\Http\Controllers\EnqueteController@show');
$app->post('/enquete', ['middleware' => 'enqueteMd', 'uses' => 'App\Http\Controllers\EnqueteController@store']);
$app->put('/enquete', 'App\Http\Controllers\EnqueteController@update');
$app->delete('/enquete/{id}', 'App\Http\Controllers\EnqueteController@delete');

/*
 * Rotas das perguntas
 * */
$app->post('/pergunta/store', 'App\Http\Controllers\PerguntaController@store');
$app->delete('/pergunta/{id}', 'App\Http\Controllers\PerguntaController@delete');

/*
 * Rotas das repostas
 * */
$app->post('/resposta/store', 'App\Http\Controllers\RespostaController@store');
$app->post('/resposta/avaliacao/store', 'App\Http\Controllers\RespostaController@storeAvaliacao');
$app->delete('/resposta/{id}', 'App\Http\Controllers\RespostaController@delete');

/*
 * Rotas dos relatorios
 * */
$app->get('/relatorio/{id}', 'App\Http\Controllers\RelatorioController@findAll');