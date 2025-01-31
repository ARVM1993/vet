@extends('layouts.app')

@section('title', 'Animals')

@section('content')
    <!-- Mostra mensajes de error / éxito al crear un veterinario si viene de vet.create -->
    @if (session('success')) <!-- Mira si existe $_SESSION['success'] -->
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container mt-5">
        <div class="row">
            @foreach ($vets as $v)
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $v->name }}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                Email: {{ $v->email }}. Teléfono: {{ $v->phone }}.
                                @if ($v->address != null)
                                    Dirección: {{ $v->address }}
                                    Nombre dueño: {{ $v->name }}
                                @endif
                            </p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm">
                                    <a href="{{ route('vet.edit', $v) }}" class="btn btn-primary btn-sm">Edit</a>
                                </div>
                                <div class="col-sm">
                                    <form action="{{ route('vet.destroy', $v) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
