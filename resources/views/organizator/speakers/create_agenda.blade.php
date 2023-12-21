@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <form action="{{ route('admin.agenda.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="speaker_id">Speaker:</label>
            <select id="speaker_id" name="speaker_id" class="form-control">
                @foreach($speakers as $speaker)
                    <option value="{{ $speaker->id }}">{{ $speaker->prenume }} {{ $speaker->nume}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="event_id">Event:</label>
            <select id="event_id" name="event_id" class="form-control">
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->titlu }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="descriere">Descriere Sesiune:</label>
            <textarea id="descriere" name="descriere" class="form-control" rows="3"></textarea>
        </div>
        
        <div class="form-group">
            <label for="start_time">Start Time:</label>
            <input type="datetime-local" id="start_time" name="start_time" class="form-control">
        </div>

        <div class="form-group">
            <label for="end_time">End Time:</label>
            <input type="datetime-local" id="end_time" name="end_time" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Creeaza Agenda</button>
    </form>
</div>
@endsection