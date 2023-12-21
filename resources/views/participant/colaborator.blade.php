@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $colaborator->nume }}</div>
                <img class="card-img-top mx-auto d-block" style="width: 50%; height: 50%; object-fit: cover;" src="{{ asset($colaborator->poza) }}" alt="Colaborator logo">
                <div class="card-body">
                    <h3>Despre</h3>
                    <p>{{ $colaborator->descriere}}</p>
                    <!-- Add other fields as needed -->

                    <h3>Evenimente unde este prezent</h3>
                    @foreach ($colaborator->evenimente as $event)
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><a href="{{ route('participant.event', ['id' => $event->id]) }}">{{ $event->titlu}}</a></h5>
                                <!-- Add other event details as needed -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </img>
        </div>
    </div>
</div>
@endsection