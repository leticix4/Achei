@extends('layouts.app')

@section('title', 'Esqueci a Senha')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow-sm">
                    <h3 class="text-center mb-4 fw-bold" style="color: #003147;">Recuperar Senha</h3>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Digite seu E-mail cadastrado</label>
                            <input type="email" name="email" class="form-control bg-light border-0" required>
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Enviar Link de Recuperação</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
