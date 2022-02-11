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
                <i class="pe-7s-network icon-gradient bg-mean-fruit">
                </i>
            </div>
            <div>Categories
                <div class="page-title-subheading">This is page you can management on category books.
                </div>
            </div>
        </div>
        <div class="page-title-actions">
          
        </div>    
        @endsection                         
       @section('content')
        <div class="row">
            <div class="col-md-8">
              <div class="main-card mb-3 card">
                <div class="card-body"><h5 class="card-title"></h5>
                    <form method="POST" action="{{ route('categories.store') }}">
                    
                        <div class="position-relative form-group">
                        @csrf
                            <label class="">Category Name</label>
                            <input name="name" id="name" placeholder="" type="text" class="form-control">
                        </div>
                        <div class="position-relative form-group">
                            <label class="">Slug</label>
                            <input name="slug" id="slug" placeholder="" type="text" class="form-control">
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