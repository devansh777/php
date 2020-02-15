<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Home Page</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
    <?php 
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
            echo "Hello ".htmlspecialchars($_POST['name']);
        }
    ?>
    <p>Home View</p>
    <form method="POST">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit"></td>
        </tr>
    </table>

    <?php echo "<br>Hello ".htmlspecialchars($name);?>
    <ul>
        <?php
            foreach($Color as $col):?>
            <li><?php echo htmlspecialchars($col); ?></li>
            <?php endforeach; ?>
    </form>
    {{ name }}
</body>
</html>