<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create View</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
    <form action="/post" method="POST">
        @csrf

        @error('title')
        <div class="alert alert-danger">Please enter the title</div>
        @enderror

        Title:<input type="text" name="title"><br>
        Body: <textarea name="body" > </textarea>
        <input type="submit" value="Create new Post">
    </form>
</body>
</html>