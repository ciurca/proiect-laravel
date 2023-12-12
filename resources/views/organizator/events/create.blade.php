@extends('layouts.app')

@section('content')
    <div class="container mb-5">
    <h1>Create a new Eveniment</h1>

    <form method="POST" action="{{ route('admin.events.store') }}">
        @csrf

        <div class="form-group">
            <label for="titlu">Titlu</label>
            <input type="text" class="form-control" id="titlu" name="titlu" required>
        </div>

        <div class="form-group">
            <label for="descriere">Descriere</label>
            <textarea class="form-control" id="descriere" name="descriere" required></textarea>
        </div>

        <div class="form-group">
            <label for="data_inceput">Data Inceput</label>
            <input type="date" class="form-control" id="data_inceput" name="data_inceput" required>
        </div>

        <div class="form-group">
            <label for="data_sfarsit">Data Sfarsit</label>
            <input type="date" class="form-control" id="data_sfarsit" name="data_sfarsit" required>
        </div>

        <div class="form-group">
            <label for="locatie">Locatie</label>
            <input type="text" class="form-control" id="locatie" name="locatie" required>
        </div>

        <!-- Add other specific event fields here -->

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection