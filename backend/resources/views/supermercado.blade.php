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
