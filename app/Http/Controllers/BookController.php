<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $books = Book::where('name', 'like', "%$search%")->orWhere('author', 'like', "%$search%")->paginate(10);

        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'author' => 'required',
            // Add validation rules for other fields
        ]);

        Book::create($validatedData);

        return redirect()->route('books.index')->with('success', 'Book created successfully.');
    }

    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'author' => 'required',
            // Add validation rules for other fields
        ]);

        $book->update($validatedData);

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }

    public function buy(Book $book): RedirectResponse
    {
        $user = Auth::user();
        $user->budget = $book->price;
        $user->save();

        return redirect()->route('books.show', $book)->with('success', 'Book purchased successfully.');
    }
}
