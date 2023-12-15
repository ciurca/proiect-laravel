@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Agenda</h2>

    <form action="{{ route('admin.agenda.update', $speaker->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="speaker_id">Speaker</label>
            <select id="speaker_id" name="speaker_id" class="form-control">
                <option value="{{ $speaker->id }}" selected>{{ $speaker->prenume }} {{ $speaker->nume }}</option>
            </select>
        </div>

        <div class="form-group">
            <label for="event_id">Event</label>
            <select id="event_id" name="event_id" class="form-control">
                @foreach ($events as $event)
                    <option value="{{ $event->id }}" {{ $speaker->evenimente->contains($event->id) ? 'selected' : '' }}>{{ $event->titlu }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" id="start_time" name="start_time" class="form-control" value="{{ $speaker->evenimente->first()->pivot->start_time ?? '' }}">
        </div>

        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" id="end_time" name="end_time" class="form-control" value="{{ $speaker->evenimente->first()->pivot->end_time ?? '' }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Agenda</button>
    </form>
</div>
@endsection