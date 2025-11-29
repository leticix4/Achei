@extends('layouts.app')

@section('title', 'Construção')

@section('content')

    <!-- CATEGORIAS -->
    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">CONSTRUÇÃO</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/tijolo1.png') }}" alt="Materiais de Construção"
                                        class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Materiais de Construção</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/piso.png') }}" alt="Pisos e Revestimentos" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Pisos e Revestimentos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/fio.png') }}" alt="eletrica" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Elétrica</span></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/canos.png') }}" alt="Hidráulica" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Hidráulica</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/tinta.png') }}" alt="Tintas e Acabamentos" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Tintas e Acabamentos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/porta.png') }}" alt="Portas e Janelas" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Portas e Janelas</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/sanitario.png') }}" alt="Louças e Metais" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Louças e Metais</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>
@endsection