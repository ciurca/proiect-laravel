@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Event</h1>

        <form method="POST" action="{{ route('admin.events.update', $event) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="titlu">Titlu</label>
                <input type="text" class="form-control" id="titlu" name="titlu" value="{{ $event->titlu }}" required>
            </div>

            <div class="form-group">
                <label for="descriere">Descriere</label>
                <textarea class="form-control" id="descriere" name="descriere" required>{{ $event->descriere }}</textarea>
            </div>

            <div class="form-group">
                <label for="data_inceput">Data Inceput</label>
                <input type="date" class="form-control" id="data_inceput" name="data_inceput" value="{{ date('Y-m-d', strtotime($event->data_inceput)) }}" required>
            </div>

            <div class="form-group">
                <label for="data_sfarsit">Data Sfarsit</label>
                <input type="date" class="form-control" id="data_sfarsit" name="data_sfarsit" value="{{ date('Y-m-d', strtotime($event->data_sfarsit)) }}" required>
            </div>

            <div class="form-group">
                <label for="locatie">Locatie</label>
                <input type="text" class="form-control" id="locatie" name="locatie" value="{{ $event->locatie }}" required>
            </div>

            <!-- Add other specific event fields here -->

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection