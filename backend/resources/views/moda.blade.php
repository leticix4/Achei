@extends('layouts.app')

@section('title', 'Moda')

@section('content')
    <!-- CATEGORIAS -->
    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">MODA</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/vestido1.png') }}" alt="Feminina" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Moda Feminina</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/terno.png') }}" alt="Masculina" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Moda Masculina</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/roupabb.png') }}" alt="Moda Infantil" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Moda Infantil</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/tenis.png') }}" alt="Calçados" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Calçados</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/bolsa.png') }}" alt="Acessórios" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Acessórios</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/praia.png') }}" alt="Moda Praia" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Moda Praia</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/intima.png') }}" alt="Moda Íntima e Lingerie"
                                        class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Moda Íntima e Lingerie</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>
@endsection