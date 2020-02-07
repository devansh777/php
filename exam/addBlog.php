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
        if(!isset($_SESSION['uid'])){
            header('location:login.php');
        }
     ?>
     
     <div>
        <form method="post">
            <input type="submit" name="manageCategory" value="Manage Category">
            <input type="submit" name="profile" value="View Profile">
            <input type="submit" name="AddBlog" value="Add Blog">
            <input type="submit" name="logout" value="logout">
    </form>
    </div>
    <form method="POST">
    <table>
        <tr>
            <td>Title</td>
            <td><input type="text" name="title" value="<?php echo getFieldValue('title','blog_post')?>" required></td>
        </tr>
        <tr>
            <td>content</td>
            <td><input type="text" name="content" value="<?php echo getFieldValue('content','blog_post')?>" required> </td>
        </tr>
        <tr>
            <td>URL</td>
            <td><input type="text" name="url" value="<?php echo getFieldValue('url','blog_post')?>" required></td>
        </tr>
        <tr>
            <td>Published At</td>
            <td><input type="date" name="published_at" value="<?php echo getFieldValue('published_at','blog_post')?>" required></td>
        </tr>
        <tr>
            <td>Parent Category </td>
            <td><select multiple name="category_id[]">
             <?php   $result=show_catagory('category');
            
                while($row = $result->fetch_assoc()){
                    $selected=in_array($row['category_id'],getFieldValue('category_id','post_category',[])) ? 'selected="selected"':'';
                    ;
                   echo "<option value='".$row['category_id']."'$selected>".$row['title']."</option>";
                } ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><input type="submit" name="addblog" value="submit"><input type="submit" name="updateblog" value="update"></td>
        </tr>
    </table>
    </form>
</body>
</html>