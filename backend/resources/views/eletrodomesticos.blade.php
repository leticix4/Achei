@extends('layouts.app')

@section('title', 'Eletrodomésticos')

@section('content')

    <!-- CATEGORIAS -->
    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">ELETRODOMÉSTICOS</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/geladeira.png') }}" alt="Geladeira" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Geladeiras e Freezers</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/fogao.png') }}" alt="Fogão" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Fogões e Cooktops</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/lavadora.png') }}" alt="Lavadora" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Lavadoras e Secadoras</span></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/microondas.png') }}" alt="Micro-ondas" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Micro-ondas e Fornos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/ventilador.png') }}" alt="Ventilador" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Climatização</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/cafeteira.png') }}" alt="Cafeteira" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Eletroportáteis</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/aspirador.png') }}" alt="Aspirador" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Aspiradores</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/secador.png') }}" alt="Secador" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Cuidados Pessoais</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>
@endsection