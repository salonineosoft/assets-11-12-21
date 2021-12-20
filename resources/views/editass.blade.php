@extends('admin.dashboard')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <style>
     form{
         margin-left:90px;
     }
     .h{
         font-family: sans-serif;
     }
     .btn{
         margin-left:240px;
     }
    </style>
</head>
<body>
    @section('saloni')
    <div class="container">
    <h1 class=" h text-center text-success">Update Asset</h1>
   
    <form method="post" action="/update">
        @csrf
        @if(Session::has('msg'))
<label class="alert alert-success col-9">{{Session::get('msg')}}</label>
 @endif
 @if(Session::has('err'))
<label class="alert alert-success col-9">{{Session::get('err')}}</label>
 @endif
        @if($errors->has('title'))
        <div class="alert alert-danger col-9">{{$errors->first('title')}}</div>
        @endif
        <input type="text" class="form-control col-10" value="{{$data->title}}" name="title" placeholder="Title"><br>
        @if($errors->has('description'))
        <div class="alert alert-danger col-9">{{$errors->first('description')}}</div>
        @endif
        <input type="text" class="form-control col-10" value="{{$data->description}}" name="description" placeholder="Description"><br>
        <input type="hidden" value="{{$data->id}}" name="pid">
        <input type="submit" class="btn btn-primary text-center" value="Update" >
</form>

    </div>
    @endsection
</body>
</html>