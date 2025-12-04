@extends('layouts.app')

@section('title', $store->name)

@section('content')

{{-- HEADER MINIMALISTA --}}
<header class="bg-body border-bottom py-3">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">

            <div class="d-flex align-items-center gap-4">
                <div class="rating-badge d-flex align-items-center gap-2 bg-body-tertiary px-3 py-2 rounded-pill">
                    <i class="bi bi-star-fill text-warning fs-6"></i>
                    <span class="fw-bold text-body">
                        {{ number_format($avaliacoes->avg('nota'), 1) ?? 'N/A' }}
                    </span>
                    <span class="text-body-secondary fs-6">
                        • {{ $avaliacoes->count() }}
                    </span>
                </div>

                <a href="https://wa.me/?text={{ urlencode('Confira essa Loja: ' . url()->current()) }}"
                   target="_blank"
                   class="btn btn-outline-success d-flex align-items-center gap-2 px-3">
                    <i class="bi bi-whatsapp"></i>
                    <span class="small">Compartilhar</span>
                </a>
            </div>

            @auth
            <div class="dropdown">
                <button class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-2"
                        type="button"
                        data-bs-toggle="dropdown">
                    <i class="bi bi-gear"></i>
                    <span>Gerenciar</span>
                </button>

                <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 bg-body">
                    <li>
                        <a class="dropdown-item d-flex align-items-center gap-3 py-2"
                           href="{{ route('cadastro-produto') }}">
                            <i class="bi bi-plus-circle"></i>
                            <span>Cadastrar Produto</span>
                        </a>
                    </li>
                </ul>
            </div>
            @endauth
        </div>
    </div>
</header>


{{-- HERO SECTION --}}
<section class="bg-body py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-4 mb-4 mb-md-0">
                <div class="store-avatar position-relative mx-auto" style="max-width: 200px;">
                    <img src="{{ $store->image_url ?: asset('banner/iconloja.png') }}"
                         class="rounded-circle img-fluid border border-3 border-body shadow"
                         style="width: 200px; height: 200px; object-fit: cover;">

                    <div class="verified-badge position-absolute bottom-0 end-0 bg-body p-2 rounded-circle shadow">
                        <i class="bi bi-check-circle-fill text-success fs-5"></i>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="store-header">
                    <h1 class="display-5 fw-bold text-body mb-3">{{ $store->name }}</h1>

                    <div class="d-flex flex-wrap align-items-center gap-3 mb-4">
                        <div class="d-flex align-items-center">
                            <div class="text-warning fs-5 me-2">
                                @for($i = 1; $i <= 5; $i++)
                                    <i class="bi bi-star-fill{{ $i > $avaliacoes->avg('nota') ? '-empty' : '' }}"></i>
                                @endfor
                            </div>
                            <span class="fw-bold text-body">
                                {{ number_format($avaliacoes->avg('nota'), 1) }}
                            </span>
                        </div>

                        @if($store->category)
                        <span class="badge bg-body-tertiary text-body border px-3 py-2">
                            <i class="bi bi-tag me-1"></i>{{ $store->category }}
                        </span>
                        @endif
                    </div>

                    @if($store->description)
                    <p class="lead text-body-secondary mb-0">
                        {{ $store->description }}
                    </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>


