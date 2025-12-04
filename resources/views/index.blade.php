@extends('layouts.app')

@section('title', 'Achei! - Home')

@section('content')
    <main class="container-fluid px-0">
        <section id="banner-section" class="mb-5" data-aos="zoom-in-down" data-aos-duration="800">
            <div id="mainBanner" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#mainBanner" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#mainBanner" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#mainBanner" data-bs-slide-to="2"></button>
                </div>

                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <a href="{{ route('categoria.show', 'brinquedos') }}" class="banner-destaque">
                            <img src="{{ asset('banner/banner2.png') }}" class="d-block w-100 rounded" alt="Slide 0">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="{{ route('categoria.show', 'eletrodomesticos') }}" class="banner-destaque">
                            <img src="{{ asset('banner/banner3.png') }}" class="d-block w-100 rounded" alt="Slide 1">
                        </a>
                    </div>
                    <div class="carousel-item">
                        <a href="{{ route('categoria.show', 'moda') }}" class="banner-destaque">
                            <img src="{{ asset('banner/banner1.png') }}" class="d-block w-100 rounded" alt="Slide 2">
                        </a>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#mainBanner" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#mainBanner" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </section>
    </main>
    <main class="container my-5 pt-5">

        <section id="produtos-destaque" class="section-box mb-5">
            <h2 class="section-title" data-aos="fade-right" data-aos-duration="800" data-aos-once="true">
                PRODUTOS EM DESTAQUE
            </h2>
            <div class="row g-4">
                <div class="col-12 col-lg-6 col-md-6" data-aos="fade-right" data-aos-duration="800" data-aos-delay="100"
                    data-aos-once="true">
                    <div id="carousel1" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="card-produto bg-yellow">
                                    <div>
                                        <p class="categoria-tag">Tecnologia</p>
                                        <h3>Impressoras</h3>
                                        <a href="{{ route('busca.lista', ['q' => 'Impressoras']) }}"
                                            class="btn btn-dark btn-sm mt-3">Conferir</a>
                                    </div>
                                    <div class="card-imagem">
                                        <img src="{{ asset('destaques/impressora.png') }}" alt="Impressora">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card-produto bg-yellow">
                                    <div>
                                        <p class="categoria-tag">Tecnologia</p>
                                        <h3>Notebook Gamer</h3>
                                        <a href="{{ route('busca.lista', ['q' => 'Notebook Gamer']) }}"
                                            class="btn btn-dark btn-sm mt-3">Conferir</a>
                                    </div>
                                    <div class="card-imagem">
                                        <img src="{{ asset('destaques/notegame.png') }}" alt="Notebook Gamer">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card-produto bg-yellow">
                                    <div>
                                        <p class="categoria-tag">Tecnologia</p>
                                        <h3>Fotografia</h3>
                                        <a href="{{ route('busca.lista', ['q' => 'Fotografia']) }}"
                                            class="btn btn-dark btn-sm mt-3">Conferir</a>
                                    </div>
                                    <div class="card-imagem">
                                        <img src="{{ asset('destaques/camera.png') }}" alt="Fotografia">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel1"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel1"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-3" data-aos="fade-left" data-aos-duration="800" data-aos-delay="200"
                    data-aos-once="true">
                    <a href="{{ route('busca.lista', ['q' => 'Geladeira']) }}" class="card-produto bg-white clicavel">
                        <div>
                            <p class="categoria-tag">Eletrodomésticos</p>
                            <h3>Geladeira</h3>
                        </div>
                        <div class="card-imagem1">
                            <img src="{{ asset('destaques/geladeiraduplex.png') }}" alt="Geladeira">
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3 col-md-3" data-aos="fade-left" data-aos-duration="800" data-aos-delay="300"
                    data-aos-once="true">
                    <a href="{{ route('busca.lista', ['q' => 'Chave de Fenda']) }}"
                        class="card-produto bg-blue clicavel">
                        <div>
                            <p class="categoria-tag">Ferramentas</p>
                            <h3>Chave de Fenda</h3>
                        </div>
                        <div class="card-imagem1">
                            <img src="{{ asset('destaques/chave.png') }}" alt="Chave de Fenda">
                        </div>
                    </a>
                </div>
                <div class="col-6 col-lg-3 col-md-3" data-aos="fade-up" data-aos-duration="800" data-aos-once="true">
                    <a href="{{ route('busca.lista', ['q' => 'HeadPhone']) }}" class="card-produto bg-blue clicavel">
                        <div>
                            <p class="categoria-tag">Tecnologia</p>
                            <h3>HeadPhone</h3>
                        </div>
                        <div class="card-imagem1">
                            <img src="{{ asset('destaques/fone.png') }}" alt="HEADPHONE">
                        </div>
                    </a>
                </div>

                <div class="col-6 col-lg-3 col-md-3" data-aos="fade-up" data-aos-duration="800" data-aos-delay="100"
                    data-aos-once="true">
                    <a href="{{ route('busca.lista', ['q' => 'Plantas']) }}" class="card-produto bg-yellow clicavel">
                        <div>
                            <p class="categoria-tag">Decoração</p>
                            <h3>Plantas</h3>
                        </div>
                        <div class="card-imagem1">
                            <img src="{{ asset('destaques/planta.png') }}" alt="Plantas">
                        </div>
                    </a>
                </div>
                <div class="col-12 col-lg-6 col-md-6">
                    <div id="carousel2" class="carousel slide" data-aos="fade-up" data-aos-duration="800"
                        data-aos-delay="200" data-aos-once="true" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="card-produto bg-white">
                                    <div>
                                        <p class="categoria-tag">Moda Feminina</p>
                                        <h3>Moda</h3>
                                        <a href="{{ route('busca.lista', ['q' => 'Moda']) }}"
                                            class="btn btn-dark btn-sm mt-3">Conferir</a>
                                    </div>
                                    <div class="card-imagem">
                                        <img src="{{ asset('destaques/bolsa.png') }}" alt="Moda">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card-produto bg-white">
                                    <div>
                                        <p class="categoria-tag">Moda Feminina</p>
                                        <h3>Bijouteria</h3>
                                        <a href="{{ route('busca.lista', ['q' => 'Bijouteria']) }}"
                                            class="btn btn-dark btn-sm mt-3">Conferir</a>
                                    </div>
                                    <div class="card-imagem">
                                        <img src="{{ asset('destaques/acessorios.png') }}" alt="Bijouteria">
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="card-produto bg-white">
                                    <div>
                                        <p class="categoria-tag">Moda Feminina</p>
                                        <h3>Maquiagem</h3>
                                        <a href="{{ route('busca.lista', ['q' => 'Maquiagem']) }}"
                                            class="btn btn-dark btn-sm mt-3">Conferir</a>
                                    </div>
                                    <div class="card-imagem">
                                        <img src="{{ asset('destaques/maquiagem.png') }}" alt="maquiagem">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carousel2"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carousel2"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <section id="categorias" class="section-box py-5">
            <div class="container">
                <h2 class="section-title" data-aos="fade-right" data-aos-duration="800">CATEGORIAS</h2>
                <div class="pages-wrapper">
                    <div id="page-1" class="category-page active">
                        <div class="row g-4">
                            <div class="col-4 col-lg-4 col-md-3" data-aos="fade-right" data-aos-duration="300">
                                <a href="{{ route('categoria.show', 'supermercado') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/supermercado.png') }}" alt="Mercearia"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Supermercado</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-lg-4 col-md-3" data-aos="fade-up" data-aos-duration="400">
                                <a href="{{ route('categoria.show', 'tecnologia') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/notebook.png') }}" alt="Tecnologia"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Tecnologia</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-lg-4 col-md-3" data-aos="fade-left" data-aos-duration="500">
                                <a href="{{ route('categoria.show', 'casa-moveis') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/abaju.png') }}" alt="Casa e Móveis"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Casa e Móveis</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-lg-4 col-md-3" data-aos="fade-right" data-aos-duration="600">
                                <a href="{{ route('categoria.show', 'eletrodomesticos') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/tomada.png') }}" alt="Eletrodomésticos"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Eletrodomésticos</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-lg-4 col-md-3" data-aos="fade-up" data-aos-duration="700">
                                <a href="{{ route('categoria.show', 'esportes') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/bike.png') }}" alt="Esportes e Fitness"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Esportes e Fitness</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-lg-4 col-md-3" data-aos="fade-left" data-aos-duration="800">
                                <a href="{{ route('categoria.show', 'ferramentas') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/chave.png') }}" alt="Ferramentas"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Ferramentas</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-lg-4 col-md-3" data-aos="fade-right" data-aos-duration="900">
                                <a href="{{ route('categoria.show', 'construcao') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/tijolo.png') }}" alt="Construção"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Construção</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-lg-4 col-md-3" data-aos="fade-up" data-aos-duration="1000">
                                <a href="{{ route('categoria.show', 'autopecas') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/engrenagem.png') }}" alt="Autopeças"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Autopeças</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-lg-4 col-md-3" data-aos="fade-left" data-aos-duration="1100">
                                <a href="{{ route('categoria.show', 'papelaria') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/caderno.png') }}" alt="Papelaria"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Papelaria</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div id="page-2" class="category-page inactive">
                        <div class="row g-4">
                            <div class="col-4 col-lg-4 col-md-3">
                                <a href="{{ route('categoria.show', 'petshop') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/pata.png') }}" alt="Pet Shop"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Pet Shop</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-lg-4 col-md-3">
                                <a href="{{ route('categoria.show', 'saude') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/saude.png') }}" alt="Saúde"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Saúde</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-lg-4 col-md-3">
                                <a href="{{ route('categoria.show', 'veiculos') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/carro.png') }}" alt="Acessórios para Veículos"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Acessórios para Veículos</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-lg-4 col-md-3">
                                <a href="{{ route('categoria.show', 'beleza') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/locao.png') }}" alt="Beleza e Cuidado Pessoal"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Beleza e Cuidado Pessoal</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-lg-4 col-md-3">
                                <a href="{{ route('categoria.show', 'moda') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/vestido.png') }}" alt="Moda"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Moda</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-lg-4 col-md-3">
                                <a href="{{ route('categoria.show', 'bebes') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/carrinhobebe.png') }}" alt="Bebês"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Bebês</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="col-4 col-lg-4 col-md-3">
                                <a href="{{ route('categoria.show', 'brinquedos') }}" class="category-card-link">
                                    <div class="category-card">
                                        <div class="row g-0 h-100">
                                            <div class="col-4 icon-part">
                                                <img src="{{ asset('icons/controle.png') }}" alt="Brinquedos"
                                                    class="icon-img">
                                            </div>
                                            <div class="col-8 text-part"><span>Brinquedos</span></div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <nav aria-label="Navegação de páginas de categorias" class="mt-5">
                    <ul class="pagination justify-content-center">
                        <li class="page-item active"><a class="page-link" href="#" data-page="1">1</a></li>
                        <li class="page-item"><a class="page-link" href="#" data-page="2">2</a></li>
                    </ul>
                </nav>

            </div>
        </section>
    </main>

    <div id="notificationAlert"
        class="position-fixed bottom-0 end-0 m-3 shadow-lg rounded-circle p-2 bg-primary text-white cursor-pointer"
        style="width: 50px; height: 50px; display: none; z-index: 1061;">
        <i class="bi bi-chat-fill d-flex justify-content-center align-items-center h-100" style="font-size: 1.5rem;"></i>
        <span id="unreadCountBadge"
            class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger"
            style="display: none;">
            0
            <span class="visually-hidden">mensagens não lidas</span>
        </span>
    </div>

    <div class="chat-window position-fixed bottom-0 end-0 m-3 shadow-lg rounded-3" id="chatWindow"
        style="width: 350px; height: 450px; display: none; z-index: 1060; flex-direction: column;">
        <div class="chat-header bg-primary text-white rounded-top-3 p-3 d-flex justify-content-between align-items-center">
            <span class="fw-bold">Chat com a Loja</span>
            <button id="closeChat" class="btn-close btn-close-white">X</button>
        </div>

        <div class="chat-body bg-body-tertiary flex-grow-1 p-3 overflow-auto" id="chatBody">
            <div class="d-flex mb-2">
                <div class="bg-primary text-white rounded-3 p-2" style="max-width: 80%;">
                    <strong>Atendente:</strong> Olá! Como posso te ajudar hoje?
                </div>
            </div>
        </div>

        <div class="chat-input bg-body border-top p-3 rounded-bottom-3">
            <div class="input-group">
                <input type="text" id="userMessage" class="form-control" placeholder="Digite sua mensagem...">
                <button type="button" id="sendMessage" class="btn btn-primary">
                    <i class="bi bi-send"></i>
                </button>
            </div>
        </div>
    </div>

    <script>
        // Função para obter headers com autenticação
        function getAuthHeaders(additionalHeaders = {}) {
            const token = localStorage.getItem("access_token");
            const headers = {
                "Content-Type": "application/json",
                ...additionalHeaders
            };
            if (token) {
                headers["Authorization"] = `Bearer ${token}`;
            }
            return headers;
        }

        // Função para fazer fetch com autenticação
        async function fetchWithAuth(url, options = {}) {
            const headers = getAuthHeaders(options.headers);
            return fetch(url, {
                ...options,
                headers
            });
        }

        const chatWindow = document.getElementById('chatWindow');
        const notificationAlert = document.getElementById('notificationAlert');
        const closeChatButton = document.getElementById('closeChat');
        const unreadCountBadge = document.getElementById('unreadCountBadge');

        const apiUrl = 'http://localhost:8000/api';

        notificationAlert.addEventListener('click', () => {
            chatWindow.style.display = 'flex';
            notificationAlert.style.display = 'none';
        });

        closeChatButton.addEventListener('click', () => {
            chatWindow.style.display = 'none';
        });

        const checkNewMessages = async () => {
            const token = localStorage.getItem('access_token');

            if (!token) {
                notificationAlert.style.display = 'none';
                return;
            }

            try {
                const response = await fetchWithAuth(`${apiUrl}/unread-messages-count`, {
                    method: 'GET'
                });

                if (!response.ok) {
                    console.error('Erro ao verificar notificações:', response.status);
                    notificationAlert.style.display = 'none';
                    return;
                }

                const data = await response.json();
                const count = data.unread_count || 0;

                if (count > 0) {
                    if (chatWindow.style.display !== 'flex') {
                        unreadCountBadge.textContent = count;
                        unreadCountBadge.style.display = 'block';
                        notificationAlert.style.display = 'flex';
                    }
                } else {
                    notificationAlert.style.display = 'none';
                    unreadCountBadge.style.display = 'none';
                }

            } catch (error) {
                console.error('Falha na busca de mensagens não lidas:', error);
                notificationAlert.style.display = 'none';
            }
        };

        checkNewMessages();

        setInterval(checkNewMessages, 10000);
    </script>
@endsection
