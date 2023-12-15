@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Speaker</h2>

    <form action="{{ route('admin.speakers.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="nume">Nume</label>
            <input type="text" class="form-control" id="nume" name="nume" required>
        </div>
        <div class="form-group">
            <label for="prenume">Prenume</label>
            <input type="text" class="form-control" id="prenume" name="prenume" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="telefon">Telefon</label>
            <input type="phone" class="form-control" id="telefon" name="telefon" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection