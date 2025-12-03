<!-- CABEÇALHO -->

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Botão do menu hamburguer (visível apenas no mobile) -->
        <button class="btn d-lg-none text-white me-2" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#menuMobile">
            <i class="bi bi-list" style="font-size: 1.8rem;"></i>
        </button>

        <!-- LOGO -->
        <a class="navbar-brand logo" href="{{ route('home') }}">
            <img src="{{ asset('image/logo.png') }}" alt="Logo">
        </a>

        <!-- Barra de busca -->
        <div class="mx-auto search-bar d-none d-lg-block">
            <form class="input-group" action="{{ route('busca.lista') }}" method="GET">
                <input type="text" name="q" class="form-control" placeholder="Buscar produtos"
                    value="{{ request('q') }}">
                <button class="btn btn-search" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>


        <!-- Botão do tema -->
        <div class="dropdown me-3">
            <button class="btn text-white" id="themeToggle" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="bi bi-brightness-high" style="font-size: 1.4rem;"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="themeToggle">
                <li><a class="dropdown-item theme-option" data-theme="light"><i class="bi bi-sun me-2"></i> Claro</a>
                </li>
                <li><a class="dropdown-item theme-option" data-theme="dark"><i class="bi bi-moon me-2"></i> Escuro</a>
                </li>
                <li><a class="dropdown-item theme-option" data-theme="system"><i class="bi bi-laptop me-2"></i>
                        Sistema</a></li>
            </ul>
        </div>

        <!-- Ícones e botão entrar + criar conta -->
        <div class="d-flex align-items-center">
            <div class="nav-icons d-flex">
                <!-- ÍCONE DO SINO -->
                <div class="nav-icons d-flex">
                    <div class="dropdown">
                        <button class="btn btn-link position-relative" type="button" id="notifDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-bell" style="font-size: 1.5rem; color: white;"></i>
                            <!-- Badge da quantidade -->
                            <span id="notifBadge"
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill notif" style="display: none;">0</span>
                        </button>
                        <!-- Dropdown -->
                        <ul class="dropdown-menu dropdown-menu-end p-2 shadow" aria-labelledby="notifDropdown"
                            style="width: 320px; max-height: 300px; overflow-y: auto;" id="notifDropdownMenu">

                            <li class="text-center p-3" id="notifLoading">
                                <div class="spinner-border spinner-border-sm" role="status">
                                    <span class="visually-hidden">Carregando...</span>
                                </div>
                                Carregando notificações...
                            </li>
                            <li class="text-center p-3 d-none" id="notifEmpty">
                                <i class="bi bi-bell-slash text-muted fs-1"></i>
                                <p class="text-muted mt-2 mb-0">Nenhuma notificação</p>
                            </li>
                            <!-- Notificações serão inseridas aqui dinamicamente -->
                            <li class="text-center mt-2 d-none" id="notifFooter">
                                <button id="btnVerTodas" class="btn btn-sm btn-outline-primary w-100"
                                    data-bs-toggle="modal" data-bs-target="#modalNotificacoes">
                                    Ver todas notificações
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- MODAL (popup no meio da tela) -->
                <div class="modal fade" id="modalNotificacoes" tabindex="-1" aria-labelledby="modalNotificacoesLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalNotificacoesLabel">Todas as notificações</h5>
                                <button type="button" class="btn btn-outline-secondary btn-sm me-2" id="markAllReadBtn">
                                    Marcar todas como lidas
                                </button>
                            </div>
                            <div class="modal-body" style="max-height: 400px; overflow-y: auto;" id="modalNotifBody">
                                <div class="text-center p-4" id="modalLoading">
                                    <div class="spinner-border" role="status">
                                        <span class="visually-hidden">Carregando...</span>
                                    </div>
                                    <p class="mt-2">Carregando notificações...</p>
                                </div>
                                <div class="text-center p-4 d-none" id="modalEmpty">
                                    <i class="bi bi-bell-slash text-muted fs-1"></i>
                                    <p class="text-muted mt-2 mb-0">Nenhuma notificação</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Fechar
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Botão de entrar -->
                <button id="btnEntrar" style="display: flex;" class="btn btn-entrar ms-3 align-items-center"
                    data-bs-toggle="modal" data-bs-target="#modalLogin">
                    <i class="bi bi-person-circle me-2"></i> Entrar
                    <i class="bi bi-box-arrow-in-right ms-2"></i>
                </button>
                <button id="btnPerfil" style="display: none;" class="btn btn-entrar ms-3 align-items-center">
                    <i class="bi bi-person-circle me-2"></i> <span id="headerUserName"></span>
                </button>
                <!-- Modal de Login / Cadastro -->
                <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="loginModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content" style="border-radius: 12px; overflow: hidden;">
                            <div class="modal-body p-0">
                                <div class="row g-0">
                                    <!-- COLUNA ESQUERDA -->
                                    <div class="col-md-6 p-4 d-flex flex-column justify-content-center">
                                        <!-- LOGIN -->
                                        <div id="loginForm">
                                            <h4 class="fw-bold text-center mb-4">BEM VINDO</h4>
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" class="form-control" id="loginEmail"
                                                    value="teste@achei.com" placeholder="Digite seu email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Senha</label>
                                                <input type="password" value="password" class="form-control"
                                                    id="loginPassword" placeholder="********" required>
                                            </div>
                                            <div class="d-flex justify-content-between mb-3">
                                                <div>
                                                    <input type="checkbox" id="lembrar">
                                                    <label for="lembrar" class="small">Lembrar de mim</label>
                                                </div>
                                                <a href="#" class="small text-decoration-none">Esqueceu a
                                                    senha?</a>
                                            </div>
                                            <button class="btn btn-primary w-100 mb-2"
                                                id="loginButton">Entrar</button>
                                            <!-- <button type="button" class="btn btn-outline-secondary w-100 mb-2">
                                                <i class="bi bi-google me-2"></i> Entrar com o Google
                                            </button> -->
                                            <p class="small text-center mt-3">
                                                Não tem uma conta?
                                                <a href="#" id="abrirCadastro">Criar conta</a>
                                            </p>
                                        </div>
                                        <!-- CADASTRO PF / PJ -->
                                        <div id="cadastroForm" style="display: none;">
                                            <h4 class="fw-bold text-center mb-4">Criar Conta</h4>
                                            <!-- Abas -->
                                            <ul class="nav nav-tabs mb-3" id="cadastroTabs">
                                                <li class="nav-item">
                                                    <a class="nav-link active" data-bs-toggle="tab"
                                                        href="#cadastroPF">Cadastrar CPF</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-bs-toggle="tab"
                                                        href="#cadastroPJ">Cadastrar CNPJ</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <!-- FORM PF -->
                                                <div class="tab-pane fade show active" id="cadastroPF">
                                                    <form id="formPF">
                                                        <div class="mb-3">
                                                            <label class="form-label">E-mail*</label>
                                                            <input type="email" id="emailPF" class="form-control"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">CPF*</label>
                                                            <input type="text" id="cpfPF" class="form-control"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Nome completo*</label>
                                                            <input type="text" id="nomePF" class="form-control"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Telefone celular*</label>
                                                            <input type="tel" id="telefonePF"
                                                                class="form-control" required>
                                                        </div>
                                                        <button type="button" id="btnSalvarPF"
                                                            class="btn btn-success w-100">Continuar</button>
                                                    </form>
                                                </div>
                                                <!-- FORM PJ -->
                                                <div class="tab-pane fade" id="cadastroPJ">
                                                    <form id="formPJ">
                                                        <div class="mb-3">
                                                            <label class="form-label">E-mail*</label>
                                                            <input type="email" id="emailPJ" class="form-control"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">CNPJ*</label>
                                                            <input type="text" id="cnpjPJ" class="form-control"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Nome fantasia*</label>
                                                            <input type="text" id="fantasiaPJ"
                                                                class="form-control" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Razão social*</label>
                                                            <input type="text" id="razaoPJ" class="form-control"
                                                                required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label class="form-label">Inscrição Estadual*</label>
                                                            <input type="text" id="iePJ" class="form-control"
                                                                required>
                                                        </div>
                                                        <button type="button" id="btnSalvarPJ"
                                                            class="btn btn-success w-100">Continuar</button>
                                                    </form>
                                                </div>
                                            </div>
                                            <p class="small text-center mt-3">
                                                Já tem uma conta?
                                                <a href="#" id="abrirLogin">Voltar para login</a>
                                            </p>
                                        </div>
                                    </div>
                                    <!-- COLUNA DIREITA (LUPA) -->
                                    <div class="col-md-6 d-flex align-items-center justify-content-center bg-lupa">
                                        <i class="bi bi-search" style="font-size: 8rem; color: #E4CC5A;"></i>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</nav>

