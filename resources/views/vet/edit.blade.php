<!-- resources/views/vet/edit.blade.php -->
@extends('layouts.app')

@section('title', 'Edit Vet') <!-- Título específico para la página de edición -->

@section('content')
    <!-- Formulario de edición del veterinario -->
    <form action="{{ route('vet.update', $vet) }}" method="post">
        @csrf
        @method("PUT")
        
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="{{ old('name', $vet->name) }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="{{ old('email', $vet->email) }}">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" name="phone" value="{{ old('phone', $vet->phone) }}">
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address" value="{{ old('address', $vet->address) }}">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Edit</button>
    </form>
@endsection
