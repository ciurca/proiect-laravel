@extends('layouts.app')
@section('content')

    <div class="container mt-5">
        <h2>Evenimentele Tale</h2>
    <a class="btn btn-info" href="{{ route('admin.events.create')}}"><i class="fas fa-calendar"></i> Creeaza un nou eveniment</a>
        @if($events->count() > 0)
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Location</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr id="{{ $event->id }}">
                            <td>{{ $event->id }}</td>
                            <td>{{ $event->titlu }}</td>
                            <td>{{ $event->descriere }}</td>
                            <td>{{ $event->data_inceput }}</td>
                            <td>{{ $event->data_sfarsit }}</td>
                            <td>{{ $event->locatie }}</td>
                            <td>
                                <a href="{{ route('admin.events.edit', $event->id) }}" class="btn btn-primary">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.events.destroy', $event->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-warning" role="alert">No events found!</div>
        @endif
    </div>

@endsection
