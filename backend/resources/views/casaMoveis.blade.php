@extends('layouts.app')

@section('title', 'Casa e Móveis')

@section('content')
    <!-- CATEGORIAS -->
    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">CASA E MÓVEIS</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/sofa.png') }}" alt="Sala de Estar" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Sala de Estar</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/cama.png') }}" alt="Quarto" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Quarto</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/armario.png') }}" alt="Cozinha" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Cozinha</span></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/escrivaninha.png') }}" alt="Escritório" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Escritório</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/vaso.png') }}" alt="Decoração" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Decoração</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/abaju1.png') }}" alt="Iluminação" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Iluminação</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/regador.png') }}" alt="Jardinagem" class="icon-img">
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
                                    <img src="{{ asset('icons/organizador.png') }}" alt="Organização" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Organização</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>
@endsection
