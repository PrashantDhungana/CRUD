<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<table border="1px solid black">
<tr>
    <th>id</th>
    <th>Title</th>
    <th colspan="3">Actions</th>
</tr>
@foreach ($posts as $post )
    <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td><a href="/post/{{$post->id}}/edit">Edit</a></td>
        <form method="POST" action="/post/{{$post->id}}">
        @csrf
        @method('delete')
        <td><input type="submit" value="Delete"></td>
        </form>
        <td><a href="">View</a></td>


    </tr>
@endforeach

</table>
<a href="/post/create" class="btn btn-primary" >Create new Post</a>
</body>
</html>