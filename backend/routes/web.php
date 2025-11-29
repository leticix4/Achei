<?php

use Illuminate\Support\Facades\Route;

// HOME
Route::get('/', function () {
    return view('index');
})->name('home');

// BUSCA
Route::get('/busca', function () {
    return view('busca');
})->name('busca');

// CADASTRO COMPLETO (PF/PJ)
Route::get('/cadastro-completo', function () {
    return view('cadastro-completo');
})->name('cadastro-completo');

// CADASTRO DE PRODUTO (lojista)
Route::get('/cadastro-produto', function () {
    return view('cadastro-produto');
})->name('cadastro-produto');

// LOJA
Route::get('/loja', function () {
    return view('loja');
})->name('loja');

// PÁGINA DE PRODUTO
Route::get('/produto', function () {
    return view('produto');
})->name('produto');

// Supermercado
Route::get('/supermercado', function () {
    return view('supermercado');
})->name('supermercado');

// Tecnologia
Route::get('/tecnologia', function () {
    return view('tecnologia');
})->name('tecnologia');

// Casa e Móveis
Route::get('/casa-moveis', function () {
    return view('casaMoveis');
})->name('casa-moveis');

// Eletrodomésticos
Route::get('/eletrodomesticos', function () {
    return view('eletrodomesticos');
})->name('eletrodomesticos');

// Esportes
Route::get('/esportes', function () {
    return view('esportes');
})->name('esportes');

// Ferramentas
Route::get('/ferramentas', function () {
    return view('ferramentas');
})->name('ferramentas');

// Construção
Route::get('/construcao', function () {
    return view('construcao');
})->name('construcao');

// Autopeças
Route::get('/autopecas', function () {
    return view('autopecas');
})->name('autopecas');

// Papelaria
Route::get('/papelaria', function () {
    return view('papelaria');
})->name('papelaria');

// Petshop
Route::get('/petshop', function () {
    return view('petshop');
})->name('petshop');

// Saúde
Route::get('/saude', function () {
    return view('saude');
})->name('saude');

// Beleza
Route::get('/beleza', function () {
    return view('beleza');
})->name('beleza');

// Moda
Route::get('/moda', function () {
    return view('moda');
})->name('moda');

// Bebês
Route::get('/bebes', function () {
    return view('bebes');
})->name('bebes');

// Brinquedos
Route::get('/brinquedos', function () {
    return view('brinquedos');
})->name('brinquedos');

// Veículos / acessórios para veículos
Route::get('/veiculos', function () {
    return view('veiculos');
})->name('veiculos');