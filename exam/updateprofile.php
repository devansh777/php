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
    if(!isset($_SESSION['uid']))
    {
        echo "devansh";
        header('location:login.php');
    } 
 ?>
<body>
<br><br>
    <div>
            <form method="post">
            <input type="submit" name="manageCategory" value="Manage Category">
            <input type="submit" name="profile" value="View Profile">
            <input type="submit" name="AddBlog" value="Add Blog">
            <input type="submit" name="logout" value="logout">
    </form>
    </div>
    <br><br>
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
                <td><input type="text" name="first_name" value="<?php echo getFieldValue('first_name','user')?>"></td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td><input type="text" name="last_name" value="<?php echo getFieldValue('last_name','user')?>"></td>
            </tr>
            <tr>
                <td>Emsail</td>
                <td><input type="email" name="email" value="<?php echo getFieldValue('email','user')?>"></td>
            </tr>
            <tr>
                <td>Mobile Number</td>
                <td><input type="text" name="mobile" minlength="10" maxlength="10" value="<?php echo getFieldValue('mobile','user')?>"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>Confirm Password</td>
                <td><input type="password" name="cnfPassword"></td>
            </tr>
            <tr>
                <td>Information</td>
                <td><input type="text" name="information" value="<?php echo getFieldValue('information','user')?>"></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="btnupdate"value="Update"></td>
            </tr>
        </table>

    </form>
</body>
</html>