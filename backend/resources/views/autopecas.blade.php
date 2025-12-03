@extends('layouts.app')

@section('title', 'Autopeças')

@section('content')


    <!-- CATEGORIAS -->
    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">AUTOPEÇAS</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/motor.png') }}" alt="Motor" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Motor</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/freio.png') }}" alt="Freios" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Freios</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/amortecedor.png') }}" alt="Amortecedor" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Suspensão e Direção</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/oleo.png') }}" alt="Filtros e Óleos" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Filtros e Óleos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/ignicao.png') }}" alt="Elétrica e Ignição" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Elétrica e Ignição</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/roda.png') }}" alt="Pneus e Rodas" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Pneus e Rodas</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/radiador.png') }}" alt="Arrefecimento" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Arrefecimento</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>

@endsection
