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

Route::get('/procurarUser','procurarUserController@index');
Route::post('/procurarUser/showUser','procurarUserController@showUser');


Route::get('/perfil','perfilController@index');
Route::post('/perfil','perfilController@update_avatar');
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

Route::group(array('prefix' => 'api'), function()
{

  	Route::get('/', function () 
  	{
      return response()->json(['message' => 'Api Rate Me', 'status' => 'Connected']);;
  	});
  	Route::get('/getInstitution','apiController@getInstitutions');
  	Route::get('/getCourses/{inst_name}','apiController@getCourses');
  	Route::get('/getDisciplines/{inst_name}/{course_name}','apiController@getDisciplines');
  	Route::get('/getInstitutionsUser/{inst_name}','apiController@getInstitutionsUser');
 	Route::get('/getInstitutionsProff/{inst_name}','apiController@getInstitutionsProff');
 	Route::get('/getNumberOfGroups','apiController@getNumberOfGroups');
});




