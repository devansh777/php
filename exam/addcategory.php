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
      <form method="post" >
            <input type="submit" name="manageCategory" value="Manage Category">
            <input type="submit" name="profile" value="View Profile">
            <input type="submit" name="AddCategory" value="Add Category">
            <input type="submit" name="logout" value="logout">
    </form>
    <br><br>
    <form method="POST" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" value="<?php echo getFieldValue('title','category')?>"></td>
        </tr>
        <tr>
            <td>content</td>
            <td><input type="text" name="content" value="<?php echo getFieldValue('content','category')?>"></td>
        </tr>
        <tr>
            <td>URL</td>
            <td><input type="text" name="url" value="<?php echo getFieldValue('url','category')?>"></td>
        </tr>
        <tr>
            <td>Meta Title</td>
            <td><input type="text" name="meta_title" value="<?php echo getFieldValue('meta_title','category')?>"></td>
        </tr>
        <tr>
            <td>Parent Category</td>
            <td><select name="parent_category_id">
             <?php $result=show_catagory('parent_category');
                while($row = $result->fetch_assoc()) 
                {
                    echo "<option value='".$row["parent_category_id"]."'>".$row['category_name']."</option>";
                } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Image</td>
            <td><input type="file" name="file"></td>
        </tr>
        <tr>
            <td><input type="submit" name="addcatagory" value="submit"><input type="submit" name="updatecatagory" value="update"></td>
        </tr>
    </table>
    </form>
</body>
</html>