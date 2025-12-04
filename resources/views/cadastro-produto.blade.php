@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cadastroproduto.css') }}">
@endpush

@section('title', 'Cadastro de Produto')

@section('content')

    <div class="container">
        <div class="form-section">
            <h2 class="section-title">Cadastro de Produto</h2>

            <a href="{{ route('loja.produtos.lista') }}" class="btn btn-outline-secondary mb-4">
                <i class="bi bi-arrow-left me-2"></i> Voltar para a Gestão
            </a>

            <div class="row g-4 align-items-center">
                <div class="col-12 col-lg-5">
                    <label class="w-100" style="cursor: pointer;">
                        <input id="imagem" type="file" name="image" class="d-none" accept="image/*"
                            form="productForm">

                        <div
                            class="upload-area d-flex flex-column justify-content-center align-items-center text-center rounded-4 p-4 w-100">
                            <i class="bi bi-cloud-upload fs-1 mb-3"></i>
                            <p class="mb-0 small text-muted">
                                Arraste sua imagem ou <br>
                                clique aqui para selecionar
                            </p>
                            <p id="file-name" class="mt-2 text-success small"></p>

                            <p class="mt-3 small text-muted" style="max-width: 260px;">
                                💡 <strong>Dica:</strong> tire a foto do produto com boa iluminação.
                            </p>
                        </div>
                    </label>
                </div>

                <div class="col-12 col-lg-7">
                    <form id="productForm" action="{{ route('produto.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Categoria do Produto *</label>
                                <select class="form-select rounded-3" name="category" required>
                                    <option value="" selected disabled>Selecione a categoria</option>
                                    <option value="supermercado">Supermercado</option>
                                    <option value="tecnologia">Tecnologia</option>
                                    <option value="casa-moveis">Casa e Móveis</option>
                                    <option value="eletrodomesticos">Eletrodomésticos</option>
                                    <option value="esportes">Esportes e Fitness</option>
                                    <option value="ferramentas">Ferramentas</option>
                                    <option value="construcao">Construção</option>
                                    <option value="autopecas">Autopeças</option>
                                    <option value="papelaria">Papelaria</option>
                                    <option value="petshop">Pet Shop</option>
                                    <option value="saude">Saúde</option>
                                    <option value="veiculos">Acessórios para Veículos</option>
                                    <option value="beleza">Beleza e Cuidado Pessoal</option>
                                    <option value="moda">Moda</option>
                                    <option value="bebes">Bebês</option>
                                    <option value="brinquedos">Brinquedos</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Tipo do Produto *</label>
                                <select class="form-select rounded-3" name="tipo" required>
                                    <option selected disabled>Selecione o tipo</option>
                                    <option value="novo">Novo</option>
                                    <option value="usado">Usado</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Nome de Produto *</label>
                                <input type="text" class="form-control rounded-3" name="name"
                                    placeholder="Digite o nome do produto" required>
                            </div>

                            <div class="col-6">
                                <label class="form-label">Marca *</label>
                                <input type="text" class="form-control rounded-3" name="brand"
                                    placeholder="Digite a marca" required>
                            </div>

                            <div class="col-6">
                                <label class="form-label">Modelo/SKU *</label>
                                <input type="text" class="form-control rounded-3" name="sku"
                                    placeholder="Ex: PROD-001" required>
                            </div>

                            <div class="col-6">
                                <label class="form-label">Preço (R$) *</label>
                                <input type="number" step="0.01" class="form-control rounded-3" name="price"
                                    placeholder="0,00" required>
                            </div>

                            <div class="col-6">
                                <label class="form-label">Quantidade *</label>
                                <input type="number" class="form-control rounded-3" name="quantity_available"
                                    value="1" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Descrição *</label>
                                <textarea class="form-control rounded-3" name="description" rows="4" placeholder="Digite uma descrição do produto"
                                    required></textarea>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end mt-3">
                            <button type="submit" class="btn btn-success px-4">Finalizar Cadastro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.getElementById('productForm').addEventListener('submit', async function(e) {
                e.preventDefault();

                const formData = new FormData(this);

                try {
                    const token = localStorage.getItem('access_token');
                    const apiEndpoint = "{{ route('produto.store') }}";

                    const response = await fetch(apiEndpoint, {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            "Authorization": 'bearer ' + token
                        },
                        body: formData
                    });

                    const result = await response.json();

                    if (response.ok) {
                        alert("Produto cadastrado com sucesso!");
                        window.location.href = "{{ route('loja.produtos.lista') }}";
                    } else {
                        alert("Erro ao cadastrar produto: " + (result.message ?? 'Erro desconhecido'));
                        console.error(result);
                    }

                } catch (error) {
                    console.error("Erro no fetch:", error);
                    alert("Falha na comunicação com o servidor.");
                }
            });

            document.getElementById('imagem').addEventListener('change', function(e) {
                if (e.target.files[0]) {
                    document.getElementById('file-name').textContent =
                        'Arquivo selecionado: ' + e.target.files[0].name;
                }
            });
        </script>
    @endpush
@endsection
