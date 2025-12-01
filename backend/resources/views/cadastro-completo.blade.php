@extends('layouts.app-cadastro')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/cadastro-completo.css') }}">
@endpush

@section('title', 'Cadastro Completo')

@section('content')

    <!-- FORM CADASTRO -->
    <div class="container">
        <div class="form-section">
            <h2 class="section-title">Cadastro</h2>

            <div class="mb-4">
                <label class="form-label fw-bold me-3">Você é:</label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipoPessoa" id="pf" value="pf" checked>
                    <label class="form-check-label fw-bold" for="pf">Pessoa Física</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipoPessoa" id="pj" value="pj">
                    <label class="form-check-label fw-bold" for="pj">Pessoa Jurídica</label>
                </div>
                <p class="small text-muted mt-1">Campos marcados com (*) são obrigatórios.</p>
            </div>

            <hr class="my-4">
            <!-- FORMULÁRIO PESSOA FÍSICA -->
            <form id="formPF">
                <div class="row g-5">
                    <div class="col-md-6 border-end-md">
                        <h3 class="fw-bold mb-4">Dados Pessoais</h3>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Nome Completo*</label>
                            <input type="text" id="nomeCompleto" class="form-control bg-light border-0" required>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Email*</label>
                                <input type="email" id="emailCompleto" class="form-control bg-light border-0"
                                    placeholder="exemplo@email.com" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">CPF*</label>
                                <input type="text" id="cpfCompleto" inputmode="numeric"
                                    class="form-control bg-light border-0" required>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Data de nascimento*</label>
                                <input type="date" class="form-control bg-light border-0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Gênero*</label>
                                <select class="form-select bg-light border-0">
                                    <option selected>Selecione</option>
                                    <option>Masculino</option>
                                    <option>Feminino</option>
                                    <option>Outro</option>
                                </select>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Celular*</label>
                                <input type="tel" id="celularCompleto" inputmode="numeric"
                                    class="form-control bg-light border-0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Contato adicional</label>
                                <input type="tel" inputmode="numeric" class="form-control bg-light border-0">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Senha*</label>
                                <input type="password" id="senhaPF" class="form-control bg-light border-0" required>

                                <!-- REGRAS DA SENHA -->
                                <small id="regrasPF" class="text-muted d-block mt-1" style="font-size: .85rem;">
                                    A senha deve conter:
                                    <ul style="margin-left: 20px; margin-top: 3px;">
                                        <li>Mínimo de 8 caracteres</li>
                                        <li>1 letra maiúscula</li>
                                        <li>1 número</li>
                                        <li>1 caractere especial (!@#$%&*)</li>
                                    </ul>
                                </small>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">Confirmar senha*</label>
                                <input type="password" id="confSenhaPF" class="form-control bg-light border-0" required>
                            </div>
                        </div>


                    </div>

                    <div class="col-md-6">
                        <h3 class="fw-bold mb-4">Endereço</h3>

                        <div class="mb-3 d-flex align-items-center">
                            <div class="flex-grow-1 me-3">
                                <label class="form-label fw-bold">CEP*</label>
                                <input type="text" id="cepPF" inputmode="numeric"
                                    class="form-control bg-light border-0" required style="max-width: 150px;">
                            </div>
                            <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank"
                                class="text-decoration-none small fw-bold text-dark">Não sei meu CEP.</a>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-8">
                                <label class="form-label fw-bold">Endereço*</label>
                                <input type="text" class="form-control bg-light border-0" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Número*</label>
                                <input type="text" inputmode="numeric" class="form-control bg-light border-0"
                                    required>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Complemento</label>
                                <input type="text" class="form-control bg-light border-0">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Bairro*</label>
                                <input type="text" class="form-control bg-light border-0" required>
                            </div>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-8">
                                <label class="form-label fw-bold">Cidade*</label>
                                <input type="text" class="form-control bg-light border-0" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Estado*</label>
                                <select class="form-select bg-light border-0">
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option selected value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-primary px-4">Finalizar Cadastro</button>
                </div>
            </form>
            <!-- FORMULÁRIO PESSOA JURÍDICA -->
            <form id="formPJ" style="display:none;">
                <div class="row g-5">

                    <div class="col-md-6 border-end-md">
                        <h3 class="fw-bold mb-4">Dados da Empresa</h3>
                        <div class="mb-2">
                            <label class="form-label fw-bold">Razão Social*</label>
                            <input type="text" id="razaoPJ" class="form-control bg-light border-0" required>
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="isentoIE">
                            <label class="form-check-label small fw-bold" for="isentoIE">
                                Inscrição estadual isento
                            </label>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Inscrição Estadual*</label>
                                <input type="text" id="iePJ" class="form-control bg-light border-0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">CNPJ*</label>
                                <input type="text" id="cnpjPJ" inputmode="numeric"
                                    class="form-control bg-light border-0" required>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Nome de Contato*</label>
                                <input type="text" id="nomeContatoPJ" class="form-control bg-light border-0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">CPF Contato*</label>
                                <input type="text" id="cpfContatoPJ" inputmode="numeric"
                                    class="form-control bg-light border-0" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email*</label>
                            <input type="email" id="emailPJ" class="form-control bg-light border-0"
                                placeholder="exemplo@email.com"required>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Celular*</label>
                                <input type="tel" id="celularPJ" inputmode="numeric"
                                    class="form-control bg-light border-0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Telefone adicional</label>
                                <input type="tel" id="telefonePJ" inputmode="numeric"
                                    class="form-control bg-light border-0">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Senha*</label>
                                <input type="password" id="senhaPJ" class="form-control bg-light border-0" required>
                                <small id="regrasPJ" class="text-muted d-block mt-1" style="font-size: .85rem;">
                                    A senha deve conter:
                                    <ul style="margin-left: 20px; margin-top: 3px;">
                                        <li>Mínimo de 8 caracteres</li>
                                        <li>1 letra maiúscula</li>
                                        <li>1 número</li>
                                        <li>1 caractere especial (!@#$%&*)</li>
                                    </ul>
                                </small>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Confirmar senha*</label>
                                <input type="password" id="confSenhaPJ" class="form-control bg-light border-0" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h3 class="fw-bold mb-4">Endereço</h3>

                        <div class="mb-3 d-flex align-items-center">
                            <div class="flex-grow-1 me-3">
                                <label class="form-label fw-bold">CEP*</label>
                                <input type="text" id="cepPJ" inputmode="numeric"
                                    class="form-control bg-light border-0" required style="max-width: 150px;">
                            </div>
                            <a href="#" class="text-decoration-none small fw-bold text-dark">Não sei meu CEP.</a>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-8">
                                <label class="form-label fw-bold">Endereço*</label>
                                <input type="text" id="enderecoPJ" class="form-control bg-light border-0" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Número*</label>
                                <input type="text" id="numeroPJ" inputmode="numeric"
                                    class="form-control bg-light border-0" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Complemento</label>
                            <input type="text" id="complementoPJ" class="form-control bg-light border-0">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Referência</label>
                            <input type="text" id="referenciaPJ" class="form-control bg-light border-0">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Bairro*</label>
                            <input type="text" id="bairroPJ" class="form-control bg-light border-0" required>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-8">
                                <label class="form-label fw-bold">Cidade*</label>
                                <input type="text" id="cidadePJ" class="form-control bg-light border-0" required>
                            </div>
                            <div class="col-md-4">
                                <label class="form-label fw-bold">Estado*</label>
                                <select id="estadoPJ" class="form-select bg-light border-0">
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option selected value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-3">
                    <button class="btn btn-primary px-4">Finalizar Cadastro</button>
                </div>
            </form>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // ==========================
        // TROCA ENTRE PF E PJ
        // ==========================
        (function() {
            const pfRadio = document.getElementById("pf");
            const pjRadio = document.getElementById("pj");
            const formPF = document.getElementById("formPF");
            const formPJ = document.getElementById("formPJ");

            if (!pfRadio || !pjRadio || !formPF || !formPJ) {
                console.error("Erro: não achei algum dos elementos PF/PJ.");
                return;
            }

            function mostrarPF() {
                formPF.style.display = "block";
                formPJ.style.display = "none";
            }

            function mostrarPJ() {
                formPF.style.display = "none";
                formPJ.style.display = "block";
            }

            function aplicarEstadoInicial() {
                const tipo = localStorage.getItem("tipoPessoa");

                if (tipo === "pj") {
                    pjRadio.checked = true;
                    mostrarPJ();

                    // Preenche PJ se tiver vindo do modal
                    document.getElementById("razaoPJ").value = localStorage.getItem("cadastroRazao") || "";
                    document.getElementById("fantasiaPJ").value = localStorage.getItem("cadastroFantasia") || "";
                    document.getElementById("iePJ").value = localStorage.getItem("cadastroIe") || "";
                    document.getElementById("cnpjPJ").value = localStorage.getItem("cadastroCnpj") || "";
                    document.getElementById("emailPJ").value = localStorage.getItem("cadastroEmail") || "";
                } else {
                    // padrão: PF
                    pfRadio.checked = true;
                    mostrarPF();

                    document.getElementById("nomeCompleto").value = localStorage.getItem("cadastroNome") || "";
                    document.getElementById("emailCompleto").value = localStorage.getItem("cadastroEmail") || "";
                    document.getElementById("celularCompleto").value = localStorage.getItem("cadastroTelefone") || "";
                    document.getElementById("cpfCompleto").value = localStorage.getItem("cadastroCpf") || "";
                }
            }

            pfRadio.addEventListener("change", mostrarPF);
            pjRadio.addEventListener("change", mostrarPJ);

            aplicarEstadoInicial();
        })();


        // ==========================
        //  VALIDAÇÕES / MÁSCARAS
        // ==========================
        document.addEventListener("DOMContentLoaded", function() {
            // Helpers
            function apenasLetras(input) {
                if (!input) return;
                input.addEventListener("input", () => {
                    input.value = input.value.replace(/[^A-Za-zÀ-ÖØ-öø-ÿ\s]/g, "");
                });
            }

            function apenasNumeros(input) {
                if (!input) return;
                input.addEventListener("input", () => {
                    input.value = input.value.replace(/\D/g, "");
                });
            }

            function mascaraCPF(input) {
                if (!input) return;
                input.addEventListener("input", () => {
                    let v = input.value.replace(/\D/g, "");
                    if (v.length > 11) v = v.slice(0, 11);

                    if (v.length > 3) v = v.slice(0, 3) + "." + v.slice(3);
                    if (v.length > 7) v = v.slice(0, 7) + "." + v.slice(7);
                    if (v.length > 11) v = v.slice(0, 11) + "-" + v.slice(11);
                    input.value = v;
                });
            }

            function mascaraCNPJ(input) {
                if (!input) return;
                input.addEventListener("input", () => {
                    let v = input.value.replace(/\D/g, "");
                    if (v.length > 14) v = v.slice(0, 14);

                    if (v.length > 2) v = v.slice(0, 2) + "." + v.slice(2);
                    if (v.length > 6) v = v.slice(0, 6) + "." + v.slice(6);
                    if (v.length > 10) v = v.slice(0, 10) + "/" + v.slice(10);
                    if (v.length > 15) v = v.slice(0, 15) + "-" + v.slice(15);
                    input.value = v;
                });
            }

            function mascaraCEP(input) {
                if (!input) return;
                input.addEventListener("input", () => {
                    let v = input.value.replace(/\D/g, "");
                    if (v.length > 8) v = v.slice(0, 8);
                    if (v.length > 5) v = v.slice(0, 5) + "-" + v.slice(5);
                    input.value = v;
                });
            }

            function mascaraTelefone(input) {
                if (!input) return;
                input.addEventListener("input", () => {
                    let v = input.value.replace(/\D/g, "");
                    if (v.length > 11) v = v.slice(0, 11);

                    if (v.length > 0) v = "(" + v;
                    if (v.length > 3) v = v.slice(0, 3) + ") " + v.slice(3);
                    if (v.length > 10) v = v.slice(0, 10) + "-" + v.slice(10);
                    input.value = v;
                });
            }

            function senhaValida(valor) {
                // Mínimo 8 | 1 maiúscula | 1 número | 1 caractere especial
                const regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/;
                return regex.test(valor);
            }

            function configurarSenha(passwordInput, confirmInput) {
                if (!passwordInput || !confirmInput) return;

                function validar(showMessage) {
                    const senha = passwordInput.value;
                    const conf = confirmInput.value;

                    passwordInput.setCustomValidity("");
                    confirmInput.setCustomValidity("");

                    if (senha && !senhaValida(senha)) {
                        passwordInput.setCustomValidity(
                            "A senha deve ter pelo menos 8 caracteres, 1 letra maiúscula e 1 caractere especial."
                        );
                    } else if (conf && senha !== conf) {
                        confirmInput.setCustomValidity("As senhas não coincidem.");
                    }

                    // Só mostra balão se tiver algo digitado
                    if (showMessage) {
                        if (senha) passwordInput.reportValidity();
                        if (conf) confirmInput.reportValidity();
                    }
                }

                // Enquanto digita: valida silenciosamente
                passwordInput.addEventListener("input", () => validar(false));
                confirmInput.addEventListener("input", () => validar(false));

                // Ao sair do campo: mostra mensagem
                passwordInput.addEventListener("blur", () => validar(true));
                confirmInput.addEventListener("blur", () => validar(true));
            }

            // ==========================
            //  SELETORES PF
            // ==========================
            const nomePF = document.getElementById("nomeCompleto");
            const cpfPF = document.getElementById("cpfCompleto");
            const telPF = document.getElementById("celularCompleto");
            const senhaPF = document.getElementById("senhaPF");
            const confSenhaPF = document.getElementById("confSenhaPF");
            const cepPF = document.querySelector("#formPF input[placeholder='39960-000']") || null;

            // ==========================
            //  SELETORES PJ
            // ==========================
            const razaoPJ = document.getElementById("razaoPJ");
            const nomeContatoPJ = document.getElementById("nomeContatoPJ");
            const cpfContatoPJ = document.getElementById("cpfContatoPJ");
            const cnpjPJ = document.getElementById("cnpjPJ");
            const telPJ = document.getElementById("celularPJ");
            const telAdicPJ = document.getElementById("telefonePJ");
            const senhaPJ = document.getElementById("senhaPJ");
            const confSenhaPJ = document.getElementById("confSenhaPJ");
            const cepPJ = document.getElementById("cepPJ");

            // ==========================
            //  PLACEHOLDERS
            // ==========================
            const emailPF = document.getElementById("emailCompleto");
            const emailPJ = document.getElementById("emailPJ");
            if (emailPF) emailPF.placeholder = "exemplo@email.com";
            if (emailPJ) emailPJ.placeholder = "exemplo@email.com";

            if (telPF && !telPF.value) telPF.value = "(31";
            if (telPJ && !telPJ.value) telPJ.value = "(31";

            if (cepPF && !cepPF.value) cepPF.placeholder = "39960-000";
            if (cepPJ && !cepPJ.value) cepPJ.placeholder = "39960-000";

            // ==========================
            //  APLICA REGRAS
            // ==========================
            apenasLetras(nomePF);
            apenasLetras(razaoPJ);
            apenasLetras(nomeContatoPJ);

            mascaraCPF(cpfPF);
            mascaraCPF(cpfContatoPJ);
            mascaraCNPJ(cnpjPJ);

            mascaraTelefone(telPF);
            mascaraTelefone(telPJ);
            mascaraTelefone(telAdicPJ);

            mascaraCEP(cepPF);
            mascaraCEP(cepPJ);

            configurarSenha(senhaPF, confSenhaPF);
            configurarSenha(senhaPJ, confSenhaPJ);

            // Valida no submit também
            const formPFEl = document.getElementById("formPF");
            if (formPFEl) {
                formPFEl.addEventListener("submit", function(e) {
                    if (!formPFEl.checkValidity()) {
                        e.preventDefault();
                        formPFEl.reportValidity();
                    }
                });
            }

            const formPJEl = document.getElementById("formPJ");
            if (formPJEl) {
                formPJEl.addEventListener("submit", function(e) {
                    if (!formPJEl.checkValidity()) {
                        e.preventDefault();
                        formPJEl.reportValidity();
                    }
                });
            }
        });
    </script>
@endpush
