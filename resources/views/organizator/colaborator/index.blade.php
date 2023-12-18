@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Colaboratori</h2>
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
    <a class="btn btn-info" href="{{ route('admin.colaborator.create')}}"><i class="fas fa-user-circle"></i> Creeaza un Colaborator</a>
    <a class="btn btn-info" href="{{ route('admin.contract.create')}}"><i class="fas fa-file-contract"></i> Creeaza un Contract</a>

    <table class="table">
        <thead>
            <tr>
                <th>Nume</th>
                <th>Email</th>
                <th>Descriere</th>
                <th>Poza</th>
                <th>Telefon</th>
                <th>Tip</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($colaboratori as $colaborator)
                <tr>
                    <td>{{ $colaborator->nume}}</td>
                    <td>{{ $colaborator->email}}</td>
                    <td>{{ $colaborator->descriere}}</td>
                    <td>{{ $colaborator->poza}}</td>
                    <td>{{ $colaborator->telefon}}</td>
                    <td>{{ $colaborator->tip}}</td>
                    <td>
                        <a href="{{ route('admin.colaborator.edit', $colaborator->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.colaborator.destroy', $colaborator->id) }}" method="POST">
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