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
            <div class="input-group">
                <input type="text" class="form-control" style="border-radius: 5px 0px 0px 5px;" placeholder="Buscar produtos">
                <button class="btn btn-outline-secondary" type="button" onclick="window.location.href='busca.html'">
                    <i class="bi bi-search"></i>
                </button>
            </div>
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

        <!-- Ícones e botão entrar -->
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
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill notif">3</span>
                            </button>
                            <!-- Dropdown -->
                            <ul class="dropdown-menu dropdown-menu-end p-2 shadow" aria-labelledby="notifDropdown"
                                style="width: 320px; max-height: 300px; overflow-y: auto;">

                                <li class="mb-2">
                                    <a href="#" class="d-flex text-decoration-none notif-item">
                                        <i class="bi bi-chat-dots me-2 text-primary fs-5"></i>
                                        <div>
                                            <strong>Lojista respondeu:</strong><br>
                                            Sua pergunta sobre "Impressora HP".<br>
                                            <small class="text-muted">Hoje, 15:09</small>
                                        </div>
                                    </a>
                                </li>
                                <hr class="dropdown-divider">

                                <li class="mb-2">
                                    <a href="#" class="d-flex text-decoration-none notif-item">
                                        <i class="bi bi-tag-fill me-2 text-success fs-5"></i>
                                        <div>
                                            <strong>Promoção especial!</strong><br>
                                            O produto que você favoritou caiu 20%.<br>
                                            <small class="text-muted">Ontem</small>
                                        </div>
                                    </a>
                                </li>
                                <hr class="dropdown-divider">

                                <li class="mb-2">
                                    <a href="#" class="d-flex text-decoration-none notif-item">
                                        <i class="bi bi-bag-check-fill me-2 text-warning fs-5"></i>
                                        <div>
                                            <strong>Novo produto</strong><br>
                                            Categoria que você acompanha tem novidade.<br>
                                            <small class="text-muted">26/09</small>
                                        </div>
                                    </a>
                                </li>
                                <!-- Botão ver todas -->
                                <li>
                                    <div class="text-center mt-2">
                                        <button id="btnVerTodas" class="btn btn-sm btn-outline-primary w-100"
                                            data-bs-toggle="modal" data-bs-target="#modalNotificacoes">
                                            Ver todas notificações
                                        </button>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- MODAL (popup no meio da tela) -->
                    <div class="modal fade" id="modalNotificacoes" tabindex="-1"
                        aria-labelledby="modalNotificacoesLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalNotificacoesLabel">Todas as notificações</h5>
                                </div>
                                <div class="modal-body" style="max-height: 400px; overflow-y: auto;">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                                <i class="bi bi-chat-dots text-primary me-2"></i>
                                                <div>
                                                    Lojista respondeu sua mensagem sobre "Impressora HP".
                                                    <br><small class="text-muted">Hoje, 15:09</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                                <i class="bi bi-tag-fill text-success me-2"></i>
                                                <div>
                                                    O preço do produto que você favoritou caiu 20%.
                                                    <br><small class="text-muted">Ontem</small>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="list-group-item">
                                            <a href="#" class="text-decoration-none d-flex align-items-start">
                                                <i class="bi bi-bag-check-fill text-warning me-2"></i>
                                                <div>
                                                    Novo produto disponível na categoria que você acompanha.
                                                    <br><small class="text-muted">26/09</small>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <buttaon type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Botão de entrar -->
                    <button id="btnEntrar" style="display: flex;" class="btn btn-entrar ms-3 align-items-center" data-bs-toggle="modal"
                        data-bs-target="#modalLogin">
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
                                                    <input type="email" class="form-control" id="loginEmail" value="test@example.com"
                                                        placeholder="Digite seu email" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Senha</label>
                                                    <input type="password" value="password"  class="form-control" id="loginPassword" placeholder="********"
                                                        required>
                                                </div>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <div>
                                                        <input type="checkbox" id="lembrar">
                                                        <label for="lembrar" class="small">Lembrar de mim</label>
                                                    </div>
                                                    <a href="#" class="small text-decoration-none">Esqueceu a senha?</a>
                                                </div>
                                                <button class="btn btn-primary w-100 mb-2" id="loginButton">Entrar</button>
                                                <button type="button" class="btn btn-outline-secondary w-100 mb-2">
                                                    <i class="bi bi-google me-2"></i> Entrar com o Google
                                                </button>
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
                                                                <input type="tel" id="telefonePF" class="form-control"
                                                                    required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Criar senha*</label>
                                                                <input type="password" id="senhaPF" class="form-control"
                                                                    required>
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
                                                                <input type="text" id="fantasiaPJ" class="form-control"
                                                                    required>
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
                                                            <div class="mb-3">
                                                                <label class="form-label">Criar senha*</label>
                                                                <input type="password" id="senhaPJ" class="form-control"
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
            <i class="bi bi-person-circle me-2"></i> Entrar
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
                    <li><a class="dropdown-item" href="{{ route('supermercado') }}">Supermercado</a></li>
                    <li><a class="dropdown-item" href="{{ route('tecnologia') }}">Tecnologia</a></li>
                    <li><a class="dropdown-item" href="{{ route('casaMoveis') }}">Casa e Móveis</a></li>
                    <li><a class="dropdown-item" href="{{ route('eletrodomesticos') }}">Eletrodomésticos</a></li>
                    <li><a class="dropdown-item" href="{{ route('esportes') }}">Esportes e Fitness</a></li>
                    <li><a class="dropdown-item" href="{{ route('ferramentas') }}">Ferramentas</a></li>
                    <li><a class="dropdown-item" href="{{ route('construcao') }}">Construção</a></li>
                    <li><a class="dropdown-item" href="{{ route('autopecas') }}">Autopeças</a></li>
                    <li><a class="dropdown-item" href="{{ route('papelaria') }}">Papelaria</a></li>
                    <li><a class="dropdown-item" href="{{ route('petshop') }}">Pet Shop</a></li>
                    <li><a class="dropdown-item" href="{{ route('saude') }}">Saúde</a></li>
                    <li><a class="dropdown-item" href="{{ route('veiculos') }}">Acessórios para Veículos</a></li>
                    <li><a class="dropdown-item" href="{{ route('beleza') }}">Beleza e Cuidado Pessoal</a></li>
                    <li><a class="dropdown-item" href="{{ route('moda') }}">Moda</a></li>
                    <li><a class="dropdown-item" href="{{ route('bebes') }}">Bebês</a></li>
                    <li><a class="dropdown-item" href="{{ route('brinquedos') }}">Brinquedos</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!--FIM CABEÇALHO-->

@push('scripts')

<script>

    async function fetchUser() {
        const token = localStorage.getItem("access_token");
        if(!token) return;

        const url = "http://localhost:8001/api/user";
        fetch(url, {
        method: "GET",
        headers: {
            "Authorization": `Bearer ${token}`
        }
        }).then(res =>  res.json())
        .then(data => {
            const user = data.user
            const userName = document.querySelector("#headerUserName");
            userName.innerHTML = user.name;

            document.querySelector("#btnEntrar").style.display = "none";
            document.querySelector("#btnPerfil").style.display = "flex";
        })
        .catch(err => {
            console.error("Erro ao buscar dados do usuário:", err);
            localStorage.removeItem("access_token");
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

      const backURL = "http://localhost:8001/api/login";

      fetch(backURL, {
        method: "POST",
        headers: {
          "Content-Type": "application/json"
        },
        body: JSON.stringify(body)
      }).then(res => res.json())
        .then(({data}) => {
          if (!data.access_token) return;

          localStorage.setItem("access_token", data.access_token);
          location.reload();
        });
    })

    const profileButton = document.querySelector("#btnPerfil");
    profileButton.addEventListener("click", () => {
      localStorage.removeItem("access_token");
      location.reload();
    });


</script>
@endpush