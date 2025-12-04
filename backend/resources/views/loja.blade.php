
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Achei! Almenara')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{ asset('image/favicon.png') }}" rel="icon" type="image/png">

    <link rel="stylesheet" href="{{ asset('css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mobile.css') }}">
    <link rel="stylesheet" href="{{ asset('css/voltar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/loja.css') }}">
    

    @stack('styles')
</head>

@section('title', $store->name)

@section('content')

    <section class="store-nav-wrapper">
        <div class="container store-nav d-flex justify-content-between align-items-center">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" href="#">Início</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="produtosDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Produtos
                    </a>
                    <ul class="dropdown-menu shadow" aria-labelledby="produtosDropdown">
                        {{-- O link 'Cadastrar Produto' aponta para a rota protegida --}}
                        <li><a class="dropdown-item" href="{{ route('cadastro-produto') }}">Cadastrar Produto</a></li>

                        {{-- ALTERADO: O link 'Editar Produto' agora aponta para a lista de gestão --}}
                        <li><a class="dropdown-item" href="{{ route('loja.produtos.lista') }}">Gerenciar Produtos
                                (Editar/Excluir)</a></li>

                        {{-- REMOVIDO: O item 'Excluir Produto' foi removido --}}
                    </ul>
                </li>
                @endif

                {{-- REMOVIDO: O item 'Categorias' foi removido --}}

            </ul>

            <div class="d-flex align-items-center">
                <div class="me-4">
                    <strong>Avaliação da Loja: {{ $avaliacoes->avg('nota') ?: 'N/A' }}</strong> <i class="bi bi-star-fill text-warning"></i>
                </div>
                <a href="https://wa.me/?text={{ urlencode('Confira essa Loja que encontrei!' . url()->current()) }}"
                    target="_blank" class="btn btn-outline-success">
                    <i class="bi bi-whatsapp me-2"></i> Compartilhar
                </a>
            </div>
        </div>
    </section>

    <section class="store-banner" style="background-image: url({{ $store->image_url }});">
        <div class="container position-relative h-100">
            <div class="store-profile d-flex align-items-center">
                <img src="{{ $store->image_url ?: asset('banner/iconloja.png') }}" alt="Logo da Loja" class="store-logo me-3">
                <h1 style="color: #dee2e6;" class="store-name">{{ $store->name }}</h1>
            </div>
        </div>
    </section>

    <main class="container">
        <section class="store-main-content">
            {{-- Restante do conteúdo (endereço e mapa) --}}
            <div class="row g-4 align-items-center">
                <div class="col-md-7 store-info">
                    <h5><i class="bi bi-geo-alt-fill me-2"></i> Endereço:</h5>
                    <p>
                        {{ $store->address->street }}, {{ $store->address->number }}<br>
                        {{ $store->address->neighborhood }}<br>
                        {{ $store->address->city }} - {{ $store->address->state }}<br>
                        {{ $store->address->zip_code }}
                    </p>

                    <hr class="my-4">

                    <h5><i class="bi bi-telephone-fill me-2"></i> Telefone:</h5>
                    <p>{{ $store->phone }}</p>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    <script src="{{ asset('js/index.js') }}"></script>
@push('scripts')
    {{-- (Scripts do Google Maps omitidos por brevidade, permanecem inalterados) --}}
    <script>
        // Pass store data to JS
        window.lojaData = @json($store);
        window.formattedAddress = "{{ $store->address->street }}, {{ $store->address->number }} - {{ $store->address->neighborhood }}";
    </script>
    <script>
        // callback chamado pelo script do Google Maps
        window.initLojaMap = function() {
            // Se quiser deixar dinâmico depois, é só trocar esses valores por dados do backend
            const loja = {
                name: window.lojaData.name,
                address: window.formattedAddress,
                lat: window.lojaData.latitude,
                lng: window.lojaData.longitude
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

@include('partials.footer')
