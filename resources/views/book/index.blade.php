<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
       @extends('layouts.app')
       @section('action-head')
       <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-notebook icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Books
                <div class="page-title-subheading">This is page you can management on book.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
           <a href="{{ route('books.create') }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary">ADD BOOK</a>
        </div>    
        @endsection                         
        @section('content')
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <div class="main-card mb-3 card">
                <div class="card-body">
        <table class="table table-bordered">
            <tr>
                <th width="5%">No</th>
                <th width="10%">Cover</th>
                <th>Title</th>
                <th>Author</th>
                <th width="25%">Action</th>
            </tr>
            @foreach ($books as $book)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="{{ asset('storage/images/'.$book->image) }}" width="50" height="60" ></td>
                <td>{{ $book->title }}</td>
                <td>{{ $book->ISBN }}</td>
                <td>
                    <form action="{{ route('books.destroy',$book->id) }}" method="POST">
                         <a class="mb-2 mr-2 btn-transition btn btn-outline-info" href="{{ asset('storage/book_files/'.$book->book_file) }}">File</a>
    
                        <a class="mb-2 mr-2 btn-transition btn btn-outline-info" href="{{ route('authors.show',$book->id) }}">Show</a>
        
                        <a class="mb-2 mr-2 btn-transition btn btn-outline-primary" href="{{ route('authors.edit',$book->id) }}">Edit</a>
    
                        @csrf
                        @method('DELETE')
        
                        <button type="submit" class="mb-2 mr-2 btn-transition btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $books->links() !!}
    </div>
    </div>
       @endsection

</body>
</html>