<?php

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
    //return '<center><h1>Seja bem vindo ao laravel</h1></center>';
    return view('auth.login');
});

Route::get('/acessorio', 'AcessorioController@cadastroAcessorio');



Route::get('/acessorios', 'AcessorioController@lista');

Route::get('/acessorio/{id}/editar', 'AcessorioController@editar');

Route::get('/acessorio/{id}/associados', 'AcessorioController@associados');

Route::get('/acessorios/nao_associados', 'AcessorioController@nao_associados');

Route::post('/acessorio/salvar', 'AcessorioController@salvar');

Route::post('/acessorio/associar', 'AcessorioController@associar');

Route::post('/acessorio/desassociar', 'AcessorioController@associar');

Route::post('/acessorio/{id}/atualizar', 'AcessorioController@atualizar');

Route::post('/acessorio/{id}/remover','AcessorioController@remover');

Route::post('/manutencao/salvar', 'ManutencaoController@salvar');

Route::get('/ordem/{id}/remover','OrdemServicoController@remover');

Route::get('/equipamento', 'EquipamentoController@cadastroEquipamento');

Route::get('/equipamentos', 'EquipamentoController@lista');

Route::get('/ordems','OrdemServicoController@lista');

Route::get('/ordem', 'OrdemServicoController@cadastroOrdem');

Route::post('/ordem/salvar', 'OrdemServicoController@salvar');

Route::get('/ordem/{id}/editar', 'OrdemServicoController@editar');

Route::post('/ordem/{id}/atualizar', 'OrdemServicoController@atualizar');

Route::get('/equipamentos/relatorio', 'EquipamentoController@relatorio');

Route::get('/manutencao', 'ManutencaoController@lista');

Route::post('/ordem/{id}/imprimir', 'OrdemServicoController@imprimirOrdem');

Route::get('/equipamentos/mostra/{id}', 'EquipamentoController@mostra');

Route::get('/equipamento/{id}/editar', 'EquipamentoController@editar');

Route::post('/equipamento/salvar', 'EquipamentoController@salvar');

Route::post('/equipamento/{id}/atualizar', 'EquipamentoController@atualizar');

Route::post('/equipamento/{id}/remover','EquipamentoController@remover');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
