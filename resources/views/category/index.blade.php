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
                <i class="pe-7s-network icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Categories
                <div class="page-title-subheading">This is page you can management on category books.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
           <a href="{{ route('categories.create') }}" class="mb-2 mr-2 btn-transition btn btn-outline-primary">ADD CATEGORY</a>
        </div>    
        @endsection                         
       @section('content')
       <div class="main-card mb-3 card">
                <div class="card-body">
                @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
             <table class="mb-0 table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category</th>
                        <th>Slug</th>
                        <th style="width: 20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                            <td>{{$category->slug}}</td>
                            <td>
                            <form action="{{ route('categories.destroy',$category->id) }}" method="POST"> 
                                <a href="{{ route('categories.show',['id' => $category->id]) }}" class="mb-2 mr-2 btn-transition btn btn-outline-warning">Edit</a>
                               
                    
                                    @csrf
                                    @method('DELETE')
                                <button type="submit" class="mb-2 mr-2 btn-transition btn btn-outline-danger">Delete</button>
                                </form>
                            </td>
                        </tr> 
                    @endforeach
                </tbody>
            </table>
        </div>
       </div>
       @endsection
</body>
</html>