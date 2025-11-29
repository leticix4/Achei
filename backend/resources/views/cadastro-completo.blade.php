@extends('layouts.app')

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
                                <input type="email" id="emailCompleto" class="form-control bg-light border-0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">CPF*</label>
                                <input type="text" id="cpfCompleto" class="form-control bg-light border-0" required>
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
                                <label class="form-label fw-bold">Contato*</label>
                                <input type="tel" id="celularCompleto" class="form-control bg-light border-0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Contato adicional</label>
                                <input type="tel" class="form-control bg-light border-0">
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Senha*</label>
                                <input type="password" class="form-control bg-light border-0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Confirmar senha*</label>
                                <input type="password" class="form-control bg-light border-0" required>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h3 class="fw-bold mb-4">Endereço</h3>

                        <div class="mb-3 d-flex align-items-center">
                            <div class="flex-grow-1 me-3">
                                <label class="form-label fw-bold">CEP*</label>
                                <input type="text" class="form-control bg-light border-0" required
                                    style="max-width: 150px;">
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
                                <input type="text" class="form-control bg-light border-0" required>
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

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" id="ofertas">
                            <label class="form-check-label small" for="ofertas">
                                Receber ofertas por e-mail
                            </label>
                        </div>
                        <div>
                            <button type="button" id="btnSalvarPF"
                                class="btn btn-success px-4 py-2 fw-bold rounded-1">CADASTRAR</button>
                        </div>
                    </div>
                </div>
            </form>

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
                                <input type="text" id="cnpjPJ" class="form-control bg-light border-0" required>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Nome de Contato*</label>
                                <input type="text" id="nomeContatoPJ" class="form-control bg-light border-0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">CPF Contato*</label>
                                <input type="text" id="cpfContatoPJ" class="form-control bg-light border-0" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Email*</label>
                            <input type="email" id="emailPJ" class="form-control bg-light border-0" required>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Senha*</label>
                                <input type="password" id="senhaPJ" class="form-control bg-light border-0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Confirmar senha*</label>
                                <input type="password" id="confSenhaPJ" class="form-control bg-light border-0" required>
                            </div>
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Celular*</label>
                                <input type="tel" id="celularPJ" class="form-control bg-light border-0" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">Telefone adicional</label>
                                <input type="tel" id="telefonePJ" class="form-control bg-light border-0">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <h3 class="fw-bold mb-4">Endereço</h3>

                        <div class="mb-3 d-flex align-items-center">
                            <div class="flex-grow-1 me-3">
                                <label class="form-label fw-bold">CEP*</label>
                                <input type="text" id="cepPJ" class="form-control bg-light border-0" required
                                    style="max-width: 150px;">
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
                                <input type="text" id="numeroPJ" class="form-control bg-light border-0" required>
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

                        <div>
                            <button type="button" id="btnSalvarPJ"
                                class="btn btn-success px-4 py-2 fw-bold rounded-1">CADASTRAR</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // TROCA ENTRE PF E PJ NA PÁGINA DE CADASTRO COMPLETO
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

            // Eventos dos rádios (troca manual)
            pfRadio.addEventListener("change", mostrarPF);
            pjRadio.addEventListener("change", mostrarPJ);

            // Estado inicial (vindo do modal ou abrindo direto)
            aplicarEstadoInicial();
        })();
    </script>
@endpush
