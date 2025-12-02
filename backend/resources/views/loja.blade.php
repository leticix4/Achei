@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
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
                                <p>{!! $avaliacao->content !!} </p>
                                <small class="text-muted">{!! $avaliacao->user->name !!}</small>
                            </div>
                        </div>
                    @endforeach
        </div>
    </div>
    </main>
@endsection

@push('scripts')
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            // --- DADOS DA LOJA ATUAL (exemplo) ---
            // Em um site real, você carregaria esses dados dinamicamente
            const loja = {
                name: "Larana Supermercado",
                address: "Av. Olindo de Miranda, 864 - Centro",
                lat: -16.173570723698916, // Coordenada da loja
                lng: -40.69246760175628 // Coordenada da loja
            };

            // --- VARIÁVEIS GLOBAIS PARA O MAPA ---
            let map = null;
            let userLocation = null;
            let routingControl = null;

            // --- INICIALIZAÇÃO DO MAPA ---
            map = L.map('mapa-loja').setView([loja.lat, loja.lng], 14);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);



            // --- ADICIONA MARCADOR DA LOJA ---
            const popupContent = `
        <b>${loja.name}</b><br>
        ${loja.address}<br><br>
        <button class="btn btn-primary btn-sm w-100 mb-1" onclick="window.getRoute('car', ${loja.lat}, ${loja.lng})">
            <i class="bi bi-car-front-fill"></i> Rota de Carro
        </button>
        <button class="btn btn-info btn-sm w-100 text-white" onclick="window.getRoute('walk', ${loja.lat}, ${loja.lng})">
            <i class="bi bi-person-walking"></i> Rota a Pé
        </button>
    `;
            // Adiciona o marcador da loja e já abre o popup
            L.marker([loja.lat, loja.lng]).addTo(map).bindPopup(popupContent).openPopup();


            // --- OBTÉM LOCALIZAÇÃO DO USUÁRIO ---
            if ('geolocation' in navigator) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        userLocation = L.latLng(position.coords.latitude, position.coords.longitude);
                        L.circleMarker(userLocation, {
                                radius: 8,
                                color: 'blue',
                                fillColor: '#3498db',
                                fillOpacity: 0.8
                            }).addTo(map)
                            .bindPopup("<b>Você está aqui</b>");
                    },
                    (error) => {
                        console.error("Erro ao obter a localização: ", error);
                    }
                );
            }

            // --- FUNÇÃO DE ROTAS ---
            window.getRoute = function(profile, productLat, productLng) {
                if (!userLocation) {
                    alert("Sua localização ainda não foi determinada.");
                    return;
                }

                if (routingControl) map.removeControl(routingControl);

                let profileUrl = (profile === 'walk') ? 'foot' : 'car';

                routingControl = L.Routing.control({
                    waypoints: [userLocation, L.latLng(productLat, productLng)],
                    router: new L.Routing.OSRMv1({
                        serviceUrl: `https://routing.openstreetmap.de/routed-${profileUrl}/route/v1/`
                    }),
                    routeWhileDragging: false,
                    addWaypoints: false,
                    draggableWaypoints: false,
                    showAlternatives: false,
                    formatter: new L.Routing.FormatterPtBR()
                }).addTo(map);
            };
        });
        L.Routing.FormatterPtBR = L.Routing.Formatter.extend({
            formatInstruction: function(instr) {
                const road = instr.road ? ` na ${instr.road}` : '';
                const instrucoes = {
                    'Head': `Siga${road}`,
                    'Continue': `Continue${road}`,
                    'Right': `Vire à direita${road}`,
                    'Left': `Vire à esquerda${road}`,
                    'Destination': 'Você chegou ao seu destino'
                };
                return instrucoes[instr.type] || '';
            },
            formatDistance: function(d) {
                if (d < 1000) return Math.round(d) + ' m';
                return (d / 1000).toFixed(1) + ' km';
            },
            formatTime: function(t) {
                if (t > 3600) return Math.floor(t / 3600) + ' h ' + Math.floor((t % 3600) / 60) + ' min';
                if (t > 60) return Math.floor(t / 60) + ' min';
                return Math.round(t) + ' s';
            }
        });
    </script>
@endpush
