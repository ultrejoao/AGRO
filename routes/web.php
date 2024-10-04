<?php

// Importa a classe Route do namespace Illuminate\Support\Facades para facilitar a
//definição de rotas.
use Illuminate\Support\Facades\Route;

// Importa o controlador ProdutoController do namespace App\Http\Controllers,
//permitindo que ele seja referenciado facilmente nas rotas.
use App\Http\Controllers\ProductController;

// Define uma rota GET para '/products'. Quando esta rota é acessada via navegador
//ou cliente HTTP, ela executa o método 'index' do ProdutoController.
// O método 'index' é responsável por recuperar todos os produtos do banco de
//dados e retornar uma view para exibi-los.
Route::get('/products', [ProductController::class, 'index']);

// Define uma rota POST para '/products'. Esta rota é usada para enviar dados de
//um formulário ou API para criar um novo produto.
// Os dados enviados são processados pelo método 'store' do ProdutoController,
//que salva o novo produto no banco de dados.
Route::post('/products', [ProductController::class, 'store']);

// Define uma rota GET para '/products/{id}/edit', onde {id} é um placeholder para o
//ID do produto que será editado.
// Esta rota é usada para exibir a página de edição de um produto específico. O
//método 'edit' do ProdutoController é responsável por preparar a view de edição.
// O parâmetro 'where' é usado para garantir que apenas valores numéricos sejam
//aceitos para o ID do produto.
Route::get('/products/{id}/edit', [ProdutoController::class, 'edit'])->where('id', '[0-9]+');

// Define uma rota PUT para '/products/{id}' e uma rota PATCH para '/products/{id}'.
//Ambas as rotas são usadas para atualizar um produto existente.
// Elas enviam os novos dados do produto para o método 'update' do
//ProdutoController, que atualiza o registro do produto no banco de dados.
// Assim como na rota de edição, o parâmetro 'where' garante que apenas IDs
//numéricos sejam aceitos.
Route::put('/products/{id}', [ProductController::class, 'update'])->where('id', '[0-9]+');
Route::patch('/products/{id}', [ProductController::class, 'update'])->where('id', '[0-9]+');

// Define uma rota DELETE para '/products/{id}', onde {id} é um placeholder para o
//ID do produto que será excluído.
// Esta rota é usada para remover um produto do banco de dados. O método
//'destroy' do ProdutoController é responsável por deletar o registro do produto.

// Novamente, o parâmetro 'where' é utilizado para validar que o ID do produto seja
//numérico.
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->where('id', '[0-9]+');