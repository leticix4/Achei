@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/loja.css') }}">
@endpush

@section('title', 'Loja')

@section('content')

    <section class="store-banner">
        <div class="container position-relative h-100">
            <div class="store-profile d-flex align-items-center">
                <img src="{{ asset('banner/iconloja.png') }}" alt="Logo da Loja" class="store-logo me-3">
                <h1 style="color: #dee2e6;" class="store-name">{{ $loja->name }}</h1>
            </div>
        </div>
    </section>

    <section class="store-nav-wrapper">
        <div class="container store-nav d-flex justify-content-between align-items-center">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="/loja/{{ $loja->id }}">Início</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="/loja/{{ $loja->id }}/produtos">Produtos</a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <div class="me-4">
                    <strong>Avaliação da Loja: 4.8</strong> <i class="bi bi-star-fill text-warning"></i>
                </div>
                <a
                href="https://wa.me/?text={{ urlencode('Confira essa Loja que encontrei!' . url()->current()) }}"
                target="_blank"
                class="btn btn-outline-success"
            >
                <i class="bi bi-whatsapp me-2"></i> Compartilhar
            </a>
            </div>
        </div>
    </section>

   <main class="container">
    <!-- Seção de Produtos -->
    <section class="produtos py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-body mb-0">Produtos da Loja</h4>

        </div>

        @if($products->count() > 0)
            <div class="row g-3">
                @foreach($products as $product)
                    <div class="col-xxl-2 col-xl-2 col-lg-3 col-md-4 col-sm-6">
                        <div class="card product-card h-100 border-0 shadow-sm hover-shadow transition-all">
                            <!-- Imagem do Produto com overlay -->
                            <div class="card-img-container position-relative overflow-hidden rounded-top" style="height: 160px;">
                                <img src="{{ $product->image_url ?: asset('image/arroz.png') }}"
                                     alt="{{ $product->name }}"
                                     class="img-fluid w-100 h-100 object-fit-cover transition-transform">

                                <!-- Badge de disponibilidade -->
                                @if($product->quantity_available <= 0 || !$product->is_available)
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <span class="badge bg-danger bg-opacity-90">ESGOTADO</span>
                                    </div>
                                @elseif($product->quantity_available < 10)
                                    <div class="position-absolute top-0 end-0 m-2">
                                        <span class="badge bg-warning text-dark">ÚLTIMAS UNIDADES</span>
                                    </div>
                                @endif
                            </div>

                            <div class="card-body p-3 d-flex flex-column">
                                <!-- Nome e Marca -->
                                <div class="mb-2">
                                    <h6 class="card-title fw-bold mb-1 text-truncate" style="font-size: 0.95rem;">
                                        {{ $product->name }}
                                    </h6>
                                    @if($product->brand)
                                        <p class="text-muted small mb-2 text-truncate">{{ $product->brand }}</p>
                                    @endif
                                </div>

                                <!-- Preço em destaque -->
                                <div class="mt-auto">
                                    <div class="d-flex align-items-center justify-content-between mb-2">
                                        <p class="fw-bold text-dark fs-5 mb-0">
                                            R$ {{ number_format($product->price, 2, ',', '.') }}
                                        </p>
                                        @if($product->quantity_available > 0)
                                            <span class="badge bg-success bg-opacity-10 text-success small">
                                                <i class="bi bi-check-circle me-1"></i>{{ $product->quantity_available }}
                                            </span>
                                        @endif
                                    </div>

                                    <!-- Botão de ação -->
                                    <div class="pt-2 border-top">
                                        @if($product->is_available && $product->quantity_available > 0)
                                            <a class="btn btn-outline-primary w-100 btn-sm"
                                               href="{{ route('produto.show', $product->id) }}">
                                                <i class="bi bi-eye me-1"></i>Ver detalhes
                                            </a>
                                        @else
                                            <button class="btn btn-outline-secondary w-100 btn-sm" disabled>
                                                <i class="bi bi-slash-circle me-1"></i>Indisponível
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <!-- Mensagem quando não há produtos -->
            <div class="text-center py-5">
                <div class="empty-state mb-4">
                    <i class="bi bi-basket display-1 text-light bg-secondary rounded-circle p-4"></i>
                </div>
                <h5 class="text-muted mb-2">Nenhum produto disponível</h5>
                <p class="text-secondary small">Esta loja ainda não possui produtos cadastrados.</p>
            </div>
        @endif
    </section>
</main>

<style>
.product-card {
    transition: all 0.3s ease;
    border-radius: 12px !important;
}

.product-card:hover {
    transform: translateY(-4px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1) !important;
}

.card-img-container:hover img {
    transform: scale(1.05);
}

.card-img-container img {
    transition: transform 0.5s ease;
}

.hover-shadow {
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

.transition-all {
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
}

.empty-state {
    opacity: 0.6;
}

.btn-voltar {
    cursor: pointer;
    padding: 6px 12px;
    border-radius: 6px;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    font-size: 0.875rem;
}

.btn-voltar:hover {
    background: #e9ecef;
}

.badge {
    font-size: 0.7rem;
    font-weight: 500;
    padding: 3px 8px;
}

.text-truncate {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

/* Responsividade */
@media (max-width: 768px) {
    .card-img-container {
        height: 140px !important;
    }

    .product-card .card-body {
        padding: 12px !important;
    }
}
</style>
</main>
@endsection
