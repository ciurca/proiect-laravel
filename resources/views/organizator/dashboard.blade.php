@extends('layouts.app')
@section('content')
    <div class="container mb-5">
@if(isset($events) && $events->count() > 0)
    @foreach($events as $event)
        <div class="event">
            <h2>{{ $event->titlu }}</h2>
            <p>{{ $event->descriere }}</p>
            <p>Date: {{ $event->data_inceput->format('m/d/Y') }} - {{ $event->data_sfarsit->format('m/d/Y') }}</p>
            <p>Location: {{ $event->locatie }}</p>
            <!-- Add more event details here -->
        </div>
    @endforeach
@else
    <p>No events found.</p>
@endif
    </div>

    <div class="container mt-5">
        <div class="row">
            @foreach ($events as $event)
                <div class="col-sm">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">{{ $event->titlu}}</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">{{ $event->descriere}}</p>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-sm">
{{--                                    <a href="{{ route('posts.edit', $post->id) }}"--}}
{{--                                       class="btn btn-primary btn-sm">Edit</a>--}}
                                </div>
                                <div class="col-sm">
                                    <form action="{{ route('events.destroy', $event->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

@endsection
