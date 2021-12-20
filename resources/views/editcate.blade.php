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
    <h1 class=" h text-center text-success">Update Category</h1>
    <form method="post" enctype="multipart/form-data" action="/updatecate">
    @csrf()
    @if(Session::has('err'))
<label class="alert alert-success col-9">{{Session::get('err')}}</label>
 @endif
       @if($errors->has('name'))
        <div class="alert alert-danger col-5">{{$errors->first('name')}}</div>
        @endif
        <input type="text" class="form-control col-10"  value="{{$data->name}}" name="name" placeholder="Name"><br>
      
        @foreach($ass as $i)
        <select class="form-control col-10" name="category">
        <option>Types</option>
           <option value="{{$i->id}}">{{$i->title}}</option>
  
       </select><br><br>
         @endforeach
        <input type="file" name="image"><br><br>
        <div class="form-check-inline">
            <label class="form-check-label">
        <input type="radio" class="form-check-input" value="{{$data->status}}"name="status" value="1" {{($data->status =="1")?'checked':''}}>Active
            </label>
        </div>
        <div class="form-check-inline">
            <label class="form-check-label">
        <input type="radio" class="form-check-input" value="{{$data->status}}" name="status" value="0"{{($data->status =="0")?'checked':''}}>Inactive
            </label>
        </div>
        <input type="hidden" name="uid" value="{{$data->id}}"/>
        <br>
        <input type="submit" class=" btn btn btn-success" value="Update">
       
</form>
    </div>
    @endsection
</body>
</html>