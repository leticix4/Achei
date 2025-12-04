@extends('layouts.app')

@section('title', 'Cadastro Completo')

@push('styles')
    <style>
        .form-section {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #003147;
            border-left: 4px solid #003147;
            padding-left: 10px;
            margin-bottom: 1.5rem;
        }

        /* Campos com fundo cinza suave */
        .form-control,
        .form-select {
            background-color: #f2f2f2;
            border: none;
            border-radius: 8px;
            padding: 10px 15px;
        }

        .form-control:focus {
            background-color: #e9ecef;
            box-shadow: none;
            border: 1px solid #ccc;
        }

        /* Mensagem de erro de validação */
        .invalid-feedback {
            font-size: 0.85rem;
        }

        /* Linha divisória vertical (apenas em telas grandes) */
        @media (min-width: 768px) {
            .border-end-md {
                border-right: 1px solid #dee2e6;
                padding-right: 3rem;
            }

            .col-md-6:last-child {
                padding-left: 3rem;
            }
        }
    </style>
@endpush

@section('content')

    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <strong>Ops!</strong> Verifique os erros abaixo:
                <ul class="mb-0 mt-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="form-section">
            <h2 class="section-title">Cadastro</h2>

            <div class="mb-4 p-3 bg-light rounded">
                <label class="form-label fw-bold d-block mb-2">Você é:</label>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipoPessoa" id="radioPF" value="pf"
                        onclick="mudarFormulario('pf')" checked>
                    <label class="form-check-label fw-bold" for="radioPF">Pessoa Física</label>
                </div>

                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="tipoPessoa" id="radioPJ" value="pj"
                        onclick="mudarFormulario('pj')">
                    <label class="form-check-label fw-bold" for="radioPJ">Pessoa Jurídica</label>
                </div>
                <p class="small text-muted mt-2 mb-0">Campos marcados com (*) são obrigatórios.</p>
            </div>

            <hr class="my-4">

            <div id="containerPF" style="display: block;">
                <form id="formPF" method="POST" action="{{ route('register.store') }}"
                    onsubmit="return validarSenha('senhaPF', 'confSenhaPF')">
                    @csrf
                    <input type="hidden" name="type" value="pf">

                    <div class="row g-5">
                        <div class="col-md-6 border-end-md">
                            <h4 class="fw-bold mb-4">Dados Pessoais</h4>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nome Completo*</label>
                                <input type="text" id="nomeCompleto" name="name" class="form-control" required>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Email*</label>
                                    <input type="email" id="emailCompleto" name="email" class="form-control"
                                        placeholder="exemplo@email.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">CPF*</label>
                                    <input type="text" id="cpfCompleto" name="cpf" class="form-control" required>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Data de nascimento*</label>
                                    <input type="date" name="birth_date" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Gênero*</label>
                                    <select class="form-select" name="gender">
                                        <option value="" selected>Selecione</option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Feminino">Feminino</option>
                                        <option value="Outro">Outro</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Celular*</label>
                                    <input type="tel" id="celularCompleto" name="phone" class="form-control"
                                        placeholder="(99) 99999-9999" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Contato adicional</label>
                                    <input type="tel" id="telefoneAdicionalPF" name="phone_secondary"
                                        class="form-control" placeholder="(99) 99999-9999">
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Senha*</label>
                                    <input type="password" id="senhaPF" name="password" class="form-control" required>
                                    <small class="text-muted d-block mt-1" style="font-size: .75rem;">
                                        Mínimo 8 caracteres, 1 maiúscula, 1 número e 1 especial.
                                    </small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Confirmar senha*</label>
                                    <input type="password" id="confSenhaPF" name="password_confirmation"
                                        class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h4 class="fw-bold mb-4">Endereço</h4>

                            <div class="mb-3 d-flex align-items-center">
                                <div class="flex-grow-1 me-3">
                                    <label class="form-label fw-bold">CEP*</label>
                                    <input type="text" id="cepPF" name="zip_code" class="form-control" required
                                        style="max-width: 150px;">
                                </div>
                                <a href="https://buscacepinter.correios.com.br/app/endereco/index.php" target="_blank"
                                    class="text-decoration-none small fw-bold text-dark">Não sei meu CEP.</a>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-8">
                                    <label class="form-label fw-bold">Endereço*</label>
                                    <input type="text" name="address" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Número*</label>
                                    <input type="text" name="number" class="form-control" required>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Complemento</label>
                                    <input type="text" name="complement" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Bairro*</label>
                                    <input type="text" name="district" class="form-control" required>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-8">
                                    <label class="form-label fw-bold">Cidade*</label>
                                    <input type="text" name="city" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Estado*</label>
                                    <select name="state" class="form-select">
                                        <option value="MG" selected>MG</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4">
                                <button type="submit" class="btn btn-primary px-5 py-2 fw-bold">CADASTRAR</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div id="containerPJ" style="display: none;">
                <form id="formPJ" method="POST" action="{{ route('register.store') }}"
                    onsubmit="return validarSenha('senhaPJ', 'confSenhaPJ')">
                    @csrf
                    <input type="hidden" name="type" value="pj">

                    <div class="row g-5">
                        <div class="col-md-6 border-end-md">
                            <h4 class="fw-bold mb-4">Dados da Empresa</h4>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Razão Social*</label>
                                <input type="text" id="razaoPJ" name="name" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Nome Fantasia*</label>
                                <input type="text" id="fantasiaPJ" name="fantasy_name" class="form-control" required>
                            </div>

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="isentoIE"
                                    name="state_registration_exempt" value="1">
                                <label class="form-check-label small fw-bold" for="isentoIE">Inscrição estadual
                                    isento</label>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Inscrição Estadual*</label>
                                    <input type="text" id="iePJ" name="state_registration" class="form-control"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">CNPJ*</label>
                                    <input type="text" id="cnpjPJ" name="cnpj" class="form-control" required>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Nome de Contato*</label>
                                    <input type="text" id="nomeContatoPJ" name="contact_name" class="form-control"
                                        required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">CPF Contato*</label>
                                    <input type="text" id="cpfContatoPJ" name="contact_cpf" class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-bold">Email Empresarial*</label>
                                <input type="email" id="emailPJ" name="email" class="form-control" required>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Senha*</label>
                                    <input type="password" id="senhaPJ" name="password" class="form-control" required>
                                    <small class="text-muted d-block mt-1" style="font-size: .75rem;">
                                        Mínimo 8 caracteres, 1 maiúscula, 1 número e 1 especial.
                                    </small>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Confirmar senha*</label>
                                    <input type="password" id="confSenhaPJ" name="password_confirmation"
                                        class="form-control" required>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Celular*</label>
                                    <input type="tel" id="celularPJ" name="phone" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Telefone adicional</label>
                                    <input type="tel" id="telefonePJ" name="phone_secondary" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h4 class="fw-bold mb-4">Endereço</h4>
                            <div class="mb-3 d-flex align-items-center">
                                <div class="flex-grow-1 me-3">
                                    <label class="form-label fw-bold">CEP*</label>
                                    <input type="text" id="cepPJ" name="zip_code" class="form-control" required
                                        style="max-width: 150px;">
                                </div>
                                <a href="#" class="text-decoration-none small fw-bold text-dark">Não sei meu
                                    CEP.</a>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-8">
                                    <label class="form-label fw-bold">Endereço*</label>
                                    <input type="text" name="address" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Número*</label>
                                    <input type="text" name="number" class="form-control" required>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Complemento</label>
                                    <input type="text" name="complement" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-bold">Bairro*</label>
                                    <input type="text" name="district" class="form-control" required>
                                </div>
                            </div>

                            <div class="row g-3 mb-4">
                                <div class="col-md-8">
                                    <label class="form-label fw-bold">Cidade*</label>
                                    <input type="text" name="city" class="form-control" required>
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-bold">Estado*</label>
                                    <select name="state" class="form-select">
                                        <option value="MG" selected>MG</option>
                                        <option value="AC">AC</option>
                                        <option value="AL">AL</option>
                                        <option value="AP">AP</option>
                                        <option value="AM">AM</option>
                                        <option value="BA">BA</option>
                                        <option value="CE">CE</option>
                                        <option value="DF">DF</option>
                                        <option value="ES">ES</option>
                                        <option value="GO">GO</option>
                                        <option value="MA">MA</option>
                                        <option value="MT">MT</option>
                                        <option value="MS">MS</option>
                                        <option value="PA">PA</option>
                                        <option value="PB">PB</option>
                                        <option value="PR">PR</option>
                                        <option value="PE">PE</option>
                                        <option value="PI">PI</option>
                                        <option value="RJ">RJ</option>
                                        <option value="RN">RN</option>
                                        <option value="RS">RS</option>
                                        <option value="RO">RO</option>
                                        <option value="RR">RR</option>
                                        <option value="SC">SC</option>
                                        <option value="SP">SP</option>
                                        <option value="SE">SE</option>
                                        <option value="TO">TO</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-3">
                                <button type="submit" class="btn btn-primary px-5 py-2 fw-bold">CADASTRAR
                                    EMPRESA</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>

    @endsection

    @push('scripts')
        <script>
            // 1. FUNÇÃO DE TROCA DE FORMULÁRIO
            function mudarFormulario(tipo) {
                const divPF = document.getElementById('containerPF');
                const divPJ = document.getElementById('containerPJ');
                const radioPF = document.getElementById('radioPF');
                const radioPJ = document.getElementById('radioPJ');

                if (tipo === 'pf') {
                    divPF.style.display = 'block';
                    divPJ.style.display = 'none';
                    radioPF.checked = true;
                } else {
                    divPF.style.display = 'none';
                    divPJ.style.display = 'block';
                    radioPJ.checked = true;
                }
            }

            // 2. FUNÇÃO DE VALIDAÇÃO DE SENHA (CHAMADA NO SUBMIT)
            function validarSenha(idSenha, idConf) {
                const senha = document.getElementById(idSenha).value;
                const conf = document.getElementById(idConf).value;
                // Regex: Mínimo 8, 1 maiúscula, 1 número, 1 especial
                const regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[^A-Za-z0-9]).{8,}$/;

                if (!regex.test(senha)) {
                    alert("A senha deve ter pelo menos 8 caracteres, uma letra maiúscula, um número e um caractere especial.");
                    return false; // Impede o envio
                }
                if (senha !== conf) {
                    alert("As senhas não conferem.");
                    return false; // Impede o envio
                }
                return true; // Permite o envio
            }

            // 3. CARREGAMENTO E MÁSCARAS
            document.addEventListener("DOMContentLoaded", function() {

                // Preenchimento Automático (vindo do modal)
                const tipoSalvo = localStorage.getItem("tipoPessoa");
                if (tipoSalvo === "pj") {
                    mudarFormulario('pj');
                    if (document.getElementById("razaoPJ")) document.getElementById("razaoPJ").value = localStorage
                        .getItem("cadastroRazao") || "";
                    if (document.getElementById("emailPJ")) document.getElementById("emailPJ").value = localStorage
                        .getItem("cadastroEmail") || "";
                } else {
                    mudarFormulario('pf');
                    if (document.getElementById("nomeCompleto")) document.getElementById("nomeCompleto").value =
                        localStorage.getItem("cadastroNome") || "";
                    if (document.getElementById("emailCompleto")) document.getElementById("emailCompleto").value =
                        localStorage.getItem("cadastroEmail") || "";
                }
                localStorage.removeItem("tipoPessoa");

                // --- MÁSCARAS ---
                function mascaraCPF(input) {
                    if (!input) return;
                    input.addEventListener("input", () => {
                        let v = input.value.replace(/\D/g, "");
                        if (v.length > 11) v = v.slice(0, 11);
                        v = v.replace(/(\d{3})(\d)/, "$1.$2");
                        v = v.replace(/(\d{3})(\d)/, "$1.$2");
                        v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
                        input.value = v;
                    });
                }

                function mascaraCNPJ(input) {
                    if (!input) return;
                    input.addEventListener("input", () => {
                        let v = input.value.replace(/\D/g, "");
                        if (v.length > 14) v = v.slice(0, 14);
                        v = v.replace(/^(\d{2})(\d)/, "$1.$2");
                        v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3");
                        v = v.replace(/\.(\d{3})(\d)/, ".$1/$2");
                        v = v.replace(/(\d{4})(\d)/, "$1-$2");
                        input.value = v;
                    });
                }

                function mascaraTelefone(input) {
                    if (!input) return;
                    input.addEventListener("input", () => {
                        let v = input.value.replace(/\D/g, "");
                        if (v.length > 11) v = v.slice(0, 11);
                        v = v.replace(/^(\d{2})(\d)/g, "($1) $2");
                        v = v.replace(/(\d)(\d{4})$/, "$1-$2");
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

                // Aplica as máscaras
                mascaraCPF(document.getElementById("cpfCompleto"));
                mascaraCPF(document.getElementById("cpfContatoPJ"));
                mascaraCNPJ(document.getElementById("cnpjPJ"));
                mascaraCEP(document.getElementById("cepPF"));
                mascaraCEP(document.getElementById("cepPJ"));

                mascaraTelefone(document.getElementById("celularCompleto"));
                mascaraTelefone(document.getElementById("telefoneAdicionalPF")); // Seu ID novo
                mascaraTelefone(document.getElementById("celularPJ"));
                mascaraTelefone(document.getElementById("telefonePJ"));
            });
        </script>
    @endpush
