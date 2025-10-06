// 1. ATIVAR TOOLTIPS BOOTSTRAP
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});

// 2. LÓGICA DO BOTÃO "VER TODAS NOTIFICAÇÕES"
document.getElementById("btnVerTodas").addEventListener("click", function () {
  var dropdownEl = document.getElementById("notifDropdown");
  var dropdown = bootstrap.Dropdown.getInstance(dropdownEl);
  if (dropdown) dropdown.hide();

  var modalEl = document.getElementById("modalNotificacoes");
  var modal = bootstrap.Modal.getOrCreateInstance(modalEl);
  modal.show();
});

document.addEventListener("DOMContentLoaded", () => {

  // --- LÓGICA DO CONTADOR DE NOTIFICAÇÕES ---
  const notifBadge = document.getElementById("notifBadge");
  const notifItems = document.querySelectorAll(".dropdown-menu .notif-item, #modalNotificacoes .list-group-item a");

  notifItems.forEach(item => {
    item.addEventListener("click", (e) => {
      let count = parseInt(notifBadge.textContent);
      if (count > 0) {
        count--;
        notifBadge.textContent = count;
        if (count === 0) {
          notifBadge.style.display = "none";
        }
      }
    });
  });
  // --- LÓGICA PARA ALTERNAR LOGIN/CADASTRO E SALVAR DADOS ---
  const loginForm = document.getElementById("loginForm");
  const cadastroForm = document.getElementById("cadastroForm");
  const abrirCadastro = document.getElementById("abrirCadastro");
  const abrirLogin = document.getElementById("abrirLogin");

  if (abrirCadastro) {
    abrirCadastro.addEventListener("click", (e) => {
      e.preventDefault();
      loginForm.style.display = "none";
      cadastroForm.style.display = "block";
    });
  }

  if (abrirLogin) {
    abrirLogin.addEventListener("click", (e) => {
      e.preventDefault();
      cadastroForm.style.display = "none";
      loginForm.style.display = "block";
    });
  }
  // Salvar e limpar dados do formulário PF
  const btnSalvarPF = document.getElementById("btnSalvarPF");
  if (btnSalvarPF) {
    btnSalvarPF.addEventListener("click", () => {
      // Pega os inputs do formulário PF
      const nomeInput = document.getElementById("nomePF");
      const emailInput = document.getElementById("emailPF");
      const telefoneInput = document.getElementById("telefonePF");
      const cpfInput = document.getElementById("cpfPF");
      // Salva os valores no localStorage
      localStorage.setItem("cadastroNome", nomeInput.value);
      localStorage.setItem("cadastroEmail", emailInput.value);
      localStorage.setItem("cadastroTelefone", telefoneInput.value);
      localStorage.setItem("cadastroCpf", cpfInput.value);
      localStorage.setItem("tipoPessoa", "pf");
      // Limpa os campos
      nomeInput.value = "";
      emailInput.value = "";
      telefoneInput.value = "";
      cpfInput.value = "";
      // Redireciona
      window.location.href = "cadastro-completo.html";
    });
  }
  // Salvar e limpar dados do formulário PJ
  const btnSalvarPJ = document.getElementById("btnSalvarPJ");
  if (btnSalvarPJ) {
    btnSalvarPJ.addEventListener("click", () => {
      // Pega os inputs do formulário PJ
      const emailInputPJ = document.getElementById("emailPJ");
      const cnpjInputPJ = document.getElementById("cnpjPJ");
      const fantasiaInputPJ = document.getElementById("fantasiaPJ");
      const razaoInputPJ = document.getElementById("razaoPJ");
      const ieInputPJ = document.getElementById("iePJ");
      // Salva os valores no localStorage
      localStorage.setItem("cadastroEmail", emailInputPJ.value);
      localStorage.setItem("cadastroCnpj", cnpjInputPJ.value);
      localStorage.setItem("cadastroFantasia", fantasiaInputPJ.value);
      localStorage.setItem("cadastroRazao", razaoInputPJ.value);
      localStorage.setItem("cadastroIe", ieInputPJ.value);
      localStorage.setItem("tipoPessoa", "pj");
      // Limpa os campos
      emailInputPJ.value = "";
      cnpjInputPJ.value = "";
      fantasiaInputPJ.value = "";
      razaoInputPJ.value = "";
      ieInputPJ.value = "";
      // Redireciona
      window.location.href = "cadastro-completo.html";
    });
  }
  const paginationLinks = document.querySelectorAll('.pagination .page-link');
  const categoryPages = document.querySelectorAll('.category-page');

  paginationLinks.forEach(link => {
    link.addEventListener('click', function (event) {
      event.preventDefault(); // Impede que o link recarregue a página

      // Pega o número da página do atributo data-page
      const pageToShow = this.getAttribute('data-page');

      // Esconde todas as páginas de categorias
      categoryPages.forEach(page => {
        page.style.display = 'none';
      });

      // Mostra a página correta
      const targetPage = document.getElementById('page-' + pageToShow);
      if (targetPage) {
        targetPage.style.display = 'block';
      }

      // Atualiza a classe 'active' na paginação
      paginationLinks.forEach(item => {
        item.parentElement.classList.remove('active');
      });
      this.parentElement.classList.add('active');
    });
  });
});
// 3. LÓGICA DA PAGINAÇÃO COM ANIMAÇÃO DE DESLIZAR
document.querySelectorAll('.pagination .page-link').forEach(link => {
  link.addEventListener('click', e => {
    e.preventDefault();

    const page = e.target.getAttribute('data-page');
    const activePage = document.querySelector('.category-page.active');
    const newPage = document.getElementById('page-' + page);

    if (activePage === newPage) return;

    // sair a página atual (desliza para esquerda)
    activePage.classList.remove('active');
    activePage.classList.add('inactive');
    activePage.style.transform = "translateX(-100%)";

    // entrar a nova página (desliza da direita)
    newPage.classList.remove('inactive');
    newPage.classList.add('active');
    newPage.style.transform = "translateX(100%)";

    setTimeout(() => {
      newPage.style.transform = "translateX(0)";
    }, 50);

    // atualizar paginação ativa
    document.querySelectorAll('.pagination .page-item').forEach(li => li.classList.remove('active'));
    e.target.parentElement.classList.add('active');
  });
});

// 4. LÓGICA DE TROCA DE TEMA (CLARO/ESCURO/SISTEMA)
const themeButtons = document.querySelectorAll('.theme-option');
const themeIcon = document.querySelector('#themeToggle i');

function applyTheme(theme) {
  if (theme === 'system') {
    theme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
  }

  document.documentElement.setAttribute('data-bs-theme', theme);
  localStorage.setItem('theme', theme);

  // Troca o ícone
  themeIcon.className = theme === 'dark' ? 'bi bi-moon' : 'bi bi-brightness-high';
}

// Evento de clique no menu
themeButtons.forEach(btn => {
  btn.addEventListener('click', () => {
    const selectedTheme = btn.dataset.theme;
    applyTheme(selectedTheme);
  });
});

// Aplica o tema salvo ou o sistema
applyTheme(localStorage.getItem('theme') || 'system');

