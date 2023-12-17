@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>Detalii eveniment: {{ $event->titlu }}</h2>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('participant.event', ['id' => $event->id]) }}">Informatii eveniment</a></h5>
            <p class="card-text">Organizator: {{ $event->organizator->nume }}</p>
            <p class="card-text">Descriere: {{ $event->descriere }}</p>
            <p class="card-text">Locatie: {{ $event->locatie }}</p>
            <p class="card-text">Data Inceput: {{ strftime('%d %B %Y', strtotime($event->data_inceput)) }}</p>
            <p class="card-text">Data Sfarsit: {{ strftime('%d %B %Y', strtotime($event->data_sfarsit)) }}</p>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('participant.event', ['id' => $event->id]) }}">Agenda</a></h5>
            <p class="card-text">{{ $event->agenda }}</p>
            <div class="row">
                @foreach ($event->speakeri as $speaker)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img class="card-img-top rounded-circle mx-auto d-block" style="width: 50%; height: 50%; object-fit: cover;" src="{{ asset($speaker->poza) }}" alt="Speaker image">
                            <div class="card-body">
                                <h5 class="card-title">{{ $speaker->prenume}} {{ $speaker->nume}}</h5>
                                <p class="card-text">Start Time: {{ strftime('%H:%M', strtotime($speaker->pivot->start_time)) }}</p>
                                <p class="card-text">End Time: {{ strftime('%H:%M', strtotime($speaker->pivot->end_time)) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection