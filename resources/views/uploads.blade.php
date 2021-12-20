@extends('admin.dashboard')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    @section('saloni')
    <div class="container">
    <form method="post" enctype="multipart/form-data" action="/insertimg">
        @csrf()
        <input type="file" name="image[]"multiple>
        @if(Session::has('err'))
<label class="alert alert-success col-9">{{Session::get('err')}}</label>
 @endif
 <input type="hidden" value="{{$data->id}}" name="uid">
 <input type="submit" class="btn btn-primary" value="submit">
 <a href="/showimg/{{$data->id}}" class="btn btn-success" value="images">show Images</a>
    </form>
    </div>  
</body>
</html>
@endsection