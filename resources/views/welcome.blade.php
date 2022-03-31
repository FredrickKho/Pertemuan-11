@extends('layout.master')
@section('content')
    <form action="{{ route('create') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="Title_book" class="form-label">Name</label>
            <input type="text" class="form-control" name="Name">
        </div>
        <div class="mb-3">
            <label for="Author_book" class="form-label">Author</label>
            <input type="text" class="form-control" name="Author">
        </div>
        <div class="mb-3">
            <label for="Publisher_book" class="form-label">Publisher</label>
            <input type="text" class="form-control" name="Publisher">
        </div>
        <div class="mb-3">
            <label for="Year_book" class="form-label">Year</label>
            <input type="text" class="form-control" name="Year">
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Gambar</label>
            <input class="form-control" type="file" name="Gambar">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
