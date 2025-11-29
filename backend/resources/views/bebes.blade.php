@extends('layouts.app')

@section('title', 'Bebês')

@section('content')

    <!-- CATEGORIAS -->
    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">BEBÊS</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/fralda.png') }}" alt="Fraldas e Higiene" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Fraldas e Higiene</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/comidabb.png') }}" alt="Alimentação" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Alimentação</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/bbconforto.png') }}" alt="Carrinhos e Bebê Conforto"
                                        class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Carrinhos e Bebê Conforto</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/berco.png') }}" alt="Berços e Móveis" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Berços e Móveis</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/roupabb.png') }}" alt="Roupas de Bebê" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Roupas de Bebê</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/bbbrinquedo.png') }}" alt="Brinquedos para Bebês"
                                        class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Brinquedos para Bebês</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/bbcerca.png') }}" alt="Segurança do Bebê" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Segurança do Bebê</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>

@endsection
