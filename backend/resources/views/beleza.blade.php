@extends('layouts.app')

@section('title', 'Beleza')

@section('content')

<!-- CATEGORIAS -->
    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">BELEZA E CUIDADO PESSOAL</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/xampoo.png') }}" alt="Shampoo" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Cabelos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/perfume.png') }}" alt="Perfume" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Perfumaria</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/maquiage.png') }}" alt="Maquiagem" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Maquiagem</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/cremepele.png') }}" alt="Pele" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Pele</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="icons/saboete.png" alt="Corpo e Banho" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Corpo e Banho</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/unha.png') }}" alt="Unhas" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Unhas</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/barba.png') }}" alt="Barbearia" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Barbearia</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>

@endsection