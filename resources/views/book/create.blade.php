<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
       @extends('layouts.app')
       @section('action-head')
       <div class="page-title-heading">
            <div class="page-title-icon">
                <i class="pe-7s-notebook icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Book
                <div class="page-title-subheading">This is page you can management on books.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
          
        </div>    
        @endsection                         
       @section('content')
       @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Error!</strong> <br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-md-8">
              <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title"></h5>
                    <form method="POST" action="{{ route('books.store') }}" enctype="multipart/form-data">
                        <div class="position-relative form-group">
                        @csrf
                            <label class="">Title</label>
                            <input name="title" id="title" placeholder="" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Author</label>
                            <input name="author_id" id="author_id" placeholder="" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label class="">ISBN</label>
                            <input name="ISBN" id="ISBN" placeholder="" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Genre</label>
                            <input name="genre" id="genre" placeholder="" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Category</label>
                            <input name="category_id" id="category_id" placeholder="" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Publication Year</label>
                            <input name="publication_year" id="publication_year" placeholder="" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Price</label>
                            <input name="price" id="price" placeholder="" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Detail</label>
                            <input name="detail" id="detail" placeholder="" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Image</label><br>
                            <div style="margin-bottom: 8px"><img id="book_photo" src="{{ asset('assets/images/avatars/empty_image.jpg')}}" width="180" height="200" alt=""></div>
                            <input type="file" name="image" placeholder="Choose image" id="image" class="form-control" onchange="document.getElementById('book_photo').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Book File</label>
                            <input type="file" name="book_file" placeholder="Choose Book File" id="book_file" class="form-control">
                        </div>
                        <button class="mt-1 btn btn-primary">Submit</button>
                    </form>
                </div>
              </div>
            </div>
        </div>
        
       @endsection
</body>
</html>