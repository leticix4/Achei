@extends('layouts.app')

@section('title', 'Nova Senha')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow-sm">
                    <h3 class="text-center mb-4 fw-bold" style="color: #003147;">Criar Nova Senha</h3>

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <label class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control bg-light border-0"
                                value="{{ $email ?? old('email') }}" required>
                            @error('email')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nova Senha</label>
                            <input type="password" name="password" class="form-control bg-light border-0" required>
                            @error('password')
                                <span class="text-danger small">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirmar Nova Senha</label>
                            <input type="password" name="password_confirmation" class="form-control bg-light border-0"
                                required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">Redefinir Senha</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