<!-- MENU MOBILE -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="menuMobile" aria-labelledby="menuMobileLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="menuMobileLabel">Minha Conta</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <div class="mb-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Buscar produtos...">
                <button class="btn btn-search" type="button">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </div>
        <a href="#btnEntrar" class="d-flex align-items-center mb-3">
            <i class="bi bi-person-circle me-2"></i> Entrar / Criar conta
        </a>
        <a href="#" class="d-flex align-items-center mb-3">
            <i class="bi bi-bell me-2"></i> Notificações
        </a>
        <hr>
        <a href="#" class="d-flex align-items-center mb-2">
            <i class="bi bi-house me-2"></i> Início
        </a>
        <a href="#produtos-destaque" class="d-flex align-items-center mb-2">
            <i class="bi bi-star me-2"></i> Destaque
        </a>
        <a href="#" class="d-flex align-items-center mb-2">
            <i class="bi bi-grid me-2"></i> Categorias
        </a>
    </div>
</div>

<div class="sub-nav d-none d-lg-block">
    <div class="container">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">Início</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#produtos-destaque">Destaque</a>
            </li>
            <!-- Dropdown de Categorias -->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="categoriasDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">Categorias</a>
                <ul class="dropdown-menu custom-dropdown" aria-labelledby="categoriasDropdown">
                    <li><a class="dropdown-item" href="{{ route('categoria.show', 'supermercado') }}">Supermercado</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('categoria.show', 'tecnologia') }}">Tecnologia</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('categoria.show', 'casa-moveis') }}">Casa e Móveis</a>
                    </li>
                    <li><a class="dropdown-item"
                            href="{{ route('categoria.show', 'eletrodomesticos') }}">Eletrodomésticos</a></li>
                    <li><a class="dropdown-item" href="{{ route('categoria.show', 'esportes') }}">Esportes e
                            Fitness</a></li>
                    <li><a class="dropdown-item" href="{{ route('categoria.show', 'ferramentas') }}">Ferramentas</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('categoria.show', 'construcao') }}">Construção</a>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('categoria.show', 'autopecas') }}">Autopeças</a></li>
                    <li><a class="dropdown-item" href="{{ route('categoria.show', 'papelaria') }}">Papelaria</a></li>
                    <li><a class="dropdown-item" href="{{ route('categoria.show', 'petshop') }}">Pet Shop</a></li>
                    <li><a class="dropdown-item" href="{{ route('categoria.show', 'saude') }}">Saúde</a></li>
                    <li><a class="dropdown-item" href="{{ route('categoria.show', 'veiculos') }}">Acessórios para
                            Veículos</a></li>
                    <li><a class="dropdown-item" href="{{ route('categoria.show', 'beleza') }}">Beleza e Cuidado
                            Pessoal</a></li>
                    <li><a class="dropdown-item" href="{{ route('categoria.show', 'moda') }}">Moda</a></li>
                    <li><a class="dropdown-item" href="{{ route('categoria.show', 'bebes') }}">Bebês</a></li>
                    <li><a class="dropdown-item" href="{{ route('categoria.show', 'brinquedos') }}">Brinquedos</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--FIM CABEÇALHO-->
