<!DOCTYPE html>
<html>
    <head>
        <title>Chap10 - Log In</title>
    </head>
    <body>
        <?php
        if(\Session::has('login') == 'yes'){
            echo 'You already login, admin';
        }
        ?>
        <h3>Chap10 - Log In</h3>
        <form method = "post" action = "/sample_chap10">
        <?php echo \Session::get('msg') . '<br>'?>
        Username:
        <input type="text" id="username" name="username" />
        <?php echo \Session::get('msg1')?>
        <br/>

        Password:
        <input type="password" id="password" name="password"/>
        <?php echo \Session::get('msg2')?>
        <br/>
        {{csrf_field()}}

        <input type="submit" value="Login" name="login"/>
        <input type="submit" value="Logout" name="logout"/>
        </form>
    </body>
</html>
