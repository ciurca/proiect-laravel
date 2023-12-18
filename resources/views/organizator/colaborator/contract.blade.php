@extends('layouts.app')

@section('content')
<div class="container mb-5">
<table class="table">
        <thead>
            <tr>
                <th>Eveniment</th>
                <th>Colaborator</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        @foreach ($colaboratori as $colaborator)
@foreach ($colaborator->evenimente as $event)
    <tr>
        <td>{{ $event->titlu }}</td>
        <td>{{ $colaborator->nume }}</td>
        <td>
            @if ($event->pivot)
                <a href="{{ route('admin.contract.edit', $event->pivot->id) }}" class="btn btn-primary">Edit</a>
            @else
                <!-- Handle the case where pivot data is not available -->
                No Contract
            @endif
        </td>
        <td>
            @if ($event->pivot)
                <form action="{{ route('admin.contract.destroy', $event->pivot->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="event_id" value="{{ $event->id }}">
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @else
                <!-- Handle the case where pivot data is not available -->
                No Contract
            @endif
        </td>
    </tr>
</div>
@endforeach
@endforeach
@endsection