<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php  require_once 'connection.php';
        require_once 'operations.php';
       
        if(!isset($_SESSION['uid']))
            {
                header('location:login.php');
            }
     ?>
      <br><br>

    
    <form method="POST">
    <table>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <td>content</td>
            <td><input type="text" name="content"></td>
        </tr>
        <tr>
            <td>URL</td>
            <td><input type="text" name="url"></td>
        </tr>
        <tr>
            <td>Meta Title</td>
            <td><input type="text" name="meta_title"></td>
        </tr>
        <tr>
            <td>Parent Category</td>
            <td><select name="parent_category_id">
             <?php   $result=show_catagory();
                while($row = $result->fetch_assoc()) 
                {
                    echo "<option value='".$row["parent_category_id"]."'>".$row['category_name']."</option>
                            ";
                } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="addcatagory" value="submit"></td>
        </tr>
    </table>
    </form>
</body>
</html>