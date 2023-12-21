@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>{{ $event->titlu }}</h2>
    <h5>Organizator: <a href="{{ route('participant.organizator', ['id' => $event->organizator->id]) }}">{{ $event->organizator->nume }}</a></h5>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Informatii eveniment</h5>
            <p class="card-text">Descriere: {{ $event->descriere }}</p>
            <p class="card-text">Locatie: {{ $event->locatie }}</p>
            <p class="card-text">Data Inceput: {{ strftime('%d %B %Y', strtotime($event->data_inceput)) }}</p>
            <p class="card-text">Data Sfarsit: {{ strftime('%d %B %Y', strtotime($event->data_sfarsit)) }}</p>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title"><a href="{{ route('participant.event', ['id' => $event->id]) }}">Agenda</a></h5>
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
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Colaboratori</h5>
            <div class="row">
                @foreach ($event->colaboratori as $colaborator)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <img class="card-img-top mx-auto d-block" style="width: 50%; height: 50%; object-fit: cover;" src="{{ asset($colaborator->poza) }}" alt="Colaborator logo">
                            <div class="card-body">
                                <h5 class="card-title">{{ $colaborator->nume}}</h5>
                                <a href="{{ route('participant.colaborator', ['id' => $colaborator->id]) }}" class="card-link">Despre</a></h6>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <h5>Bilete</h5>
            <table class="table">
                <thead>
                <tr>
                    <th>Tip</th>
                    <th>Pret</th>
                    <th>Cantitate</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach ($event->bilete as $bilet)
                        <tr>
                            <td>{{ $bilet->tip }}</td>
                            <td>{{ $bilet->pret }} lei</td>
                            <td><input type="text" name="quantity" value="1" size="2" /></td>
                            <td><a href="{{ url('add-to-cart/'.$bilet->id) }}" class='btn btn-success'>Cumpara</td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
</div>
</div>
@endsection