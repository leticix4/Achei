// ================================================================== //
// 1. LÓGICA DE TEMA (Executa imediatamente para evitar piscar)
// ================================================================== //
function applyTheme(theme) {
    if (theme === 'system') {
        theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }
    document.documentElement.setAttribute('data-bs-theme', theme);
    localStorage.setItem('theme', theme);
    
    // Tenta atualizar o ícone caso o header já esteja carregado
    const themeIcon = document.querySelector('#themeToggle i');
    if (themeIcon) {
        themeIcon.className = theme === 'dark' ? 'bi bi-moon' : 'bi bi-brightness-high';
    }
}
// Aplica o tema salvo ao carregar
applyTheme(localStorage.getItem('theme') || 'system');


document.addEventListener("DOMContentLoaded", () => {
    // ================================================================== //
    // 2. INICIALIZAÇÃO DE TOOLTIPS
    // ================================================================== //
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl);
    });

    // ================================================================== //
    // 3. PAGINAÇÃO DE CATEGORIAS (COM CORREÇÃO DE ALTURA E ANIMAÇÃO)
    // ================================================================== //
    const paginationContainer = document.querySelector('#categorias');

    if (paginationContainer) {
        const paginationLinks = paginationContainer.querySelectorAll('.pagination .page-link');
        const categoryPages = paginationContainer.querySelectorAll('.category-page');
        const pagesWrapper = paginationContainer.querySelector('.pages-wrapper');

        // Função para atualizar a altura do container (Corrige o footer no mobile)
        function updateContainerHeight() {
            const activePage = paginationContainer.querySelector('.category-page.active');
            if (activePage && pagesWrapper) {
                const height = activePage.scrollHeight;
                pagesWrapper.style.height = (height + 20) + 'px';
            }
        }

        // Atualiza ao carregar e ao redimensionar a tela
        setTimeout(updateContainerHeight, 500); // Pequeno delay para garantir carregamento
        window.addEventListener('resize', updateContainerHeight);

        paginationLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const pageToShow = this.getAttribute('data-page');
                const targetPage = document.getElementById('page-' + pageToShow);

                if (targetPage.classList.contains('active')) return;

                // Troca de classes para animação
                categoryPages.forEach(page => page.classList.remove('active'));
                if (targetPage) targetPage.classList.add('active');

                // Recalcula altura
                updateContainerHeight();

                // Atualiza botões da paginação
                paginationLinks.forEach(item => item.parentElement.classList.remove('active'));
                this.parentElement.classList.add('active');
            });
        });
    }
});

// ================================================================== //
// 4. DELEGAÇÃO DE EVENTOS (GERENCIA CLIQUES GLOBAIS)
// ================================================================== //
// Isso faz com que botões do Header/Footer funcionem mesmo carregados depois
document.addEventListener("click", function (event) {

    // --- BOTÃO "VER TODAS NOTIFICAÇÕES" ---
    if (event.target.closest("#btnVerTodas")) {
        // Fecha o dropdown
        const dropdownEl = document.getElementById("notifDropdown");
        if (dropdownEl) {
            const dropdown = bootstrap.Dropdown.getInstance(dropdownEl);
            if (dropdown) dropdown.hide();
        }
        // Abre o modal
        const modalEl = document.getElementById("modalNotificacoes");
        const modal = bootstrap.Modal.getOrCreateInstance(modalEl);
        modal.show();
    }

    // --- CONTADOR DE NOTIFICAÇÕES (Ao clicar em uma notificação) ---
    if (event.target.closest(".notif-item")) {
        const notifBadge = document.getElementById("notifBadge");
        if (notifBadge) {
            let count = parseInt(notifBadge.textContent);
            if (count > 0) {
                count--;
                notifBadge.textContent = count;
                if (count === 0) notifBadge.style.display = "none";
            }
        }
    }

    // --- ALTERNAR TEMA (CLARO/ESCURO) ---
    const themeBtn = event.target.closest(".theme-option");
    if (themeBtn) {
        const selectedTheme = themeBtn.getAttribute("data-theme");
        applyTheme(selectedTheme);
    }

    // --- ABRIR CADASTRO (DO LOGIN) ---
    if (event.target.closest("#abrirCadastro")) {
        event.preventDefault();
        document.getElementById("loginForm").style.display = "none";
        document.getElementById("cadastroForm").style.display = "block";
    }

    // --- VOLTAR PARA LOGIN (DO CADASTRO) ---
    if (event.target.closest("#abrirLogin")) {
        event.preventDefault();
        document.getElementById("cadastroForm").style.display = "none";
        document.getElementById("loginForm").style.display = "block";
    }

    // --- SALVAR E LIMPAR (PESSOA FÍSICA) ---
    if (event.target.closest("#btnSalvarPF")) {
        const nomeInput = document.getElementById("nomePF");
        const emailInput = document.getElementById("emailPF");
        const telefoneInput = document.getElementById("telefonePF");
        const cpfInput = document.getElementById("cpfPF");

        localStorage.setItem("cadastroNome", nomeInput.value);
        localStorage.setItem("cadastroEmail", emailInput.value);
        localStorage.setItem("cadastroTelefone", telefoneInput.value);
        localStorage.setItem("cadastroCpf", cpfInput.value);
        localStorage.setItem("tipoPessoa", "pf");

        // Limpa campos
        nomeInput.value = ""; emailInput.value = ""; telefoneInput.value = ""; cpfInput.value = "";
        
        window.location.href = "/cadastro-completo";
    }

    // --- SALVAR E LIMPAR (PESSOA JURÍDICA) ---
    if (event.target.closest("#btnSalvarPJ")) {
        const emailInput = document.getElementById("emailPJ");
        const cnpjInput = document.getElementById("cnpjPJ");
        const fantasiaInput = document.getElementById("fantasiaPJ");
        const razaoInput = document.getElementById("razaoPJ");
        const ieInput = document.getElementById("iePJ");

        localStorage.setItem("cadastroEmail", emailInput.value);
        localStorage.setItem("cadastroCnpj", cnpjInput.value);
        localStorage.setItem("cadastroFantasia", fantasiaInput.value);
        localStorage.setItem("cadastroRazao", razaoInput.value);
        localStorage.setItem("cadastroIe", ieInput.value);
        localStorage.setItem("tipoPessoa", "pj");

        // Limpa campos
        emailInput.value = ""; cnpjInput.value = ""; fantasiaInput.value = ""; razaoInput.value = ""; ieInput.value = "";

        window.location.href = "/cadastro-completo";
    }
});