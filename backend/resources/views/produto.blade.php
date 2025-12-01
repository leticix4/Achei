@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/produto.css') }}">
@endpush

@section('title', 'Produto')

@section('content')
    <!--Produto-->
    <h1 style="margin-left: 160px; margin-top: 20px;">Arroz Camil</h1>
    <div
        style="width: 80%; height: 70%; background-color: white; border-radius: 20px; margin: 20px auto; border: 2px solid #000;">
        <!--Produto-->
        <div class="produto-container">
            <!-- Lado Esquerdo: Carrossel de Imagens -->
            <div class="imagem-produto">
                <div class="carousel-container">
                    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="{{ asset('image/arroz.png') }}"
                                    alt="Primeira imagem do produto">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('image/arroz2.jpg') }}"
                                    alt="Segunda imagem do produto">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="{{ asset('image/arroz3.jpg') }}"
                                    alt="Terceira imagem do produto">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden" style="color: #000;">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Próximo</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Lado Direito: Tabela -->
            <div class="info-produto">
                <h2>Ficha Técnica</h2>
                <div class="ficha-tecnica-container">
                    <table class="ficha-tecnica">
                        <tr>
                            <th>Marca</th>
                            <td>Camil</td>
                        </tr>
                        <tr>
                            <th>Modelo</th>
                            <td>Camil</td>
                        </tr>
                        <tr>
                            <th>Uso</th>
                            <td>Doméstico</td>
                        </tr>
                        <tr>
                            <th>Tipo</th>
                            <td>Supermercado</td>
                        </tr>
                        <tr>
                            <th>Peso</th>
                            <td>5 kg</td>
                        </tr>
                        <tr>
                            <th>Número de pontos</th>
                            <td>10</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <h3 style="margin-left: 20px;">Descrição</h3>
        <p style="margin-left: 20px;"> O arroz Camil é uma marca tradicional brasileira de arroz,
            que pode ser encontrado em diversas versões, como branco, parboilizado,
            integral e preto, sendo a fonte de energia para muitos brasileiros.</p>
    </div>

    </div>
    <!-- Botão flutuante -->
    <div class="chat-button" id="chatButton">
        <!-- Ícone SVG do balão de conversa -->
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
            <path d="M20 2H4C2.9 2 2 2.9 2 4v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z" />
        </svg>
    </div>

    <!-- Janela do chat -->
    <div class="chat-window" id="chatWindow">
        <div class="chat-header">
            Chat com a Loja
            <button id="closeChat">✕</button>
        </div>
        <div class="chat-body" id="chatBody">
            <p><strong>Atendente:</strong> Olá! Como posso te ajudar hoje?</p>
        </div>
        <div class="chat-input">
            <input type="text" id="userMessage" placeholder="Digite sua mensagem...">
            <button id="sendMessage">Enviar</button>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        const chatButton = document.getElementById('chatButton');
        const chatWindow = document.getElementById('chatWindow');
        const closeChat = document.getElementById('closeChat');
        const sendMessage = document.getElementById('sendMessage');
        const userMessage = document.getElementById('userMessage');
        const chatBody = document.getElementById('chatBody');

        chatButton.onclick = () => {
            chatWindow.style.display = 'flex';
            chatButton.style.display = 'none';
        };

        closeChat.onclick = () => {
            chatWindow.style.display = 'none';
            chatButton.style.display = 'flex';
        };

        sendMessage.onclick = () => {
            const message = userMessage.value.trim();
            if (message) {
                const p = document.createElement('p');
                p.innerHTML = `<strong>Você:</strong> ${message}`;
                chatBody.appendChild(p);
                userMessage.value = '';
                chatBody.scrollTop = chatBody.scrollHeight;
            }
        };
    </script>
@endpush
