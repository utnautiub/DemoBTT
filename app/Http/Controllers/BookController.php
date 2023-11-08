<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = DB::table('books')->orderBy('bookID', 'desc')->paginate(10);
        return view("books.index", compact("books"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("books.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'bail|required|string',
            'author' => 'bail|required|string',
            'genre' => 'bail|required|string',
            'publicationYear' => 'bail|required|date_format:Y',
            'ISBN' => 'bail|required|numeric',
            'image' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $image = $request->file('image');
        $path = $image->storePublicly("images", "public");

        $book = new Book();
        $book->title = $request->get("title");
        $book->author = $request->get("author");
        $book->genre = $request->get("genre");
        $book->publicationYear = $request->get("publicationYear");
        $book->ISBN = $request->get("ISBN");
        $book->coverImageURL = $path;
        $book->created_at = now();
        $book->updated_at = now();
        $book->save();

        return redirect()->route("books.index")->with("success", "Successfully created the book with id $book->bookID");
    }


    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
        return view("books.show", compact("book"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        return view("books.edit", compact("book"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            "title" => "bail|required",
            "author" => "bail|required|string",
            "genre" => "bail|required",
            "publicationYear" => "bail|required|date_format:Y",
            "ISBN" => "bail|required",
        ]);

        if ($request->hasFile('coverImageURL')) {
            $image = $request->file('coverImageURL');
            $path = $image->storePublicly("images", "public");
            $book->coverImageURL = $path;
        }

        $book->title = $request->get("title");
        $book->author = $request->get("author");
        $book->genre = $request->get("genre");
        $book->publicationYear = $request->get("publicationYear");
        $book->ISBN = $request->get("ISBN");
        $book->updated_at = now('Asia/Ho_Chi_Minh');
        $book->save();

        return redirect()->route("books.index")->with("success", "Successfully updated the book with id $book->bookID");
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        Storage::disk('public')->delete($book->coverImageURL);
        $book->delete();
        return redirect()->route("books.index")->with("success", "Successfully deleted the book with id $book->bookID");
    }
}