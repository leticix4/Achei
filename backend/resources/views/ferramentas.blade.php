@extends('layouts.app')

@section('title', 'Título')

@section('content')
    <!-- CATEGORIAS -->
    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">FERRAMENTAS</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/furadeira.png') }}" alt="Ferramentas Elétricas"
                                        class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Ferramentas Elétricas</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/parafusadeira.png') }}" alt="Parafusadeira" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Ferramentas a Bateria</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/martelo.png') }}" alt="Martelo" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Ferramentas Manuais</span></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/luva.png') }}" alt="Luvas" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Equipamentos de Proteção</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/multimetro.png') }}" alt="Medição" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Medição e Precisão</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/rocadeira.png') }}" alt="Jardinagem" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Jardinagem</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/caixa.png') }}" alt="Caixa e Organizadores" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Caixa e Organizadores</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>
@endsection