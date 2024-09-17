@extends('layouts.main')

@section('content')
    <div class="container bg-white my-5">
        <h1>Edit Comics</h1>

        <form action="{{ route('comics.update', $comic->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $comic->title }}" required>
            </div>


            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" value="{{ $comic->description }}" required></textarea>
            </div>


            <div class="form-group">
                <label for="thumb" class="form-label">Thumbnail URL</label>
                <input type="text" name="thumb" id="thumb" class="form-control" value="{{ $comic->thumb }}"
                    required>
            </div>

            <div class="form-group">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="{{ $comic->price }}"
                    required>
            </div>


            <button type="submit" class="btn btn-primary">Update Comic</button>
        </form>
    </div>
@endsection
