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
    const themeOptions = this.querySelectorAll(".theme-option");

    themeOptions.forEach(opt => {
      opt.addEventListener("click", () => {
        const selectedTheme = opt.getAttribute("data-theme");
        document.documentElement.setAttribute("data-bs-theme", selectedTheme);
      });
    });
  }
}

customElements.define("app-header", AppHeader);
