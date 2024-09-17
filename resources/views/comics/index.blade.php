@extends('layouts.main')

@section('content')
    <div class="container mt-4 bg-white">
        <h1>Comics List</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>id</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Thumb</th>
                    <th>Price</th>
                    <th>Series</th>
                    <th>Sale Date</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($comics as $comic)
                    <tr>
                        <td>{{ $comic->id }}</td>
                        <td>{{ $comic->title }}</td>
                        <td>{{ Str::limit($comic->description, 100) }}</td>
                        <td>
                            <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" class="img-thumbnail"
                                style="max-width: 100px;">
                        </td>
                        <td>{{ $comic->price }}</td>
                        <td>{{ $comic->series }}</td>
                        <td>{{ $comic->sale_date }}</td>
                        <td>{{ $comic->type }}</td>
                        <td>
                            <a href="{{ route('comics.show', $comic->id) }}" class="btn btn-primary btn-sm">View</a>
                        </td>

                        <td>
                            <!-- Pulsante per modificare -->
                            <a href="{{ route('comics.edit', $comic->id) }}" class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('comics.destroy', $comic->id) }}" method="POST"
                                onsubmit="return confirm('Sicuro che vuoi eliminare il comics?');">
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
