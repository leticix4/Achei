@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/busca.css') }}">
@endpush

@section('title', 'Resultados da Busca')

@section('content')

    <!-- RESULTADOS DE BUSCA -->
    <main class="container my-4">
        <div class="row">

            <div class="col-lg-7 col-md-12">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h2 class="h5 text-muted" id="product-count">Carregando produtos...</h2>
                    <div class="dropdown">
                        <button class="btn btn-light border dropdown-toggle" type="button" id="filterMenu"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-filter me-2"></i> Filtros
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="filterMenu">
                            <li><a class="dropdown-item" href="#" data-filter="menor-preco">Menor preço</a></li>
                            <li><a class="dropdown-item" href="#" data-filter="maior-preco">Maior preço</a></li>
                            <li><a class="dropdown-item" href="#" data-filter="melhor-avaliacao">Melhor avaliação</a>
                            </li>
                            <li><a class="dropdown-item" href="#" data-filter="mais-proximo">Mais próximo</a></li>
                        </ul>
                    </div>
                </div>

                <div id="product-grid" class="row row-cols-2 row-cols-md-3 g-3"></div>
            </div>

            <div class="col-lg-5 d-none d-lg-block">
                <div id="map"></div>
            </div>
        </div>
    </main>

@endsection

@push('scripts')
    <script>
        window.initBuscaMap = function() {
            const products = [{
                    name: "Larana Supermercado",
                    rating: 4.6,
                    address: "Av. Olindo de Miranda, 864 - Centro",
                    price: "18,90",
                    lat: -16.173729968765606,
                    lng: -40.69215221307278
                },
                {
                    name: "Xereta Supermercados",
                    rating: 4.5,
                    address: "R. Severiano Coutinho, 275 - Centro",
                    price: "19,50",
                    lat: -16.179000,
                    lng: -40.694054
                },
                {
                    name: "Hiper Farol Supermercado",
                    rating: 4.4,
                    address: "Av. Olindo de Miranda, 940",
                    price: "18,75",
                    lat: -16.172851,
                    lng: -40.691678
                },
                {
                    name: "Sacola Cheia Supermercados",
                    rating: 4.3,
                    address: "R. Hermano Souza, 246 - Centro",
                    price: "19,50",
                    lat: -16.181014969063334,
                    lng: -40.69540145839323
                },
                {
                    name: "SUPERMERCADO VANVEP",
                    rating: 4.2,
                    address: "R. João Cabacinha, 687",
                    price: "20,80",
                    lat: -16.176125638492657,
                    lng: -40.69848680220568
                },
                {
                    name: "Mercearia do Mandim",
                    rating: 4.1,
                    address: "R. Cel. Pedro Antônio da Fonseca, 681",
                    price: "19,90",
                    lat: -16.16903630436966,
                    lng: -40.693143841697854
                }
            ];

            // -------------------------------
            // 2. MAPA GOOGLE
            // -------------------------------
            const mapElement = document.getElementById('map');
            let map = null;

            if (mapElement) {
                map = new google.maps.Map(mapElement, {
                    center: {
                        lat: -16.175,
                        lng: -40.694
                    },
                    zoom: 14,
                    mapTypeControl: false,
                    streetViewControl: false
                });
            }

            let userLocation = null; // {lat, lng}
            let userMarker = null;
            let productMarkers = []; // array de google.maps.Marker
            let directionsService = null;
            let directionsRenderer = null;

            if (map) {
                directionsService = new google.maps.DirectionsService();
                directionsRenderer = new google.maps.DirectionsRenderer({
                    map: map,
                    suppressMarkers: false
                });
            }

            // -------------------------------
            // 3. HELPERS
            // -------------------------------
            function clearProductMarkers() {
                productMarkers.forEach(m => m.setMap(null));
                productMarkers = [];
            }

            function addProductMarker(product) {
                if (!map) return;

                const marker = new google.maps.Marker({
                    position: {
                        lat: product.lat,
                        lng: product.lng
                    },
                    map: map,
                    title: product.name
                });

                const content = `
                    <div style="max-width: 220px">
                        <strong>${product.name}</strong><br>
                        R$ ${product.price}<br>
                        <small>${product.address}</small><br><br>
                        <button class="btn btn-primary btn-sm w-100 mb-1"
                                onclick="window.getRouteFromBusca('car', ${product.lat}, ${product.lng})">
                            <i class="bi bi-car-front-fill"></i> Rota de Carro
                        </button>
                        <button class="btn btn-info btn-sm w-100 text-white"
                                onclick="window.getRouteFromBusca('walk', ${product.lat}, ${product.lng})">
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

            // Haversine pra distância em km
            function calcDistancia(lat1, lon1, lat2, lon2) {
                const R = 6371;
                const dLat = (lat2 - lat1) * Math.PI / 180;
                const dLon = (lon2 - lon1) * Math.PI / 180;
                const a = Math.sin(dLat / 2) ** 2 +
                    Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                    Math.sin(dLon / 2) ** 2;
                const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                return R * c;
            }

            // -------------------------------
            // 4. CARDS + MARCADORES
            // -------------------------------
            const productGrid = document.getElementById('product-grid');
            const productCount = document.getElementById('product-count');
            if (productCount) {
                productCount.textContent = `${products.length} produtos encontrados próximo a você`;
            }

            function renderProducts(list) {
                if (!productGrid) return;

                productGrid.innerHTML = '';
                clearProductMarkers();

                list.forEach(product => {
                    const cardHtml = `
                        <div class="col">
                            <div class="product-card">
                                <a href="{{ route('produto') }}">
                                    <img src="{{ asset('image/arroz.png') }}" alt="Produto">
                                </a>
                                <div class="product-name">
                                    <a style="color: #003147;" href="{{ route('loja') }}">
                                        ${product.name}
                                    </a>
                                </div>
                                <div class="product-rating small">
                                    ${product.rating} <i class="bi bi-star-fill"></i>
                                </div>
                                <div class="product-address">${product.address}</div>
                                <div class="product-price">R$ ${product.price}</div>
                            </div>
                        </div>
                    `;
                    productGrid.insertAdjacentHTML('beforeend', cardHtml);

                    // marcador no mapa
                    if (map) addProductMarker(product);
                });
            }

            renderProducts(products);

            // -------------------------------
            // 5. FILTROS
            // -------------------------------
            document.querySelectorAll('[data-filter]').forEach(btn => {
                btn.addEventListener('click', e => {
                    e.preventDefault();
                    const tipo = e.currentTarget.getAttribute('data-filter');
                    let ordenados = [...products];

                    if (tipo === 'menor-preco') {
                        ordenados.sort((a, b) =>
                            parseFloat(a.price.replace(',', '.')) -
                            parseFloat(b.price.replace(',', '.'))
                        );
                    } else if (tipo === 'maior-preco') {
                        ordenados.sort((a, b) =>
                            parseFloat(b.price.replace(',', '.')) -
                            parseFloat(a.price.replace(',', '.'))
                        );
                    } else if (tipo === 'melhor-avaliacao') {
                        ordenados.sort((a, b) => b.rating - a.rating);
                    } else if (tipo === 'mais-proximo') {
                        if (!userLocation) {
                            alert("Sua localização ainda não foi determinada.");
                            return;
                        }

                        ordenados.sort((a, b) => {
                            const distA = calcDistancia(
                                userLocation.lat, userLocation.lng,
                                a.lat, a.lng
                            );
                            const distB = calcDistancia(
                                userLocation.lat, userLocation.lng,
                                b.lat, b.lng
                            );
                            return distA - distB;
                        });

                        // deixa só o mais próximo
                        ordenados = [ordenados[0]];

                        if (map) {
                            const p = ordenados[0];
                            map.setCenter({
                                lat: p.lat,
                                lng: p.lng
                            });
                            map.setZoom(16);
                        }
                    }

                    renderProducts(ordenados);
                });
            });

            // -------------------------------
            // 6. LOCALIZAÇÃO DO USUÁRIO
            // -------------------------------
            if ('geolocation' in navigator && map) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        userLocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        if (userMarker) {
                            userMarker.setMap(null);
                        }

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
                                strokeWeight: 2
                            }
                        });

                        map.setCenter(userLocation);
                    },
                    (error) => {
                        console.error("Erro ao obter localização: ", error);
                        alert("Não foi possível obter sua localização.");
                    }
                );
            }

            // -------------------------------
            // 7. ROTAS (CARRO / A PÉ)
            // -------------------------------
            window.getRouteFromBusca = function(profile, destLat, destLng) {
                if (!map || !directionsService || !directionsRenderer) return;

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
                        travelMode: travelMode
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
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initBuscaMap">
    </script>
@endpush
