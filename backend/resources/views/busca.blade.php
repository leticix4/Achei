@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/busca.css') }}">
    <style>
        #map {
            width: 100%;
            height: 400px;
            border-radius: 12px;
        }

        .product-card {
            background: #fff;
            border-radius: 12px;
            padding: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
            height: 100%;
        }

        .product-name-main {
            font-size: 1.4rem;
            font-weight: 700;
            color: #003147;
        }

        .offer-store-name {
            font-weight: 600;
            color: #003147;
        }

        .offer-price {
            font-weight: 700;
            color: #1e8e3e;
        }
    </style>
@endpush

@section('title', $product->name)

@section('content')
    <main class="container my-4">
        <div class="row mb-4">
            <div class="col-md-8">
                <h1 class="product-name-main">{{ $product->name }}</h1>
                <p class="text-muted mb-1">
                    Marca: <strong>{{ $product->brand ?? '—' }}</strong>
                </p>
                <p class="text-muted mb-1">
                    Categoria: <strong>{{ $product->category ?? '—' }}</strong>
                </p>
                @if ($product->sku)
                    <p class="text-muted mb-1">
                        SKU: <strong>{{ $product->sku }}</strong>
                    </p>
                @endif
            </div>
            <div class="col-md-4 text-md-end mt-3 mt-md-0">
                <span class="text-muted small d-block">A partir de</span>
                @php
                    $minPrice = $offers->min('price') ?? $product->price;
                @endphp
                <span class="fs-3 fw-bold text-success">
                    R$ {{ number_format($minPrice, 2, ',', '.') }}
                </span>
            </div>
        </div>

        <div class="row">
            {{-- Lado esquerdo: lojas que vendem esse produto --}}
            <div class="col-lg-7 col-md-12 mb-4">
                <h2 class="h5 text-muted mb-3">
                    Lojas que vendem este produto
                </h2>

                @if ($offers->isEmpty())
                    <div class="alert alert-info">
                        Ainda não temos lojas com este produto cadastrado no mapa.
                    </div>
                @else
                    <div class="row row-cols-1 row-cols-md-2 g-3">
                        @foreach ($offers as $offer)
                            @php
                                $store = $offer->store;
                            @endphp
                            <div class="col">
                                <div class="product-card">
                                    <div class="offer-store-name mb-1">
                                        {{ $store?->trade_name ?? ($store?->name ?? 'Loja') }}
                                    </div>
                                    <div class="text-muted small mb-1">
                                        Preço:
                                    </div>
                                    <div class="offer-price mb-2">
                                        R$ {{ number_format($offer->price, 2, ',', '.') }}
                                    </div>

                                    <div class="small text-muted mb-2">
                                        @if ($store?->latitude && $store?->longitude)
                                            Localização disponível no mapa.
                                        @else
                                            Localização ainda não cadastrada.
                                        @endif
                                    </div>

                                    @if (Route::has('loja') && $store)
                                        <a href="{{ route('loja', $store->id) }}"
                                            class="btn btn-sm btn-outline-primary w-100">
                                            Ver loja
                                        </a>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>

            {{-- Lado direito: mapa --}}
            <div class="col-lg-5 d-none d-lg-block">
                <h2 class="h5 text-muted mb-3">Mapa das Lojas</h2>
                <div id="map"></div>
            </div>
        </div>
    </main>
@endsection

@push('scripts')
    @php
        // Array pronto para o JS
        $mapData = $offersForMap ?? collect();
    @endphp

    <script>
        window.initProdutoMap = function() {
            const products = @json($mapData);

            const mapElement = document.getElementById('map');
            let map = null;

            if (!mapElement || products.length === 0) {
                return;
            }

            // Centro inicial: primeira loja
            map = new google.maps.Map(mapElement, {
                center: {
                    lat: parseFloat(products[0].lat),
                    lng: parseFloat(products[0].lng),
                },
                zoom: 14,
                mapTypeControl: false,
                streetViewControl: false,
            });

            let userLocation = null;
            let userMarker = null;
            let productMarkers = [];
            let directionsService = new google.maps.DirectionsService();
            let directionsRenderer = new google.maps.DirectionsRenderer({
                map: map,
                suppressMarkers: false,
            });

            function addProductMarker(product) {
                const marker = new google.maps.Marker({
                    position: {
                        lat: parseFloat(product.lat),
                        lng: parseFloat(product.lng),
                    },
                    map: map,
                    title: product.store_name,
                });

                const content = `
                    <div style="max-width:220px">
                        <strong>${product.store_name}</strong><br>
                        ${product.price ? 'R$ ' + product.price + '<br>' : ''}
                        ${product.address ? '<small>' + product.address + '</small><br>' : ''}
                        <br>
                        <button class="btn btn-primary btn-sm w-100 mb-1"
                            onclick="window.getRouteToStore('car', ${product.lat}, ${product.lng})">
                            <i class="bi bi-car-front-fill"></i> Rota de Carro
                        </button>
                        <button class="btn btn-info btn-sm w-100 text-white"
                            onclick="window.getRouteToStore('walk', ${product.lat}, ${product.lng})">
                            <i class="bi bi-person-walking"></i> Rota a Pé
                        </button>
                    </div>
                `;

                const infowindow = new google.maps.InfoWindow({
                    content
                });
                marker.addListener('click', () => infowindow.open(map, marker));

                productMarkers.push(marker);
            }

            products.forEach(addProductMarker);

            // Localização do usuário (se disponível)
            if ('geolocation' in navigator) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        userLocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        userMarker = new google.maps.Marker({
                            position: userLocation,
                            map: map,
                            title: 'Você está aqui',
                            icon: {
                                path: google.maps.SymbolPath.CIRCLE,
                                scale: 7,
                                fillColor: '#007bff',
                                fillOpacity: 1,
                                strokeColor: '#ffffff',
                                strokeWeight: 2,
                            },
                        });
                    },
                    (error) => {
                        console.error("Erro ao obter localização:", error);
                    }
                );
            }

            window.getRouteToStore = function(profile, destLat, destLng) {
                if (!userLocation) {
                    alert("Sua localização ainda não foi determinada.");
                    return;
                }

                const travelMode = profile === 'walk' ?
                    google.maps.TravelMode.WALKING :
                    google.maps.TravelMode.DRIVING;

                directionsService.route({
                        origin: userLocation,
                        destination: {
                            lat: destLat,
                            lng: destLng
                        },
                        travelMode: travelMode,
                    },
                    (response, status) => {
                        if (status === 'OK') {
                            directionsRenderer.setDirections(response);
                        } else {
                            console.error('Erro ao calcular rota:', status);
                            alert('Não foi possível calcular a rota.');
                        }
                    }
                );
            };
        };
    </script>

    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google_maps.key') }}&libraries=places&callback=initProdutoMap">
    </script>
@endpush
