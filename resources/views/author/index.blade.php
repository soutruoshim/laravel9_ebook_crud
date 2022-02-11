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
                <i class="pe-7s-user icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Authors
                <div class="page-title-subheading">This is page you can management on author.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
           <a href="{{ route('authors.create') }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary">ADD AUTHOR</a>
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
                <th width="10%">Profile</th>
                <th>Name</th>
                <th>Details</th>
                <th width="20%">Action</th>
            </tr>
            @foreach ($authors as $author)
            <tr>
                <td>{{ ++$i }}</td>
                <td><img src="{{ asset('storage/images/'.$author->photo) }}" width="50" height="60" ></td>
                <td>{{ $author->first_name . $author->last_name }}</td>
                <td>{{ $author->detail }}</td>
                <td>
                    <form action="{{ route('authors.destroy',$author->id) }}" method="POST">
    
                        <a class="mb-2 mr-2 btn-transition btn btn-outline-info" href="{{ route('authors.show',$author->id) }}">Show</a>
        
                        <a class="mb-2 mr-2 btn-transition btn btn-outline-primary" href="{{ route('authors.edit',$author->id) }}">Edit</a>
    
                        @csrf
                        @method('DELETE')
        
                        <button type="submit" class="mb-2 mr-2 btn-transition btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
        {!! $authors->links() !!}
    </div>
    </div>
       @endsection

</body>
</html>