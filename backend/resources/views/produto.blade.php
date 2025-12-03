@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/produto.css') }}">
@endpush

@section('title', 'Produto')

@section('content')
    <!--Produto-->
<h1 class="container mt-4 text-body">Arroz Camil</h1>
  <div class="produto-main">
    <!--Produto-->
    <div class="produto-container">
      <!-- Lado Esquerdo: Carrossel de Imagens -->
      <div class="imagem-produto" >
        <div class="carousel-container">
          <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" >
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
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Próximo</span>
            </a>
          </div>
        </div>
      </div>
      <!-- Lado Direito: Tabela -->
      <div class="info-produto">
        <h2 class="text-body">Ficha Técnica</h2>
        <!-- SOLUÇÃO: Substituir a tabela por uma lista do Bootstrap -->
        <div class="ficha-tecnica-container">
          <div class="list-group list-group-flush">
            <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-bottom">
              <span class="fw-bold text-primary">Marca</span>
              <span class="text-body">Camil</span>
            </div>
            <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-bottom">
              <span class="fw-bold text-primary">Modelo</span>
              <span class="text-body">Camil</span>
            </div>
            <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-bottom">
              <span class="fw-bold text-primary">Uso</span>
              <span class="text-body">Doméstico</span>
            </div>
            <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-bottom">
              <span class="fw-bold text-primary">Tipo</span>
              <span class="text-body">Supermercado</span>
            </div>
            <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent border-bottom">
              <span class="fw-bold text-primary">Peso</span>
              <span class="text-body">5 kg</span>
            </div>
            <div class="list-group-item d-flex justify-content-between align-items-center bg-transparent">
              <span class="fw-bold text-primary">Número de pontos</span>
              <span class="text-body">10</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <h3 class="ms-3 text-body">Descrição</h3>
    <p class="ms-3 text-body">O arroz Camil é uma marca tradicional brasileira de arroz,
      que pode ser encontrado em diversas versões, como branco, parboilizado,
      integral e preto, sendo a fonte de energia para muitos brasileiros.</p>
  </div>

  <!-- Botão flutuante do chat -->
  <div class="chat-button" id="chatButton">
  <!-- Ícone SVG do balão de conversa -->
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <path d="M20 2H4C2.9 2 2 2.9 2 4v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"/>
  </svg>
</div>

  <!-- Janela do chat corrigida com Bootstrap -->
  <div class="chat-window position-fixed bottom-0 end-0 m-3 shadow-lg rounded-3" id="chatWindow" style="width: 350px; height: 450px; display: none; z-index: 1060;">
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

@endsection

@push('scripts')
    <script>
    const chatButton = document.getElementById('chatButton');
    const chatWindow = document.getElementById('chatWindow');
    const closeChat = document.getElementById('closeChat');
    const sendMessage = document.getElementById('sendMessage');
    const userMessage = document.getElementById('userMessage');
    const chatBody = document.getElementById('chatBody');
    const apiUrl = 'http://localhost:8000/api';
    const productId = 1;

    const fetchMessages = async () => {
        try {
            const token = localStorage.getItem('access_token');

            const response = await fetch(`${apiUrl}/products/${productId}/messages`, {
                method: 'GET',
                headers: {
                  'Content-Type': 'application/json',
                  'Accept': 'application/json',
                  'Authorization': `Bearer ${token}`
                }
            });
            const res = await response.json();

            const mensagens = res.data

            if (!mensagens || mensagens.length === 0) return;

            chatBody.innerHTML = '';
            for (const message of mensagens) {
                handleCreateMessageCard(message.user, message.content);
            }
        } catch (error) {
            console.error('Erro ao buscar mensagens:', error);
        }
    }

    const fetchSendMessage = async (content, userId) => {
        try {
            const token = localStorage.getItem('access_token');

            const response = await fetch(`${apiUrl}/products/${productId}/messages`, {
                method: 'POST',
                headers: {
                  'Content-Type': 'application/json',
                  'Accept': 'application/json',
                  'Authorization': `Bearer ${token}`
                },
                body: JSON.stringify({
                    content: content,
                    product_id: productId,
                    user_id: userId
                })
            });
        } catch (error) {
            console.error('Erro ao enviar mensagem:', error);
        }
    }

    fetchMessages();
    setInterval(fetchMessages, 5000);

    chatButton.onclick = () => {
      chatWindow.style.display = 'flex';
      chatButton.style.display = 'none';
    };

    closeChat.onclick = () => {
      chatWindow.style.display = 'none';
      chatButton.style.display = 'flex';
    };

    const handleCreateMessageCard = (username, message, isUser = true) => {
      const messageDiv = document.createElement('div');
      messageDiv.className = `d-flex mb-2 ${isUser ? 'justify-content-end' : 'justify-content-start'}`;

      const messageContent = document.createElement('div');
      messageContent.className = `rounded-3 p-2 ${isUser ? 'bg-success text-white' : 'bg-primary text-white'}`;
      messageContent.style.maxWidth = '80%';

      messageContent.innerHTML = `<strong>${username}:</strong> ${message}`;
      messageDiv.appendChild(messageContent);
      chatBody.appendChild(messageDiv);
      chatBody.scrollTop = chatBody.scrollHeight;
    }

    sendMessage.onclick = () => {
      const message = userMessage.value.trim();
      if (message) {
        handleCreateMessageCard("Você", message, true);

        fetchSendMessage(message, 1);
        userMessage.value = '';
      }
    };

    userMessage.addEventListener('keypress', function(e) {
      if (e.key === 'Enter') {
        sendMessage.click();
      }
    });
  </script>
@endpush
