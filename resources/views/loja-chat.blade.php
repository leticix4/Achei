@extends('layouts.app')

@section('title', 'Chat da Loja')

@section('content')
<div class="container py-4">

    <div class="row shadow rounded overflow-hidden">

        {{-- LISTA DE CLIENTES --}}
        <div class="col-md-4 border-end bg-body-tertiary p-0" style="height: 70vh; overflow-y: auto;">
            <div class="p-3 border-bottom fw-bold">
                Clientes no Chat
            </div>

            @forelse ($conversas as $userId => $mensagens)
                @php
                    $cliente = $mensagens->first()->user;
                @endphp

                <a href="{{ route('loja.produto.chat', $product->id) }}?user={{ $userId }}"
                class="d-block p-3 text-decoration-none border-bottom text-body hover-bg">
                    <div class="fw-bold">{{ $cliente->name }}</div>
                    <small class="text-body-secondary">
                        {{ Str::limit($mensagens->last()->content, 40) }}
                    </small>
                </a>
            @empty
                <div class="p-3 text-body-secondary text-center">
                    Nenhum cliente iniciou conversa ainda.
                </div>
            @endforelse
        </div>

        {{-- JANELA DO CHAT --}}
        <div class="col-md-8 d-flex flex-column p-0" style="height: 70vh;">

            @if(request('user'))

                @php
                    $mensagensAtivas = $conversas[request('user')] ?? collect();
                @endphp

                {{-- HEADER --}}
                <div class="border-bottom p-3 fw-bold bg-body">
                    Chat com {{ $mensagensAtivas->first()->user->name ?? 'Cliente' }}
                </div>

                {{-- MENSAGENS --}}
                <div class="flex-grow-1 p-3 overflow-auto bg-body">

                    @foreach ($mensagensAtivas as $msg)

                        @if ($msg->is_store)
                            {{-- MENSAGEM DA LOJA --}}
                            <div class="d-flex justify-content-end mb-2">
                                <div class="bg-primary text-white p-2 rounded-3" style="max-width: 75%;">
                                    {{ $msg->content }}
                                    <div class="small text-white-50 text-end">
                                        {{ $msg->created_at->format('H:i') }}
                                    </div>
                                </div>
                            </div>
                        @else
                            {{-- MENSAGEM DO CLIENTE --}}
                            <div class="d-flex justify-content-start mb-2">
                                <div class="bg-body-tertiary p-2 rounded-3" style="max-width: 75%;">
                                    {{ $msg->content }}
                                    <div class="small text-body-secondary">
                                        {{ $msg->created_at->format('H:i') }}
                                    </div>
                                </div>
                            </div>
                        @endif

                    @endforeach
                </div>

                {{-- INPUT --}}
                <div class="border-top p-3 bg-body">
                    <form method="POST" action="{{ route('loja.chat.enviar') }}">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ request('user') }}">
                        <input type="hidden" name="product_id" value="{{ $product->id }}">

                        <div class="input-group">
                            <input type="text" name="content" class="form-control" placeholder="Digite sua resposta..." required>
                            <button class="btn btn-primary">
                                <i class="bi bi-send"></i>
                            </button>
                        </div>
                    </form>
                </div>

            @else
                {{-- TELA SEM CHAT SELECIONADO --}}
                <div class="h-100 d-flex align-items-center justify-content-center text-body-secondary">
                    Selecione um cliente para abrir o chat.
                </div>
            @endif

        </div>
    </div>
</div>
@endsection
