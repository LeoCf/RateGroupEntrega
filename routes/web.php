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
    return view('welcome');
});

Auth::routes();


Route::get('/home', 'HomeController@index');

Route::get('/perfil','perfilController@index');

//Rotas para gestão das disciplinas e Grupos
Route::get('/gerirDisciplinasGrupos','gerirDiscpGroupController@index');
Route::post('/gerirDisciplinasGrupos/{id}','gerirDiscpGroupController@adicionar_disciplina_utilizador');
Route::post('/gerirDisciplinasGrupos/remove/{id}' , 'gerirDiscpGroupController@remover_disciplina_utilizador');
Route::post('/gerirDisciplinasGrupos' , 'gerirDiscpGroupController@adicionar_grupo_utilizador');

//Rotas para a procurar alunos sem grupo
Route::get('/procurarGrupos','procurarGrupoController@index');
Route::post('/procurarGrupos/{id}','procurarGrupoController@disciplina_escolhida');
Route::post('/procurarGrupos/aderir_grupo/{id}','procurarGrupoController@aderir_grupo');


//Rotas para avaliar utilizadores 
Route::get('/avaliar/index','avaliarController@index');
Route::get('/avaliar','avaliarController@meusGrupos');
Route::get('/avaliar/show','avaliarController@show');
//Route::post('/avaliar/alunoEscolhido','avaliarController@alunoEscolhido');
Route::post('/avaliar','avaliarController@add');

Route::post('/avaliacao/grupo/{group_id}','avaliarController@constGrupo');
Route::post('/avClgs/aluno/{user_id}','avaliarController@alunoEscolhido');

Route::post('/avClgs/add','avGrupos@add');
Route::get('/avClgs/','avGruposController@index');