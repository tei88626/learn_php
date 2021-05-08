<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>chap1-sample1</title>
</head>
<body>
    <form action = "/chap1_sample1" method = "post">
    your name: <input type = "text" name = "name">
    <br>
        {{csrf_field()}}
    <button> say hello </button>
    </form>
</body>
</html>