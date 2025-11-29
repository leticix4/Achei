@extends('layouts.app')

@section('title', 'Supermercado')

@section('content')
    <!-- CATEGORIAS -->
    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">SUPERMERCADO</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/cesta.png') }}" alt="Mercearia" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Mercearia</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/cereal.png') }}" alt="Cereais" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Matinais</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/agua.png') }}" alt="Bebidas" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Bebidas</span></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/vinho.png') }}" alt="Bebidas Alcoólicas" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Bebidas Alcoólicas</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/queijo.png') }}" alt="Frios e Laticínios" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Frios e Laticínios</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/carne.png') }}" alt="Açougue" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Açougue</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/cenoura.png') }}" alt="Hortifrúti" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Hortifrúti</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/pao.png') }}" alt="Padaria e Confeitaria" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Padaria e Confeitaria</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/limpeza.png') }}" alt="Limpeza" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Limpeza</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/creme.png') }}" alt="Higiene Pessoal" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span> Higiene Pessoal</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/chocolate.png') }}" alt="Bomboniere" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Bomboniere</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>
@endsection


<!-- FOOTER -->
<footer class="custom-footer mt-5">
    <div class="container">
        <!-- Logo e Redes sociais -->
        <div class="d-flex justify-content-center align-items-center mb-3">
            <div class="logo me-3"><img src="{{ asset('image/logo.png') }}" alt="Logo"></div>
            <span class="divider"></span>
            <div class="social-icons ms-3">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-twitter"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
            </div>
        </div>

        <!-- Texto -->
        <p class="mx-auto" style="max-width:600px">
            Encontre o que você precisa, de forma rápida e fácil.<br>
            Nosso sistema de busca oferece a melhor experiência para você achar produtos com eficiência e
            praticidade.
        </p>

        <!-- Links -->
        <div class="footer-links mb-3">
            <a href="index2.html" class="text-decoration-none text-light mx-2">Início</a>
            <a href="#" class="text-decoration-none text-light mx-2">Sobre Nós</a>
            <a href="#" class="text-decoration-none text-light mx-2">Contato</a>
        </div>

        <p class="text-muted small mb-0 footer-copy">&copy; 2025 achei! | Todos os direitos reservados</p>
    </div>
</footer>

<!-- Bootstrap JS e dependências -->
<script src="javaScript/partials.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('javaScript/index.js') }}"></script>
</body>

</html>
