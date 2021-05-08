<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>chapter 7</title>
</head>
<body>
    <?php echo \Session::get('error')?>

    <form action = "/sample_chap7" method = "post">
    <h2>chapter 7</h2>
    text1: <input type = "text" name = "sometext1">
    <br>
    text2: <input type = "text" name = "sometext2">
    <br>
        {{csrf_field()}}
    <button> submit </button>
    </form>
</body>
</html>