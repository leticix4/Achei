@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cadastroproduto.css') }}">
@endpush

@section('title', 'Cadastro de Produto')

@section('content')

    <!-- FORM CADASTRO -->
    <div class="container">
        <div class="form-section">
            <h2 class="section-title">Cadastro</h2>

            <div class="row g-4 align-items-center">
                <!-- Upload (esquerda) -->
                <div class="col-12 col-lg-5">
                    <label class="w-100">
                        <input id="imagem" type="file" class="d-none" accept="image/*">
                        <div
                            class="upload-area d-flex flex-column justify-content-center align-items-center text-center rounded-4 p-4 w-100">
                            <i class="bi bi-cloud-upload fs-1 mb-3"></i>
                            <p class="mb-0 small text-muted">
                                Arraste sua imagem ou <br>
                                clique aqui para selecionar
                            </p>
                        </div>
                    </label>
                </div>
                <!-- Form (direita) -->
                <div class="col-12 col-lg-7">
                    <form>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Categoria do Produto *</label>
                                <select class="form-select rounded-3">
                                    <option selected>Selecione a categoria do produto</option>
                                    <option>Eletrônicos</option>
                                    <option>Eletrodomésticos</option>
                                    <option>Roupas</option>

                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Tipo do Produto *</label>
                                <select class="form-select rounded-3">
                                    <option selected>Selecione o tipo do produto</option>
                                    <option>Novo</option>
                                    <option>Usado</option>
                                    <option>Recondicionado</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Nome de Produto *</label>
                                <input type="text" class="form-control rounded-3" placeholder="Digite o nome do produto">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Marca do Produto *</label>
                                <input type="text" class="form-control rounded-3"
                                    placeholder="Digite o marca do produto">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Modelo do Produto *</label>
                                <input type="text" class="form-control rounded-3"
                                    placeholder="Digite o modelo do produto">
                            </div>

                            <div class="col-12">
                                <label class="form-label">Descrição *</label>
                                <textarea class="form-control rounded-3" rows="4" placeholder="Digite uma descrição do produto"></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button class="btn btn-success px-4">Finalizar Cadastro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection
