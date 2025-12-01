@extends('layouts.app')

@section('title', 'Papelaria')

@section('content')
    <!-- CATEGORIAS -->
    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">PAPELARIA</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/lapis.png') }}" alt="Material Escolar" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Material Escolar</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/calculadora.png') }}" alt="Materiais de Escritório"
                                        class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Materiais de Escritório</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/cadernos.png') }}" alt="Cadernos e Fichários"
                                        class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Cadernos e Fichários</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/caneta.png') }}" alt="Canetas e Escrita" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Canetas e Escrita</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/mochila.png') }}" alt="Mochilas e Estojos" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Mochilas e Estojos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/arte.png') }}" alt="Arte e Pintura" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Arte e Pintura</span></div>
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