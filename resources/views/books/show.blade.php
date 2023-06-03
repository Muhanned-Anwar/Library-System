@extends('layouts.app')

@section('content')
    <h1>Book Details</h1>

    <p>Name: {{ $book->name }}</p>
    <p>Author: {{ $book->author }}</p>
    <!-- Display other book details -->

    <form action="{{ route('books.buy', $book) }}" method="POST">
        @csrf
        <button type="submit">Buy Book</button>
    </form>
@endsection