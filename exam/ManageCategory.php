<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    require_once 'connection.php';
    require_once 'operations.php';
   
    if(!isset($_SESSION['uid']))
        {
            header('location:login.php');
        }
        if(isset($_POST['manageBlog']))
        {
            header('location:blogpostlst.php');
        }
    ?>
    <br><br>
    <div>
    <form method="post">
            <input type="submit" name="manageBlog" value="Manage Blog">
            <input type="submit" name="profile" value="View Profile">
            <input type="submit" name="AddCategory" value="Add Category">
            <input type="submit" name="logout" value="logout">
    </form>
    </div>
    <br><br>
    <table border=1>
        <tr>
            <th>category_id</th>
            <th>Category Image</th>
            <th>category_name</th>
            <th>create date</th>
            <th>Action</th>
        </tr>
        <?php 
        $result=show_catagory('category');
        while($row = $result->fetch_assoc()) 
        {
            echo "<tr>
                    <td>".$row['category_id']."</td>
                    <td><img src='file/".$row['image']."' height='100px' width='100px'></td>
                    <td>".$row['title']."</td>
                    <td>".$row['created_at']."</td>
                    <td>";?><a href="operations.php?editcid=<?php echo $row['category_id'];?>">Edit</a> <a href="#">Delete</a> <?php echo"</td>
                </tr>";
        } 
        ?>
    </table>    
</body>
</html>

