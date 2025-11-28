const res = await fetch("./components/header/header.html");
const html = await res.text();

const container = document.createElement("div");
container.innerHTML = html;
document.body.appendChild(container);

class AppHeader extends HTMLElement {
  constructor() {
    super();

    const tpl = document.getElementById("header-template");
    this.appendChild(tpl.content.cloneNode(true));
  }

  connectedCallback() {
    this.themeConfig();
  }

  themeConfig() {
    const btnTema = this.querySelectorAll(".theme-option");

    btnTema.forEach(bt => {
      bt.addEventListener("click", () => {
        const theme = bt.dataset.theme;

        if (theme === "system") {
          document.documentElement.removeAttribute("data-bs-theme");
          location.reload();
          return;
        }

        const selectedTheme = bt.getAttribute("data-theme");
        document.documentElement.setAttribute("data-bs-theme", selectedTheme);
      });
    });
    
    const saved = localStorage.getItem("theme");
    if (saved) document.documentElement.setAttribute("data-bs-theme", saved);
  }
}

customElements.define("app-header", AppHeader);
