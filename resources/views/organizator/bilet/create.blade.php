@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create bilet</h2>

    <form action="{{ route('admin.bilet.store') }}" method="POST">
        @csrf

       
        <div class="form-group">
            <label for="eveniment_id">Eveniment:</label>
            <select id="eveniment_id" name="eveniment_id" class="form-control">
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->titlu }}</option>
                @endforeach
            </select>
        </div>
        

        <div class="form-group">
            <label for="tip">Tip</label>
            <input type="text" class="form-control" id="tip" name="tip" value="" required>
        </div>

        <div class="form-group">
            <label for="pret">Pret</label>
            <input type="number" class="form-control" id="pret" name="pret" value="" required>
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
