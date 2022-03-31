@extends('layout.master')
@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Publisher</th>
                <th scope="col">Year</th>
                <th scope="col">Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($books as $book)
                <tr>
                    <th scope="row">{{ $book->id }}</th>
                    <td>{{ $book->book_name }}</td>
                    <td>{{ $book->book_author }}</td>
                    <td>{{ $book->book_publisher }}</td>
                    <td>{{ $book->book_year }}</td>
                    <td>{{ $book->book_gambar }}</td>
                    <td><img src="{{ asset('storage/images/' . $book->book_gambar) }}" style="width: 50px; height:50px">
                    </td>
                    <td>
                        {{-- <a href="{{ route('edit', $book->book_id) }}" class="btn btn-success">Edit</a> --}}
                        <form action="{{ route('destroy', $book->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td><a href="{{ route('download', $book->id) }}"><button type="submit"
                                class="btn btn-sucess">Download</button></a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
