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
                <h1 style="color: #dee2e6;" class="store-name">LARANA SUPERMERCADO</h1>
            </div>
        </div>
    </section>

    <section class="store-nav-wrapper">
        <div class="container store-nav d-flex justify-content-between align-items-center">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('loja') }}">Início</a>
                </li>

                <!-- DROPDOWN DE PRODUTOS -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="produtosDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Produtos
                    </a>
                    <ul class="dropdown-menu shadow" aria-labelledby="produtosDropdown">
                        <li><a class="dropdown-item" href="{{ route('cadastro-produto') }}">Cadastrar Produto</a></li>
                        <li><a class="dropdown-item" href="#">Editar Produto</a></li>
                        <li><a class="dropdown-item text-danger" href="#">Excluir Produto</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#">Categorias</a>
                </li>
            </ul>

            <div class="d-flex align-items-center">
                <div class="me-4">
                    <strong>Avaliação da Loja: 4.8</strong> <i class="bi bi-star-fill text-warning"></i>
                </div>
                <button class="btn btn-outline-secondary"><i class="bi bi-share-fill me-2"></i> Compartilhar</button>
            </div>
        </div>
    </section>

    <main class="container">
        <section class="store-main-content">
            <div class="row g-4 align-items-center">
                <div class="col-md-7 store-info">
                    <h5><i class="bi bi-geo-alt-fill me-2"></i> Endereço:</h5>
                    <p>Av. Olindo de Miranda, 864<br>Centro<br>39900-000</p>

                    <hr class="my-4">

                    <h5><i class="bi bi-telephone-fill me-2"></i> Telefone:</h5>
                    <p>(33) 99900-0099</p>
                </div>

                <div class="col-md-5">
                    <div class="map-placeholder">
                        <div id="mapa-loja"></div>
                    </div>
                </div>
            </div>
        </section>

        <section class="avaliacoes py-5 bg-body">
            <div class="container">
                <h4 class="fw-bold mb-4 text-center text-body">Avaliações da loja</h4>
                <div class="row justify-content-center g-3">
                    @foreach ($avaliacoes as $avaliacao)
                        <div class="col-md-3">
                            <div class="card p-3 shadow-sm">
                                <div class="mb-2">{!! str_repeat('★', $avaliacao->nota) !!}</div>
                                <p>{!! $avaliacao->content !!}</p>
                                <small class="text-muted">{!! $avaliacao->user->name !!}</small>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection

@push('scripts')
    <script>
        // callback chamado pelo script do Google Maps
        window.initLojaMap = function() {
            // Se quiser deixar dinâmico depois, é só trocar esses valores por dados do backend
            const loja = {
                name: "Larana Supermercado",
                address: "Av. Olindo de Miranda, 864 - Centro",
                lat: -16.173570723698916,
                lng: -40.69246760175628
            };

            const mapElement = document.getElementById('mapa-loja');
            if (!mapElement) return;

            // MAPA
            const map = new google.maps.Map(mapElement, {
                center: {
                    lat: loja.lat,
                    lng: loja.lng
                },
                zoom: 15,
                mapTypeControl: false,
                streetViewControl: false,
            });

            let userLocation = null;
            let userMarker = null;
            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer({
                map: map,
                suppressMarkers: false
            });

            // MARCADOR DA LOJA
            const infoHtml = `
                <div style="max-width:220px">
                    <strong>${loja.name}</strong><br>
                    <small>${loja.address}</small><br><br>
                    <button class="btn btn-primary btn-sm w-100 mb-1"
                            onclick="window.getRouteFromLoja('car', ${loja.lat}, ${loja.lng})">
                        <i class="bi bi-car-front-fill"></i> Rota de Carro
                    </button>
                    <button class="btn btn-info btn-sm w-100 text-white"
                            onclick="window.getRouteFromLoja('walk', ${loja.lat}, ${loja.lng})">
                        <i class="bi bi-person-walking"></i> Rota a Pé
                    </button>
                </div>
            `;

            const lojaMarker = new google.maps.Marker({
                position: {
                    lat: loja.lat,
                    lng: loja.lng
                },
                map: map,
                title: loja.name
            });

            const lojaInfo = new google.maps.InfoWindow({
                content: infoHtml
            });
            lojaMarker.addListener('click', () => lojaInfo.open(map, lojaMarker));
            lojaInfo.open(map, lojaMarker); // já abre ao carregar

            // GEOLOCALIZAÇÃO DO USUÁRIO
            if ('geolocation' in navigator) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        userLocation = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude
                        };

                        // marcador do usuário
                        if (userMarker) userMarker.setMap(null);
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

                        // centraliza um pouco mais entre user e loja se quiser
                        // por enquanto só dá um panc na loja mesmo
                    },
                    (error) => {
                        console.error('Erro ao obter localização: ', error);
                    }
                );
            }

            // FUNÇÃO GLOBAL DE ROTA (CARRO / A PÉ)
            window.getRouteFromLoja = function(profile, destLat, destLng) {
                if (!userLocation) {
                    alert('Sua localização ainda não foi determinada.');
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

    {{-- carrega o Google Maps e chama initLojaMap quando terminar --}}
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initLojaMap"></script>
@endpush