{{-- MAIN CONTENT --}}
<main class="container py-5">
    @if (count($produtos) > 0)
            <div class="list-group">
                @foreach ($produtos as $produto)
                    <div class="list-group-item list-group-item-action py-3">
                        <div class="row align-items-center">

                            <div class="col-8 col-md-6 d-flex align-items-center">
                                <img src="{{ $produto->image_url ?? asset('image/arroz.png') }}"
                                    alt="{{ $produto->name }}" class="rounded me-3"
                                    style="width: 50px; height: 50px; object-fit: cover;">

                                <div>
                                    <h5 class="mb-0">{{ $produto->name }}</h5>
                                    <small class="text-muted">Categoria: {{ $produto->category }}</small>
                                </div>
                            </div>

                            {{-- PREÇO E ESTOQUE --}}
                            <div class="col-4 col-md-3 text-start">
                                <span class="d-block fw-bold">R$ {{ number_format($produto->price, 2, ',', '.') }}</span>
                                <small class="text-success">Em estoque</small>
                            </div>

                            {{-- BOTÕES DE AÇÃO --}}
                            <div class="col-12 col-md-3 text-md-end text-start mt-3 mt-md-0">
                                {{-- Botão para a página de edição do produto --}}
                                <a href= class="btn btn-sm btn-primary me-2">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                {{-- Botão para exclusão (usando formulário POST/DELETE) --}}
                                <form  method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Tem certeza que deseja excluir este produto?');">
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                Ainda não há produtos cadastrados nesta loja.
                <a href="{{ route('cadastro-produto') }}" class="alert-link">Cadastre seu primeiro produto aqui.</a>
            </div>
        @endif
</main>

@endsection

@push('styles')
<style>
.store-avatar {
    position: relative;
}

.verified-badge {
    border: 3px solid #fff;
}

.icon-wrapper {
    transition: transform 0.2s ease;
}

.icon-wrapper:hover {
    transform: translateY(-2px);
}

.review-card {
    transition: all 0.2s ease;
    background: #fff;
}

.review-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.05);
}

.time-table div:last-child {
    border-bottom: none !important;
}

.sticky-top {
    position: -webkit-sticky;
    position: sticky;
}

.rating-badge {
    border: 1px solid #e9ecef;
}

.btn-outline-dark:hover {
    transform: translateY(-1px);
}

.card {
    border-radius: 12px;
    overflow: hidden;
}

#mapa-loja {
    border-radius: 12px 12px 0 0;
}
</style>
@endpush

@push('scripts')
<script>
    window.lojaData = @json($store);
    window.formattedAddress = "{{ $store->address }}, {{ $store->number }} - {{ $store->district }}, {{ $store->city }}";
</script>

<script>
window.initLojaMap = function() {
    const loja = {
        name: window.lojaData.name,
        address: window.formattedAddress,
        lat: parseFloat(window.lojaData.latitude),
        lng: parseFloat(window.lojaData.longitude)
    };

    const map = new google.maps.Map(document.getElementById('mapa-loja'), {
        center: { lat: loja.lat, lng: loja.lng },
        zoom: 15,
        mapTypeControl: false,
        streetViewControl: false,
        fullscreenControl: true,
        zoomControl: true,
        styles: [
            {
                featureType: "all",
                elementType: "labels",
                stylers: [{ visibility: "off" }]
            },
            {
                featureType: "road",
                elementType: "geometry",
                stylers: [{ color: "#f5f5f5" }]
            },
            {
                featureType: "water",
                elementType: "geometry",
                stylers: [{ color: "#e9ecef" }]
            }
        ]
    });

    const marker = new google.maps.Marker({
        position: { lat: loja.lat, lng: loja.lng },
        map: map,
        title: loja.name,
        animation: google.maps.Animation.DROP,
        icon: {
            url: "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 40 40'%3E%3Ccircle cx='20' cy='20' r='18' fill='%23212529' stroke='%23fff' stroke-width='3'/%3E%3Cpath d='M20 10 L20 30 M10 20 L30 20' stroke='%23fff' stroke-width='2'/%3E%3C/svg%3E"
        }
    });

    const infoWindow = new google.maps.InfoWindow({
        content: `
            <div style="padding: 12px; max-width: 250px;">
                <h6 style="font-weight: 600; margin: 0 0 4px 0;">${loja.name}</h6>
                <p style="color: #6c757d; font-size: 14px; margin: 0;">
                    <i class="bi bi-geo-alt-fill" style="color: #dc3545; margin-right: 4px;"></i>
                    ${loja.address}
                </p>
            </div>
        `
    });

    marker.addListener('click', () => {
        infoWindow.open(map, marker);
    });

    // Open info window automatically
    infoWindow.open(map, marker);
};
</script>

<script async defer
src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initLojaMap"></script>
@endpush
