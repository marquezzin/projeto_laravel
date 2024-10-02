<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//rota encaminhando para um método da controller
Route::get('/', [\App\Http\Controllers\PrincipalController::class, 'principal'])->name('site.index');
Route::get('/sobre-nos', [\App\Http\Controllers\SobreNosController::class, 'sobreNos'])->name('site.sobrenos');
Route::get('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::post('/contato', [\App\Http\Controllers\ContatoController::class, 'contato'])->name('site.contato');
Route::get('/login', function(){return 'Login';})->name('site.login');

//adicionando prefixo para rotas, relação de dependência
Route::prefix('/app')->group(function(){
    Route::get('/clientes', function(){return 'Clientes';})->name('app.clientes');
    Route::get('/fornecedores',[\App\Http\Controllers\FornecedorController::class, 'index'])->name('app.fornecedores');
    Route::get('/produtos', function(){return 'Produtos';})->name('app.produtos');
});

Route::get('/teste/{p1}/{p2}',[\App\Http\Controllers\TesteController::class, 'teste'])->name('teste');

//Redirecionamento
//Opção 1:
// Route::get('/rota2',function(){
//     return redirect()->route('site.rota1'); //redirecionamento pelo nome
// })->name('site.rota2');

//Opção 2:
//Route::redirect('/rota2','rota1'); origem,destino

//Fallback: rota que será o alvo de redirecionamento quando a rota atual não existe
Route::fallback(function(){
    echo 'A rota acessada não existe,<a href="'.route('site.index').'">clique aqui</a> para ir para página inicial'; //fecha aspas simples p/ concatenar
});