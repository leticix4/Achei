@extends('layouts.app')

@section('title', 'Pet Shop')

@section('content')
    <!-- CATEGORIAS -->
    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">PET SHOP</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/cao.png') }}" alt="Cães" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Cães</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/gato.png') }}" alt="Gatos" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Gatos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/ave.png') }}" alt="Pássaros" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Pássaros</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/peixe.png') }}" alt="Peixes" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Peixes</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/racao.png') }}" alt="Rações e Alimentos" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Rações e Alimentos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/briqpet.png') }}" alt="Brinquedos" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Brinquedos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/xampopet.png') }}" alt="Higiene e Beleza" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Higiene e Beleza</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/remediopet.png') }}" alt="Farmácia Pet" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Farmácia Pet</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>
@endsection