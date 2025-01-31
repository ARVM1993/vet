@extends('layouts.app')

@section('title', 'Create Vet') 

@section('content')
    <form action="{{ route('vet.store') }}" method="post">
        @csrf
        @method("POST")
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="telephone">Telephone</label>
            <input type="tel" class="form-control" name="phone">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" name="address">
        </div>

        <button type="submit" class="btn btn-primary mt-3">Create</button>
    </form>
@endsection
