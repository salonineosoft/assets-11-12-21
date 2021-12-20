@extends('admin.dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
     form{
         margin-left:90px;
     }
     .h{
         font-family: sans-serif;
     }
     .btn{
         margin-left: 230px;
     }
    </style>
</head>
<body>
    @section('saloni')
    <div class="container">
    <h1 class=" h text-center text-success">Add Category</h1>
    <form method="post" enctype="multipart/form-data" action="insertcate">
    @csrf()
    @if(Session::has('err'))
<label class="alert alert-success col-9">{{Session::get('err')}}</label>
 @endif
       @if($errors->has('name'))
        <div class="alert alert-danger col-5">{{$errors->first('name')}}</div>
        @endif
        <input type="text" class="form-control col-10" name="name" placeholder="Name"><br>
        <select class="form-control col-10" name="category">
        <option>Types</option>
           @foreach($data as $i)
           <option value="{{$i->id}}">{{$i->title}}</option>
          @endforeach
       </select><br>
          <div class="form-group">
              <label>
                  code:
              </label>
            @php
            $code=rand(1000000000000000,9999999999999999);
            @endphp
            <input type="text" value="{{$code}}" class="form-control col-5" name="code">
        
          </div>
        <input type="file" name="image"><br><br>
        <div class="form-check-inline">
            <label class="form-check-label">
        <input type="radio" class="form-check-input" name="status" value="1">active
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
        <input type="radio" class="form-check-input" name="status" value="0">inactive
            </label>
        </div>
        <br>
        <input type="submit" class=" btn btn btn-success">
       
</form>
    </div>
</body>
</html>
@endsection