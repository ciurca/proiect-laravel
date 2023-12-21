@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Speakers - <a href="{{ route('participant.event', ['id' => $event->id]) }}">{{$event->titlu}}</a></div>

                <div class="card-body">
                    @foreach ($event->speakeri as $speaker)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title">{{ $speaker->prenume }} {{ $speaker->nume }}</h5>
                                <img src="{{ asset($speaker->poza) }}"class="card-img-top rounded-circle mx-auto d-block" style="width: 25%; height: 25%; object-fit: cover;" alt="{{ $speaker->nume }}">
                                <p>Start Time: {{ strftime('%H:%M', strtotime($speaker->pivot->start_time)) }}</p>
                                <p>End Time: {{ strftime('%H:%M', strtotime($speaker->pivot->end_time)) }}</p>
                                <p>Description: {{ $speaker->pivot->descriere }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection