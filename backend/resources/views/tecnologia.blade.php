@extends('layouts.app')

@section('title', 'Título')

@section('content')
    <!-- CATEGORIAS -->
    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">TECNOLOGIA</h2>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/celular.png') }}" alt="Celulares e Smartphones"
                                        class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Celulares e Smartphones</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/note.png') }}" alt="Notebooks" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Notebooks e Computadores</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/tv.png') }}" alt="TVs e Vídeo" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>TVs e Vídeo</span></div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/xbox.png') }}" alt="Mundo Gamer" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Mundo Gamer</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/mouse.png') }}" alt="Mouse" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Periféricos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/vga.png') }}" alt="Hardware" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Hardware</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/fone.png') }}" alt="Fones de Ouvido" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Áudio e Som</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/impressora.png') }}" alt="Impressoras e Suprimentos"
                                        class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Impressoras e Suprimentos</span></div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6">
                    <a href="#" class="category-card-link">
                        <div class="category-card">
                            <div class="row g-0 h-100">
                                <div class="col-4 icon-part">
                                    <img src="{{ asset('icons/router.png') }}" alt="Redes e Wi-Fi" class="icon-img">
                                </div>
                                <div class="col-8 text-part"><span>Redes e Wi-Fi</span></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

    </section>
@endsection
