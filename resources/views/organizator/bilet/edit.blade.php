@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit bilet</h1>

        <form method="POST" action="{{ route('admin.bilet.update', $bilet) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
            <label for="eveniment_id">Event</label>
            <select id="eveniment_id" name="eveniment_id" class="form-control">
                @foreach ($events as $event)
                    <option value="{{ $event->id }}">{{ $event->titlu }}</option>
                @endforeach
            </select>
        </div>
            <div class="form-group">
                <label for="tip">Tip</label>
                <input type="text" class="form-control" id="tip" name="tip" value="{{ $bilet->tip }}" required>
            </div>
            <div class="form-group">
                <label for="pret">Pret</label>
                <input type="text" class="form-control" id="pret" name="pret" value="{{ $bilet->pret }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection