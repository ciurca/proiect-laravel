@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <form action="{{ route('admin.contract.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="colaborator_id">Colaborator:</label>
            <select id="colaborator_id" name="colaborator_id" class="form-control">
                @foreach($colaboratori as $colaborator)
                    <option value="{{ $colaborator->id }}">{{ $colaborator->nume}}</option>
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


        <button type="submit" class="btn btn-primary">Creeaza Colaboratoe</button>
    </form>
</div>
@endsection