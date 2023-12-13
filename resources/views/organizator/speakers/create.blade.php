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

        <!-- Add other speaker fields here -->

        <div class="form-group">
            <label for="event_id">Event</label>
            <select class="form-control" id="event_id" name="event_id">
                @foreach ($events as $event)
                    <option value="{{ $event->id }}">{{ $event->titlu }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="start_time">Start Time</label>
            <input type="datetime-local" class="form-control" id="start_time" name="start_time" required>
        </div>

        <div class="form-group">
            <label for="end_time">End Time</label>
            <input type="datetime-local" class="form-control" id="end_time" name="end_time" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection