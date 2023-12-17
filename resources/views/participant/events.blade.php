@extends('layouts.app')

@section('content')
<div class="container mb-5">
    <h1>Events Summary</h1>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Organizer</th>
                <th>Number of Speakers</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->titlu }}</td>
                    <td>{{ strftime('%d %B %Y', strtotime($event->data_inceput)) }}</td>
                    <td>{{ strftime('%d %B %Y', strtotime($event->data_sfarsit)) }}</td>
                    <td>{{ $event->organizator->nume }}</td>
                    <td>{{ $event->speakeri->count() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection