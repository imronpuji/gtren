<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>Login</h1>
        <form class="" action="<?= base_url('login') ?>" method="post">
            <label for="">username</label>
            <input type="text" name="username" value=""> <br>
            <label for="">password</label>
            <input type="password" name="password" value=""> <br>
            <button type="submit" name="btn__login">
                Login
            </button>
        </form>
    </body>
</html>
