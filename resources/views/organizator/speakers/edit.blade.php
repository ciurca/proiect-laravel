@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit speaker</h1>

        <form method="POST" action="{{ route('admin.speakers.update', $speaker) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="prenume">Prenume</label>
                <input type="text" class="form-control" id="prenume" name="prenume" value="{{ $speaker->prenume}}" required>
            </div>
            <div class="form-group">
                <label for="nume">Nume</label>
                <input type="text" class="form-control" id="nume" name="nume" value="{{ $speaker->nume }}" required>
            </div>
            <div class="form-group">
                <label for="poza">Poza</label>
                <input type="text" class="form-control" id="poza" name="poza" value="{{ $speaker->poza }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $speaker->email }}" required>
            </div>
            <div class="form-group">
                <label for="telefon">Telefon</label>
                <input type="phone" class="form-control" id="telefon" name="telefon" value="{{ $speaker->telefon }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection