@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/busca.css') }}">
@endpush

@section('title', 'Resultados da Busca')

@section('content')
    <main class="container my-4">

        {{-- Título + info da busca --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                @if ($q)
                    <h2 class="h5 text-muted mb-1">
                        Resultados para: <strong>"{{ $q }}"</strong>
                    </h2>
                @else
                    <h2 class="h5 text-muted mb-1">
                        Resultados da busca
                    </h2>
                @endif

                <p class="small text-muted mb-0">
                    {{ $products->total() }} produto(s) encontrado(s)
                </p>
            </div>

            {{-- Filtros de ordenação --}}
            <div class="dropdown">
                <button class="btn btn-light border dropdown-toggle" type="button" id="filterMenu" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i class="bi bi-filter me-2"></i> Filtros
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="filterMenu">
                    <li>
                        <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'preco_asc']) }}">
                            Menor preço
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'preco_desc']) }}">
                            Maior preço
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ request()->fullUrlWithQuery(['sort' => 'avaliacao_desc']) }}">
                            Melhor avaliação
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        @if ($products->count() === 0)
            {{-- NENHUM RESULTADO --}}
            <div class="row justify-content-center my-5">
                <div class="col-md-8 text-center">

                    {{-- EMOJI PENSATIVO --}}
                    <div style="font-size: 80px; line-height: 1;">🤔</div>

                    <h3 class="mt-3 fw-bold text-secondary">
                        Não encontramos nenhum resultado
                        @if ($q)
                            para "<span class="text-primary">{{ $q }}</span>"
                        @endif
                    </h3>

                    <p class="mt-3 text-muted">
                        O que eu devo fazer?
                    </p>

                    <ul class="list-unstyled text-muted">
                        <li>• Verifique os termos digitados.</li>
                        <li>• Tente utilizar uma única palavra.</li>
                        <li>• Use termos mais genéricos na busca.</li>
                        <li>• Tente utilizar sinônimos do termo desejado.</li>
                    </ul>

                    <a href="{{ url()->previous() }}" class="btn btn-outline-primary mt-3">
                        Voltar e tentar novamente
                    </a>
                </div>
            </div>
        @else
            {{-- GRID DE PRODUTOS (5 colunas em telas grandes) --}}
            <div id="product-grid" class="row row-cols-2 row-cols-md-3 row-cols-xl-5 g-3">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="product-card h-100">
                            <a href="{{ route('produto.show', $product->id ?? 1) }}">
                                <img src="{{ $product->image_url ?? asset('image/arroz.png') }}" alt="{{ $product->name }}"
                                    class="img-fluid">
                            </a>

                            <div class="product-name text-ligh mt-2">
                                <a  href="{{ route('produto.show', $product->id ?? 1) }}">
                                    {{ $product->name }}
                                </a>
                            </div>

                            @if (property_exists($product, 'rating') || isset($product->rating))
                                <div class="product-rating small">
                                    {{ number_format($product->rating, 1) }} <i class="bi bi-star-fill"></i>
                                </div>
                            @endif

                            <div class="product-price fw-bold">
                                R$ {{ number_format($product->price, 2, ',', '.') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- PAGINAÇÃO --}}
            <div class="d-flex justify-content-center mt-4">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        @endif

    </main>
@endsection
