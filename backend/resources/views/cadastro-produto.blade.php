@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cadastroproduto.css') }}">
@endpush

@section('title', 'Cadastro de Produto')

@section('content')

<div class="container">
    <div class="form-section">
        <h2 class="section-title">Cadastro</h2>

        <div class="row g-4 align-items-center">
            <div class="col-12 col-lg-5">
                <label class="w-100" style="cursor: pointer;">
                    <input id="imagem" type="file" name="image" class="d-none" accept="image/*" form="productForm">

                    <div class="upload-area d-flex flex-column justify-content-center align-items-center text-center rounded-4 p-4 w-100">
                        <i class="bi bi-cloud-upload fs-1 mb-3"></i>
                        <p class="mb-0 small text-muted">
                            Arraste sua imagem ou <br>
                            clique aqui para selecionar
                        </p>
                        <p id="file-name" class="mt-2 text-success small"></p>

                        <p class="mt-3 small text-muted" style="max-width: 260px;">
                            💡 <strong>Dica:</strong> tire a foto do produto com boa iluminação, fundo limpo
                            e enquadramento central.<br>
                            <a href="https://youtu.be/rcZ1H4pve1I?si=cLW1XFnAc7DVN1pv" target="_blank">
                                Clique aqui para ver um vídeo rápido com dicas de foto
                            </a>.
                        </p>
                    </div>
                </label>
            </div>

            <div class="col-12 col-lg-7">
                <form id="productForm">
                    @csrf

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Categoria do Produto *</label>
                            <select class="form-select rounded-3" name="category" required>
                                <option value="" selected disabled>Selecione a categoria</option>
                                <option value="Eletronicos">Eletrônicos</option>
                                <option value="Eletrodomesticos">Eletrodomésticos</option>
                                <option value="Roupas">Roupas</option>
                                <option value="Moveis">Móveis</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label">Tipo do Produto *</label>
                            <select class="form-select rounded-3" name="tipo">
                                <option selected disabled>Selecione o tipo</option>
                                <option value="novo">Novo</option>
                                <option value="usado">Usado</option>
                            </select>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Nome de Produto *</label>
                            <input type="text" class="form-control rounded-3" name="name" placeholder="Digite o nome do produto" required>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Marca *</label>
                            <input type="text" class="form-control rounded-3" name="brand" placeholder="Digite a marca" required>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Modelo/SKU *</label>
                            <input type="text" class="form-control rounded-3" name="sku" placeholder="Ex: PROD-001" required>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Preço (R$) *</label>
                            <input type="number" step="0.01" class="form-control rounded-3" name="price" placeholder="0,00" required>
                        </div>

                        <div class="col-6">
                            <label class="form-label">Quantidade *</label>
                            <input type="number" class="form-control rounded-3" name="quantity_available" value="1" required>
                        </div>

                        <div class="col-12">
                            <label class="form-label">Descrição *</label>
                            <textarea class="form-control rounded-3" name="description" rows="4" placeholder="Digite uma descrição do produto" required></textarea>
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

{{-- ======================= SCRIPT ATUALIZADO ============================ --}}

<script>

document.getElementById('productForm').addEventListener('submit', async function (e) {
    e.preventDefault();

    const formData = new FormData(this);

    // Mapeamento com renomeação
    const productData = {
        store_id: 1, // ⚠️ coloque aqui o ID real da loja
        name: formData.get('name'),
        description: formData.get('description'),
        image_url: null, // Será handled depois quando implementar upload real
        price: Number(formData.get('price')),
        quantity_available: Number(formData.get('quantity_available')),
        brand: formData.get('brand'),
        category: formData.get('category'),
        sku: formData.get('sku'),
        tipo: formData.get('tipo')
    };

    try {
        const token=localStorage.getItem('access_token')
        const response = await fetch('http://localhost:8000/api/products', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                "Authorization": 'bearer ' + token 
            },
            body: JSON.stringify(productData)
        });

        const result = await response.json();

        if (response.ok) {
            alert("Produto cadastrado com sucesso!");
            console.log("RESPOSTA DA API:", result);
        } else {
            alert("Erro ao cadastrar produto: " + (result.message ?? 'Erro desconhecido'));
            console.error(result);
        }

    } catch (error) {
        console.error("Erro no fetch:", error);
        alert("Falha na comunicação com o servidor.");
    }
});

// Mostra nome do arquivo selecionado
document.getElementById('imagem').addEventListener('change', function(e) {
    if (e.target.files[0]) {
        document.getElementById('file-name').textContent =
            'Arquivo selecionado: ' + e.target.files[0].name;
    }
});

</script>

@endsection
