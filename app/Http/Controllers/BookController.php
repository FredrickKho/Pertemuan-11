<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $nama = $request->file('Gambar')->getClientOriginalName();
        $gambar = $request->file('Gambar')->storeAs('public/images', $nama);
        Book::create([
            'book_name' => $request->Name,
            'book_author' => $request->Author,
            'book_publisher' => $request->Publisher,
            'book_year' => $request->Year,
            'book_gambar' => $nama,
        ]);
        return view('welcome');
    }

    public function download($id)
    {
        $file = Book::findorFail($id);
        $image = '/storage/images/' . $file->book_gambar;
        $path = str_replace('\\', '/', public_path());
        return response()->download($path . $image);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $books = Book::all();
        return view('list', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Book::findorFail($id);
        $image = '/storage/images/' . $file->book_gambar;
        $path = str_replace('\\', '/', public_path());
        unlink($path . $image);
        Book::destroy($id);
        return view('welcome');
    }

    public function get()
    {
        $books = Book::all();
        return $books;
    }

    public function post(Request $request)
    {
        $nama = $request->file('Gambar')->getClientOriginalName();
        $gambar = $request->file('Gambar')->storeAs('public/images', $nama);
        Book::create([
            'book_name' => $request->Name,
            'book_author' => $request->Author,
            'book_publisher' => $request->Publisher,
            'book_year' => $request->Year,
            'book_gambar' => $nama,
        ]);
        return 'success';
    }
    public function delete($id)
    {
        $file = Book::findorFail($id);
        $image = '/storage/images/' . $file->book_gambar;
        $path = str_replace('\\', '/', public_path());
        unlink($path . $image);
        Book::destroy($id);
        return 'Delete Successful';
    }
    public function update(Request $request, $id)
    {
        $nama = $request->file('Gambar')->getClientOriginalName();
        $gambar = $request->file('Gambar')->storeAs('public/images', $nama);
        Book::find($id)->update([
            'book_name' => $request->Name,
            'book_author' => $request->Author,
            'book_publisher' => $request->Publisher,
            'book_year' => $request->Year,
            'book_gambar' => $request->Gambar,
        ]);
        return 'Success Update';
    }
}
