@extends('layouts.app')

@section('title', 'Título')

@section('content')

    <!-- CATEGORIAS -->
    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">ACESSÓRIOS PARA VEÍCULOS</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/som.png') }}" alt="Som e Vídeo Automotivo" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Som e Vídeo Automotivo</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/banco.png') }}" alt="Tapetes e Capas de Banco"
                                        class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Tapetes e Capas de Banco</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/alarme.png') }}" alt="Segurança Automotiva" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Segurança Automotiva</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/cera.png') }}" alt="Acessórios para Limpeza" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Limpeza e Cuidados Automotivos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/hackteto.png') }}" alt="Acessórios Externos" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Acessórios Externos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/gps.png') }}" alt="GPS e Acessórios" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>GPS e Acessórios</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>
@endsection