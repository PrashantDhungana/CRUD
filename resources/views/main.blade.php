<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table border="1px solid black">
<tr>
    <th>id</th>
    <th>Title</th>
    <th colspan="2">Actions</th>
</tr>
@foreach ($posts as $post )
    <tr>
        <td>{{$post->id}}</td>
        <td>{{$post->title}}</td>
        <td><a href="/post/{{$post->id}}/edit">Edit</a></td>
        <td><a href="#">Delete</a></td>

    </tr>
@endforeach

</table>
</body>
</html>