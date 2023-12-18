@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Contract</h2>

    <form action="{{ route('admin.contract.update', $colaborator->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="colaborator_id">Colaborator</label>
            <select id="colaborator_id" name="colaborator_id" class="form-control">
                <option value="{{ $colaborator->id }}" selected>{{ $colaborator-> nume}}</option>
            </select>
        </div>

        <div class="form-group">
            <label for="event_id">Event</label>
            <select id="event_id" name="event_id" class="form-control">
                @foreach ($events as $event)
                    <option value="{{ $event->id }}" {{ $colaborator->evenimente->contains($event->id) ? 'selected' : '' }}>{{ $event->titlu }}</option>
                @endforeach
            </select>

        <button type="submit" class="btn btn-primary">Update Agenda</button>
    </form>
</div>
@endsection