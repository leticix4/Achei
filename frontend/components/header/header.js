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
    this.checkUser();
    this.addHeaderListeners();
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

  checkUser() {
    const token = localStorage.getItem("access_token");
    if(!token) return;

    const url = "http://localhost:8000/api/user";
    fetch(url, {
      method: "GET",
      headers: {
        "Authorization": `Bearer ${token}`
      }
    }).then(res =>  res.json())
      .then(data => {
        const user = data.user
        const userName = this.querySelector("#headerUserName");
        userName.innerHTML = user.name;

        this.querySelector("#btnEntrar").style.display = "none";
        this.querySelector("#btnPerfil").style.display = "flex";
      })
      .catch(err => {
        console.error("Erro ao buscar dados do usuário:", err);
        localStorage.removeItem("access_token");
        location.reload();
      });
  }

  addHeaderListeners() {
    this.addLoginListener();
    this.addLogoutListener();
  }

  addLoginListener() {
    const loginButton = this.querySelector("#loginButton");
    loginButton.addEventListener("click", () => {
      const emailInput = this.querySelector("#loginEmail");
      const passwordInput = this.querySelector("#loginPassword");

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
        .then(data => {
          if (!data.access_token) return;

          localStorage.setItem("access_token", data.access_token);
          location.reload();
        });
    })
  }

  addLogoutListener() {
    const profileButton = this.querySelector("#btnPerfil");
    profileButton.addEventListener("click", () => {
      localStorage.removeItem("access_token");
      location.reload();
    });
  }
}

customElements.define("app-header", AppHeader);