@push('scripts')
    <script>
        // Sistema de Notificações
        class NotificationManager {
            constructor() {
                this.apiUrl = 'http://localhost:8000/api';
                this.eventSource = null;
                this.notifications = [];
                this.unreadCount = 0;
                
                this.init();
            }

            init() {
                this.checkAuthAndLoad();
                this.setupEventListeners();
            }

            checkAuthAndLoad() {
                const token = localStorage.getItem("access_token");
                if (token) {
                    this.loadNotifications();
                    this.connectSSE();
                }
            }

            setupEventListeners() {
                // Marcar todas como lidas no modal
                document.getElementById('markAllReadBtn')?.addEventListener('click', () => {
                    this.markAllAsRead();
                });

                // Atualizar quando modal abrir
                document.getElementById('modalNotificacoes')?.addEventListener('show.bs.modal', () => {
                    this.loadAllNotifications();
                });
            }

            async loadNotifications() {
                try {
                    const response = await this.fetchWithAuth(`${this.apiUrl}/user/notifications`);
                    const data = await response.json();
                    
                    this.notifications = data.data || [];
                    this.unreadCount = data.meta?.unread_count || 0;
                    
                    this.updateUI();
                } catch (error) {
                    console.error('Erro ao carregar notificações:', error);
                }
            }

            async loadAllNotifications() {
                document.getElementById('modalLoading').classList.remove('d-none');
                document.getElementById('modalEmpty').classList.add('d-none');
                document.getElementById('modalNotifBody').innerHTML = '';

                try {
                    const response = await this.fetchWithAuth(`${this.apiUrl}/user/notifications`);
                    const data = await response.json();
                    
                    document.getElementById('modalLoading').classList.add('d-none');
                    
                    if (!data.data || data.data.length === 0) {
                        document.getElementById('modalEmpty').classList.remove('d-none');
                        return;
                    }

                    const container = document.createElement('ul');
                    container.className = 'list-group list-group-flush';
                    
                    data.data.forEach(notification => {
                        const item = this.createNotificationItem(notification, true);
                        container.appendChild(item);
                    });
                    
                    document.getElementById('modalNotifBody').appendChild(container);
                } catch (error) {
                    console.error('Erro ao carregar todas as notificações:', error);
                    document.getElementById('modalLoading').classList.add('d-none');
                }
            }

            updateUI() {
                this.updateBadge();
                this.updateDropdown();
            }

            updateBadge() {
                const badge = document.getElementById('notifBadge');
                if (this.unreadCount > 0) {
                    badge.textContent = this.unreadCount > 99 ? '99+' : this.unreadCount;
                    badge.style.display = 'block';
                } else {
                    badge.style.display = 'none';
                }
            }

            updateDropdown() {
                const menu = document.getElementById('notifDropdownMenu');
                const loading = document.getElementById('notifLoading');
                const empty = document.getElementById('notifEmpty');
                const footer = document.getElementById('notifFooter');

                // Limpar conteúdo anterior
                const existingItems = menu.querySelectorAll('.notification-item, hr');
                existingItems.forEach(item => item.remove());

                loading.classList.add('d-none');

                if (this.notifications.length === 0) {
                    empty.classList.remove('d-none');
                    footer.classList.add('d-none');
                    return;
                }

                empty.classList.add('d-none');
                footer.classList.remove('d-none');

                // Adicionar notificações (máximo 5 no dropdown)
                const recentNotifications = this.notifications.slice(0, 5);
                
                recentNotifications.forEach((notification, index) => {
                    const item = this.createNotificationItem(notification, false);
                    menu.insertBefore(item, footer);
                    
                    if (index < recentNotifications.length - 1) {
                        const divider = document.createElement('hr');
                        divider.className = 'dropdown-divider';
                        menu.insertBefore(divider, footer);
                    }
                });
            }

            createNotificationItem(notification, isModal = false) {
                const item = document.createElement('li');
                item.className = isModal ? 'list-group-item' : 'mb-2 notification-item';
                
                const link = document.createElement('a');
                link.href = '#';
                link.className = 'd-flex text-decoration-none notif-item';
                link.dataset.notificationId = notification.id;
                
                if (!notification.read_at) {
                    link.classList.add('fw-bold');
                }

                const icon = document.createElement('i');
                icon.className = `bi me-2 fs-5 ${this.getNotificationIcon(notification.type)}`;
                
                const content = document.createElement('div');
                content.innerHTML = this.formatNotificationContent(notification);
                
                link.appendChild(icon);
                link.appendChild(content);
                item.appendChild(link);

                // Event listener para marcar como lida
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    if (!notification.read_at) {
                        this.markAsRead(notification.id);
                    }
                    // Aqui você pode adicionar navegação específica baseada no tipo
                    this.handleNotificationClick(notification);
                });

                return item;
            }

            getNotificationIcon(type) {
                const icons = {
                    'new_message': 'bi-chat-dots text-primary',
                    'new_review': 'bi-star-fill text-warning',
                    'new_product': 'bi-bag-plus-fill text-success'
                };
                return icons[type] || 'bi-bell text-secondary';
            }

            formatNotificationContent(notification) {
                const data = notification.data;
                let content = '';
                
                switch (notification.type) {
                    case 'new_message':
                        content = `<strong>Nova mensagem</strong><br>
                                  ${data.sender_name} sobre "${data.product_name}"<br>
                                  <small class="text-muted">${this.formatDate(notification.created_at)}</small>`;
                        break;
                    case 'new_review':
                        content = `<strong>Nova avaliação</strong><br>
                                  Sua loja "${data.store_name}" recebeu ${data.nota} estrelas<br>
                                  <small class="text-muted">${this.formatDate(notification.created_at)}</small>`;
                        break;
                    default:
                        content = `<strong>Notificação</strong><br>
                                  ${data.message || 'Nova notificação'}<br>
                                  <small class="text-muted">${this.formatDate(notification.created_at)}</small>`;
                }
                
                return content;
            }

            formatDate(dateString) {
                const date = new Date(dateString);
                const now = new Date();
                const diff = now - date;
                const minutes = Math.floor(diff / 60000);
                const hours = Math.floor(diff / 3600000);
                const days = Math.floor(diff / 86400000);

                if (minutes < 1) return 'Agora';
                if (minutes < 60) return `${minutes}min atrás`;
                if (hours < 24) return `${hours}h atrás`;
                if (days < 7) return `${days}d atrás`;
                
                return date.toLocaleDateString('pt-BR');
            }

            async markAsRead(notificationId) {
                try {
                    await this.fetchWithAuth(`${this.apiUrl}/user/notifications/mark-read`, {
                        method: 'POST'
                    });
                    
                    // Atualizar localmente
                    const notification = this.notifications.find(n => n.id == notificationId);
                    if (notification) {
                        notification.read_at = new Date().toISOString();
                        this.unreadCount = Math.max(0, this.unreadCount - 1);
                        this.updateUI();
                    }
                } catch (error) {
                    console.error('Erro ao marcar notificação como lida:', error);
                }
            }

            async markAllAsRead() {
                try {
                    await this.fetchWithAuth(`${this.apiUrl}/user/notifications/mark-read`, {
                        method: 'POST'
                    });
                    
                    // Marcar todas como lidas localmente
                    this.notifications.forEach(n => {
                        if (!n.read_at) n.read_at = new Date().toISOString();
                    });
                    this.unreadCount = 0;
                    this.updateUI();
                    
                    // Recarregar modal
                    this.loadAllNotifications();
                } catch (error) {
                    console.error('Erro ao marcar todas como lidas:', error);
                }
            }

            handleNotificationClick(notification) {
                // Lógica para navegar baseado no tipo de notificação
                switch (notification.type) {
                    case 'new_message':
                        // Abrir chat ou página de mensagens
                        console.log('Navegar para mensagens do produto:', notification.data.product_id);
                        break;
                    case 'new_review':
                        // Abrir página da loja
                        console.log('Navegar para loja:', notification.data.store_id);
                        break;
                }
            }

            connectSSE() {
                const token = localStorage.getItem("access_token");
                if (!token) return;

                this.eventSource = new EventSource(`${this.apiUrl}/notifications/stream`, {
                    headers: {
                        'Authorization': `Bearer ${token}`
                    }
                });

                this.eventSource.onmessage = (event) => {
                    const data = JSON.parse(event.data);
                    if (data.type === 'notifications' && data.data) {
                        // Adicionar novas notificações
                        data.data.forEach(newNotif => {
                            if (!this.notifications.find(n => n.id == newNotif.id)) {
                                this.notifications.unshift(newNotif);
                                this.unreadCount++;
                            }
                        });
                        this.updateUI();
                    }
                };

                this.eventSource.onerror = (error) => {
                    console.error('Erro na conexão SSE:', error);
                };
            }

            disconnectSSE() {
                if (this.eventSource) {
                    this.eventSource.close();
                    this.eventSource = null;
                }
            }

            async fetchWithAuth(url, options = {}) {
                const token = localStorage.getItem("access_token");
                const headers = {
                    "Content-Type": "application/json",
                    ...options.headers
                };
                if (token) {
                    headers["Authorization"] = `Bearer ${token}`;
                }
                return fetch(url, {
                    ...options,
                    headers
                });
            }
        }

        // Inicializar sistema de notificações quando DOM estiver pronto
        document.addEventListener('DOMContentLoaded', () => {
            window.notificationManager = new NotificationManager();
        });

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

        async function fetchUser() {
            const token = localStorage.getItem("access_token");
            if (!token) return;

            const url = "http://localhost:8000/api/user";
            fetchWithAuth(url, {
                    method: "GET"
                }).then(res => res.json())
                .then(data => {
                    const user = data.user
                    const userName = document.querySelector("#headerUserName");
                    userName.innerHTML = user.name;

                    const isCustomer = user.role === 'customer';
                    localStorage.setItem("IS_CUSTOMER", isCustomer);
                    document.cookie = `IS_CUSTOMER=${isCustomer}; path=/; max-age=86400`; // 24 horas

                    document.cookie = `user_id=${user.id}; path=/; max-age=86400`;

                    document.querySelector("#btnEntrar").style.display = "none";
                    document.querySelector("#btnPerfil").style.display = "flex";
                })
                .catch(err => {
                    console.error("Erro ao buscar dados do usuário:", err);
                    localStorage.removeItem("access_token");
                    localStorage.removeItem("IS_CUSTOMER");
                    document.cookie = "IS_CUSTOMER=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT";
                    document.cookie = "user_id=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT";
                    location.reload();
                });
        }

        fetchUser()

        const loginButton = document.querySelector("#loginButton");
        loginButton.addEventListener("click", () => {
            const emailInput = document.querySelector("#loginEmail");
            const passwordInput = document.querySelector("#loginPassword");

            const body = {
                email: emailInput.value,
                password: passwordInput.value
            }

            const backURL = "http://localhost:8000/api/login";

            fetch(backURL, {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json"
                    },
                    body: JSON.stringify(body)
                }).then(res => res.json())
                .then(({
                    data
                }) => {
                    if (!data.token) return;

                    localStorage.setItem("access_token", data.token);
                    
                    fetchWithAuth("http://localhost:8000/api/user", {
                        method: "GET"
                    }).then(res => res.json())
                    .then(userData => {
                        const isCustomer = userData.user.role === 'customer';
                        localStorage.setItem("IS_CUSTOMER", isCustomer);
                        document.cookie = `IS_CUSTOMER=${isCustomer}; path=/; max-age=86400`; // 24 horas

                        document.cookie = `user_id=${userData.user.id}; path=/; max-age=86400`;

                        // Redirecionar baseado no role
                        if (isCustomer) {
                            location.href = '/';
                        } else {
                            location.href = '/loja';
                        }
                    })
                    .catch(err => {
                        console.error("Erro ao buscar dados do usuário após login:", err);
                        location.reload();
                    });
                });
        })

        const profileButton = document.querySelector("#btnPerfil");
        profileButton.addEventListener("click", () => {
            localStorage.removeItem("access_token");
            localStorage.removeItem("IS_CUSTOMER");
            document.cookie = "IS_CUSTOMER=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT";
            document.cookie = "user_id=; path=/; expires=Thu, 01 Jan 1970 00:00:00 GMT";
            location.reload();
        });

        // Atualizar notificações quando usuário fizer login
        const originalFetchUser = window.fetchUser;
        window.fetchUser = async function() {
            await originalFetchUser();
            if (window.notificationManager) {
                window.notificationManager.checkAuthAndLoad();
            }
        };
    </script>
@endpush
