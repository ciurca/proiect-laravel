@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Speakers</h2>
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
    <a class="btn btn-info" href="{{ route('admin.speakers.create')}}"><i class="fas fa-user-circle"></i> Creeaza un nou Speaker</a>
    <a class="btn btn-info" href="{{ route('admin.agenda.create')}}"><i class="fas fa-calendar-plus"></i> Creeaza o Agenda</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nume</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Poza</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($speakers as $speaker)
                <tr>
                    <td>{{ $speaker->prenume }} {{ $speaker->nume }}</td>
                    <td>{{ $speaker->email}}</td>
                    <td>{{ $speaker->telefon}}</td>
                    <td>{{ $speaker->poza}}</td>
                    <td>
                        <a href="{{ route('admin.speakers.edit', $speaker->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.speakers.destroy', $speaker->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection