@extends('panel.index')

@section('content')
    <div class="row">
        <a href="{{route('register')}}"> Register </a>
        <div class="w-16"></div>
        <a href="{{route('login')}}"> Login </a>
    </div>
    <hr/>
    <h1>Books</h1>
    <form action="{{ route('books.index') }}" method="GET">
        <input type="text" name="search" placeholder="Search...">
        <button type="submit">Search</button>
    </form>

    <!-- Book listing table -->
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Author</th>
            <!-- Add more columns -->
        </tr>
        </thead>
        <tbody>
        @foreach($books as $book)
            <tr>
                <td>{{ $book->name }}</td>
                <td>{{ $book->author }}</td>
                <!-- Add more columns -->
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $books->links() }}
@endsection