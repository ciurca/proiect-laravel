@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Bilete</h2>
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
    <a class="btn btn-info" href="{{ route('admin.bilet.create')}}"><i class="fas fa-user-circle"></i> Creeaza un nou Bilet</a>


    <table class="table">
        <thead>
            <tr>
                <th>Eveiment</th>
                <th>Tip</th>
                <th>Pret</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bilete as $bilet)
                <tr>
                    <td>{{ $bilet->eveniment->titlu}}</td>
                    <td>{{ $bilet->tip}}</td>
                    <td>{{ $bilet->pret}}</td>
                    <td>
                        <a href="{{ route('admin.bilet.edit', $bilet->id) }}" class="btn btn-primary">Edit</a>
                    </td>
                    <td>
                        <form action="{{ route('admin.bilet.destroy', $bilet->id) }}" method="POST">
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
