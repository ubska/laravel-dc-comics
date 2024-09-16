@extends('layouts.main')

@section('content')
<div class="container mt-4">
    <h1>{{ $comic->title }}</h1>

    <div class="row">
        <div class="col-md-4">
            <img src="{{ $comic->thumb }}" alt="{{ $comic->title }}" class="img-fluid">
        </div>
        <div class="col-md-8">
            <p><strong>Description:</strong></p>
            <p>{{ $comic->description }}</p>
            <p><strong>Price:</strong> {{ $comic->price }}</p>
            <p><strong>Series:</strong> {{ $comic->series }}</p>
            <p><strong>Sale Date:</strong> {{ $comic->sale_date }}</p>
            <p><strong>Type:</strong> {{ $comic->type }}</p>

            <a href="{{ route('comics.index') }}" class="btn btn-primary">Back to List</a>
        </div>
    </div>
</div>
@endsection