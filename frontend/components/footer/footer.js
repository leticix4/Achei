const res = await fetch("./components/footer/footer.html");
const html = await res.text();

const container = document.createElement("div");
container.innerHTML = html;
document.body.appendChild(container);

class AppFooter extends HTMLElement {
  constructor() {
    super();

    const tpl = document.getElementById("footer-template");
    this.appendChild(tpl.content.cloneNode(true));
  }

  // connectedCallback() {
  //   const themeOptions = this.querySelectorAll(".theme-option");

  //   themeOptions.forEach(opt => {
  //     opt.addEventListener("click", () => {
  //       const selectedTheme = opt.getAttribute("data-theme");
  //       document.documentElement.setAttribute("data-bs-theme", selectedTheme);
  //     });
  //   });
  // }
}

customElements.define("app-footer", AppFooter);
