@extends('layouts.app')

@section('title', 'Brinquedos')

@section('content')

 <!-- CATEGORIAS -->
    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">BRINQUEDOS</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/boneca.png') }}" alt="Bonecas e Bonecos" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Bonecas e Bonecos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/montar.png') }}" alt="Blocos de Montar" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Blocos de Montar</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/xadrez.png') }}" alt="Jogos de Tabuleiro" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Jogos de Tabuleiro</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/hotwell.png') }}" alt="Veículos e Controle Remoto" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Carrinhos e Pistas</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/heroi.png') }}" alt="Heróis e Personagens" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Heróis e Personagens</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/educainfa.png') }}" alt="Brinquedos Educativos" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Brinquedos Educativos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/playground.png') }}" alt="Brinquedos Educativos" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Lançadores e Playground</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>

@endsection