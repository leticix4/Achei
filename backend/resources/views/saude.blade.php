@extends('layouts.app')

@section('title', 'Saúde')

@section('content')
    <!-- CATEGORIAS -->
    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">SAÚDE</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/higiene.png') }}" alt="Cuidado" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Cuidados Pessoais</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/remedio.png') }}" alt="Vitaminas e Suplementos"
                                        class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Vitaminas e Suplementos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/socorro.png') }}" alt="Primeiros Socorros" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Primeiros Socorros</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/pressao.png') }}" alt="Aparelhos de Saúde" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Aparelhos de Saúde</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/ortope.png') }}" alt="Ortopédicos" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Ortopédicos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/vela.png') }}" alt="Bem-estar" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Bem-estar</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/creme.png') }}" alt="Higiene e Beleza" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Higiene e Beleza</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>
@endsection
