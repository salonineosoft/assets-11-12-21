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
@foreach($image as $i)
 <img src="{{url('uploads/'.$i->image)}}" width="200px" height="100px">
@endforeach
</body>
</html>
@endsection