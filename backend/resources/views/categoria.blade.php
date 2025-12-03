@extends('layouts.app')

@section('title', $titulo)

@section('content')

    <section id="categorias" class="section-box py-5">
        <div class="container">
            <h2 class="section-title">{{ $titulo }}</h2>

            <div class="row g-4">
                @foreach ($itens as $item)
                    <div class="col-4 col-lg-4 col-md-3">
                        <a href="#" class="category-card-link">
                            <div class="category-card">
                                <div class="row g-0 h-100">
                                    <div class="col-4 icon-part">
                                        <img src="{{ asset('icons/' . $item['img']) }}" alt="{{ $item['nome'] }}"
                                            class="icon-img">
                                    </div>
                                    <div class="col-8 text-part"><span>{{ $item['nome'] }}</span></div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
