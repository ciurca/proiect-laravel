@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Agende</h2>
    @if(session('success'))
    <div class="alert alert-success">
        {!! session('success') !!}
    </div>
    @endif
    
    @if(session('error'))
    <div class="alert alert-danger">
        {!! session('error') !!}
    </div>
        @endif
    <a class="btn btn-info" href="{{ route('admin.agenda.create')}}"><i class="fas fa-calendar"></i> Creeaza o noua legatura Speaker-Eveniment</a>
    <table class="table">
        <thead>
            <tr>
                <th>Nume</th>
                <th>Event</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($speakers as $speaker)
                @foreach ($speaker->evenimente as $event)
                    <tr>
                        <td>{{ $speaker->prenume }} {{ $speaker->nume }}</td>
                        <td>{{ $event->titlu }}</td>
                        <td>{{ $event->pivot->start_time }}</td>
                        <td>{{ $event->pivot->end_time }}</td>
                        <td>
                            <a href="{{ route('admin.agenda.edit', $event->pivot->id) }}" class="btn btn-primary">Edit</a>                  
                        </td>
                        <td>
                            <form action="{{ route('admin.agenda.destroy', $event->pivot->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="event_id" value='{{ $event->id }}' method="POST">
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
@endsection