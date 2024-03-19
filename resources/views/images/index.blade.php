<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="container">
    <div class="col-8">
        <h1>Добавить новость</h1>
        <form method="post" action="{{ route('image.index') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Название новости</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="body">Содержание</label>
                <textarea class="form-control" id="body" rows="3" name="body"></textarea>
            </div>

            <div class="form-group">
                <label for="image">Картинка для новости</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
</div>

<script src="{{asset('assets/js/app.js')}}"></script>
</body>
</html>
