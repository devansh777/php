<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<?php
    require_once 'operations.php';
    $prefix=['Mr','Miss','Ms','Mrs','Dr']; 
 ?>
<body>
    <form method="POST">
        <table>
            <tr>
                <td>Prefix</td>
                <td><select name='prefix'>
                    <?php foreach($prefix as $value):?>
                    <option value="<?php echo $value;?>"> <?php echo $value ?></option>
                    <?php endforeach ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>First Name</td>
                <td><input type="text" name="first_name" required></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="last_name" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td><input type="text" name="mobile" minlength="10" maxlength="10" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="cnfPassword" required></td>
            </tr>
            <tr>
                <td>Information</td>
                <td><input type="text" name="information" required ></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="checkbox" name="tnc" required>, I Accept Terms & Conditions.</td>
            </tr>
            <tr>
                <td><input type="submit" name="btnregisrtation"value="Submit"></td>
            </tr>
        </table>

    </form>
</body>
</html>