@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <h1>Events Summary</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nume</th>
                <th>Data Inceput</th>
                <th>Data Sfarsit</th>
                <th>Organizator</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td><a href="{{ route('participant.event', ['id' => $event->id]) }}">{{ $event->titlu }}</a></td>
                    <td>{{ strftime('%d %B %Y', strtotime($event->data_inceput)) }}</td>
                    <td>{{ strftime('%d %B %Y', strtotime($event->data_sfarsit)) }}</td>
                    <td><a href="{{ route('participant.organizator', ['id' => $event->organizator->id]) }}">{{ $event->organizator->nume }}</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection