@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit colaborator</h1>

        <form method="POST" action="{{ route('admin.colaborator.update', $colaborator) }}">
            @csrf
            @method('PUT')

        
            <div class="form-group">
                <label for="nume">Nume</label>
                <input type="text" class="form-control" id="nume" name="nume" value="{{ $colaborator->nume }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $colaborator->email }}" required>
            </div>
            <div class="form-group">
                <label for="descriere">Descriere</label>
                <input type="text" class="form-control" id="descriere" name="descriere" value="{{ $colaborator->descriere}}">
            </div>
            <div class="form-group">
                <label for="poza">Poza</label>
                <input type="text" class="form-control" id="poza" name="poza" value="{{ $colaborator->poza }}">
            </div>
            <div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="phone" class="form-control" id="telefon" name="telefon" value="{{ $colaborator->telefon }}">
            </div>
            <div class="form-group">
                <label for="tip">Tip</label>
                <input type="text" class="form-control" id="tip" name="tip" value="{{ $colaborator->tip }}">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection