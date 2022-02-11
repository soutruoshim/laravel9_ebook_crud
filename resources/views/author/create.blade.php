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
                <i class="pe-7s-user icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Author
                <div class="page-title-subheading">This is page you can management on author.
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
                    <form method="POST" action="{{ route('authors.store') }}" enctype="multipart/form-data">
                        <div class="position-relative form-group">
                        @csrf
                            <label class="">First Name</label>
                            <input name="first_name" id="first_name" placeholder="" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Last Name</label>
                            <input name="last_name" id="last_name" placeholder="" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Detail</label>
                            <input name="detail" id="detail" placeholder="" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Image</label><br>
                            <div style="margin-bottom: 8px"><img id="author_photo" src="{{ asset('assets/images/avatars/empty_image.jpg')}}" width="180" height="200" alt=""></div>
                            <input type="file" name="photo" placeholder="Choose image" id="photo" class="form-control" onchange="document.getElementById('author_photo').src = window.URL.createObjectURL(this.files[0])">
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