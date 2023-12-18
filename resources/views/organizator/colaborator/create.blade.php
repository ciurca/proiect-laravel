@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Colaboratori</h2>

    <form action="{{ route('admin.colaborator.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nume">Nume</label>
            <input type="text" class="form-control" id="nume" name="nume" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="descriere">Descriere</label>
            <input type="text" class="form-control" id="descriere" name="descriere">
        </div>
        <div class="form-group">
            <label for="descriere">Poza</label>
            <input type="text" class="form-control" id="poza" name="poza">
        </div>
        <div class="form-group">
            <label for="telefon">Telefon</label>
            <input type="phone" class="form-control" id="telefon" name="telefon" required>
        </div>
        <div class="form-group">
            <label for="tip">Tip</label>
            <input type="text" class="form-control" id="tip" name="tip" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection