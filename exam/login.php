<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php require_once 'operations.php'; 
        
    ?>
    <form method="POST">
        <table>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" name="loginSubmit" value="Login"></td>
                <td><input type="submit" name="regisrtationSubmit" value="Registration"></td>
            </tr>
        </table>



    </form>
</body>
</html>