@extends('layouts.app')

@section('title', 'Gerenciar Produtos')

@section('content')

    <main class="container my-5">
        <h2 class="fw-bold mb-4">Gerenciar Produtos da Loja</h2>

        <a href="{{ route('loja') }}" class="btn btn-outline-secondary mb-4">
            <i class="bi bi-arrow-left me-2"></i> Voltar para a Loja
        </a>

        @if (count($produtos) > 0)
            <div class="list-group">
                {{-- SIMULAÇÃO DE LOOP PELOS PRODUTOS DA LOJA --}}
                @foreach ($produtos as $produto)
                    <div class="list-group-item list-group-item-action py-3">
                        <div class="row align-items-center">

                            {{-- INFORMAÇÕES DO PRODUTO --}}
                            <div class="col-8 col-md-6 d-flex align-items-center">
                                {{-- Ícone de produto ou miniatura real --}}
                                <img src="{{ $produto->image_url ?? asset('image/produto-placeholder.png') }}"
                                    alt="{{ $produto->name }}" class="rounded me-3"
                                    style="width: 50px; height: 50px; object-fit: cover;">

                                <div>
                                    <h5 class="mb-0">{{ $produto->name }}</h5>
                                    <small class="text-muted">Categoria: {{ $produto->category }}</small>
                                </div>
                            </div>

                            {{-- PREÇO E ESTOQUE --}}
                            <div class="col-4 col-md-3 text-start">
                                <span class="d-block fw-bold">R$ {{ number_format($produto->price, 2, ',', '.') }}</span>
                                <small class="text-success">Em estoque</small>
                            </div>

                            {{-- BOTÕES DE AÇÃO --}}
                            <div class="col-12 col-md-3 text-md-end text-start mt-3 mt-md-0">
                                {{-- Botão para a página de edição do produto --}}
                                <a href="{{ route('produto.edit', $produto->id) }}" class="btn btn-sm btn-primary me-2">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                {{-- Botão para exclusão (usando formulário POST/DELETE) --}}
                                <form action="{{ route('produto.destroy', $produto->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Tem certeza que deseja excluir este produto?');">
                                        <i class="bi bi-trash"></i> Excluir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                Ainda não há produtos cadastrados nesta loja.
                <a href="{{ route('cadastro-produto') }}" class="alert-link">Cadastre seu primeiro produto aqui.</a>
            </div>
        @endif

    </main>

@endsection
